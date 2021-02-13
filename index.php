<?php
session_start();
// préparation
require'prepare_onglet.php';		// défini des tableaux
require'RequeteBD.php';
require'Modele/classe_Joueur.php';
require'Modele/classe_Page.php';

// liste exhaustive des paramètres. Ce sont tous des entiers
$T_paramètresURL = array(
	'onglet'=> 0,	// onglet
	'ligne' => 0,	// ligne à détailler
	'id'	=> 0,	// ligne à MAJ
	'champ' => 0,	// champ à modifier
	'erreur'=> 0);	// erreur
foreach($T_paramètresURL as $clé => $valeur) {
	$T_paramètresURL[$clé] = (isset($_GET[$clé])) ? intval($_GET[$clé]) : null;// récupération des paramètres sans test de validité des valeurs
}

// définition de la page
define(Erreur404, "location:/?erreur=404");
$sauvegardeLigne = null; // variable nécessaire dans le switch

switch (// choix du scenario suivant la présence des paramètres
		 (isset($T_paramètresURL['onglet'])	? 1 : 0)
		+(isset($T_paramètresURL['ligne'])	? 2 : 0)
		+(isset($T_paramètresURL['id'])		? 4 : 0)
		+(isset($T_paramètresURL['champ'])	? 8 : 0)
		+(isset($T_paramètresURL['erreur'])	? 16: 0))
{
	case 0:	// aucun paramètre défini => page d'accueil
		foreach ($T_paramètresURL as $clé => $valeur) $_SESSION[$clé] = $valeur;
		$_SESSION['onglet'] = 0;
		break;
	case 13:// onglet + id + champ => MAJ du champ pour la ligne id.
		$sauvegardeLigne = $_SESSION['ligne']; // Si un rapport est affiché il doit le rester
	case 1: // seul l'onglet est défini => affichage de la page
	case 3: // onglet et ligne => affichage de la liste avec le rapport de la ligne sélectionnée
		if (($T_paramètresURL['onglet'] < 0) || ($T_paramètresURL['onglet'] > count($T_ONGLET)))	header(Erreur404, false);
		foreach ($T_paramètresURL as $clé => $valeur) $_SESSION[$clé] = $valeur;
		if (isset($sauvegardeLigne))	$_SESSION['ligne'] = $sauvegardeLigne;
		break;
	case 16:// page d'erreur
		foreach ($T_paramètresURL as $clé => $valeur) $_SESSION[$clé] = $valeur;
		break;
	default:// pas la peine d'aller plus loin
		header("location:/?erreur=6");
}

// joueur
if (!isset($_SESSION['IDjoueur'])) $_SESSION['IDjoueur'] = 1; // valeur initalisée lorsque le joueur se connecte. 1 -> joueur Lambda
$Joueur=new Joueur;
$CONNEXION_JOUEUR = $Joueur->Cadre_connexion();

// création des différentes parties de la page
$classePage = isset($T_PAGE[$_SESSION['onglet']]) ? $T_PAGE[$_SESSION['onglet']] : 'PageErreur';
$O_PAGE = new $classePage;

ob_start();
$O_PAGE->FeuilleDeStyle();
$CSS = ob_get_contents();
ob_clean();

$CODE_ONGLET= CréationOnglets();

ob_start();
$O_PAGE->Section();
$SECTION = ob_get_contents();
ob_clean();

include 'Vue/doctype.html';
