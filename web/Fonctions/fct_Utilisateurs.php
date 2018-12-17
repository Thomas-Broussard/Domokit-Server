<?php

include_once('fct_Connexion_MySQL.php');

// ############################################################################
// Nom :        Ajouter_Utilisateur
// Rôle :       Ajoute un utilisateur à la BDD
// ----------------------------------------------------------------------------
// Paramètres : login, password et email de l'utilisateur
// Retour :     rien
//
// Remarque :   si aucun utilisateur n'est présent, alors le nouvel utilisateur
// est le propriétaire (1). Sinon, c'est un simple visiteur (0)
// ############################################################################
function Ajouter_Utilisateur($login,$password,$email)
{
    $hash_password = hash('sha512',$password);

    if (Chercher_Tous_Les_Utilisateurs("idUser","ASC") == false){
        $grade = "(SELECT idGrade FROM Grade WHERE Grade = 'Propriétaire')";
        $resultat = 1;
    }
    else{
        $grade = "(SELECT idGrade FROM Grade WHERE Grade = 'Visiteur')";
        $resultat = 0;
    }
    
    // Requête SQL
    $req = "INSERT INTO User 
                (login, Grade_idGrade, password, email)
            VALUES 
                ('$login',$grade,'$hash_password','$email')";
    
    DB_REQUETE($req);  
    return $resultat;        
}

// ############################################################################
// Nom :        Grader_Utilisateur
// Rôle :       Modifie le grade d'un utilisateur
// ----------------------------------------------------------------------------
// Paramètres : login et email de l'utilisateur
//              grade à appliquer (doit exister dans la bdd)
// Retour :     rien
// ############################################################################
function Grader_Utilisateur($login,$email,$grade)
{
    $nouveau_grade = "(SELECT idGrade FROM Grade WHERE Grade = '".$grade."')";

    // Requête SQL
    $req = "UPDATE User 
            SET 
                Grade_idGrade = $nouveau_grade
            WHERE
            (
                login = '$login'
            AND email = '$email'
            )
            ";
    // Exécution de la requête
    $req->execute();
}

// ############################################################################
// Nom :        Modifier_Utilisateur
// Rôle :       Modifie les infos d'un utilisateur
// ----------------------------------------------------------------------------
// Paramètres : id de l'utilisateur
//              infos à modifier (login, email, grade)
// Retour :     rien
// ############################################################################
function Modifier_Utilisateur($id,$login,$email,$grade)
{

    $nouveau_grade = "(SELECT idGrade FROM Grade WHERE Grade = '$grade')";

    // Requête SQL
    $req = "UPDATE User U 
            SET 
                U.Grade_idGrade = $nouveau_grade ,
                U.login = '$login' ,
                U.email = '$email' 
            WHERE
            (
                U.idUser = $id
            )
            ";

    DB_REQUETE($req);
}


// ############################################################################
// Nom :        Supprimer_Utilisateur
// Rôle :       Supprime un utilisateur, à partir de son login et de son adresse mail
// ----------------------------------------------------------------------------
// Paramètres : login et email de l'utilisateur
// Retour :     rien
// ############################################################################
function Supprimer_Utilisateur($login,$email)
{
    // Requête SQL
    $req = "DELETE FROM User
            WHERE 
            (
                login = '$login' 
            AND email = '$email'
            )
            ";
            
    DB_REQUETE($req);
}

// ############################################################################
// Nom :        Chercher_Utilisateur
// Rôle :       Recherche les informations concernant un utilisateur, 
//              par son login ou son adresse mail
// ----------------------------------------------------------------------------
// Paramètres : login, password et email de l'utilisateur
// Retour :     - renvoie false si l'utilisateur n'a pas été trouvé
//              - sinon, renvoie les données concernant l'utilisateur cherché
// ############################################################################
function Chercher_Utilisateur($login,$email)
{

    // Requête SQL
    $req = "SELECT * FROM User
            WHERE
            (
			    login = '$login'
			OR  email = '$email'
			)
			";

    return DB_SEARCH($req);

}

// ############################################################################
// Nom :        Enregistrer_Utilisateur
// Rôle :       Enregistre un utilisateur dans la base de données
// ----------------------------------------------------------------------------
// Paramètres : login, password et email de l'utilisateur
// Retour :     True si l'enregistrement est terminé. False sinon
// ############################################################################
function Enregistrer_Utilisateur($login,$password,$email)
{
	// Etape 1 : on vérifie que toutes les données sont valides
	if ($login == null OR $password == null OR $email == null)
	{
		return -1;
	}

	// Etape 2 : on vérifie que le nom d'utilisateur et l'email ne sont pas déjà présent dans la BDD
	if(Chercher_Utilisateur($login,$email) != false)
	{
		return -2;
	}

	// Etape 3 : on ajoute l'utilisateur dans la base de données
	
	return Ajouter_Utilisateur($login,$password,$email);
}



// ############################################################################
// Nom :        ResetPassword_Utilisateur
// Rôle :       Remet à zéro le password de l'utilisateur
//              Lors de sa prochaine connexion, il devra en choisir un nouveau
// ----------------------------------------------------------------------------
// Paramètres : id de l'utilisateur
// ############################################################################
function ResetPassword_Utilisateur($id)
{
    // Requête SQL
    $req = "UPDATE User U 
            SET 
                U.password = NULL
            WHERE
            (
                U.idUser = $id
            )
            ";

    DB_REQUETE($req);
}


// ############################################################################
// Nom :        Chercher_Tous_Les_Utilisateurs
// Rôle :       Récupère tous les utilisateurs dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     Tableau de résultat
// ############################################################################
function Chercher_Tous_Les_Utilisateurs($classement, $ordre)
{

    // Requête SQL
    $req = "SELECT U.idUser,U.login,U.email,U.password,G.Grade
            FROM User U
            INNER JOIN Grade G 
                ON U.Grade_idGrade = G.idGrade  
            ORDER BY 
                U.$classement $ordre";

    // Exécution de la requête
    return DB_SEARCH($req);
}

// ############################################################################
// Nom :        Get_Grade_Utilisateur
// Rôle :       Récupère le grade d'un utilisateur
// ----------------------------------------------------------------------------
// Paramètres : id de l'utilisateur
// Retour :     grade de l'utilisateur
//              false si l'utilisateur n'existe pas
// ############################################################################
function Get_Grade_Utilisateur($id)
{
    /*if (!$id)
        return false;*/
    // Requête SQL
    $req = "SELECT G.Grade
            FROM Grade G
            INNER JOIN User U ON G.idGrade = U.Grade_idGrade 
            WHERE U.idUser = '$id'
            ";

    $resultat = DB_SEARCH($req);

    return ($resultat == false )? false : $resultat[0][0];
}

// ############################################################################
// Nom :        Get_Grade
// Rôle :       Récupère l'ensemble des Grades disponibles dans la BDD
// ----------------------------------------------------------------------------
// Paramètres : aucun
// Retour :     Tableau de résultat contenant tous les grades (excepté celui du propriétaire)
// ############################################################################
function Get_Grade()
{
    // Requête SQL
    $req = "SELECT G.idGrade,G.Grade
            FROM Grade G
            WHERE G.Grade != \"Propriétaire\"
            ";

    return DB_SEARCH($req);
}


// ############################################################################
// Nom :        EstProprietaire
// Rôle :       Permet d'assurer que seul le propriétaire puisse effectuer 
//              certaines actions sur le serveur
// ----------------------------------------------------------------------------
// Paramètres : password (crypté)
// Retour :     true si le password correspond à celui du propriétaire
//              false sinon
// ############################################################################
function EstProprietaire($hashpassword){

    // Requête SQL
    $req = "SELECT U.password
            FROM User U
            INNER JOIN Grade G 
                ON U.Grade_idGrade=G.idGrade
            WHERE G.Grade = \"Propriétaire\"
            ";
    
    // Récupération du résultat
    $resultat = DB_SEARCH($req);
    
    //var_dump($hashpassword);
    //var_dump($resultat[0][0]);
    if ($hashpassword == $resultat[0]['password'])
    {
    	return true;
    }
    else
    {
    	return false;
    }
}

?>

