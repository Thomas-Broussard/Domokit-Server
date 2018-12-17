<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_TCP.php');



// Définition des variables
// Variables concernant l'objet
$Modification 	= $_POST['Modification'];
$ID 			= $_POST['ID'];
$Nom			= $_POST['Nom'];
$Fonction 		= $_POST['Fonction'];
$Piece 			= $_POST['Piece'];
$Addr_MAC		= $_POST['Adresse_MAC'];

// Action des boutons
$Autorisation	=  $_POST['Autoriser_Connexion'];
$Suppression 	=  $_POST['Supprimer_Objet'];

// Topic MQTT
$topic_mqtt		= "domokit/instruction/";



// Fonction
// On vérifie le tableau ligne par ligne
for($i = 0; $i < count($ID); ++$i)
{
	// Si une modification a eu lieu, alors on sauvegarde l'objet concerné
	if(isset($Modification) && (htmlspecialchars($Modification) == "1") )
	{
		fct_Set_Objet(htmlspecialchars($ID[$i]) , htmlspecialchars($Nom[$i]) , htmlspecialchars($Fonction[$i]) , htmlspecialchars($Piece[$i]));
	}
	
	// Autorisation ou Refus de connexion au serveur d'un objet
	if(isset($Autorisation[$i]) && (htmlspecialchars($Autorisation[$i]) != "0"))
	{
		// Objet autorisé
		if (htmlspecialchars($Autorisation[$i])=="Autoriser")
		{
			fct_Connexion_Objet(htmlspecialchars($_POST['ID'][$i]),1);
			fct_Send_MQTT($topic_mqtt.$Addr_MAC[$i] , "START");
		}

		// Objet interdit
		else if (htmlspecialchars($Autorisation[$i])=="Interdire")
		{
			fct_Connexion_Objet(htmlspecialchars($_POST['ID'][$i]),0);
			fct_Send_MQTT($topic_mqtt.$Addr_MAC[$i] ,"STOP");
		}
	}
	
	// Si un objet doit être supprimé
	if(isset($Suppression[$i]) && (htmlspecialchars($Suppression[$i]) == "Supprimer"))
	{
		fct_Delete_Objet(htmlspecialchars($_POST['ID'][$i]));
		fct_Send_MQTT($topic_mqtt.$Addr_MAC[$i] , "STOP");
	}	
}


header('Location:../Gestion_Objets.php');
