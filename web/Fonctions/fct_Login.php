<?php
session_start();

include_once('fct_Connexion_Serveur_Web.php');

// Fonction permettant d'ouvrir une session utilisateur si le mot de passe et le username sont corrects
// En cas d'identifiants erronés, la fonction renvoie un message d'erreur
// Le mot de passe est crypté pour éviter toute perte
function Login($redirection)
{
		$error = null;
		if (empty($_SESSION))
		{
			$_SESSION['authenticated'] =false;
		}

		if ($_SESSION['authenticated'] == true) 
		{
		   // Go somewhere secure
		      header('Location: ' . $redirection);
		} 
		else 
		{
		   if (!empty($_POST)) 
		   {
			   // Récupération du login/password, envoyé par le formulaire de connexion
		       $username = empty($_POST['username']) ? null : htmlspecialchars($_POST['username']);
		       $password = empty($_POST['password']) ? null : hash('sha512',htmlspecialchars($_POST['password']));

				// Si le formulaire a été correctement rempli, on peut vérifier la BDD
		       if ($username != null AND $password != null)
		       {
					// Connexion à l'interface web
				    $connexion = Connexion_Serveur_Web($username,$password);

					// Si la connexion a échoué
				    if ($connexion == -1) 
				    {
				        $_SESSION['authenticated'] = false;
				        $error = "Login ou Password incorrect !!!";
					}
					else if ($connexion == -2) 
				    {
				        $_SESSION['authenticated'] = false;
				        $error = "Vous n'avez pas les droits suffisants pour accéder à l'interface Web. Veuillez contacter un administrateur.";
				    }
				    
				    // Si la connexion a réussi
				    else
				    {
				    	// Création des données de session pour l'utilisateur connecté
						$_SESSION['authenticated'] = true;
						$_SESSION['idUser'] = $connexion; 
						$_SESSION['error'] = null;
						
				        // Redirect to your secure location
				        header('Location: ' . $redirection);
				    }		       	
		       }
		       else
				{
					$error = 'Login ou password non rempli';
				}	
			}
			else
			{
				$error = '';
			}	
		}
	return $error;
}
?>
