<?php
/* ######################################################
 *                 PARAMETRES DE LA PAGE 
 * ###################################################### */
// Titre dans la barre de l'explorateur
$Titre_Browser = "Mes Objets";

// Titre de la page
$Titre_Page = "Vue d'ensemble des Objets";

// Chemin relatif d'accès aux fichiers
$rootpath = "../../../";

// Menu de navigation en cours d'utilisation 
$Menu_Actif = "SousMenu1A";


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
 *   ajout des librairies de fonctions php et javascripts
 * ###################################################### */
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
include_once($rootpath.'Fonctions/fct_Database.php');


/* ######################################################
 *                  TRAITEMENT DES DONNEES 
 * ###################################################### */
 Connexion_MySQL();

  // Récupération des objets dans la bdd
 $donnees = fct_Get_Objets('Nom','ASC');
foreach($donnees as $id => $recherche)
{
	$donnees[$id]['ID']						= htmlspecialchars($recherche['idObjets_Connectes']);
    $donnees[$id]['Nom']        			= nl2br(htmlspecialchars($recherche['Nom']));
    $donnees[$id]['Fonction']  			 	= nl2br(htmlspecialchars($recherche['Fonction']));
    $donnees[$id]['Piece']  			 	= nl2br(htmlspecialchars($recherche['Piece']));
    $donnees[$id]['Adresse_MAC']        	= nl2br(htmlspecialchars($recherche['Adresse_MAC']));
    $donnees[$id]['Auth']   				= nl2br(htmlspecialchars($recherche['Auth']));
    $donnees[$id]['Actif']   				= nl2br(htmlspecialchars($recherche['Actif']));
}


/* ######################################################
 *             AFFICHAGE DU CONTENU DE LA PAGE 
 * ###################################################### */
include_once('Vue/Vue_Ensemble_Objets.php');


