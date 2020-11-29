<?php
abstract class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
protected $resultat;
protected $BD;
protected $IDjoueur;

// pour les développements futurs
abstract protected function Tableau_parametres($ID);
abstract public function Récupère_vue();

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

/*public function Récupère_Vue_brute($vueBD) {
	$T_code = [];
	$No_ligne = 0;
	$this->resultat = $this->BD->query('SELECT * FROM '.$vueBD); // récupère les données de la vue
	while ($ligne = $this->resultat->fetch()) {
		$T_code[$No_ligne]['ID'] = $ligne['ID'];
		$T_code[$No_ligne]['code'] = $this->Remplacement_variables($ligne['code'], $this->Tableau_parametres($ligne['ID']));// remplacement des variables
		$No_ligne++;
	}
	return $T_code;
}*/

protected function Remplacement_variables($ligne, $T_param) {	// remplace chaque variable (entourée de parenthèses) par sa valeur
	foreach($T_param as $variable => $valeur) $ligne = str_replace('('.$variable.')',	$valeur, $ligne);
	return $ligne;
}

}
