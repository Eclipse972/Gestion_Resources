<?php
class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
private $resultat;
private $BD;
private $IDjoueur;

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

public function Récupère_Vue($vueBD, $WHERE = '1') { // récupère les données de la vue de la BD
	$T_code = [];
	$this->resultat = $this->BD->query('SELECT * FROM '.$vueBD.' WHERE '.$WHERE);
	while ($ligne = $this->resultat->fetch()) $T_code[] = $ligne;	// récupère le code
	return $T_code;
}

public function Récupère_recette_usine($type_usineID) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_recette_usine WHERE ID = '.$type_usineID);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return $ligne['code'];
}

public function Niveau_usine($IDusine) {

	return $IDusine;
}

public function Production_usine($IDusine) {

	return number_format($IDusine*4823,0,',',' ');
}

public function Stock($IDentrepot) {

	return number_format($IDentrepot*10000,0,',',' ');
}

public function Niveau_entrepot($IDentrepot) {
	
	return $IDentrepot+8;
}

public function Production_mine($IDmine) {
	
	return number_format($IDmine*5000,0,',',' ');
}

public function Etat_mine($IDmine) {
	
	return number_format($IDmine*4,0,',',' ');
}

public function Nombre_mine($IDmine) {
	
	return number_format($IDmine*23,0,',',' ');
}

public function MarchandiseUtilePour($IDmarchandise) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_marchandiseUtilePour WHERE ID = '.$IDmarchandise);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Gagner des sous!</p>\n";
}

public function MarchandiseAbesoin($IDmarchandise) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_marchandiseAbesoin WHERE ID = '.$IDmarchandise);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Rien</p>\n";	
}

public function MineUtilePour($IDmine) {
	// recherche de l'ID de la marchandise associée à la mine
	$this->resultat = $this->BD->query('SELECT marchandise_ID FROM type_mine WHERE ID = '.$IDmine);
	$ligne = $this->resultat->fetch(); // un seul résultat
	$IDmarchandise = $ligne['marchandise_ID'];
	return $this->MarchandiseUtilePour($IDmarchandise);
}
}
