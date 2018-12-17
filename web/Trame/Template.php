<?php
// Déchargement du $_POST
unset($_POST);
$_POST = array();



/* ######################################################
 *                 PARAMETRES DE LA PAGE 
 * ###################################################### */
// Titre de la page
$Titre_Page = "Template";

// Chemin relatif d'accès aux fichiers
$rootpath = "../../../";

// Menu de navigation en cours d'utilisation 
$Menu_Actif = "Accueil";


/* ######################################################
 *             ajout des librairies de fonctions 
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
include_once('Vue/Vue_Template.php');
