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

public function Hydrater($Tparamètes) {
	$this->ID = $Tparamètes['ID'];
	$this->IDjoueur = $Tparamètes['IDjoueur'];
	$this->code = $Tparamètes['code'];
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
		include '../connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare($sql);
		foreach($T_paramètres as $clé => $valeur) { $requete->bindValue($clé, $valeur, PDO::PARAM_INT); }
		$requete->execute();
	}
	catch (PDOException $e) { exit('Erreur ex&eacute;cution de requ&ecirc;te pour la ligne: '.$e->getMessage()); }
	return $requete;
}

protected function InterrogerBD($sql, $Tparametres) {
	try	{
		$requete = $this->ExecuteRequete($sql, $Tparametres);
		$TreponseBD = $requete->fetchall(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) { exit('Erreur int&eacute;rrogation BD: '.$e->getMessage()); }
	return (count($TreponseBD) > 1) ? $TreponseBD : $TreponseBD[0];
}

public function MiseAjour($listeDchamps, $T_paramètres) { // les paramètres sont des chaines transmises par javascript
	try	{
		$sql = "UPDATE {$this->table} SET {$listeDchamps} WHERE {$this->table}.joueur_ID = :IDjoueur AND {$this->table}.{$this->nomChampID} = :ID";
		$this->ExecuteRequete($sql, $T_paramètres);
	}
	catch (PDOException $e) { exit('Erreur MAJ ligne de tableau: '.$e->getMessage()); }
}

public function Afficher() {
?>
	<tr id="<?=$this->ID?>">
		<?=$this->code?>
	</tr>
<?php
}

protected function Récupérer_variables_rapport($vueBD, $IDjoueur, $id) { // retourne la listes des variables sous la forme d'un tableau associatif
	$T_variables = $this->InterrogerBD('SELECT * FROM '.$vueBD.'_rapport WHERE ID = :ID AND IDjoueur = :IDjoueur', array(':IDjoueur'=>$IDjoueur, ':ID'=>$id));
	return $T_variables;
}

protected function Obtenir($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, false); }

protected function UtilePour($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, true); }

protected function BesoinOuUtile($marchandise_ID, $Butile) {
	if ($Butile) {
		$vue = 'Vue_marchandiseUtilePour';
		$titre = "Utile pour";
	} else {
		$vue = 'Vue_marchandiseObtenir';
		$titre = "Obtenir gr&acirc;ce &agrave;";
	}
	$T_reponseBD = $this->InterrogerBD("SELECT nom FROM {$vue} WHERE marchandise_ID = :ID", array(':ID'=>$marchandise_ID));

	if (count($T_reponseBD)>1) { // plusieurs lignes
		echo"\t<a class=\"infobulle\">{$titre} ...<span>";
		echo"<ul>\n";
		foreach($T_reponseBD as $ligneBD) echo "\t\t<li>{$ligneBD['nom']}</li>\n";
		echo"\t</ul></span></a>";
	} else echo "<p>{$titre} ",(count($T_reponseBD)==1 ? $T_reponseBD[0]['nom'] : "rien"),"</p>";
	echo "\n";

}

public function PageDeRetour($ID) {
	$retour = "/{$this->onglet}.php";
	if ($this->IDvalide($_SESSION['ID'])) $retour = $retour."?id={$_SESSION['ID']}"; // affiche le rapport si il y a lieu'
	if ($this->IDvalide($ID)) $retour = $retour."#{$ID}";	// met le focus sur l'élément dont on vient de changer les paramètres
	return $retour;
}

}
/////////////////////////////////////////////////////////////////////
class Usine extends LigneTableau {

public function __construct() {
	$this->table = 'usine';
	$this->nomChampID = 'type_usine_ID';
	$this->onglet = 'usines';
	$this->IDmin = 0;
	$this->IDmax = 22;
}

public function HydraterRapport($T_paramètres) {
}

public function AfficherRapport() {
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
///////////////////////////////////////////////////////////////////////
class Mine extends LigneTableau {

public function __construct() {
	$this->table = 'mine';
	$this->nomChampID = 'type_mine_ID';
	$this->onglet = 'mines';
	$this->IDmin = 0;
	$this->IDmax = 14;
}

public function HydraterRapport($T_paramètres) {
}

public function AfficherRapport() {
?>
	<h1>En construction</h1>
	<h1>Divers</h1>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
}

}
///////////////////////////////////////////////////////////////////////
class Entrepot extends LigneTableau {

public function __construct() {
	$this->table = 'entrepot';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'entrepots';
	$this->IDmin = 3;
	$this->IDmax = 60;
}

public function HydraterRapport($T_paramètres) {
}

public function AfficherRapport() {
?>
	<h1>Les besoins</h1>
	<p><?=$Tvariables['besoin']?></p>

	<h1>Am&eacute;lioration</h1>
	<p><?=$Tvariables['amelioration']?></p>
	<h1>Divers</h1>
<?php
	echo $this->UtilePour($Tvariables['marchandise_ID']);
	echo $this->Obtenir($Tvariables['marchandise_ID']);
}

}
///////////////////////////////////////////////////////////////////////
class Commerce extends LigneTableau {

public function __construct() {
	$this->table = 'commerce';
	$this->nomChampID = 'marchandise_ID';
	$this->onglet = 'commerce';
	$this->IDmin = 3;
	$this->IDmax = 60;
}

public function HydraterRapport($T_paramètres) {
}

public function AfficherRapport() {
?>
	<h1>Liste des besoins avec achats et ventes &agrave; pr&eacute;voir</h1>
	<p></p>
	<h1>Divers</h1>
<?php
	echo $this->UtilePour($Tvariables['ID']);
	echo $this->Obtenir($Tvariables['ID']);
}

}
