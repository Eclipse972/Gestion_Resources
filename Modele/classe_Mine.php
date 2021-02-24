<?php
class Mine extends LigneTableau {
	// valeur par défaut pour les formulaires
	protected $état;
	protected $nombre;
	protected $productionMaximale;

public function __construct() {
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->IDmin = 0;
	$this->IDmax = 14;
	parent::__construct();
}

public function Hydrater($Tparam) {
	parent::Hydrater($Tparam);
	// valeurs par défaut pour les champs de formulaire
	$this->état = $Tparam['etat'];
	$this->nombre = $Tparam['nombre'];
	$this->productionMaximale = $Tparam['prod_max'];
}

public function AfficherFormulaireMAJ() {
	parent::AfficherFormulaire(	array('MAJEntier',		'MAJPourcentage',	'MAJEntier'),
								array('nombre de mine', 'état',				'production maxi'),
								array($this->nombre,	$this->état,		$this->productionMaximale)
							);
}

public function AfficherRapport($nbColonne) {
	$this->DébutRapport($nbColonne);
?>
	<h1>En construction</h1>
	<h1>Divers ...</h1>
<?php
	$this->UtilePour($this->ID + 2); // marchandise_ID = type_usine_ID +2 pour le moment
	$this->FinRapport();
}

}
