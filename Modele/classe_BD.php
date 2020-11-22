<?php
class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
private $resultat;
private $BD; // PDO initialisé dans connexion.php

public function __construct() {
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$this->BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	}
	catch (PDOException $e) { // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
}

public function Récupère_Vue($vueBD, $WHERE = '1') { // récupère les données de la vue de la BD
	$T_code = '';
	$i = 0;
	$this->resultat = $this->BD->query('SELECT * FROM '.$vueBD.' WHERE '.$WHERE);
	while ($ligne = $this->resultat->fetch()) {	// récupère et agrège le code
		$T_code[$i] = $ligne;
		$i++;
	}
	return $T_code;
}

public function Récupère_recette($type_usineID) {
	$i = 0;
	$T_code = '';
	$this->resultat = $this->BD->query('SELECT Vue_recette.code FROM Vue_recette, type_usine WHERE type_usine.production_ID = Vue_recette.ID AND type_usine.ID = '.$type_usineID);
	while ($ligne = $this->resultat->fetch()) {	// récupère et agrège le code
		$T_code .= $ligne['code'];
		$i++;
	}
	return $T_code;
}
}
