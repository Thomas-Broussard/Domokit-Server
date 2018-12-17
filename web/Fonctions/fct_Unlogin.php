<?php 

// Suppression des variables de session et de la session
session_start();
$_SESSION['authenticated'] = false;
session_destroy();

// Retour à la page de connexion
header('Location: ../Connexion/login.php');

?>
