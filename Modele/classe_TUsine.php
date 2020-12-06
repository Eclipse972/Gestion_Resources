<?php
require'Modele/classe_Tableau.php'; 

class TUsine extends Tableau {

public function Afficher_tete() { $this->Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_tbody('Vue_usine', $id_selectionné); }

protected function Afficher_rapport($Tvariables, $id_selectionné) {
	// durée de fin de production est un timestamp donc exprimé en secondes
	$durée = max(0, $Tvariables['date_fin_production'] -  time()); // donne 0 si la date est dépasssée
	// /!\ champ duree_prod_souhaiteee exprimée en minutes 

?>	<form action="Controleur/MAJusine.php" method="post">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" value="<?=$Tvariables['niveau']?>" style="width:50px; margin-right:50px">
		
		<fieldset>
			<legend>Dur&eacute;e de production restante :</legend>

			<label for="jour">jour :</label>
			<input type="number" id="jour" name="jour" value="<?=(int)($durée/86400)?>" min="0" style="width:45px; margin-right:9px">

			<label for="heure">heure :</label>
			<input type="number" id="heure" name="heure" value="<?=(int)($durée/3600) % 24?>" min="" max="23" style="width:35px; margin-right:9px">

			<label for="minute">minute :</label>
			<input type="number" id="minute" name="minute" value="<?=(int)($durée/60) % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>

		<fieldset>
			<legend>Dur&eacute;e de production souhait&eacute;e :</legend>

			<label for="jour2">jour :</label>
			<input type="number" id="jour2" name="jour2" value="<?=(int)($Tvariables['duree_prod_souhaitee']/1440)?>" min="0" max="7" style="width:25px; margin-right:9px">

			<label for="heure2">heure :</label>
			<input type="number" id="heure2" name="heure2" value="<?=(int)($Tvariables['duree_prod_souhaitee']/60) % 24?>" min="0" max="23" style="width:35px; margin-right:9px">

			<label for="minute2">minute :</label>
			<input type="number" id="minute2" name="minute2" value="<?=$Tvariables['duree_prod_souhaitee'] % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>

		<input type="submit" value="MAJ" style="margin-top:9px">
	</form>

	<h1>Production</h1>
	<p>dur&eacute;e de production restante: jour - heures - minutes<br>recharger la page devra mettre &agrave; jour cette info</p>
	<p>dur&eacute;e de production (jour - heures - minutes) ou quantité souhait&eacute;e</p>
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
