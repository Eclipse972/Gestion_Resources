<?php
session_start();
require'../Modele/classe_MAJLigne.php';
$usine = new usineMAJ($_SESSION['IDjoueur'], $_GET['type_usineID']);

$dico = array(
	'Niveau' =>1,
	'Production' =>2,
	'TempsProdRestant' =>3
);
$methode = $_GET['methode'];
if (isset($dico[$methode])) {
	$usine->$methode($_GET['valeur']);
}

$ID = $_SESSION['ID'];
////////////////////////////
//print_r($_SESSION); exit;
////////////////////////////
header("Location: ".$usine->PageDeRetour($ID));
