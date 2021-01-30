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

if ($adresse == '/') {	// c'est un appel direct du script
	if(isset($_GET['erreur'])) {
		$CODE_ERREUR = $_GET['erreur'];	// faille de sécurité
		$ONGLET = '';	// aucun onglet
	} else $ONGLET = 'joueur';
} else {	// c'est une redirection à cause d'une page inexistante
	header("Status: 200 OK", false, 200); // permet de garder l'URL transformée dans la barre d'adresse
	// extraction de l'onglet
	$début = 1;	// le premier caractère est tjs /
	$fin = strpos($adresse, '/', 1) === false ? strlen($adresse) : strpos($adresse, '/', 1);	// recherche à partir du second caractère
	$ONGLET = substr($adresse, $début, $fin-$début);

	// une regex permettrait de faire une recherche plus rigoureuse
}

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
if (isset($T_onglet[$ONGLET])) { // l'onglet est dans la iste
	require"{$T_onglet[$ONGLET]}.php";
} else { // aucun onglet sélectionné => erreur
	$CODE_ERREUR = isset($_GET['erreur']) ? $_GET['erreur'] : 404; // l'erreur 404 n'a pas de paramètre cAr je m'en sert pour la réécriture d'URL
	require'pageErreur.php';
}
$SECTION = ob_get_contents();
ob_end_clean();

$CSStable = ($T_onglet[$ONGLET]=='pageTableau') ? "\t<link rel=\"stylesheet\" href=\"Vue/table.css\" />\n" : '';

include 'Vue/doctype.html';
