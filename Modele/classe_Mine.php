<?php
class Mine extends LigneTableau {

public function __construct() {
	$this->IDmin = 0;
	$this->IDmax = 14;
	$this->T_formulaireMAJ['classe']	= array('MAJEntier',		'MAJEntier',	'MAJEntier');
	$this->T_formulaireMAJ['texte']		= array('nombre de mine',	'&Eacute;tat',	'production maxi');
	$this->T_formulaireMAJ['champBD']	= array('nombre',			'etat',			'prod_max');
	$this->tableUPDATE ='mine';
	$this->champWHERE = 'type_mine_ID';
	parent::__construct();
}

public function Hydrater($Tparam) {
	parent::Hydrater($Tparam);
	// valeurs par défaut pour les champs de formulaire
	$this->T_formulaireMAJ['valeur'] = array($Tparam['nombre'], $Tparam['etat'], $Tparam['prod_max']);
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
