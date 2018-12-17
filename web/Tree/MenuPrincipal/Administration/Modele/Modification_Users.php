<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Utilisateurs.php');
include_once($rootpath.'Fonctions/fct_Database.php');
include_once($rootpath.'Fonctions/fct_TCP.php');

// Définition des variables
// Variables concernant l'objet
$Modification 	= $_POST['Modification'];
$ID 			= $_POST['ID'];
$Login 			= $_POST['Login'];
$Email			= $_POST['Email'];
$Grade 			= $_POST['Grade'];

// Action des boutons
$Suppression 	=  $_POST['Supprimer_User'];
$Reset 			=  $_POST['Reset_User'];

//var_dump($_POST);
// Fonction
// On vérifie le tableau ligne par ligne
for($i = 0; $i < count($ID); ++$i)
{
	// Si une modification a eu lieu, alors on sauvegarde l'utilisateur concerné
	if(isset($Modification) && (htmlspecialchars($Modification) == "1") )
	{
		Modifier_Utilisateur(htmlspecialchars($ID[$i]) , htmlspecialchars($Login[$i]) , htmlspecialchars($Email[$i]) , htmlspecialchars($Grade[$i]));
	}

	// Si un user doit être supprimé
	if(isset($Suppression[$i]) && (htmlspecialchars($Suppression[$i]) == "Supprimer"))
	{
		Supprimer_Utilisateur(htmlspecialchars($_POST['Login'][$i]),htmlspecialchars($_POST['Email'][$i]));
	}

	// Si le password user doit être réinitialisé
	if(isset($Reset[$i]) && (htmlspecialchars($Reset[$i]) == "Reset"))
	{
		ResetPassword_Utilisateur(htmlspecialchars($ID[$i]));
	}
}


header('Location:../Gestion_Users.php');
