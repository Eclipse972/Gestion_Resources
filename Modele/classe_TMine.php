<?php
require'Modele/classe_Tableau.php';

class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_mine', $id_selectionné); }

protected function Afficher_rapport($Tvariables) {
?>	<h1>Mise &agrave; jour des donn&eacute;es</h1>
	<p>&eacute;tat = <?=$Tvariables['etat']?></p>
	<p>prouction actuelle = <?=floor($Tvariables['prod_max']*$Tvariables['etat'])/100?></p>
	<p>production maxi = <?=$Tvariables['prod_max']?></p>
	<p>nombre = <?=$Tvariables['nombre']?></p>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}
}
