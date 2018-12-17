<?php
session_start();
$rootpath = "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
include_once($rootpath.'Fonctions/fct_Utilisateurs.php');

Connexion_MySQL();

//include_once($rootpath.'Fonctions/fct_Database.php');


// Définition des variables
// Variables concernant l'objet
$login		= htmlspecialchars($_POST['login']);
$password 	= htmlspecialchars($_POST['password']);
$email 		= htmlspecialchars($_POST['email']);

$_SESSION['register_success'] = null;

$resultat = Enregistrer_Utilisateur($login,$password,$email);

if ( $resultat == 1)
{
	print_r("success");
	$_SESSION['success'] = "Vous êtes l'heureux propriétaire de cette box Domokit ! Bienvenue !";
	header('Location:login.php');
}
else if  ( $resultat == 0)
{
	print_r("success");
	$_SESSION['success'] = "Merci de vous être enregistré ! Veuillez contacter un administrateur pour faire valider votre compte";
	header('Location:login.php');
}
else if ( $resultat == -2)
{
	print_r("failure");
	$_SESSION['error'] = "Erreur : Cet utilisateur existe déjà !";
	header('Location:register.php');
}
else
{
	print_r("failure");
	$_SESSION['error'] = "Erreur interne. Veuillez réessayer ultérieurement.";
	header('Location:register.php');
}

