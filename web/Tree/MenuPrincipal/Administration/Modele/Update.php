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
$error_update = "";
$success_update = "";

// Définition des variables transmises par la vue
$Update          = $_POST['Update']; 
$UpdatePassword  =  hash("sha512",htmlspecialchars($_POST['UpdatePassword'])); 



// Topic MQTT
$topic_mqtt = "domokit/admin/cmd/";

// Update du serveur
	if(isset($Update) && (htmlspecialchars($Update) == "1"))
	{
		if(EstProprietaire($UpdatePassword)==true){
			fct_Send_MQTT($topic_mqtt."update" ,"1");
			$success_update = "Mise à jour en cours... Ne pas éteindre votre Box !";
		}
		else{
			$error_update = "Mot de passe erroné";
		}
	}
$_SESSION['error_update'] = $error_update;
$_SESSION['success_update'] = $success_update;
header('Location:../Gestion_Serveur.php');
