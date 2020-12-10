<?php
require'Modele/classe_Tableau.php'; // classe mère

class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_entrepot', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>
	<h1>Les besoins</h1>
	<p><?=$Tvariables['besoin']?></p>

	<h1>Am&eacute;lioration</h1>
	<p><?=$Tvariables['amelioration']?></p>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
	echo $this->AbesoinsDe($Tvariables['marchandise_ID']);
}
}
