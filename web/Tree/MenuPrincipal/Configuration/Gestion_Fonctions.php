<?php
// Déchargement du $_POST
unset($_POST);
$_POST = array();


/* ######################################################
 *                 PARAMETRES DE LA PAGE 
 * ###################################################### */
// Titre dans la barre de l'explorateur
$Titre_Browser = "Gestion des Fonctionnalités";

// Titre de la page
$Titre_Page = "Gestion des fonctionnalités attribuées aux objets";

// Chemin relatif d'accès aux fichiers
$rootpath = "../../../";

// Menu de navigation en cours d'utilisation 
$Menu_Actif = "SousMenu1B";


/* ######################################################
 *                 	  ACCES A LA PAGE 
 * ###################################################### */
// On vérifie qu'on est autorisé à accéder à la page
 session_start();
 if ($_SESSION['authenticated'] != true) {header('Location: '.$rootpath.'Connexion/login.php');}

// Déchargement du $_POST
unset($_POST);
$_POST = array();

/* ######################################################
 *             ajout des librairies de fonctions 
 * ###################################################### */
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
include_once($rootpath.'Fonctions/fct_Database.php');


/* ######################################################
 *                  TRAITEMENT DES DONNEES 
 * ###################################################### */
 Connexion_MySQL();


$donnees_fonction = fct_Get_Fonctions();
foreach($donnees_fonction as $id => $recherche)
{
		$donnees_fonction[$id]['ID']						= htmlspecialchars($recherche['idFonction']);
		$donnees_fonction[$id]['Fonction']  			 	= nl2br(htmlspecialchars($recherche['Fonction']));
}

/* ######################################################
 *             AFFICHAGE DU CONTENU DE LA PAGE 
 * ###################################################### */
// Le contrôleur doit être accompagné d'un fichier préfixé par "Vue_" dans un dossier "Vue"
$Vue = 'Vue/Vue_' . basename(__FILE__);
include_once($Vue);