<?php
require'Modele/classe_Tableau.php'; // classe mère

class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_entrepot', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>	<form action="Controleur/MAJentrepot.php" method="post">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" value="<?=$Tvariables['niveau']?>" style="width:50px; margin-right:50px">

		<label for="stock">Stock :</label>
		<input type="number" id="stock" name="stock" min="0" value="<?=$Tvariables['stock']?>" style="width: 185px">
		
		<input type="submit" value="MAJ" style="margin-left:90px">
	</form>

	<h1>Les besoins</h1>
	<p><?=$Tvariables['besoin']?></p>

	<h1>Am&eacute;lioration</h1>
	<p><?=$Tvariables['amelioration']?></p>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
	echo $this->AbesoinsDe($Tvariables['marchandise_ID']);
}
}
