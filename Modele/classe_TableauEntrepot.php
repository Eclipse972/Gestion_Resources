<?php
class TableauEntrepot extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_entrepot';
	$this->nomClasseLigne = 'Entrepot';
	$this->traitementFormulaire = 'entrepots';
	$this->T_paramètres = array('niveau', 'stock');
}

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock', 'Valeur')); }

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire(' de l&apos;entrp&ocirc;t');
?>
	<div id="champ1">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" min="0" step="1" required>
	</div>
	<div id="champ2">
		<label for="stock">Stock</label>
		<input type="number" id="stock" name="stock" min="0" step="1" required>
	</div>
<?php
	parent::FinFormulaire();
}

public function TraiterFormulaireMAJ($Tpost) {
	$entrepot = new Entrepot;
	$entrepot->Hydrater(array('IDjoueur'=>$_SESSION['IDjoueur'], 'ID'=>$Tpost['ID'], 'code'=>''));
	$listeDchamps	= "	niveau = :niveau,
						stock = :stock";
	$T_paramètres = array(
		':IDjoueur'	=> $_SESSION['IDjoueur'],
		':ID'		=> $Tpost['ID'],
		':niveau'	=> $Tpost['niveau'],
		':stock'	=> $Tpost['stock']);

	$entrepot->MiseAjour($listeDchamps, $T_paramètres);

	header("Location: ".$entrepot->PageDeRetour());
}

}
