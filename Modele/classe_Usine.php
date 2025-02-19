<?php
class Usine extends LigneTableau {

public function __construct() {
	$this->T_formulaireMAJ['classe']	= array('MAJEntier','MAJEntier',			'MAJDurée',				'MAJEntier');
	$this->T_formulaireMAJ['texte']		= array('Niveau',	'Production en cours',	'Temps de production',	'Production souhait&eacute;e');
	$this->T_formulaireMAJ['champBD']	= array('niveau',	'prod_en_cours',		'date_fin_production',	'prod_souhaitee');
	$this->tableUPDATE ='usine';
	$this->champWHERE = 'type_usine_ID';
	parent::__construct();
}

public function Hydrater($Tparam) {
	parent::Hydrater($Tparam);
	// valeurs par défaut pour les champs de formulaire
	$this->T_formulaireMAJ['valeur'] = array($Tparam['niveau'], $Tparam['prod_en_cours'], $Tparam['dureeProd'], $Tparam['prod_souhaitee']);
}

public function MAJ_BD() {
	if ($_SESSION['champ'] == 2) $_POST['champ'] = intval($_POST['jour'])*86400 + intval($_POST['heure'])*3600 + intval($_POST['minute'])*60;
	parent::MAJ_BD(($_SESSION['champ'] == 2) ? 'UNIX_TIMESTAMP()' : '0');
}

protected function ProductionActuelle() {
	$production = $this->InterrogerBD("SELECT prodEnCours, dureeProd FROM Vue_usine WHERE IDjoueur = :IDjoueur AND ID = :ID"
											, array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
	$T_ligneBD = $this->InterrogerBD("SELECT code FROM Vue_usine_production_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID"
										,array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
	if ($production[0]['dureeProd'] > 0) {
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
	}
}

protected function Tableau1($vueIngrédients, $vueCoutFixe) {
	$T_ligneBD = $this->InterrogerBD("SELECT code FROM {$vueIngrédients} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
	// coût des marchandises
	$rechercheCout = $this->InterrogerBD("SELECT SUM(achat) AS somme FROM {$vueIngrédients} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
	$coutIngrédients = $rechercheCout[0]['somme'];
	$taux = $this->fraisTransport; // taux en % des frais de transport à rechercher dans la BD
	// coût fixe
	$rechercheCoutFixe = $this->InterrogerBD("SELECT somme FROM {$vueCoutFixe} WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
	$coutFixe = $rechercheCoutFixe[0]['somme'];
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
}

protected function ProchaineProduction() {
	$production = $this->InterrogerBD("SELECT * FROM Vue_usine_prochaineProduction WHERE IDjoueur = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$this->ID));
?>
		<h1>Prochaine production</h1>
		<p>Besoins pour la production de <?=$production[0]['prochaineProd']?> :</p>
		<?=$this->Tableau1('Vue_usine_prochaineProduction_ingredients', 'Vue_usine_prochaineProduction_coutFixe');	?>
		<p>En construction: date de début souhait&eacute;e</p>
<?php
}

protected function Amélioration() {
?>
		<h1>Am&eacute;lioration d&apos;usine</h1>
		<?=$this->Tableau1('Vue_usine_amelioration_ingredients', 'Vue_usine_amelioration_coutFixe');	?>
		<p>En construction: ordre am&eacute;lioration et délai</p>
<?php
}

protected function Autosuffisance() {
?>
		<h1>Autosuffisance</h1>
		<p>Il peut &ecirc;tre judicieux de regarder la production de l&apos;usine couvre les besoin internes
		et si les besoins d&apos;approvisionnement de l&apos;usine sont couverts en interne.</p>
		<p>En construction: liste de liens vers les entrep&ocirc;ts (produit et ingr&eacute;dients de l&apos;usine)</p>
<?php
}

public function AfficherRapport($nbColonne) {
	$this->DébutRapport($nbColonne);
	$ligne = $this->InterrogerBD("SELECT formule FROM Vue_recette WHERE ID = :ID", array(':ID'=>$this->ID));
	echo"\t\t<p>Formule : {$ligne[0]['formule']}</p>\n 	";
	$this->ProductionActuelle();
	$this->ProchaineProduction();
	$this->Amélioration();
	$this->Autosuffisance();
	$this->FinRapport();
}

}
