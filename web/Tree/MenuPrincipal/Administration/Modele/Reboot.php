<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_TCP.php');


// Définition des variables transmises par la vue
$Reboot 		= $_POST['Reboot'];

//var_dump($_POST);

// Topic MQTT
$topic_mqtt = "domokit/admin/cmd/";

// Reboot du serveur

if(isset($Reboot) && (htmlspecialchars($Reboot) == "1") )
{
	fct_Send_MQTT($topic_mqtt."reboot" ,"1");
}

header('Location:../Gestion_Serveur.php');
