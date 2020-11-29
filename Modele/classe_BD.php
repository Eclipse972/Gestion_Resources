<?php
class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
protected $resultat;
protected $BD;
protected $IDjoueur;

public function __construct() {
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$this->BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	}
	catch (PDOException $e) { // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
	$this->IDjoueur = (isset($_SESSION['ID'])) ? $_SESSION['ID'] : 1; // joueur exemple
}

public function Récupère_Vue($vueBD) { // récupère les données de la vue de la BD
	$T_code = [];
	$this->resultat = $this->BD->query('SELECT * FROM '.$vueBD);
	while ($ligne = $this->resultat->fetch()) $T_code[] = $ligne;	// récupère le code
	return $T_code;
}
}
