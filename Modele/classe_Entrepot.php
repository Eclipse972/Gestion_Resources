<?php
class Entrepot extends LigneTableau {

public function __construct() {
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->IDmin = 2;
	$this->IDmax = 60;
	$this->T_paramètres = array('niveau', 'stock');
	parent::__construct();
}

public function AfficherFormulaireMAJ() {
	// recherche du nom
	$nom = $this->T_paramètres[$_SESSION['champ']];
	// recherche de la valeur par défaut
	$valeur = 12;
	// recherche du type de champ
	$type = 'ChampEntier';
	$O_champ = new $type($nom, $valeur);
	$O_champ->Afficher();
}

public function TraiterFormulaireMAJ() {

}

public function AfficherRapport() {
?>
	<h1>Les besoins</h1>
	<p>Tableau : nom - quantité - date<</p>
	<h1>Am&eacute;lioration</h1>
	<p>Cout pour passer au niveau supérieur</p>
	<h1>Divers ...</h1>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
}

}
