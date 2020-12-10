<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}
}
