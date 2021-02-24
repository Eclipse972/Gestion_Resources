<?php
session_start();
// préparation
require'prepare_onglet.php';		// défini des tableaux
require'RequeteBD.php';
require'Modele/classe_Joueur.php';
require'Modele/classe_FormulaireMAJ.php';
require'Modele/classe_Page.php';

$T_paramètresURL = array('onglet'=> 0,	'erreur'=> 0);	// paramètres principaux
// récupération des paramètres sans test de validité des valeurs
foreach($T_paramètresURL as $clé => $valeur)	$T_paramètresURL[$clé] = (isset($_GET[$clé])) ? intval($_GET[$clé]) : null;

// choix du scenario suivant la présence des paramètres
switch ((isset($T_paramètresURL['onglet']) ? 1 : 0) + (isset($T_paramètresURL['erreur']) ? 2: 0))
{
	case 0:	// aucun paramètre défini => page d'accueil
		$_SESSION['onglet'] = 0;
		$_SESSION['erreur'] = null;
		break;
	case 1: // seul l'onglet est défini
		if (($T_paramètresURL['onglet'] < 0) || ($T_paramètresURL['onglet'] > count($T_ONGLET)))	header("location:/?erreur=404", false);
		$_SESSION['onglet'] = $T_paramètresURL['onglet'];
		$_SESSION['erreur'] = null;
		break;
	case 2: // page d'erreur
		$_SESSION['erreur'] = $T_paramètresURL['erreur'];
		$_SESSION['onglet'] = null;
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

if (empty($_POST)) {
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
} else {
	$O_PAGE->TraiterFormulaire();
	header("location:{$O_PAGE->PageRetour()}");
}
