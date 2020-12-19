<?php
abstract class MAJOnglet {
	protected $table;
	protected $champAmodifier;
	protected $nomChampID;	// nom du champ permettant d'identifier le type d'opjet
	protected $IDjoueur;	// le joueur doit être connu lors de la construction
	protected $type_objetID;
	protected $onglet;

abstract public function IDvalide($valeur);

public function __construct($IDjoueur, $typeID) {
	$this->IDjoueur = $IDjoueur;
	$this->type_objetID = $typeID;
}

protected function MAJchampTypeEntier($champ, $chaine) { // les paramètres sont des chaines transmises par javascript
	if (($this->IDvalide($this->type_objetID))	// ID du type d'objet est correct. IDvalide() est une méthode abstraite
	&& (preg_match('#^[0-9]+$#', $chaine)))	{	// la chaîne est un entier
		$valeur = (int)$chaine;
		try	{
			include'../connexion.php'; // car appelé depuis le doossier Controleur
			$BD = new PDO($dsn, $utilisateur, $mdp);
			$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE {$this->table} SET {$champ} = :valeur WHERE {$this->table}.joueur_ID = :IDjoueur AND {$this->table}.{$this->nomChampID} = {$this->type_objetID}";
			$requete = $BD->prepare($sql);
			$requete->bindValue(':valeur',	$valeur,		PDO::PARAM_INT);
			$requete->bindValue(':IDjoueur',$this->IDjoueur,PDO::PARAM_INT);
			$requete->execute();
		} catch (PDOException $e) { exit('Erreur MAJchampTypeEntier: '.$e->getMessage()); }
		$BD = null;
	}
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

public function Niveau($chaine) { $this->MAJchampTypeEntier('niveau', $chaine); }

public function Production($chaine) { $this->MAJchampTypeEntier('prod_en_cours', $chaine); }

public function TempsProdRestant($chaine) { // temps au format j-HH-mm
if (preg_match('#^[0-9]+-[0-2][0-9]-[0-5][0-9]$#', $chaine)) {
	list($jour, $heure, $minute) = preg_split('/-/',$chaine);
	$this->MAJchampTypeEntier('date_fin_production', strval(time() + 60*(int)$minute + 3600*(int)$heure + 86400*(int)$jour+9));
} // sinon on ne fait rien
}

}
///////////////////////////////////////////////////////////////////////
