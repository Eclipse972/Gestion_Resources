<?php
session_start();
require'../Modele/classe_LigneTableau.php'; // chargement de la classe mère des lignes de tableau
require'../Modele/classe_Mine.php';
require'../Controleur/RequeteBD.php';

$mine = new Mine($_SESSION['IDjoueur'], $_POST['ID']);

$Tpost = $mine->FormaterParamètres($_POST);
$ID			= $Tpost['ID'];
$état		= $Tpost['état'];
$production = $Tpost['production'];
$nombre		= $Tpost['nombre'];

$listeDchamps	= "	etat = :etat,
					prod_max = :prod,
					nombre = :nombre";
$T_paramètres = array(
	':IDjoueur'	=> $_SESSION['IDjoueur'],
	':ID'		=> $ID,
	':etat'		=> $état,
	':prod'		=> $production,
	':nombre'	=> $nombre);
$mine->MiseAjour($listeDchamps, $T_paramètres);

header("Location: ".$mine->PageDeRetour($ID));
