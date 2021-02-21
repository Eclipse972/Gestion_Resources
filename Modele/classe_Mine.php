<?php
class Mine extends LigneTableau {

public function __construct() {
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->IDmin = 0;
	$this->IDmax = 14;
	$this->T_paramètres = array('nombre de mine', 'état', 'production maxi');
	parent::__construct();
}

public function AfficherFormulaireMAJ($champ) {
	// recherche du nom
	$nom = $this->T_paramètres[$champ];
	// recherche de la valeur par défaut
	$valeur = 12;
	// recherche du type de champ
	$type = 'ChampEntier';
	$O_champ = new $type($nom, $valeur);
	$O_champ->Afficher();
}

public function TraiterFormulaireMAJ($champ) {

}

public function AfficherRapport() {
?>
	<h1>En construction</h1>
	<h1>Divers ...</h1>
<?php
	$this->UtilePour($this->ID + 2); // marchandise_ID = type_usine_ID +2 pour le moment
}

}
