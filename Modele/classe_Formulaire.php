<?php
abstract class Formulaire {

// pour les développements futurs
abstract public Hydrate(); // recherche les données pour pré-remplir le formulaire
abstract public Afficher();// afficher le formulaire
abstract public Traiter(); // traiter les données reçues

protected function Récupérer_variables_formulaire($VueBD) {
	try	{
		include '../connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare("SELECT * FROM {$vueBD}_rapport WHERE IDjoueur = :IDjoueur AND ID = :ID");
		$requete->execute(array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID']));
		$TreponseBD = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne à capturer qui contient toutes les variables pour afficher le formulaire
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	return $TreponseBD; // retourne la listes des variables sous la forme d'un tableau associatif
}

private function Nettoyer($donnée_numérique) { // nettoie et convertit en entier
	$donnée = trim($donnée_numérique);
	$donnée = stripslashes($donnée_numérique);
	$donnée = htmlspecialchars($donnée_numérique);
	return (int) $donnée_numérique;
}
}
