<?php
session_start();

function Nettoyer($donnée) { // nettoie et convertit en entier
	$donnée = trim($donnée);
	$donnée = stripslashes($donnée);
	$donnée = htmlspecialchars($donnée);
	return (int) $donnée;
}

$prod_max = Nettoyer($_POST['prod_max']);
$etat = Nettoyer($_POST['etat']);
$nb_mine = Nettoyer($_POST['nb_mine']);

try	{
	include '../connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
	$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	$requete = $BD->prepare('
		UPDATE mine
		SET prod_max = :prod_max,
			etat = :etat,
			nombre = :nb_mine		
		WHERE mine.joueur_ID = :IDjoueur AND mine.type_mine_ID = :ID'
	);
	$requete->execute(array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID'], ':prod_max'=>$prod_max, ':etat'=>$etat, ':nb_mine'=>$nb_mine));
} catch (PDOException $e) {
	exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
}
$BD = null; // on ferme la connexion
header("location:http://gestion.resources.free.fr/mines.php?id={$_SESSION['ID']}#selection");
