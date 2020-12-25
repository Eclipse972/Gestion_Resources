<?php
require'Modele/classe_Tableau.php';
require'Modele/classe_LigneTableau.php';
require'Modele/classe_Usine.php';

class TUsine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_usine';
	$this->nomClasseLigne = 'Usine';
}

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire('MAJUsine', ' de l&apos;usine', 'usine');
?>
	<div id="champ1">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" min="1" step="1" required>
	</div>
	<div id="champ2">
		<label for="production">Production totale</label>
		<input type="number" id="production" name="production" min="1" step="1" required>
	</div>
	<fieldset>
		<legend>Dur&eacute;e de production restante</legend>
		<label for="jour">jour :</label>
		<input type="number" id="jour" name="jour" min="0" step="1" required>
		<label for="heure">heure :</label>
		<input type="number" id="heure" name="heure" min="0" max="23" step="1" required>
		<label for="minute">minute :</label>
		<input type="number" id="minute" name="minute" min="0" max="59" step="1" required>
	</fieldset>
<?php
	parent::FinFormulaire();
}

public function Afficher_tete() { parent::Afficher_thead(array('Usine', 'Niveau', 'Production')); }

}
