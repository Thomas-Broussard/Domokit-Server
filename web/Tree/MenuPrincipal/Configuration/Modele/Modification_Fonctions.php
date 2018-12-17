<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Database.php');

//var_dump($_POST);
print_r($_POST); 

// Définition des variables
// Variables concernant l'objet
//$Modification 	= $_POST['Modification'];
$ID_Fonction	= $_POST['ID_Fonction'];
//$Nom			= $_POST['Nom'];
$Fonction 		= $_POST['Fonction'];
//$Piece 			= $_POST['Piece'];
//$Addr_MAC		= $_POST['Adresse_MAC'];

// Action des boutons
//$Autorisation	= $_POST['Autoriser_Connexion'];
$Suppression 	=  $_POST['Supprimer_Fonction'];


// Suppression ou modification d'une fonction
for($i = 0; $i < count($ID_Fonction); ++$i)
{
	if(isset($_POST['Supprimer_Fonction'][$i]) && (htmlspecialchars($_POST['Supprimer_Fonction'][$i])== "Supprimer") )
	{
			fct_Unlink_Objets_Fonction($ID_Fonction[$i]);
			fct_Delete_Fonction($ID_Fonction[$i]);
	}
	
	if(isset($_POST['Sauvegarder_Fonction'][$i]) && (htmlspecialchars($_POST['Sauvegarder_Fonction'][$i])== "Sauvegarder") )
	{
			fct_Set_Fonction(htmlspecialchars($ID_Fonction[$i]),htmlspecialchars($Fonction[$i]));
	}
}

// Ajout d'une fonction
if(isset($_POST['Ajouter_Fonction']) && (htmlspecialchars($_POST['Ajouter_Fonction'])== "Ajouter") && ($_POST['Nom_Ajout_Fonction']!=""))
{
	fct_Insert_Fonction($_POST['Nom_Ajout_Fonction']);
}

header('Location:../Gestion_Fonctions.php');
