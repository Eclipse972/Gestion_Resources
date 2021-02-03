<?php
session_start();
if (!isset($_SESSION['IDjoueur'])) $_SESSION['IDjoueur'] = 1; // valeur initalisée lorsque le joueur se connecte. 1 -> joueur Lambda

// récupération des paramètres passés dans l'URL
require'recup_onglet.php';
require'recup_erreur.php';
require'recup_ligne.php';

// création des différentes partie de la page
require'RequeteBD.php';
require'Modele/classe_Joueur.php';
require'pageJoueur.php';

// construction de la page
ob_start();
if (isset($_SESSION['onglet'])) {	// c'est un onglet
	require"{$T_SCRIPT[$_SESSION['onglet']]}.php";
} else {	// c'est une erreur

}
$SECTION = ob_get_contents();
ob_end_clean();

$CSStable = ($T_SCRIPT[$_SESSION['onglet']] == 'pageTableau') ? "\t<link rel=\"stylesheet\" href=\"Vue/table.css\" />\n" : '';

include 'Vue/doctype.html';
