<?php
require'Modele/classe_Tableau.php'; // chargement de la classe mère

class TableauCommerce extends Tableau {
private $date_MAJ;

public function __construct() {
	$this->date_MAJ = 'ind&eacute;termin&eacute;e'; // il va falloir trouver cette date lors de la MAJ des prix des marchandises
	$this->vueBD = 'Vue_commerce';
	$this->nomClasseLigne = 'Commerce';
}

public function CréerFormulaireMAJ() {}

public function Afficher_tete() {
?>
	<p align="right">Derni&egrave;re mise à jour le: <?=$this->date_MAJ?></p>
<?php
	parent::Afficher_thead(array('Marchandise', 'cours Ki-market',	'cours max'));
}

}
