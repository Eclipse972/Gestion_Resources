<?php
/* Fichiers à créer pour un développement d'une future page de type tableau Ex: batiment spéciaux, missions
 * Soit X le nom du nouvel onglet
 * X.php à la racine
 * ajouter X dans le tableau $T_onglet
 * Vue/X.css feuille de style en plus de commun.css
 * Vue/images/onglet_X.png image de l'onglet
 * Modele/classe_TX.php classe associée au tableau
 * Modele/classe_BD_X la BDD
 * */

$T_tableau = array(
// type tableau => classe associée
	'usines'	=> 'TUsine',
	'mines'		=> 'TMine',
	'entrepots'	=> 'TEntrepot',
	'commerce'	=> 'TCommerce');

// $SCRIPT définie dans la script doctype.html qui appelle ce script
require'Modele/classe_'.$T_tableau[$SCRIPT].'.php';	// chargement de la classe de tableau associée à l'onglet
require'Modele/classe_LigneTableau.php'; // chargement de la classe mère des lignes de tableau
require'Modele/classe_'.substr($T_tableau[$SCRIPT],1,9).'.php';	// chargement de la classe de ligne associée à l'onglet (on retire le T du nom)

$classeTableau = $T_tableau[$SCRIPT];
$Tableau = new $classeTableau;
$Tableau->Afficher_tete();
$Tableau->Afficher_corps($_SESSION['ID']);
$Tableau->CréerFormulaireMAJ();
