<?php
class TableauUsine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_usine';
	$this->nomClasseLigne = 'Usine';
	$this->traitementFormulaire = 'usines';
	$this->T_paramètres = array('niveau', 'production', 'jour', 'heure', 'minute', 'prod_souhaitee');
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
	<fieldset>
		<legend>Production souhait&eacute;e</legend>
		<label for="prod_souhaitee">Quantit&eacute;</label>
		<input type="number" id="prod_souhaitee" name="prod_souhaitee" min="1" step="1" required>

		<!-- futurs champs
		<label for="jour2">jour :</label>
		<input type="number" id="jour2" name="jour2" min="0" step="1" required>
		<label for="heure2">heure :</label>
		<input type="number" id="heure2" name="heure2" min="0" max="23" step="1" required>
		<label for="minute2">minute :</label>
		<input type="number" id="minute2" name="minute2" min="0" max="59" step="1" required>
		-->
	</fieldset>

<?php
	parent::FinFormulaire();
}

public function TraiterFormulaireMAJ($Tpost) {
	$usine = new Usine;
	$usine->Hydrater(array('IDjoueur'=>$_SESSION['IDjoueur'], 'ID'=>$Tpost['ID'], 'code'=>''));
	$listeDchamps	= "	niveau = :niveau,
						prod_en_cours = :prod,
						date_fin_production = UNIX_TIMESTAMP() + 1 + 60*:minute + 3600*:heure + 86400*:jour,
						prod_souhaitee = :Qte";
	$T_paramètres = array(
		':IDjoueur'	=> $_SESSION['IDjoueur'],
		':ID'		=> $Tpost['ID'],
		':niveau'	=> $Tpost['niveau'],
		':prod'		=> $Tpost['production'],
		':jour'		=> $Tpost['jour'],
		':heure'	=> $Tpost['heure'],
		':minute'	=> ($Tpost['jour'] + $Tpost['heure'] + $Tpost['minute'] == 0) ? -1 : $Tpost['minute'], // si durée nulle on met l'heure de fin de production dans le passé
		':Qte'		=> $Tpost['prod_souhaitee']
	);
	$usine->MiseAjour($listeDchamps, $T_paramètres);
	header("Location: ".$usine->PageDeRetour());
}

}
