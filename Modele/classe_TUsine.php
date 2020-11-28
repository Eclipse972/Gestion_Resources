<?php
require'Modele/classe_Tableau.php'; // classe mère

class TUsine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_usine', $id_selectionné); }

protected function Remplacement_variables($id) {
	global $BDD;
	$TVariables['recette'] = $BDD->Récupère_recette_usine($id); // recherche données du joueur dans la base
	$TVariables['niveau'] = $BDD->Niveau_usine($id);
	$TVariables['production'] = $BDD->Production_usine($id);
	return parent::Mise_en_forme($TVariables);
}

protected function Afficher_rapport($id) {
?>
	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>niveau</p>
	<p>dur&eacute;e de production restante: jour - heures - minutes<br>recharger la page mettra &agrave; jour cette info</p>

	<h1>Production</h1>
	<p>dur&eacute;e de production souhait&eacute;e</p>
	<p>Besoins pour la production souhait&eacute;e</p>

	<h1>Autosuffisance</h1>
	<p>Tendance</p>
	<p>la production suffit-elle pour les besoins internes</p>
	<p>les usines peuvent elles assurer les besoins pour produire</p>

	<h1>Am&eacute;lioration</h1>
	<p>co&ucirc;t d&apos;am&eacute;lioration d'un niveau</p>
	<p>ordre am&eacute;lioration</p>
<?php
}
}
