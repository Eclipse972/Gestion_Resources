<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function InsérerScript() { echo parent::InsérerJS('mine'); }

public function CréerFormulaireMAJ() {
		parent::DébutFormulaire('MAJMine', ' de la mine');
?>
	<div id="champ1">
		<label for="état">&Eacute;tat :</label>
		<input type="number" id="état" name="état" min="0" max="100" step="1" required>
	</div>
	<div id="champ2">
		<label for="production">Production maximale</label>
		<input type="number" id="production" name="production" min="1" step="1" required>
	</div>
	<div id="champ3">
		<label for="nombre">Nombre de mines</label>
		<input type="number" id="nombre" name="nombre" min="0" step="1" required>
	</div>
<?php
	parent::FinFormulaire();
}

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>
	<h1>En construction</h1>
	<h1>Divers</h1>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}
}
