<?php
session_start();

function Nettoyer($donnée) { // nettoie et convertit en entier
	$donnée = trim($donnée);
	$donnée = stripslashes($donnée);
	$donnée = htmlspecialchars($donnée);
	return (int) $donnée;
}

$niveau = Nettoyer($_POST['niveau']);

// permet de calculer la durée restante de production en temps réel
$dateFinProduction = time()	// en secondes
	+ 60*Nettoyer($_POST['minute']) 
	+ 3600*Nettoyer($_POST['heure']) 
	+ 86400*Nettoyer($_POST['jour']);

// durée de production souhaitée exprimée en minutes
$dureeProductionSouhaitée = Nettoyer($_POST['minute2'])
	+ 60*Nettoyer($_POST['heure2'])
	+ 1440*Nettoyer($_POST['jour2']);

try	{
	include '../connexion.php';
	$BD = new PDO($dsn, $utilisateur, $mdp);
	$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$requete = $BD->prepare('
		UPDATE usine
		SET niveau = :niveau,
			date_fin_production = :date,
			duree_prod_souhaitee = :duree
		WHERE usine.joueur_ID = :IDjoueur AND usine.ID = :ID');
	$requete->execute(array(
		':IDjoueur'=>$_SESSION['IDjoueur'],
		':ID'=>$_SESSION['ID'],
		':niveau'=>$niveau,
		':date'=>$dateFinProduction,
		':duree'=>$dureeProductionSouhaitée));
} catch (PDOException $e) {
	exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
}
$BD = null; // on ferme la connexion
header("location:http://gestion.resources.free.fr/usines.php?id={$_SESSION['ID']}#selection");
