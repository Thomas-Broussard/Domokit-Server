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
$error_reset = "";
$success_reset = "";

// Définition des variables transmises par la vue
$Reset          = $_POST['Reset']; 
$ResetPassword  =  hash("sha512",htmlspecialchars($_POST['ResetPassword'])); 

//var_dump($ResetPassword);


// Topic MQTT
$topic_mqtt = "domokit/admin/cmd/";

// Reset industriel du serveur
	if(isset($Reset) && (htmlspecialchars($Reset) == "1"))
	{
		if(EstProprietaire($ResetPassword)==true){
			fct_Send_MQTT($topic_mqtt."reset" ,"1");
			$success_reset = "Données effacées. Veuillez redémarrer votre Box";
		}
		else{
			$error_reset = "Mot de passe erroné";
		}
	}
$_SESSION['error_reset'] = $error_reset;
$_SESSION['success_reset'] = $success_reset;
header('Location:../Gestion_Serveur.php');
