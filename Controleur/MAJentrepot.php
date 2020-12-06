<?php
session_start();

function Nettoyer($donnée) { // nettoie et convertit en entier
	$donnée = trim($donnée);
	$donnée = stripslashes($donnée);
	$donnée = htmlspecialchars($donnée);
	return (int) $donnée;
}

$niveau = Nettoyer($_POST['niveau']);
$stock = Nettoyer($_POST['stock']);

try	{
	include '../connexion.php';
	$BD = new PDO($dsn, $utilisateur, $mdp);
	$requete = $BD->prepare('
		UPDATE entrepot
		SET niveau = :niveau,
			stock = :stock		
		WHERE entrepot.joueur_ID = :IDjoueur AND entrepot.ID = :ID');
	$requete->execute(array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID'], ':niveau'=>$niveau, ':stock'=>$stock));
} catch (PDOException $e) {
	exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
}
$BD = null; // on ferme la connexion
header("location:http://gestion.resources.free.fr/entrepots.php?id={$_SESSION['ID']}#selection");
