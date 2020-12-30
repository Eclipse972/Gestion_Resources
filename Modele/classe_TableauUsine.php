<?php
class TableauUsine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_usine';
	$this->nomClasseLigne = 'Usine';
	$this->traitementFormulaire = 'usines';
	$this->T_paramètres = array('niveau', 'production', 'jour', 'heure', 'minute');
}

public function Afficher_tete() { parent::Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire(' de l&apos;usine');
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

public function TraiterFormulaireMAJ($Tpost) {
	$usine = new Usine($_SESSION['IDjoueur'], $Tpost['ID']);

	$listeDchamps	= "	niveau = :niveau,
						prod_en_cours = :prod,
						date_fin_production = UNIX_TIMESTAMP() + 1 + 60*:minute + 3600*:heure + 86400*:jour";
	$T_paramètres = array(
		':IDjoueur'	=> $_SESSION['IDjoueur'],
		':ID'		=> $Tpost['ID'],
		':niveau'	=> $Tpost['niveau'],
		':prod'		=> $Tpost['production'],
		':jour'		=> $Tpost['jour'],
		':heure'	=> $Tpost['heure'],
		':minute'	=> ($Tpost['jour'] + $Tpost['heure'] + $Tpost['minute'] == 0) ? -1 : $Tpost['minute'] // si durée nulle on met l'heure de fin de production dans le passé
	);
	$usine->MiseAjour($listeDchamps, $T_paramètres);

	header("Location: ".$usine->PageDeRetour($Tpost['ID']));
}

}
