<?php
class TableauEntrepot extends Tableau {

public function __construct() {
	$this->vueBD = 'Vue_entrepot';
	$this->nomClasseLigne = 'Entrepot';
	$this->T_paramètres = array('niveau', 'stock');
}

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock', 'Valeur')); }

}
