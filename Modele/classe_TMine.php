<?php
require'Modele/classe_Tableau.php';
require'Modele/classe_MAJLigne.php'; // classe pour les objets lignes

class TMine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_mine';
	$this->nomClasseLigne = 'Mine';
}

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire('MAJMine', ' de la mine', 'mine');
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

}
