<?php
abstract class LigneTableau {
	protected $ID;	// ligne courante
	protected $IDmin;
	protected $IDmax;
	protected $code; // HTML de la ligne
	protected $fraisTransport;
	// tableau associatif contenant les données pour contruire et traiter les formullaires
	protected $T_formulaireMAJ;	// classe, texte (à afficher), valeur( par défaut) , champBD champ à MAJ
	protected $tableUPDATE;		// table MAJ
	protected $champWHERE;		// champ de la clause where de la requête UPDATE

abstract public function AfficherRapport($nbColonne);

public function __construct() {
	$this->fraisTransport = 5;	// il faudra rechercher le taux suivant le joueur
}

public function Hydrater($Tparam) { // récupère les paramètres communs à toutes les classes filles
	$this->ID = $Tparam['ID'];
	$this->code = $Tparam['code'];
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > $this->IDmin) && ($valeur <= $this->IDmax));
}

protected function InterrogerBD($sql, $Tparametres) { return ExecuterRequete($sql, $Tparametres); }

protected function DébutRapport($nbColonne) {
?>
	<tr>
		<td colspan="<?=$nbColonne?>" id="rapport">
		<!-- Début du rapport -->
<?php
}

protected function FinRapport() {
?>
		<!-- Fin du rapport -->
		</td>
	</tr>
<?php
}

public function Afficher() {
?>
	<tr id="<?=$this->ID?>">
		<?=$this->code?>
	</tr>
<?php
}

public function AfficherFormulaireMAJ() {
	if (isset($this->T_formulaireMAJ['texte'][$_SESSION['champ']])) {
		$texte = $this->T_formulaireMAJ['texte'][$_SESSION['champ']];
		$valeur= $this->T_formulaireMAJ['valeur'][$_SESSION['champ']];
		$classe= $this->T_formulaireMAJ['classe'][$_SESSION['champ']];
		$O_champ = new $classe($texte, $valeur);
		$O_champ->Afficher();
	} else header('location:/?erreur=404');
}

protected function MAJ_BD($vueBD, $nomClasseLigne) {
	if (isset($Tableau[$_SESSION['champ']])) {
		$champ = $Tableau[$_SESSION['champ']];
		ExecuterRequete("UPDATE {$tableBD} SET {$champ} = :valeur + {$décalage} WHERE Joueur_ID = :IDjoueur AND {$champWhere} = :ID",
							array(':valeur'=>intval($_POST['champ']), ':IDjoueur'=>$_SESSION['IDjoueur'],':ID'=>$_SESSION['id']), 'traitement formulaire mine');
	} else header('location:/?erreur=404');
}

protected function Obtenir($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, false); }

protected function UtilePour($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, true); }

protected function BesoinOuUtile($marchandise_ID, $Butile) {
	$vue	= ($Butile) ? 'Vue_marchandiseUtilePour': 'Vue_marchandiseObtenir';
	$titre	= ($Butile) ? 'Utile pour'				: 'Obtenir gr&acirc;ce &agrave;';
	$T_reponseBD = $this->InterrogerBD("SELECT nom FROM {$vue} WHERE marchandise_ID = :ID", array(':ID'=>$marchandise_ID));
	echo "\t<p>{$titre} ";
	if (count($T_reponseBD)>1) { // plusieurs lignes
		echo":</p>\n\t<ul>\n";
		foreach($T_reponseBD as $ligneBD) echo "\t\t<li>{$ligneBD['nom']}</li>\n";
		echo"\t</ul>";
	}
	else echo (count($T_reponseBD)==1 ? $T_reponseBD[0]['nom'] : "rien"),"</p>";
	echo "\n";
}

}
