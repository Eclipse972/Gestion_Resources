<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;
	protected $vueBD;
	protected $nomClasseLigne;
	protected $traitementFormulaire;
	protected $T_paramètres; // liste des paramètres supplémentaires du script OuvrirFormulaireMAJ

// pour les développements futurs
abstract public function CréerFormulaireMAJ();
abstract public function TraiterFormulaireMAJ($Tpost);

// Affichage de la page
protected function DébutFormulaire($titre) {
?>
	<script>
	function FermerFormulaireMAJ() { document.getElementById("conteneur_formulaire").style.visibility = "hidden"; }

	function OuvrirFormulaireMAJ(ID, IDimage, alt<?php foreach($this->T_paramètres as $champ)	echo", {$champ}"; ?>)	{
		// modification du formulaire
		document.formulaireMAJ.ID.value	= ID;
		document.formulaireMAJ.image.src= "https://www.resources-game.ch/images/appimages/res" + IDimage + ".png";
		document.formulaireMAJ.image.alt= alt;
<?php	foreach($this->T_paramètres as $champ)	echo"\t\tdocument.formulaireMAJ.{$champ}.value = {$champ};\n"; ?>
		document.getElementById("conteneur_formulaire").style.visibility = "visible";
	}
	</script>

	<div id="conteneur_formulaire">
	<form action="<?='/'.$this->traitementFormulaire?>" name="formulaireMAJ" method="post">
	<span class="bouton-fermeture"><a href='#' onclick='FermerFormulaireMAJ()'>X</a></span>
	<span class="gauche"><img name="image"></span>
	<h1>Mise &agrave; jour<?=$titre?></h1>
	<input type="hidden" id="ID" name="ID">
<?php
}

protected function ChampDuree($version = '', $tab="\t\t") {
	$jour	= "jour{$version}";
	$heure	= "heure{$version}";
	$minute = "minute{$version}";
?>
<?=$tab?><label for="<?=$jour?>">jour :</label>		<input type="number" id="<?=$jour?>"	name="<?=$jour?>"	min="0" step="1" required>
<?=$tab?><label for="<?=$heure?>">heure :</label>	<input type="number" id="<?=$heure?>"	name="<?=$heure?>"	min="0" max="23" step="1" required>
<?=$tab?><label for="<?=$minute?>">minute :</label>	<input type="number" id="<?=$minute?>"	name="<?=$minute?>" min="0" max="59" step="1" required>
<?php
}

protected function FinFormulaire() {
?>
	<input type="submit" value="Valider" style="margin-top:9px">
	</form>
	</div>
<?php
}

protected function Afficher_thead($T_en_tete) {
	$this->nb_col_tableau = count($T_en_tete);
?>
	<table>
	<thead><tr>
<?php	foreach($T_en_tete as $valeur) echo "\t\t\t<th>$valeur</th>\n";?>
	</tr></thead>
<?php
}

public function Afficher_corps($IDdétaillé, $ID_MAJ) {
	$IDjoueur = $_SESSION['IDjoueur'];
	$Tvue = ExecuterRequete("SELECT ID, IDjoueur, code FROM {$this->vueBD} WHERE IDjoueur = :ID", array(':ID' => $IDjoueur), 'construction du tableau d\'objets');
	$ligne = new $this->nomClasseLigne;
?>
	<tbody>
<?php
	foreach($Tvue as $réponseBD) {
		$ligne->Hydrater($réponseBD);
		echo $ligne->Afficher();
		// affichage du formulaire
		if ($réponseBD['ID'] == $_SESSION['id']) {
			echo"\t<tr>\n\t\t<td colspan=\"{$this->nb_col_tableau}\" id=\"formulaireMAJ\">\n";
			echo"\t\t<p>Formulaire</p>\n";
			echo"\t\tchamp N° {$_SESSION['champ']}: ";
			echo "<a href=\"?onglet={$_SESSION['onglet']}",(isset($_SESSION['ligne'])) ? "&ligne={$_SESSION['ligne']}" : "";
			echo"\">Valider</a>\n";
			echo"\t\t</td>\n\t</tr>\n";
		}
		// affichage du rapport
		if ($réponseBD['ID'] == $_SESSION['ligne']) {
			echo"\t<tr>\n\t\t<td colspan=\"{$this->nb_col_tableau}\" id=\"rapport\">\n<!-- Début du rapport -->\n";
			$ligne->AfficherRapport();
			echo"<!-- Fin du rapport -->\n\t\t</td>\n\t</tr>\n";
		}
	}
?>
	</tbody>
	</table>
<?php
}
}
