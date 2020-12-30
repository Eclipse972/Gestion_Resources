<?php
abstract class LigneTableau {
	protected $table;
	protected $nomChampID;	// nom du champ permettant d'identifier le type d'objet
	protected $IDjoueur;	// le joueur doit être connu lors de la construction
	protected $onglet;
	protected $ID;	// ligne courante
	protected $IDmin;
	protected $IDmax;
	protected $code; // HTML de la ligne

abstract public function AfficherRapport();

public function __construct() {}

public function Hydrater($Tparam) {
	$this->ID = $Tparam['ID'];
	$this->IDjoueur = $Tparam['IDjoueur'];
	$this->code = $Tparam['code'];
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > $this->IDmin) && ($valeur <= $this->IDmax));
}

protected function InterrogerBD($sql, $Tparametres) {
	return ExecuterRequete($sql, $Tparametres);
}

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

protected function Récupérer_variables_rapport($vueBD) { // retourne la listes des variables sous la forme d'un tableau associatif
	$T_variables = $this->InterrogerBD("SELECT * FROM {$vueBD}_rapport WHERE ID = :ID AND IDjoueur = :IDjoueur", array(':IDjoueur'=>$this->IDjoueur, ':ID'=>$this->ID));
	return $T_variables;
}

protected function Obtenir($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, false); }

protected function UtilePour($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, true); }

protected function BesoinOuUtile($marchandise_ID, $Butile) {
	if ($Butile) {
		$vue = 'Vue_marchandiseUtilePour';
		$titre = "Utile pour";
	}
	else {
		$vue = 'Vue_marchandiseObtenir';
		$titre = "Obtenir gr&acirc;ce &agrave;";
	}
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

public function PageDeRetour($ID) {
	$retour = "/{$this->onglet}.php";
	if ($this->IDvalide($_SESSION['ID'])) $retour = $retour."?id={$_SESSION['ID']}"; // affiche le rapport si il y a lieu'
	if ($this->IDvalide($ID)) $retour = $retour."#{$ID}";	// met le focus sur l'élément dont on vient de changer les paramètres
	return $retour;
}

}
