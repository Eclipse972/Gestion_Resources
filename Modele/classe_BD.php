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

private function Requete($requete, array $T_parametre, $fonction) {
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
	if ($this->resultat->errorCode() != '00000')
		trigger_error('Erreur de requête dans la fonction '.$fonction, E_USER_ERROR);
}
private function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

public function Marchandise() {
	$T_code = null;
	$i = 0;
	$this->resultat = $this->BD->query('SELECT * FROM Vue_marchandise');
	while ($ligne = $this->resultat->fetch()) {	// récupère et agrège le code
		$T_code[$i] = $ligne;
		$i++;
	}
	return $T_code;
}
}
