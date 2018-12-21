<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Utilisateurs.php');
include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_TCP.php');

// Variables globales
$error = "";

// Définition des variables transmises par la vue
$ModeAppairage  = $_POST['Update'];


//var_dump($_POST);

// Topic MQTT
$topic_mqtt = "domokit/admin/cmd/";

// Mode appairage
if(isset($ModeAppairage))
{
	fct_Send_MQTT($topic_mqtt."appairage" ,htmlspecialchars($ModeAppairage));
}

header('Location:../Gestion_Serveur.php');
