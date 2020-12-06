<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>	<form action="Controleur/MAJmine.php" method="post">
		<label for="prod_max">Production maximale :</label>
		<input type="number" id="prod_max" name="prod_max" value="<?=$Tvariables['prod_max']?>" style="width:150px">
		
		<label for="etat"  style="margin-left:90px">&Eacute;tat (en%) :</label>
		<input type="number" id="etat" name="etat" min=0 max=100 step="1" value="<?=$Tvariables['etat']?>" style="width:45px">
		<br>
		<label for="nb_mine">Nombre de mine :</label>
		<input type="number" id="nb_mine" name="nb_mine" min="0" value="<?=$Tvariables['nombre']?>" style="width: 185px; margin-top:9px">
		
		<input type="submit" value="MAJ" style="margin-left:90px">
	</form>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}
}
