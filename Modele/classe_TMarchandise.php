<?php
require'Modele/classe_Tableau.php'; // classe mère

class TMarchandise extends Tableau {
private $date_MAJ;
public function __construct() {
	$this->date_MAJ = 'ind&eacute;termin&eacute;e'; // il va faloir trouver cette date lors de la MAJ des prix des marchandises
?><p align="right">Derni&egrave;re mise à jour le: <?=$this->date_MAJ?></p><?php
	parent::__construct();
}

public function Afficher_tete() { parent::Afficher_thead(array('Marchandise', 'cours Ki-market',	'cours max')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_marchandise', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>	<h1>Liste des besoins avec achats et ventes &agrave; pr&eacute;voir</h1>
	<p><?=$Tvariables['liste']?></p>
<?php
	echo $this->UtilePour($Tvariables['ID']);
	echo $this->AbesoinsDe($Tvariables['ID']);
}
}
