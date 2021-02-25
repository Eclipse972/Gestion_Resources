<?php
class Entrepot extends LigneTableau {
	// valeur par défaut pour les formulaires
	protected $niveau;
	protected $stock;

public function __construct() {
	$this->IDmin = 2;
	$this->IDmax = 60;
	parent::__construct();
}

public function Hydrater($Tparam) {
	parent::Hydrater($Tparam);
	// valeurs par défaut pour les champs de formulaire
	$this->niveau = $Tparam['niveau'];
	$this->stock = $Tparam['stock'];
}

public function AfficherFormulaireMAJ() {
	parent::AfficherFormulaire(	array('MAJEntier',	'MAJEntier'),
								array('Niveau',		'Stock'),
								array($this->niveau,$this->stock)
							);
}

public function AfficherRapport($nbColonne) {
	$this->DébutRapport($nbColonne);
?>
	<h1>Les besoins</h1>
	<p>Tableau : nom - quantité - date<</p>
	<h1>Am&eacute;lioration</h1>
	<p>Cout pour passer au niveau supérieur</p>
	<h1>Divers ...</h1>
<?php
	echo $this->UtilePour($this->ID);
	echo $this->Obtenir($this->ID);
	$this->FinRapport();
}

}
