<?php
class Usine extends LigneTableau {

public function __construct() {
	$this->table = 'usine';
	$this->nomChampID = 'type_usine_ID';
	$this->onglet = 'usines';
	$this->IDmin = 0;
	$this->IDmax = 22;
}

public function AfficherRapport() {
?>
	<h1>Production</h1>
	<p>dur&eacute;e de production (jour - heures - minutes) ou quantité souhait&eacute;e</p>
	<p>Besoins pour la production souhait&eacute;e</p>

	<h1>Autosuffisance</h1>
	<p>Tendance</p>
	<p>la production suffit-elle pour les besoins internes</p>
	<p>les usines peuvent elles assurer les besoins pour produire</p>

	<h1>Am&eacute;lioration</h1>
	<table id="amelioration">
	<thead><tr><th>Marchandise</th><th>Quantit&eacute;</th><th>stock</th><th>manque</th><th>PU</th><th>achat</th></tr></thead>
	<tbody>
<?php
$T_ligneBD = $this->InterrogerBD("SELECT CONCAT(
			'\t\t<tr><td>',nom
			,'</td><td>',REPLACE(CAST(FORMAT(Qte ,0) AS CHAR),',',' ')
			,'</td><td>',REPLACE(CAST(FORMAT(stock ,0) AS CHAR),',',' ')
			,'</td><td>',REPLACE(CAST(FORMAT(manque ,0) AS CHAR),',',' ')
			,'</td><td>',REPLACE(CAST(FORMAT(PU ,0) AS CHAR),',',' ')
			,'</td><td>',REPLACE(CAST(FORMAT(achat ,0) AS CHAR),',',' ')
			,'</td></tr>\n') AS code
		FROM Vue_usine_amelioration_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	foreach($T_ligneBD as $ligne) echo $ligne['code'];
	// coût des marchandises
	$rechercheCout = $this->InterrogerBD("SELECT SUM(achat) AS somme FROM Vue_usine_amelioration_ingredients WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutIngrédients = $rechercheCout['somme'];
	$taux = 5; // taux en % des frais de transport à rechercher dans la BD
	// coût fixe
	$rechercheCoutFixe = $this->InterrogerBD("SELECT somme FROM Vue_usine_amelioration_coutFixe WHERE joueur_ID = :IDjoueur AND ID = :ID", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	$coutFixe = $rechercheCoutFixe[0]['somme'];
?>
		<tr><td colspan="5" style="text-align:right">Total =</td><td><?=number_format($coutIngrédients, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right"><?=$taux?>% de frais de transport =</td><td><?=number_format($coutIngrédients*$taux/100, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right">Frais divers =</td><td><?=number_format($coutFixe, 0, ',',' ')?></td></tr>
		<tr><td colspan="5" style="text-align:right">CO&Ucirc;T TOTAL =</td><td><?=number_format($coutIngrédients*(1+$taux/100) + $coutFixe, 0, ',',' ')?></td></tr>
	</tbody>
	</table>
	<p>ordre am&eacute;lioration et délai</p>
<?php
}

}
