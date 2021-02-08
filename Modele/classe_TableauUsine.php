<?php
class TableauUsine extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_usine';
	$this->nomClasseLigne = 'Usine';
	$this->T_paramètres = array('niveau', 'production', 'jour', 'heure', 'minute', 'prod_souhaitee');
}

public function Afficher_tete() { parent::Afficher_thead(array('Usine', 'Niveau', 'Production')); }
}
