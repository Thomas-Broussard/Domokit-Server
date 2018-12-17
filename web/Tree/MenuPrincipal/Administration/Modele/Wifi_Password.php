<?php
session_start();
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Utilisateurs.php');
include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_TCP.php');

// Variables globales
$error_wifi = "";
$success_wifi = "";

// Définition des variables transmises par la vue
$NewPassword 	= $_POST['NewPassword'];
$ConfPassword 	= $_POST['ConfPassword'];
$BoutonWifi     = $_POST['PasswordWifi'];

//var_dump($_POST);

// Topic MQTT
$topic_mqtt = "domokit/admin/cmd/";


// Changement du mot de passe
if(isset($NewPassword) && isset($ConfPassword) && ($NewPassword == $ConfPassword) && isset($BoutonWifi) && (htmlspecialchars($BoutonWifi) == "1")  )
	{
        
        if(strlen($NewPassword) >= 8){
            fct_Send_MQTT($topic_mqtt."wifipassword" , htmlspecialchars($NewPassword));
            $success_wifi = "Mot de passe correctement changé. Veuillez vous reconnecter avec le nouveau mot de passe.";
        } 
        else{
            $error_wifi = "Le mot de passe doit contenir 8 caractères minimum.";
        }
    }
else{
    $error_wifi = "Les mots de passe ne correspondent pas.";
}
        
$_SESSION['error_wifi'] = $error_wifi;
$_SESSION['success_wifi'] = $success_wifi;
header('Location:../Gestion_Serveur.php');
