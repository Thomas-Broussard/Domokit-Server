<?php



// Ajoute un utilisateur dans la base de données, en cryptant son mot de passe
function Ajouter_Utilisateur($login,$password,$email)
{
    global $bdd;

    // Chiffrement du mot de passe
    $safe_password = hash('sha512',htmlspecialchars($password));
    // Requête SQL
    $req = $bdd->prepare("
                    INSERT INTO User (login,password,email,Grade_idGrade)
                    VALUES (\"".$login."\",\"".$safe_password."\",\"".$email."\",(SELECT idGrade FROM Grade WHERE Grade=\"Visiteur\"))"
                    );
    // Exécution de la requête
    $req->execute();
}

// Supprime un utilisateur, à partir de son login et de son adresse mail
function Supprimer_Utilisateur($login,$email)
{
    global $bdd;

    // Requête SQL
    $req = $bdd->prepare("
                    DELETE FROM User
                    WHERE (login=\"".$login."\" AND email=\"".$email."\")"
                    );
    // Exécution de la requête
    $req->execute();
}

// Recherche les informations concernant un utilisateur, par son login ou son adresse mail
// renvoie false si l'utilisateur n'a pas été trouvé
// sinon, renvoie les données concernant l'utilisateur cherché
function Chercher_Utilisateur($login,$email)
{
    global $bdd;

    // Requête SQL
    $req = $bdd->prepare("
                    SELECT *
                    FROM 
                    	User
                    WHERE
                    (
							login =\"".$login."\" 
						OR
							email =\"".$email."\"
					)
					");

    // Exécution de la requête
    $req->execute();
    
    // Récupération du résultat
    $resultat = $req->fetchAll();
    
    if (count($resultat) > 0)
    {
    	return $resultat;
    }
    else
    {
    	return false;
    }
}

// Enregistre un utilisateur dans la base de données
// Renvoie true si l'enregistrement est terminé
// Renvoie false sinon
function Enregistrer_Utilisateur($login,$password,$email)
{
	// Etape 1 : on vérifie que toutes les données sont valides
	if ($login == null OR $password == null OR $email == null)
	{
		return false;
	}

	// Etape 2 : on vérifie que le nom d'utilisateur et l'email ne sont pas déjà présent dans la BDD
	if(Chercher_Utilisateur($login,$email) != false)
	{
		return false;
	}

	// Etape 3 : on ajoute l'utilisateur dans la base de données
	Ajouter_Utilisateur($login,$password,$email);
	return true;
}

?>