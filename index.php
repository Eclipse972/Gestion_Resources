<?php
session_start();
// Du rewriting sans le moteur rewrite. source:http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm

$adresse = $_SERVER['REDIRECT_URL']; // sous forme: /onglet/nom-de-la-ligne

// il ne faut pas qu'il y ai un script portant le même nom sans l'extension
// si j'utilise usines il ne doit pas avoir de script nommé usine.php sous peine de provoquer une erreur

header("Status: 200 OK", false, 200); // permet de garder l'URL transformée dans la barre d'adresse

$T_dossier = array(	// pour être compatible avec l'ancienne version
	'/joueur'	=> "index",
	'/usine'	=> "usines",
	'/mine'		=> "mines",
	'/entrepot'	=> "entrepots",
	'/commerces'=> "commerce"
);
if (!isset($T_dossier[$adresse]))	{ // page inconnue
}
else {
	$SCRIPT = $T_dossier[$adresse];
	include 'Vue/doctype.html';
}

