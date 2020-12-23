<?php
abstract class MAJOnglet {
	protected $table;
	protected $champAmodifier;
	protected $nomChampID;	// nom du champ permettant d'identifier le type d'opjet
	protected $IDjoueur;	// le joueur doit être connu lors de la construction
	protected $onglet;

abstract public function IDvalide($valeur);

public function FormaterParamètres($T_post) {
	$Trésultat = [];
	foreach($T_post as $clé => $valeur) $Trésultat[$clé] = (int)htmlspecialchars(stripslashes(trim($valeur)));
	return $Trésultat;
}

public function __construct($IDjoueur) {
	$this->IDjoueur = $IDjoueur;
}

public function MiseAjour($listeDchamps, $T_paramètres) { // les paramètres sont des chaines transmises par javascript
	try	{
		include'../connexion.php'; // car appelé depuis le doossier Controleur
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE {$this->table}
				SET {$listeDchamps}
				WHERE {$this->table}.joueur_ID = :IDjoueur AND {$this->table}.{$this->nomChampID} = :ID";
		//////////////////////////////////////////////
		//echo"requête = {$sql}\n";
		//print_r($T_paramètres);exit;
		//////////////////////////////////////////////
		$requete = $BD->prepare($sql);
		foreach($T_paramètres as $clé => $valeur) { $requete->bindValue($clé, $valeur, PDO::PARAM_INT); }
		$requete->execute();
	} catch (PDOException $e) { exit('Erreur MAJ ligne de tableau: '.$e->getMessage()); }
	$BD = null;
}

public function PageDeRetour($ID) {
	$retour = "/{$this->onglet}.php";
	if ($this->IDvalide($_SESSION['ID'])) $retour = $retour."?id={$_SESSION['ID']}"; // affiche le rapport si il y a lieu'
	if ($this->IDvalide($ID)) $retour = $retour."#{$ID}";	// met le focus sur l'élément dont on vient de changer les paramètres
	return $retour;
}
}
/////////////////////////////////////////////////////////////////////
class UsineMAJ extends MAJOnglet {

public function __construct($IDjoueur, $type_usineID) {
	parent::__construct($IDjoueur, $type_usineID);
	$this->table = 'usine';
	$this->nomChampID = 'type_usine_ID';
	$this->onglet = 'usines';
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 22));
}
}
///////////////////////////////////////////////////////////////////////
class mineMAJ extends MAJOnglet {

public function __construct($IDjoueur, $type_mineID) {
	parent::__construct($IDjoueur, $type_mineID);
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->onglet = 'mines';
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 14));
}
}
///////////////////////////////////////////////////////////////////////
class entrepotMAJ extends MAJOnglet {

public function __construct($IDjoueur, $type_mineID) {
	parent::__construct($IDjoueur, $type_mineID);
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'entrepots';
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 60));
}
}
///////////////////////////////////////////////////////////////////////
class commerceMAJ extends MAJOnglet {

public function __construct($IDjoueur, $type_mineID) {
	parent::__construct($IDjoueur, $type_mineID);
	$this->table = 'commerce';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'commerce';
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 60));
}
}
