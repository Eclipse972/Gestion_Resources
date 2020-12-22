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
		///////////////////////////
		//echo"requête = $sql";exit;
		///////////////////////////
		$requete = $BD->prepare($sql);
		foreach($T_paramètres as $clé => $valeur) { $requete->bindValue($clé, $valeur, PDO::PARAM_INT); }
		$requete->execute();
	} catch (PDOException $e) { exit('Erreur MAJ ligne de tableau: '.$e->getMessage()); }
	$BD = null;
}

public function PageDeRetour($ID) {
	$retour = "http://gestion.resources.free.fr/{$this->onglet}.php";
	if ($this->IDvalide($ID)) $retour = $retour."?id={$ID}#selection";
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

public function FormaterParamètres() {}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 14));
}

public function Etat($chaine) {
	if ((int)$chaine <=100) $this->MAJchampTypeEntier('etat', $chaine); // MAJchampTypeEntier vérifie que la chaine est bien un entier donc inutile de le aire ici
}

public function Nombre($chaine) { $this->MAJchampTypeEntier('nombre', $chaine); }

public function ProdMax($chaine) { $this->MAJchampTypeEntier('prod_max', $chaine); }
}
///////////////////////////////////////////////////////////////////////
class entrepotMAJ extends MAJOnglet {

public function __construct($IDjoueur, $type_mineID) {
	parent::__construct($IDjoueur, $type_mineID);
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'entrepots';
}

public function FormaterParamètres() {}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > 0) && ($valeur <= 60));
}

public function Niveau($chaine) { $this->MAJchampTypeEntier('niveau', $chaine); }

public function Stock($chaine) { $this->MAJchampTypeEntier('stock', $chaine); }
}
