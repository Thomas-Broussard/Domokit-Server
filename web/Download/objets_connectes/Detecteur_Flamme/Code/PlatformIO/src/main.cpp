/* 
 *  =============================================================================================================================================
 *  Titre    : main.cpp
 *  Auteur   : Antoine Choplin
 *  Projet   : Domokit - Détecteur de flammes
 *  Création : Octobre 2018
 *  ---------------------------------------------------------------------------------------------------------------------------------------------
 *  Description :
 *  Capteur de flamme, niveau industriel
 *  
 * =============================================================================================================================================
 */

// Dépendance(s)
#include "DomoKit.h"

#include "registres_esp8266.h"
#include "GPIO_esp8266.h"
#include "UART_esp8266.h"
#include "TIMER_esp8266.h"
#include "Scheduler.h"

// ##########################################################################################################################
//                                      DEFINE
// ##########################################################################################################################
// Define Pins/Driver de l'ESP8266
#define BUTTON_PIN  D3
#define SENSOR_PIN  A0
#define RELAI_PIN   D0
#define LED_PIN     D2

#define SEUIL_FLAMME 400
#define NB_POINT_DETECTION 10

// ##########################################################################################################################
//                                      VARIABLES GLOBALES
// ##########################################################################################################################

int count_Detection = 0; // initialisation du tableau à false

uint16 detectFire_analog = 0;
volatile bool Changement_Etat_Relai = false;
volatile bool Changement_Etat_Led = false;
volatile bool Acquittement_Capteur = true;

volatile bool Etat_Led;

bool Domokit_Start;

// Définition de l'objet Domokit
#ifdef __DOMOKIT_H__
    Domokit Domokit("Détecteur de Flammes"); // Nom à donner à votre appareil
#endif
// ##########################################################################################################################
//                                       APPELS DE FONCTIONS
// ##########################################################################################################################
// Fonctions d'interruption (Handler)
void Interruption_GPIO(bool *myflag);

// Fonctions liées au Scheduler
void Task_10us();
void Task_1ms();
void Task_1s();

// Fonctions classiques
void Detection_Flammes();
bool Verification_Incendie(bool newValue);

// Fonctions Domokit
void Alarme_Interrupt(String data);

// Fonctions Dashboard
void init_Tile();
void callBack_Tile(String TileTopic, String payload);



// ##########################################################################################################################
//                                      INITIALISATION
// ##########################################################################################################################
void setup()
{

    // ---------------------------------------------------------
    // Initialisation des variables
    // ---------------------------------------------------------

    // ---------------------------------------------------------
    // Interface Domokit
    // ---------------------------------------------------------
#ifdef __DOMOKIT_H__

    // Activation des Serial print Domokit (mode Debug uniquement)
    INIT_DEBUG_PRINT(); 

    // Initialisation de l'objet Domokit
    Domokit.enableLedWifi();
    Domokit.begin();
#endif
    
    // ---------------------------------------------------------
    // GPIO (Entrées/Sorties Numériques)
    // ---------------------------------------------------------
    // Initialisation des pins
    init_GPIO(RELAI_PIN,GPIO_OUTPUT);
    GPIO_Write(RELAI_PIN,ETAT_BAS);

    init_GPIO(LED_PIN,GPIO_OUTPUT);
    GPIO_Write(LED_PIN,ETAT_BAS);

    init_GPIO(BUTTON_PIN,GPIO_INPUT);

    init_GPIO(SENSOR_PIN,GPIO_INPUT);

    // Initialisation des Interruptions externes
    ETS_GPIO_INTR_DISABLE();
    ETS_GPIO_INTR_ATTACH(Interruption_GPIO,&Changement_Etat_Led);
    Set_GPIO_Interrupt(BUTTON_PIN,GPIO_Interrupt::FRONT_DESCENDANT);
    ETS_GPIO_INTR_ENABLE();

    // ---------------------------------------------------------
    // TIMER / SCHEDULER
    // ---------------------------------------------------------
    // initialisation des compteurs virtuels (pour le scheduler)
    init_Compteurs_Virtuels();

    // Initialisation du Scheduler
    init_TIMER1_Scheduler();

    init_Tile();
}

// ##########################################################################################################################
//                                      PROGRAMME PRINCIPAL
// ##########################################################################################################################

void loop()
{
    // Gestion des actions via le scheduler
    Scheduler(Task_10us,Task_1ms,Task_1s);  

    if (Domokit_Start == true)
    {
        // Gestion des interruptions GPIO (exemple)
        if (Changement_Etat_Led) //la led montre si l'objet est activé ou non on change ici l'état de l'objet
        {
            Changement_Etat_Led = false;
            GPIO_Toggle(RELAI_PIN);
            GPIO_Toggle(LED_PIN);

            if(GPIO_Read(LED_PIN) == ETAT_HAUT){
                Domokit.SendtoTile("on_off_switch","ON");
            }
            else{
                Domokit.SendtoTile("on_off_switch","OFF");
            }
            
        }
    } 
}

// Interruption externe
void Interruption_GPIO(bool * myflag)
{
    // on vérifie la gpio qui a demandé l'interruption
    if (READ_BIT(Registre_GPIO->STATUS,BUTTON_PIN) == 1)
    {
        if (Compteur_virtuel_ms[1].delay == false)
        {
            *myflag = true;
            Acquittement_Capteur = true; 
            Attente(&Compteur_virtuel_ms[1],1000); // Anti-rebond de 1s
        }
        SET_BIT(Registre_GPIO->STATUS_W1TC,BUTTON_PIN); // clear de l'interruption
    }
}

// ##########################################################################################################################
//                                       TACHES CADENCEES PAR LE SCHEDULER
// ##########################################################################################################################
void Task_10us()
{
}

void Task_1ms()
{   
    // ##############################################################
    //              Compteurs virtuels de type TIMER
    // ##############################################################
    // Décrémentation des compteurs virtuels
    Compteur_virtuel_ms[0].valeur--;
    Compteur_virtuel_ms[2].valeur--;

    // Action(s) instantanée(s)

    // Action(s) dès qu'un compteur virtuel tombe à zéro
    if (Compteur_virtuel_ms[0].valeur == 0)
    {
        Compteur_virtuel_ms[0].valeur = 200; // Nombre de ms avant le prochain déclenchement

        // Routine permettant la réception des messages MQTT sur les topics souscrits
        #ifdef __DOMOKIT_H__
            Domokit.verifierMQTT_Receive();
        #endif
    }

    if (Compteur_virtuel_ms[2].valeur == 0)
    {
        Compteur_virtuel_ms[2].valeur = 100; // Nombre de ms avant le prochain déclenchement

        if(GPIO_Read(LED_PIN)) 
        {
            Detection_Flammes(); //on vérifie qu'il n'y a pas de feu détecté
        }
    }

    


    // ##############################################################
    //              Compteurs virtuels de type DELAY
    // ##############################################################

    // Compteur pour l'anti-rebond de l'interruption externe 
    // Décrémentation des compteurs uniquement si le mode delay est activé
    if (Compteur_virtuel_ms[1].delay == true) {
        Compteur_virtuel_ms[1].valeur--;
    }
    

    // Action à réaliser dès que le compteur_virtuel tombe à zéro
    if(Compteur_virtuel_ms[1].valeur == 0)
    {
        Compteur_virtuel_ms[1].delay = false;
    }
    
    
}

void Task_1s()
{
    // ##############################################################
    //              Compteurs virtuels de type TIMER
    // ##############################################################
    // Décrémentation des compteurs virtuels
    Compteur_virtuel_s[0].valeur--;

    // Action(s) instantanée(s)

    // Action(s) dès qu'un compteur virtuel tombe à zéro
    if (Compteur_virtuel_s[0].valeur == 0)
    {
        Compteur_virtuel_s[0].valeur = 5; // Nombre de secondes avant le prochain déclenchement

        // Vérification de la connexion au réseau Domokit
        
        #ifdef __DOMOKIT_H__
            Domokit_Start = Domokit.checkConnexion(); 
        #endif

        // Si le capteur est acquitté par l'utilisateur
        if(Acquittement_Capteur)
        {
            Domokit.SendIconToTile("alarme","fa-check","green");
        }
    }
}

// ##########################################################################################################################
//                                       FONCTIONS CALLBACK DOMOKIT
// ##########################################################################################################################
#ifdef __DOMOKIT_H__
// --------------------------------------------------------
// Fonctions dont le contenu doit être modifié selon les besoins
// --------------------------------------------------------

// Permet d'envoyer une alerte au serveur
void Alarme_Interrupt(String data)
{
  Domokit.MQTT_Send(Domokit.topic_interruption,data);
}

// Défini les Tiles qui seront affichées sur le Dashboard pour cet objet
void init_Tile(){
    Domokit.resetTile();
    //Domokit.setTileSwitch("On/Off détection","on_off_switch");
    Domokit.setTileRadioButton("On/Off détection","on_off_switch","fa-power-off","fa-power-off");
    Domokit.setTileIcon("Alarme Incendie", "alarme");
}

// Défini les Actions réalisées lorsqu'une Tile est modifiée par l'utilisateur
void callBack_Tile(String TileTopic, String payload)
{
    if(TileTopic == "on_off_switch")
    {   
        if(payload == "ON")
        {
            GPIO_Write(LED_PIN, ETAT_HAUT); //on allume le voyant
            GPIO_Write(RELAI_PIN, ETAT_HAUT); //on allume le relai
        }
        else
        {
            GPIO_Write(LED_PIN, ETAT_BAS); //on éteint le voyant
            GPIO_Write(RELAI_PIN, ETAT_BAS); //on éteint le relai
        }
    }
}
#endif
// ##########################################################################################################################
//                                       AUTRES FONCTIONS
// ##########################################################################################################################


/*===============================================================================
  Nom 			: Detection_Flammes
  
  Description	: Réalise l'acquisition du capteur de flammes et envoie les
  notifications au serveur si nécessaire.
  
  Paramètre(s) 	: aucun
  
  Retour		: aucun
===============================================================================*/
void Detection_Flammes()
{
    detectFire_analog = analogRead(A0); //valeur brute acquise

    // si la valeur de seuil est franchie --> une flamme est détectée
    if  (Verification_Incendie(detectFire_analog < SEUIL_FLAMME))
    {
        GPIO_Write(RELAI_PIN, ETAT_BAS); // on éteint le relai
        GPIO_Write(LED_PIN, ETAT_BAS); //on éteint la LED associée au relai
        DEBUG_PRINTLN("flamme détectée on éteint le système");
        
        //Envoi d'une alerte au serveur
        Domokit.SendIconToTile("alarme","fa-fire","#E25822");
        Alarme_Interrupt("Flamme détectée"); 
        Acquittement_Capteur = false;
    }
    
}

/*===============================================================================
  Nom 			: Verification_Incendie
  
  Description	: Vérifie les N derniers points acquis afin de déterminer si la
  il y a un incendie, ou si il s'agit d'une fausse alerte.
  
  Paramètre(s) 	: newValue : dernière acquisition réalisée
  
  Retour		: 
  true si les N derniers points valent tous TRUE
  false sinon
===============================================================================*/
bool Verification_Incendie(bool newValue)
{
    bool Resultat = false;
    if (newValue){
        count_Detection++;
    }
    else{
        count_Detection = 0;
    }

    if (count_Detection >= NB_POINT_DETECTION){
        count_Detection = 0;
        Resultat = true;
    }
    return Resultat;
}