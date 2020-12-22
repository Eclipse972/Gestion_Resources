<?php
session_start();
require'../Modele/classe_MAJLigne.php';
$usine = new usineMAJ($_SESSION['IDjoueur'], $_POST['ID']);

$Tpost = $usine->FormaterParamètres($_POST);
$ID			= $Tpost['ID'];
$niveau		= $Tpost['niveau'];
$production = $Tpost['production'];
$jour		= $Tpost['jour'];
$heure		= $Tpost['heure'];
$minute = ($jour + $heure + $Tpost['minute'] == 0) ? -1 : $Tpost['minute']; // si durée nulle on met l'heure de fin de production dans le passé

$listeDchamps	= "	niveau = :niveau,
					prod_en_cours = :prod,
					date_fin_production = UNIX_TIMESTAMP() + 1 + 60*:minute + 3600*:heure + 86400*:jour";
$T_paramètres = array(
	':IDjoueur'	=> $_SESSION['IDjoueur'],
	':ID'		=> $ID,
	':niveau'	=> $niveau,
	':prod'		=> $production,
	':jour'		=> $jour,
	':heure'	=> $heure,
	':minute'	=> $minute);

////////////////////////////
//print_r($T_paramètres);exit;
////////////////////////////
$usine->MiseAjour($listeDchamps, $T_paramètres);

header("Location: ".$usine->PageDeRetour($ID));
