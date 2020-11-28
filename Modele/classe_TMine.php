<?php
require'Modele/classe_Tableau.php'; // classe mère

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Remplacement_variables($id) {
	global $BDD;
	$TVariables['production'] = $BDD->Production_mine($id); // recherche données du joueur dans la base
	$TVariables['état'] = $BDD->Etat_mine($id);
	$TVariables['nombre'] = $BDD->Nombre_mine($id);
	return parent::Mise_en_forme($TVariables);
}

protected function Afficher_rapport($id) {
	global $BDD;
?>
	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>&eacute;tat</p>
	<p>production maxi</p>
	<p>nombre</p>
	<h1>Utile pour</h1>
	<?=$BDD->MineUtilePour($id)?>
<?php
}
}
