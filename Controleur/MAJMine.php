<?php
session_start();
require'../Modele/classe_MAJLigne.php';
$mine = new mineMAJ($_SESSION['IDjoueur'], $_GET['type_mineID']);

$dico = array(
	'ProdMax' =>1,
	'Nombre' =>2,
	'Etat' =>3
);
$methode = $_GET['methode'];
if (isset($dico[$methode])) {
	$mine->$methode($_GET['valeur']);
}

$ID = $_SESSION['ID'];
header("Location: ".$mine->PageDeRetour($ID));
