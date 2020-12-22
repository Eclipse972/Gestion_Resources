<?php
session_start();
require'../Modele/classe_MAJLigne.php';
$usine = new usineMAJ($_SESSION['IDjoueur'], $_GET['ID']);


// dans un premier temps je fait confiance au filtrage du formulaire
$ID			= $_POST['ID'];
$niveau		= $_POST['niveau'];
$production = $_POST['production'];
$jour		= $_POST['jour'];
$heure		= $_POST['heure'];
$minute		= $_POST['minute'];
if ($jour + $heure + $minute == 0) $minute = -1; // si durée nulle on met l'heure de fin de production dans le passé
////////////////////////////
//echo"$ID, $niveau, $production, $jour, $heure, $minute";exit;
////////////////////////////

$IDjoueur = $_SESSION['IDjoueur'];

try	{
	include '../connexion.php';
	$BD = new PDO($dsn, $utilisateur, $mdp);
	$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$requete = $BD->prepare('
		UPDATE usine
		SET niveau = :niveau,
			prod_en_cours = :prod,
			date_fin_production = UNIX_TIMESTAMP() + 1 + 60*:minute + 3600*:heure + 86400*:jour
		WHERE usine.joueur_ID = :IDjoueur AND usine.type_usine_ID = :ID');
	$requete->bindValue(':IDjoueur'	, $IDjoueur,	PDO::PARAM_INT);
	$requete->bindValue(':ID'		, $ID,			PDO::PARAM_INT);
	$requete->bindValue(':niveau'	, $niveau,		PDO::PARAM_INT);
	$requete->bindValue(':prod'		, $production,	PDO::PARAM_INT);
	$requete->bindValue(':jour'		, $jour,		PDO::PARAM_INT);
	$requete->bindValue(':heure'	, $heure,		PDO::PARAM_INT);
	$requete->bindValue(':minute'	, $minute,		PDO::PARAM_INT);
	$requete->execute();
} catch (PDOException $e) {
	exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
}
$BD = null; // on ferme la connexion
header("Location: ".$usine->PageDeRetour($ID));
