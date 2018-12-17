<?php

// Paramètres de communication TCP
$address_tcp = "127.0.0.1";
$port_tcp ="32003";

// Parseur permettant de déterminer le type de message TCP envoyé
$parseur = "|!|";

// ############################################################################
// Nom :        fct_Send_TCP
// Rôle :       Envoi un message via le protocole TCP
// ----------------------------------------------------------------------------
// Paramètres : message : message à transmettre
// Retour :     aucun
// ############################################################################
function fct_Send_TCP($message)
{
	global $address_tcp , $port_tcp , $parseur;

	$message = "tcp".$parseur.$message;
	
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	$sockconnect = socket_connect($socket, $address_tcp, $port_tcp);

	socket_write($socket, $message, strlen($message));

	socket_close($socket);
}


// ############################################################################
// Nom :        fct_Send_TCP
// Rôle :       Envoi un message MQTT en passant par TCP via un port spécifique
// ----------------------------------------------------------------------------
// Paramètres : topic : topic MQTT
//				payload : payload MQTT
// Retour :     aucun
// ############################################################################
function fct_Send_MQTT($topic , $payload)
{
	global $address_tcp , $port_tcp , $parseur;

	// Définition du message à envoyer
	$message = "mqtt".$parseur.$topic."!mqtt!".$payload;

	// Envoi du message
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	$sockconnect = socket_connect($socket,  $address_tcp, $port_tcp);

	socket_write($socket, $message, strlen($message));

	socket_close($socket);
}

// ############################################################################
// Nom :        fct_Execute_Script
// Rôle :       Envoi un message TCP indiquant le script à exécuter 
// Remarque : 	Par mesure de sécurité, seuls les scripts du dossier domokit/script sont exécutables.
// ----------------------------------------------------------------------------
// Paramètres : script : script à exécuter
// Retour :     aucun
// ############################################################################
function fct_Execute_Script($script)
{
	global $address_tcp , $port_tcp , $parseur;

	// Définition du message à envoyer
	$message = "script".$parseur.$script;

	// Envoi du message
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	$sockconnect = socket_connect($socket,  $address_tcp, $port_tcp);

	socket_write($socket, $message, strlen($message));

	socket_close($socket);
}

?>
