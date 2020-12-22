<?php
require'Modele/classe_Tableau.php';

class TUsine extends Tableau {

public function InsérerScript() { echo parent::InsérerJS('usine'); }

public function CréerFormulaireMAJ() {
	parent::DébutFormulaire('MAJUsine', ' de l&apos;usine');
?>
	<div id="champ1">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" min="1" step="1" required>
	</div>
	<div id="champ2">
		<label for="production">Production totale</label>
		<input type="number" id="production" name="production" min="1" step="1" required>
	</div>
	<fieldset>
		<legend>Dur&eacute;e de production restante</legend>
		<label for="jour">jour :</label>
		<input type="number" id="jour" name="jour" min="0" step="1" required>
		<label for="heure">heure :</label>
		<input type="number" id="heure" name="heure" min="0" max="23" step="1" required>
		<label for="minute">minute :</label>
		<input type="number" id="minute" name="minute" min="0" max="59" step="1" required>
	</fieldset>
<?php
	parent::FinFormulaire();
}

public function Afficher_tete() { $this->Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_usine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
?>
	<h1>Production</h1>
	<p>dur&eacute;e de production restante: jour - heures - minutes<br>recharger la page devra mettre &agrave; jour cette info</p>
	<p>dur&eacute;e de production (jour - heures - minutes) ou quantité souhait&eacute;e</p>
	<p>Besoins pour la production souhait&eacute;e</p>

	<h1>Autosuffisance</h1>
	<p>Tendance</p>
	<p>la production suffit-elle pour les besoins internes</p>
	<p>les usines peuvent elles assurer les besoins pour produire</p>

	<h1>Am&eacute;lioration</h1>
	<table id="amelioration">
	<thead>
		<tr><th>Marchandise</th><th>Quantit&eacute;</th><th>stock</th><th>manque</th><th>PU</th><th>achat</th>		</tr>
	</thead>
	<tbody>
<?php
	$T_ligneBD = $this->InterrogerBD("
		SELECT CONCAT('\t\t<tr><td>',nom
				,'</td><td>',REPLACE(CAST(FORMAT(Qte ,0) AS CHAR),',',' ')
				,'</td><td>',REPLACE(CAST(FORMAT(stock ,0) AS CHAR),',',' ')
				,'</td><td>',REPLACE(CAST(FORMAT(manque ,0) AS CHAR),',',' ')
				,'</td><td>',REPLACE(CAST(FORMAT(PU ,0) AS CHAR),',',' ')
				,'</td><td>',REPLACE(CAST(FORMAT(achat ,0) AS CHAR),',',' ')
				,'</td></tr>\n') AS code
		FROM Vue_usine_amelioration_ingredients
		WHERE joueur_ID = :IDjoueur AND ID = :ID"
		,array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID']));
	foreach($T_ligneBD as $ligne) echo $ligne['code'];
	// coût des marchandises
	$rechercheCout = $this->InterrogerBD("
		SELECT SUM(achat) AS somme
		FROM Vue_usine_amelioration_ingredients
		WHERE joueur_ID = :IDjoueur AND ID = :ID"
		,array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID']));
	$coutIngrédients = $rechercheCout[0]['somme'];
	$taux = 5; // taux en % des frais de transport à rechercher dans la BD
	// coût fixe
	$rechercheCoutFixe = $this->InterrogerBD("
		SELECT somme
		FROM Vue_usine_amelioration_coutFixe
		WHERE joueur_ID = :IDjoueur AND ID = :ID"
		,array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$_SESSION['ID']));
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
