<?php
/* Fichiers à créer pour un développement d'une future page de type tableau Ex: batiment spéciaux, missions
 * Soit X le nom du nouvel onglet
 * X.php à la racine
 * ajouter X dans le tableau $T_onglet
 * Vue/X.css feuille de style en plus de commun.css
 * Vue/images/onglet_X.png image de l'onglet
 * Modele/classe_TableauX.php classe associée au tableau
 * Modele/classe_BD_X la BDD
 * */

$T_classe = array(
// type tableau => classe associée
	'usines'	=> 'Usine',
	'mines'		=> 'Mine',
	'entrepots'	=> 'Entrepot',
	'commerce'	=> 'Commerce');

// $SCRIPT défini dans la script doctype.html qui appelle ce script
// chargement des classes...
require'Modele/classe_Tableau.php';						// mère des tableaux
require"Modele/classe_Tableau{$T_classe[$SCRIPT]}.php";	// tableau associée à l'onglet
require'Modele/classe_LigneTableau.php';				// mère des lignes de tableau
require"Modele/classe_{$T_classe[$SCRIPT]}.php";		// ligne associée à l'onglet

$classeTableau = 'Tableau'.$T_classe[$SCRIPT];
$Tableau = new $classeTableau;
if (empty($_POST)) {
	$_SESSION['ID'] = (int) $_GET['id']; // indique la ligne sélectionnée dans le tableau
	echo"\t<div id=\"vers_le_haut\"><a href=\"#\"><img src=\"Vue/images/fleche_haut.png\" alt=\"Retourner en haut\" /></a></div>\n";
	$Tableau->Afficher_tete();
	$Tableau->Afficher_corps($_SESSION['ID']);
	$Tableau->CréerFormulaireMAJ();
}
else {
	$Tpost = [];
	foreach($_POST as $clé => $valeur)
		$Tpost[$clé] = (int)htmlspecialchars(stripslashes(trim($valeur)));
	$Tableau->TraiterFormulaireMAJ($Tpost);
}
