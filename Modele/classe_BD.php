<?php
abstract class base2donnees {
protected $resultat;
protected $BD;
protected $IDjoueur;

abstract public function Récupère_vue();

public function __construct() {
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$this->BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	}
	catch (PDOException $e) { // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
	$this->IDjoueur = (isset($_SESSION['ID'])) ? $_SESSION['ID'] : 1; // joueur lambda pour le moment
}

public function Récupère_Vue_nommée($vueBD) {
	$this->resultat = $this->BD->prepare('SELECT ID, IDjoueur, code FROM ? WHERE IDjoueur = ?'); // préparation de la requête
	//////////////////////////
	if (!$this->resultat) trigger_error('Erreur de préparation requête sur '.$vueBD, E_USER_ERROR);
	/////////////////////////
	// exécution de la requête
	$this->resultat->bindValue(1,$vueBD);
	$this->resultat->bindValue(2,$this->IDjoueur);
	$this->resultat->execute();
	if ($this->resultat->errorCode() != '00000') trigger_error('Erreur de requête sur '.$vueBD.' & joueur='.$this->IDjoueur, E_USER_ERROR);
	
	// récupération des données
	$T_code = [];
	while ($ligne = $this->resultat->fetch()) $T_code[] = $ligne;

	$this->resultat->closeCursor(); // utile si j'utilise autre chose que MySQL
	return $T_code;
}
}

class BD_usines extends base2donnees {
	public function Récupère_vue() { return parent::Récupère_Vue_nommée('Vue_usine'); }
}

class BD_mine extends base2donnees {
	public function Récupère_vue() { return parent::Récupère_Vue_nommée('Vue_mine'); }
}

class BD_entrepots extends base2donnees {
	public function Récupère_vue() { return parent::Récupère_Vue_nommée('Vue_entrepot'); }
}

class BD_marchandise extends base2donnees {
	public function Récupère_vue() { return parent::Récupère_Vue_nommée('Vue_marchandise'); }
}
