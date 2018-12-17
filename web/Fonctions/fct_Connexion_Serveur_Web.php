<?php
include_once('fct_Connexion_MySQL.php');

// ############################################################################
// Nom :        Connexion_Serveur_Web
// Rôle :       Vérifier si l'utilisateur dispose du bon login/mot de passe et du bon grade
// ----------------------------------------------------------------------------
// Paramètres : login et password de l'utilisateur
// Retour :  idUser si l'utilisateur a le droit de se connecter  
//          -1 si le login/password est incorrect
//          -2 si le grade n'est pas suffisant 
// ############################################################################
function Connexion_Serveur_Web($user, $password)
{
    

    // 1 - On vérifie que l'utilisateur existe bien
    $req1 = "SELECT U.idUser
            FROM User U 
            WHERE 
            (
                U.login ='$user'
            AND U.password ='$password'
            )
            ";

    // Récupération du résultat
    $resultat1 = DB_SEARCH($req1);

    // 2 - On s'assure qu'il a le grade requis
    if ($resultat1 != false){

        $grade_admin    = " SELECT idGrade FROM Grade WHERE Grade = 'Administrateur' ";
        $grade_proprio  = " SELECT idGrade FROM Grade WHERE Grade = 'Propriétaire' ";

        $req2 =    "SELECT U.idUser
                    FROM User U 
                    WHERE 
                    (
                        U.login ='$user'
                    AND U.password ='$password'
                    AND 
                        (
                            U.Grade_idGrade = ($grade_admin)
                        OR  U.Grade_idGrade = ($grade_proprio)
                        )
                    )
                   ";

        $resultat2 = DB_SEARCH($req2);
        return ($resultat2 != false)? $resultat2[0][0]:-2;
    }
    else{
        return -1;
    }
}
