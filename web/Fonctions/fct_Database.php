<?php
include_once('fct_Connexion_MySQL.php');


// ############################################################################
// Nom :        fct_Get_Objets
// Rôle :       Récupérer l'ensemble des objets connectés, enregistrés dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : classement : choix de la colonne sur laquelle on va faire le tri croissant ou décroissant (exemple : Quantite)
//              ordre : ASC ou DESC
// Retour :     Tableau de résultat
// ############################################################################
function fct_Get_Objets($classement, $ordre)
{
    $req = "SELECT O.idObjets_Connectes,O.Nom , F.Fonction , H.Piece , O.Adresse_MAC, O.Auth, O.Actif
            FROM Objets_Connectes O
            INNER JOIN Fonction F ON (O.Fonction_idFonction = F.idFonction)
            INNER JOIN Habitat H ON (O.Habitat_idHabitat = H.idHabitat)  
            ORDER BY O.$classement $ordre
            ";
    return DB_SEARCH($req);  
}

// ############################################################################
// Nom :        fct_Get_Objet
// Rôle :       Récupérer un objet selon son id
// ----------------------------------------------------------------------------
// Paramètres : id : id de l'objet
// Retour :     Tableau de résultat
// ############################################################################
function fct_Get_Objet($id)
{
    // Requête SQL
    $req = "SELECT O.idObjets_Connectes,O.Nom , F.Fonction , H.Piece , O.Adresse_MAC, O.Auth, O.Actif
            FROM Objets_Connectes O
            INNER JOIN Fonction F ON (O.Fonction_idFonction = F.idFonction)
            INNER JOIN Habitat H ON (O.Habitat_idHabitat = H.idHabitat)  
            WHERE O.idObjets_Connectes = $id
            ";

    return DB_SEARCH($req);  
}

// ############################################################################
// Nom :        fct_Set_Objet
// Rôle :       met à jour un objet dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : id,Nom,fonction et pièce de l'objet connecté
// Retour :     Tableau de résultat
// ############################################################################
function fct_Set_Objet($id,$nom,$fonction,$piece)
{
    // Requête SQL
    $req = "UPDATE Objets_Connectes O
            SET
                O.Nom='$nom',
                O.Fonction_idFonction = (SELECT F.idFonction FROM Fonction F WHERE F.Fonction='$fonction'),
                O.Habitat_idHabitat = (SELECT H.idHabitat FROM Habitat H WHERE H.Piece='$piece')
			WHERE
			    O.idObjets_Connectes = '$id'
            ";
    // Exécution de la requête
    DB_REQUETE($req);
}


// ############################################################################
// Nom :        fct_Connexion_Objet
// Rôle :       Détermine si un objet a le droit de se connecter au serveur ou non
// ----------------------------------------------------------------------------
// Paramètres : id, autorisation (1 = autorisé / 0 = refusé)
// Retour :     aucun
// ############################################################################
function fct_Connexion_Objet($id,$autorisation)
{
    // Requête SQL
    $req = "UPDATE Objets_Connectes O
            SET
			    O.Auth='".$autorisation."'
			WHERE
			    O.idObjets_Connectes=\"".$id."\"
            ";

    DB_REQUETE($req);
}

// ############################################################################
// Nom :        fct_Delete_Objet
// Rôle :       Supprime un objet existant dans la base de données
// ----------------------------------------------------------------------------
// Paramètres : id de l'objet
// Retour :     aucun
// ############################################################################
function fct_Delete_Objet($id)
{
    $req1 = "DELETE FROM Tile
            WHERE Objets_Connectes_idObjets_Connectes = $id
            ";
    DB_REQUETE($req1);
    
    $req2 = "DELETE FROM Objets_Connectes
            WHERE idObjets_Connectes = $id
            ";
    DB_REQUETE($req2);
}

// ############################################################################
// Nom :        fct_Get_Fonctions
// Rôle :       Récupère l'ensemble des Fonctions disponibles dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     Tableau de résultat
// ############################################################################
function fct_Get_Fonctions()
{
    $req = "SELECT F.idFonction,F.Fonction
            FROM Fonction F
            ";

    return DB_SEARCH($req);
}

// ############################################################################
// Nom :        fct_Set_Fonction
// Rôle :       met à jour une fonction dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : id,Nom de la fonction concernée
// Retour :     aucun
// ############################################################################
function fct_Set_Fonction($id,$nom)
{
    $req = "UPDATE Fonction
            SET
			    Fonction='$nom'
        	WHERE
                idFonction = '$id'
            ";
    
    DB_REQUETE($req);
}

// ############################################################################
// Nom :        fct_Insert_Fonction
// Rôle :       Ajoute une fonction pour les objets connectés
// ----------------------------------------------------------------------------
// Paramètres : nom de la fonction à ajouter
// Retour :     aucun
// ############################################################################
function fct_Insert_Fonction($fonction)
{
    $req = "INSERT INTO Fonction 
                (Fonction)
            VALUES 
                ('$fonction')
            ";
    DB_REQUETE($req);
}




// ############################################################################
// Nom :        fct_Unlink_Objets_Fonction
// Rôle :       Supprime le lien entre une fonction et des objets
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     aucun
// ############################################################################

function fct_Unlink_Objets_Fonction($id)
{
	// 1 - on recherche les objets associés à cette pièce
    $req = "SELECT idObjets_Connectes 
            FROM Objets_Connectes 
            WHERE Fonction_idFonction='$id' 
            ";
    $resultat = DB_SEARCH($req);
    
	// 2 - tous ces objets sont placés dans la pièce "Inconnu"
    foreach($resultat as $id => $objets)
    {
		$req = "UPDATE Objets_Connectes 
                SET 
				    Fonction_idFonction = (SELECT idFonction FROM Fonction WHERE Fonction = 'Inconnu') 
				WHERE
                    idObjets_Connectes = $objets[idObjets_Connectes]";
        DB_REQUETE($req);
	}
}
// ############################################################################
// Nom :        fct_Delete_Fonction
// Rôle :       Supprime une fonction existante pour les objets connectés
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     aucun
// ############################################################################
function fct_Delete_Fonction($id)
{
    $req = "DELETE FROM Fonction
            WHERE idFonction = '$id'
            ";
    
    DB_REQUETE($req);
}



// ############################################################################
// Nom :        fct_Get_Pieces
// Rôle :       Récupère l'ensemble des Pièces de l'habitat disponibles dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     Tableau de résultat
// ############################################################################
function fct_Get_Pieces()
{
    $req = "SELECT H.idHabitat,H.Piece
            FROM Habitat H
            ";

    return DB_SEARCH($req);
}

// ############################################################################
// Nom :        fct_Set_Piece
// Rôle :       met à jour une Pièce dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : id,Nom de la pièce concernée
// Retour :     aucun
// ############################################################################
function fct_Set_Piece($id,$nom)
{
    $req = "UPDATE Habitat
            SET
			    Piece = '$nom'
			WHERE
			    idHabitat ='$id'
            ";
    DB_REQUETE($req);
}

// ############################################################################
// Nom :        fct_Insert_Piece
// Rôle :       Ajoute une pièce dans l'habitat
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     aucun
// ############################################################################
function fct_Insert_Piece($piece)
{
    $req = "INSERT INTO Habitat 
                (Piece)
            VALUES 
                ('$piece')
            ";
    DB_REQUETE($req);
}


// ############################################################################
// Nom :        fct_Unlink_Objet_Piece
// Rôle :       Supprime le lien entre une pièce et des objets
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     aucun
// ############################################################################

function fct_Unlink_Objets_Piece($id)
{
	// 1 - on recherche les objets associés à cette pièce
    $req = "SELECT idObjets_Connectes 
            FROM Objets_Connectes 
            WHERE Habitat_idHabitat = '$id' 
            ";
    $resultat = DB_SEARCH($req);
    
	// 2 - tous ces objets sont placés dans la pièce "Inconnu"
    foreach($resultat as $id => $objets)
    {
		$req = "UPDATE Objets_Connectes 
                SET 
				    Habitat_idHabitat = (SELECT idHabitat FROM Habitat WHERE Piece = 'Inconnu') 
				WHERE
                    idObjets_Connectes = $objets[idObjets_Connectes]
                ";
        DB_REQUETE($req);
	}
}

// ############################################################################
// Nom :        fct_Delete_Piece
// Rôle :       Supprime une pièce existante dans l'habitat
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     aucun
// ############################################################################
function fct_Delete_Piece($id)
{
    $req = "DELETE FROM Habitat
            WHERE idHabitat='$id'
            ";

    DB_REQUETE($req);
}

?>
