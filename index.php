<?php
session_start();
if (!isset($_SESSION['IDjoueur'])) $_SESSION['IDjoueur'] = 1; // valeur initalisée lorsque le joueur se connecte. 1 -> joueur Lambda

// récupération des paramètres passés dans l'URL
require'recup_onglet.php';
require'recup_erreur.php';
require'recup_ligne.php';

require'RequeteBD.php';

// création des différentes partie de la page

// joueur
require'Modele/classe_Joueur.php';
$Joueur=new Joueur;
$CONNEXION_JOUEUR = $Joueur->Cadre_connexion();


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
