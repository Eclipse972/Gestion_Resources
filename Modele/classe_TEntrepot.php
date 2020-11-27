<?php
require'Modele/classe_Tableau.php'; // classe mère

class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_entrepot', $id_selectionné); }

protected function Remplacement_variables($id) {
	$BD = new base2donnees;
	$TVariables['niveau'] = $BD->Niveau_entrepot($id);
	$TVariables['stock'] = $BD->Stock($id);
	return parent::Mise_en_forme($TVariables);
}

protected function Afficher_rapport($id) {
	$BD = new base2donnees;
?>
	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>niveau</p>
	<p>stock</p>
	<h1>Les besoins</h1>
	<p>listes des consomations ordonn&eacute;es par date croissante</p>
	<h1>Am&eacute;lioration</h1>
	<p>co&ucirc;t pour am&eacute;liorer d'un niveau</p>
	<h1>Utile pour</h1>
	<?=$BD->MarchandiseUtilePour($id)?>
	<h1>A besoin de</h1>
	<?=$BD->MarchandiseAbesoin($id)?>
<?php
}
}
