<?php
require'Modele/classe_Tableau.php'; // chargement de la classe mère

class TableauMine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_mine';
	$this->nomClasseLigne = 'Mine';
	$this->traitementFormulaire = 'mines';
	$this->scriptJS = 'mine';
}

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max')); }

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire(' de la mine');
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

public function TraiterFormulaireMAJ($Tpost) {
	$ID			= $Tpost['ID'];
	$état		= $Tpost['état'];
	$production = $Tpost['production'];
	$nombre		= $Tpost['nombre'];
	$mine = new Mine($_SESSION['IDjoueur'], $ID);

	$listeDchamps	= "	etat = :etat,
						prod_max = :prod,
						nombre = :nombre";
	$T_paramètres = array(
		':IDjoueur'	=> $_SESSION['IDjoueur'],
		':ID'		=> $ID,
		':etat'		=> $état,
		':prod'		=> $production,
		':nombre'	=> $nombre);
	$mine->MiseAjour($listeDchamps, $T_paramètres);

	header("Location: ".$mine->PageDeRetour($ID));
}

}
