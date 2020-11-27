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

protected function Remplacement_variables($id) {
	return parent::Mise_en_forme([]); // pas de données de joueur pour les marchandises
}

protected function Afficher_rapport($id) {
	$BD = new base2donnees;
?>
	<h1>Liste des besoins</h1>
	<p>liste</p>
	<h1>Achats à pr&eacute;voir</h1>
	<p>Pour ne pas &ecirc;tre en rupture de stock<br>liste</p>
	<h1>Ventes &agrave; pr&eacute;voir</h1>
	<p>pour ne pas d&eacute;border<br>liste</p>
	<h1>Utile pour</h1>
	<?=$BD->MarchandiseUtilePour($id)?>
	<h1>N&eacute;cessite</h1>
	<?=$BD->MarchandiseAbesoin($id)?>
<?php
}
}
