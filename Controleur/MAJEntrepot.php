<?php
session_start();
require'../Modele/classe_LigneTableau.php'; // chargement de la classe mère des lignes de tableau
require'../Modele/classe_Entrepot.php';
require'../Controleur/RequeteBD.php';

$entrepot = new Entrepot($_SESSION['IDjoueur'], $_POST['ID']);

$Tpost = $entrepot->FormaterParamètres($_POST);
$ID		= $Tpost['ID'];
$niveau	= $Tpost['niveau'];
$stock	= $Tpost['stock'];

$listeDchamps	= "	niveau = :niveau,
					stock = :stock";
$T_paramètres = array(
	':IDjoueur'	=> $_SESSION['IDjoueur'],
	':ID'		=> $ID,
	':niveau'	=> $niveau,
	':stock'	=> $stock);

$entrepot->MiseAjour($listeDchamps, $T_paramètres);

header("Location: ".$entrepot->PageDeRetour($ID));
