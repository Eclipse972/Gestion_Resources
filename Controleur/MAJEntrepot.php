<?php
session_start();
require'../Modele/classe_MAJLigne.php';
$entrepot = new entrepotMAJ($_SESSION['IDjoueur'], $_GET['marchandise_ID']);

$dico = array(
	'Niveau' =>1,
	'Stock' =>2
);
$methode = $_GET['methode'];
if (isset($dico[$methode])) {
	$entrepot->$methode($_GET['valeur']);
}

$ID = $_SESSION['ID'];
header("Location: ".$entrepot->PageDeRetour($ID));
