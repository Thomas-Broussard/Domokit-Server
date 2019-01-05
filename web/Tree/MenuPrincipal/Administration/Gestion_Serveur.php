<?php

/* ######################################################
 *                 PARAMETRES DE LA PAGE 
 * ###################################################### */
// Titre de la page
$Titre_Page = "Gestion du serveur";

// Chemin relatif d'accès aux fichiers, par rapport au dossier Tree
$rootpath = "../../../";

// Menu de navigation en cours d'utilisation 
$Menu_Actif = "SousMenu1C";

/* ######################################################
 *                 	  ACCES A LA PAGE 
 * ###################################################### */
// On vérifie qu'on est autorisé à accéder à la page
session_start();
if ($_SESSION['authenticated'] != true) {header('Location: '.$rootpath.'Connexion/login.php');}

$error_wifi  = $_SESSION['error_wifi'];
$error_reset = $_SESSION['error_reset'];
$error_update = $_SESSION['error_update'];
$success_wifi  = $_SESSION['success_wifi'];
$success_reset = $_SESSION['success_reset'];
$success_update = $_SESSION['success_update'];

// Déchargement du $_POST
unset($_POST);
$_POST = array();

/* ######################################################
*   ajout des librairies de fonctions php et javascripts
* ###################################################### */
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
include_once($rootpath.'Fonctions/fct_Database.php');


/* ######################################################
 *                  TRAITEMENT DES DONNEES 
 * ###################################################### */
 Connexion_MySQL();

/* ######################################################
 *             AFFICHAGE DU CONTENU DE LA PAGE 
 * ###################################################### */
// Le contrôleur doit être accompagné d'un fichier préfixé par "Vue_" dans un dossier "Vue"
$Vue = 'Vue/Vue_' . basename(__FILE__);
include_once($Vue);
