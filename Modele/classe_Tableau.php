<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;
	protected $vueBD;
	protected $nomClasseLigne;
	protected $T_paramètres; // liste des paramètres supplémentaires du script OuvrirFormulaireMAJ

protected function Afficher_thead($T_en_tete) {
	$this->nb_col_tableau = count($T_en_tete);
?>
	<table>
	<thead><tr>
<?php	foreach($T_en_tete as $valeur) echo "\t\t\t<th>$valeur</th>\n";?>
	</tr></thead>
<?php
}

public function Afficher_corps() {
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
			echo "<a href=\"?onglet={$_SESSION['onglet']}",(isset($_SESSION['ligne'])) ? "&ligne={$_SESSION['ligne']}#{$_SESSION['ligne']}" : "#{$_SESSION['id']}";
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
