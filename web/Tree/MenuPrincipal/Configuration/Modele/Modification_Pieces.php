<?php
$rootpath = $_POST['rootpath'] . "../";

// Connexion à la base de donnée MySQL :
include_once($rootpath.'Fonctions/fct_Connexion_MySQL.php');
Connexion_MySQL();

include_once($rootpath.'Fonctions/fct_Database.php');

//var_dump($_POST);
// On vérifie le tableau ligne par ligne

// ############################################################################
// 									PIECES
// ############################################################################
// Suppression ou modification d'une piece
for($i = 0; $i < count($_POST['ID_Piece']); ++$i)
{
	if(isset($_POST['Supprimer_Piece'][$i]) && (htmlspecialchars($_POST['Supprimer_Piece'][$i])== "Supprimer") )
	{
			fct_Unlink_Objets_Piece($_POST['ID_Piece'][$i]);
			fct_Delete_Piece($_POST['ID_Piece'][$i]);
	}
	
	if(isset($_POST['Sauvegarder_Piece'][$i]) && (htmlspecialchars($_POST['Sauvegarder_Piece'][$i])== "Sauvegarder") )
	{
			fct_Set_Piece(htmlspecialchars($_POST['ID_Piece'][$i]),htmlspecialchars($_POST['Piece'][$i]));
	}
		
}

// Ajout d'une fonction
if(isset($_POST['Ajouter_Piece']) && (htmlspecialchars($_POST['Ajouter_Piece'])== "Ajouter") && ($_POST['Nom_Ajout_Piece']!=""))
{
	fct_Insert_Piece($_POST['Nom_Ajout_Piece']);
}


// Redirection

header('Location:../Gestion_Pieces.php');

