<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;
	protected $vueBD;
	protected $nomClasseLigne;

// pour les développements futurs
abstract public function CréerFormulaireMAJ();
abstract public function TraiterFormulaireMAJ();

// Affichage de la page
protected function DébutFormulaire($action, $titre, $script) {
?>
	<script>function FermerFormulaireMAJ() { document.getElementById("conteneur_formulaire").style.visibility = "hidden"; }</script>
	<script src="Controleur/<?=$script?>.js"></script>

	<div id="conteneur_formulaire">
	<form action="Controleur/<?=$action?>.php" name="formulaireMAJ" method="post">
	<span class="bouton-fermeture"><a href='#' onclick='FermerFormulaireMAJ()'>X</a></span>
	<span class="gauche"><img name="image"></span>
	<h1>Mise &agrave; jour<?=$titre?></h1>
	<input type="hidden" id="ID" name="ID">
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

public function Afficher_corps($id_selectionné) {
	$IDjoueur = $_SESSION['IDjoueur'];
	$Tvue = ExecuterRequete("SELECT ID, IDjoueur, code FROM {$this->vueBD} WHERE IDjoueur = :ID", array(':ID' => $IDjoueur), 'construction du tableau d\'objets');
	$ligne = new $this->nomClasseLigne();
?>
	<tbody>
<?php
	foreach($Tvue as $réponseBD) {
		$ligne->Hydrater($réponseBD);
		echo $ligne->Afficher();
		if ($réponseBD['ID'] == $id_selectionné) {
			echo"\t<tr>\n\t\t<td colspan=\"{$this->nb_col_tableau}\" id=\"rapport\">\n<!-- Début du rapport -->\n";
			$ligne->AfficherRapport();
			echo"\t\t</td>\n\t</tr>\n<!-- Fin du rapport -->\n";
		}
	}
?>
	</tbody>
	</table>
<?php
}
}
