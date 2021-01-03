<?php
class Usine extends LigneTableau {

public function __construct() {
	$this->table = 'usine';
	$this->nomChampID = 'type_usine_ID';
	$this->onglet = 'usines';
	$this->IDmin = 0;
	$this->IDmax = 22;
}

protected function ProductionActuelle() {
	$production = $this->InterrogerBD("SELECT prodEnCours, dureeProd FROM Vue_usine WHERE IDjoueur = :IDjoueur AND ID = :ID"
											, array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$T_ligneBD = $this->InterrogerBD("SELECT code FROM Vue_usine_production_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID"
										,array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	if ($production[0]['dureeProd'] == 0) $code = '';
	else {
		ob_start();
?>
		<h1>Production actuelle</h1>
		<p>La production de <?=$production[0]['prodEnCours']?> a n&eacute;cessit&eacute; :</p>
		<table id="production">
		<thead><tr><th>Marchandise</th><th>Quantit&eacute;</th></tr></thead>
		<tbody>
<?php	foreach($T_ligneBD as $ligne) echo $ligne['code'];	?>
		</tbody>
		</table>
<?php
		$code = ob_get_contents();
		ob_end_clean();
	}
	return $code;
}

protected function Tableau1($vueIngrédients, $vueCoutFixe) {
	$T_ligneBD = $this->InterrogerBD("SELECT code FROM {$vueIngrédients} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	// coût des marchandises
	$rechercheCout = $this->InterrogerBD("SELECT SUM(achat) AS somme FROM {$vueIngrédients} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutIngrédients = $rechercheCout[0]['somme'];
	$taux = 5; // taux en % des frais de transport à rechercher dans la BD
	// coût fixe
	$rechercheCoutFixe = $this->InterrogerBD("SELECT somme FROM {$vueCoutFixe} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutFixe = $rechercheCoutFixe[0]['somme'];
	ob_start();
?>
<table class="tableau1">
		<thead><tr><th>Marchandise</th><th>Quantit&eacute;</th><th>stock</th><th>manque</th><th>PU</th><th>achat</th></tr></thead>
		<tbody>
<?php	foreach($T_ligneBD as $ligne) echo $ligne['code'];	?>
			<tr><td colspan="5" style="text-align:right">Total =</td><td><?=number_format($coutIngrédients, 0, ',',' ')?></td></tr>
			<tr><td colspan="5" style="text-align:right"><?=$taux?>% de frais de transport =</td><td><?=number_format($coutIngrédients*$taux/100, 0, ',',' ')?></td></tr>
			<tr><td colspan="5" style="text-align:right">Frais divers =</td><td><?=number_format($coutFixe, 0, ',',' ')?></td></tr>
			<tr><td colspan="5" style="text-align:right">CO&Ucirc;T TOTAL =</td><td><?=number_format($coutIngrédients*(1+$taux/100) + $coutFixe, 0, ',',' ')?></td></tr>
		</tbody>
		</table>
<?php
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}

protected function ProchaineProduction() {
	$production = $this->InterrogerBD("SELECT * FROM Vue_usine_prochaineProduction WHERE IDjoueur = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	ob_start();
?>
		<h1>Prochaine production</h1>
		<p>Besoins pour la production de <?=$production[0]['prochaineProd']?> (dur&eacute;e <?=$production[0]['duréeProductinoSouhaitée']?>) :</p>
		<?=$this->Tableau1('Vue_usine_amelioration_ingredients', 'Vue_usine_amelioration_coutFixe');	?>
		<p>En construction: formulaire avec durée/Quantité + date de début + bouton de validation</p>
<?php
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}

protected function Amélioration() {
	ob_start();
?>
		<h1>Am&eacute;lioration d&apos;usine</h1>
		<?=$this->Tableau1('Vue_usine_amelioration_ingredients', 'Vue_usine_amelioration_coutFixe');	?>
		<p>En construction: ordre am&eacute;lioration et délai</p>
<?php
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}

protected function Autosuffisance() {
	ob_start();
?>
		<h1>Autosuffisance</h1>
		<p>Il peut &ecirc;tre judicieux de regarder la production de l&apos;usine couvre les besoin internes
		et si les besoins d&apos;approvisionnement de l&apos;usine sont couverts en interne.</p>
		<p>En construction: liste de liens vers les entrep&ocirc;ts (produit et ingr&eacute;dients de l&apos;usine)</p>
<?php
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}

public function AfficherRapport() {
	$ligne = $this->InterrogerBD("SELECT formule FROM Vue_recette WHERE ID = :ID", array(':ID'=>$this->ID));
	echo"\t\t<p>Formule : {$ligne[0]['formule']}</p>\n 	";
	echo $this->ProductionActuelle(),"\n";
	echo $this->ProchaineProduction(),"\n";
	echo $this->Amélioration(),"\n";
	echo $this->Autosuffisance();
}

}
