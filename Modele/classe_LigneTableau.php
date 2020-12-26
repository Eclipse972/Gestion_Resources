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

abstract public function HydraterRapport($T_paramètres);
abstract public function AfficherRapport();

public function __construct() {}

public function Hydrater($Tparam) {
	$this->ID = $Tparam['ID'];
	$this->IDjoueur = $Tparam['IDjoueur'];
	$this->code = $Tparam['code'];
}

public function FormaterParamètres($T_post) {
	$Trésultat = [];
	foreach($T_post as $clé => $valeur) $Trésultat[$clé] = (int)htmlspecialchars(stripslashes(trim($valeur)));
	return $Trésultat;
}

public function IDvalide($valeur) {
	$valeur = (int)$valeur;
	return (($valeur > $this->IDmin) && ($valeur <= $this->IDmax));
}

protected function ExecuteRequete($sql, $T_paramètres) {
	try	{
		$fichier = (file_exists('connexion.php')) ? 'connexion.php' : '../connexion.php';
		include $fichier;
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare($sql);
		foreach($T_paramètres as $clé => $valeur) { $requete->bindValue($clé, $valeur, PDO::PARAM_INT); }
		$requete->execute();
		if (substr($sql, 0, 6) == 'SELECT') $TreponseBD = $requete->fetchall(PDO::FETCH_ASSOC);
		else $TreponseBD = null;
	}
	catch (PDOException $e) { exit('Erreur ex&eacute;cution de requ&ecirc;te pour la ligne: '.$e->getMessage()); }
	$BD = null;
	return $TreponseBD;
}

protected function InterrogerBD($sql, $Tparametres) {
	$TreponseBD = $this->ExecuteRequete($sql, $Tparametres);
	return (count($TreponseBD) > 1) ? $TreponseBD : $TreponseBD[0];
}

public function MiseAjour($listeDchamps, $T_paramètres) { // les paramètres sont des chaines transmises par javascript
	$this->ExecuteRequete("UPDATE {$this->table} SET {$listeDchamps} WHERE {$this->table}.joueur_ID = :IDjoueur AND {$this->table}.{$this->nomChampID} = :ID", $T_paramètres);
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
	if (count($T_reponseBD)>1) { // plusieurs lignes
		echo"\t<a class=\"infobulle\">{$titre} ...<span>";
		echo"<ul>\n";
		foreach($T_reponseBD as $ligneBD) echo "\t\t<li>{$ligneBD['nom']}</li>\n";
		echo"\t</ul></span></a>";
	}
	else echo "<p>{$titre} ",(count($T_reponseBD)==1 ? $T_reponseBD['nom'] : "rien"),"</p>";
	echo "\n";
}

public function PageDeRetour($ID) {
	$retour = "/{$this->onglet}.php";
	if ($this->IDvalide($_SESSION['ID'])) $retour = $retour."?id={$_SESSION['ID']}"; // affiche le rapport si il y a lieu'
	if ($this->IDvalide($ID)) $retour = $retour."#{$ID}";	// met le focus sur l'élément dont on vient de changer les paramètres
	return $retour;
}

}
