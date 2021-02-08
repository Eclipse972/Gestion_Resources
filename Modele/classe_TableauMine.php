<?php
class TableauMine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_mine';
	$this->nomClasseLigne = 'Mine';
	$this->scriptJS = 'mine';
	$this->T_paramètres = array('état', 'production', 'nombre');
}

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max')); }
}
