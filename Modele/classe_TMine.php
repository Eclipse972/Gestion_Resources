<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables) {
?>	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>&eacute;tat</p>
	<p>production maxi</p>
	<p>nombre</p>

	<h1>Utile pour</h1>
	<p>liste</p>
<?php
}
}
