<?php
require'Modele/classe_Tableau.php'; // classe mère

class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_entrepot', $id_selectionné); }

protected function Afficher_rapport($id) {
	global $BDD;
?>
	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>niveau</p>
	<p>stock</p>
	<h1>Les besoins</h1>
	<p>listes des consomations ordonn&eacute;es par date croissante</p>
	<h1>Am&eacute;lioration</h1>
	<p>co&ucirc;t pour am&eacute;liorer d'un niveau</p>
	<h1>Utile pour</h1>
	<p>liste</p>
	<h1>N&eacute;cessite</h1>
	<p>liste</p>
<?php
}
}
