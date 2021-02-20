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
	protected $T_paramètres;	// tableau contenant les noms de paramètres modifiables par formulaire

abstract public function AfficherRapport();

public function __construct() {
	$this->fraisTransport = 5;	// il faudra rechercher le taux suivant le joueur
}

public function Hydrater($Tparam) {
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

public function Afficher() {
?>
	<tr id="<?=$this->ID?>">
		<?=$this->code?>
	</tr>
<?php
}

public function AfficherFormulaireMAJ() {
?>
	<tr>
		<td colspan="2" id="formulaireMAJ">
		<form method="post" action="<?=$this->PageDeRetour()?>">
<?php		// recherche du nom
			$nom = 'nombre';
			// recherche de la valeur par défaut
			$valeur = 12;
			// recherche du type de champ
			$type = 'ChampEntier';
			$O_champ = new $type($nom, $valeur);
			$O_champ->Afficher();
?>			<br>
			<button type="submit">Valider</button>
			<button type="reset">Annuler</button>
		</form>
		</td>
	</tr>
<?php
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

public function PageDeRetour() { return "?onglet={$_SESSION['onglet']}".((isset($_SESSION['ligne'])) ? "&ligne={$_SESSION['ligne']}#{$_SESSION['ligne']}" : "#{$_SESSION['id']}"); }
}
