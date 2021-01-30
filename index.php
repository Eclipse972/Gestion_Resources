<?php
session_start();
require'RequeteBD.php';

// joueur
require'Modele/classe_Joueur.php';
$Joueur=new Joueur;
$CONNEXION_JOUEUR = $Joueur->Cadre_connexion();

/* Fichiers à créer pour un développement d'un futur onglet nommé X. Ex: batiment spéciaux, missions...
 * ajouter X dans le tableau $T_onglet
 * Vue/X.css feuille de style en plus de commun.css
 * Vue/images/onglet_X.png image de l'onglet
 * si l'onglet est de type tableau voir le script pageTaleau
 * */

//-------------------------------------------------------------------------------------------------------------------------------------------------------------
// Du rewriting sans le moteur rewrite. source:http://urlrewriting.fr/tutoriel-urlrewriting-sans-moteur-rewrite.htm
$adresse = $_SERVER['REDIRECT_URL']; // sous forme: /onglet/nom-de-la-ligne

if (!empty($adresse)) // c'est une redirection à cause d'une page inexistante
	header("Status: 200 OK", false, 200); // permet de garder l'URL transformée dans la barre d'adresse

// extraction de l'onglet
$début = 1;	// le premier caractère est tjs /
$fin = strpos($adresse, '/', 1) === false ? strlen($adresse) : strpos($adresse, '/', 1);	// recherche à partir du second caractère
$ONGLET = substr($adresse, $début, $fin-$début);
// une regex permettrait de faire une recherche plus rigoureuse

$T_onglet = array(
//	onglet		=> script à charger
	'joueur'	=> 'pageJoueur',
	'usines'	=> 'pageTableau',
	'mines'		=> 'pageTableau',
	'entrepots'	=> 'pageTableau',
	'commerce'	=> 'pageTableau');

// sauvegarde de l'état dans la session
if (!isset($_SESSION['IDjoueur'])) $_SESSION['IDjoueur'] = 1; // valeur initalisée lorsque le joueur se connecte. 1->joueur Lambda
$_SESSION['onglet'] = isset($T_onglet[$ONGLET]) ? $ONGLET : null;

// construction de la page
ob_start();
if (isset($T_onglet[$ONGLET])) { // un des onglets appelle cette page
	require"{$T_onglet[$ONGLET]}.php";
	$cssTable = ($ONGLET=='index') ? '' : "<link rel=\"stylesheet\" href=\"Vue/table.css\" />\n";
} else { // page d'erreur
	require'pageErreur.php';
	$cssTable = '';
}
$SECTION = ob_get_contents();
ob_end_clean();

include 'Vue/doctype.html';
