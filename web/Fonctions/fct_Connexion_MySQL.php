<?php


// ############################################################################
// Nom :        Connexion_MySQL
// Rôle :       Permet de se connecter à la base de donnée
// ----------------------------------------------------------------------------
// Paramètres : Aucun
// Retour :     Erreurs (si il y en a)
// ############################################################################
function Connexion_MySQL()
{
	// Infos de connexion
	global $bdd;
	$database ='DomoKit';
	$login = 'domokit-user';
	$password = 'domokit';
	
	// Connexion à la bdd
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
}

// ############################################################################
// Nom :        PHP_GET
// Rôle :       Récupère une donnée provenant d'une requête http GET ou POST
// ----------------------------------------------------------------------------
// Paramètres : Nom de la variable à récupérer
// Retour :     Valeur de la variable (ou null si inexistante)
// ############################################################################
    function PHP_GET($name)
    {
        $val_GET = $_GET[$name];
        $val_POST = $_POST[$name];

        if ($val_GET != null)
            return $val_GET;
        else if ($val_POST != null)
            return $val_POST;
        else
            return null;
    }

// ############################################################################
// Nom :        DB_SEARCH
// Rôle :       Envoie une requête à la BDD avec une attente de résultat
// ----------------------------------------------------------------------------
// Paramètres : requête à envoyer
// Retour :     tableau de résultat ou false si vide
// ############################################################################
    function DB_SEARCH($Requete)
    {
        global $bdd;
        
		// Connexion à la bdd
		Connexion_MySQL();

        try
        {
            // Création de la requête 
            $req = $bdd->prepare($Requete);
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
        catch (Exception $e)
        {
				die('Erreur : ' . $e->getMessage());
				return false;
        }

        
    }
	
// ############################################################################
// Nom :        DB_REQUETE
// Rôle :       Envoie une requête à la BDD
// ----------------------------------------------------------------------------
// Paramètres : requête à envoyer
// Retour :     aucun résultat attendu
// ############################################################################
function DB_REQUETE($requete)
{
        global $bdd;
        
		// Connexion à la bdd
		Connexion_MySQL();

        try
        {
            // Création de la requête 
            $req = $bdd->prepare($requete);
			
            // Exécution de la requête
            $req->execute();
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
}
?>
