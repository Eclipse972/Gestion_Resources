<?php
class Entrepot extends LigneTableau {
	// valeur par défaut pour les formulaires
	protected $niveau;
	protected $stock;

public function __construct() {
	$this->IDmin = 2;
	$this->IDmax = 60;
	$this->T_formulaireMAJ['classe']	= array('MAJEntier','MAJEntier');
	$this->T_formulaireMAJ['texte']		= array('Niveau',	'Stock');
	$this->T_formulaireMAJ['champBD']	= array('niveau',	'pstock');
	$this->tableUPDATE ='entrepot';
	$this->champWHERE = 'marchandise_ID';
	parent::__construct();
}

public function Hydrater($Tparam) {
	parent::Hydrater($Tparam);
	// valeurs par défaut pour les champs de formulaire
	$this->T_formulaireMAJ['valeur'] = array($Tparam['niveau'], $Tparam['stock']);
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
