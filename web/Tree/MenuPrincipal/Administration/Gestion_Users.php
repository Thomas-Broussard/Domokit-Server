<?php
// Déchargement du $_POST
unset($_POST);
$_POST = array();


/* ######################################################
 *                 PARAMETRES DE LA PAGE 
 * ###################################################### */

// Titre de la page
$Titre_Page = "Gestion des utilisateurs";

// Chemin relatif d'accès aux fichiers, par rapport au dossier Tree
$rootpath = "../../../";

// Menu de navigation en cours d'utilisation 
$Menu_Actif = "SousMenu1C";

/* ######################################################
*   ajout des librairies de fonctions php et javascripts
* ###################################################### */
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_Utilisateurs.php');

/* ######################################################
 *                 	  ACCES A LA PAGE 
 * ###################################################### */
session_start();
// On vérifie qu'on est autorisé à accéder à la page
if ($_SESSION['authenticated'] != true) {
    header('Location: '.$rootpath.'Connexion/login.php');
}


/* ######################################################
 *                  TRAITEMENT DES DONNEES 
 * ###################################################### */

$idUser = $_SESSION['idUser'];
$grade_user= Get_Grade_Utilisateur($idUser);

//var_dump($idUser.' = '.$grade_user);

  // Récupération des utilisateurs dans la bdd
  $donnees = Chercher_Tous_Les_Utilisateurs('Grade_idGrade','ASC');
  foreach($donnees as $id => $recherche)
  {
      $donnees[$id]['ID']    = htmlspecialchars($recherche['idUser']);
      $donnees[$id]['Login'] = nl2br(htmlspecialchars($recherche['login']));
      $donnees[$id]['Email'] = nl2br(htmlspecialchars($recherche['email']));
      $donnees[$id]['Grade'] = nl2br(htmlspecialchars($recherche['Grade']));
      $donnees[$id]['Password'] = nl2br(htmlspecialchars($recherche['password']));
  }
  
  // Récupération des grades existants
  $grade = Get_Grade();
  foreach ($grade as $id => $recherche)
  {
      $grade[$id]['Grade']  = htmlspecialchars($recherche['Grade']);
  }

/* ######################################################
 *             AFFICHAGE DU CONTENU DE LA PAGE 
 * ###################################################### */
// Le contrôleur doit être accompagné d'un fichier préfixé par "Vue_" dans un dossier "Vue"
$Vue = 'Vue/Vue_' . basename(__FILE__);
include_once($Vue);
