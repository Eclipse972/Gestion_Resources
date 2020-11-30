<?php
require'Modele/classe_Tableau.php'; 

class TUsine extends Tableau {

public function Afficher_tete() { $this->Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_usine', $id_selectionné); }

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
	<p>besoins</p>
	<p>ordre am&eacute;lioration</p>
<?php
}
}
