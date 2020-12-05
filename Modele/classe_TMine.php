<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>	<form action="Controleur/MAJmine.php" method="post">
		<label for="prod_maxi">Production maximale :</label>
		<input type="number" id="prod_maxi" name="prod_maxi" value="<?=$Tvariables['prod_max']?>">
		
		<label for="etat">&Eacute;tat (en%) :</label>
		<input type="number" id="etat" name="etat" min=0 max=100 step="1" value="<?=$Tvariables['etat']?>">
		
		<label for="nb_mine">Nombre de mine :</label>
		<input type="number" id="nb_mine" name="nb_mine" min="0" value="<?=$Tvariables['nombre']?>">
		
		<input type="submit" value="MAJ">
	</form>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}
}
