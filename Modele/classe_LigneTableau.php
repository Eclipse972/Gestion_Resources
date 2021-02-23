<?php
abstract class LigneTableau {
	protected $table;
	protected $nomChampID;	// nom du champ permettant d'identifier le type d'objet
	protected $IDjoueur;	// le joueur doit être connu lors de la construction
	protected $ID;	// ligne courante
	protected $IDmin;
	protected $IDmax;
	protected $code; // HTML de la ligne
	protected $fraisTransport;

abstract public function AfficherRapport($nbColonne);
abstract public function AfficherFormulaireMAJ();
abstract public function TraiterFormulaireMAJ();

public function __construct() {
	$this->fraisTransport = 5;	// il faudra rechercher le taux suivant le joueur
}

public function Hydrater($Tparam) { // récupère les paramètres communs à toutes les classe filles
	$this->ID = $Tparam['ID'];
	$this->IDjoueur = $Tparam['IDjoueur'];
	$this->code = $Tparam['code'];
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > $this->IDmin) && ($valeur <= $this->IDmax));
}

protected function InterrogerBD($sql, $Tparametres) { return ExecuterRequete($sql, $Tparametres); }

public function MiseAjour($listeDchamps, $T_paramètres) { // les paramètres sont des chaines transmises par javascript
	ExecuterRequete("UPDATE {$this->table} SET {$listeDchamps} WHERE {$this->table}.joueur_ID = :IDjoueur AND {$this->table}.{$this->nomChampID} = :ID", $T_paramètres, 'mise à jour');
}

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
protected function AfficherFormulaire($T_classe, $T_texte, $T_valeur) {
	if (isset($T_texte[$_SESSION['champ']])) {
		$texte = $T_texte[$_SESSION['champ']];
		$valeur= $T_valeur[$_SESSION['champ']];
		$classe= $T_classe[$_SESSION['champ']];
		$O_champ = new $classe($texte, $valeur);
		$O_champ->Afficher();
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
