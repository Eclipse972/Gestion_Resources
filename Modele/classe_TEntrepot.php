<?php
require'Modele/classe_Tableau.php'; // classe mère

class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_entrepot', $id_selectionné); }

protected function Afficher_rapport($Tvariables) {
?>	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>niveau = <?=$Tvariables['niveau']?></p>
	<p>stock = <?=$Tvariables['stock']?></p>

	<h1>Les besoins</h1>
	<p><?=$Tvariables['besoin']?></p>

	<h1>Am&eacute;lioration</h1>
	<p><?=$Tvariables['amelioration']?></p>

	<h1>Utile pour</h1>
<?php
	echo isset($Tvariables['utile']) ? "\t<ul>\n".$Tvariables['utile']."\t</ul>\n" : '<p>Gagner de l&apos;argent!</p>';

	echo isset($Tvariables['necessite']) ? "<h1>N&eacute;cessite</h1>\n\t<ul>\n".$Tvariables['necessite']."\t</ul>\n" : '';
}
}
