<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;

public function __construct() {
?><table>
<?php
}

// pour les développements futurs
abstract public function Afficher_tete();					// en-tête du tableau
abstract public function Afficher_corps($id_selectionné);	// corps du tableau
abstract protected function Afficher_rapport($Tvariables, $id);	// affichage détaillé de la ligne


// Affichage de la page
protected function Afficher_thead($T_en_tete) { // déclare le tableau avec en paramètres un tableau contenant les en-têtes à afficher
	$this->nb_col_tableau = count($T_en_tete);
	echo"\n\t<thead>\n\t<tr>\n";
	foreach($T_en_tete as $valeur) echo "\t\t<th>$valeur</th>\n";
	echo"\t</tr>\n\t</thead>\n";
}

protected function InterrogerBD($requete, $Tparametres = []) {
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare($requete);
		$requete->execute($Tparametres);
		$TreponseBD = $requete->fetchall(PDO::FETCH_ASSOC); // une seule ligne à capturer qui content toutes les variables pour afficher le rapport
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	return $TreponseBD; // retourne la listes des variables sous la forme d'un tableau associatif
}

protected function Afficher_tbody($vueBD, $id_selectionné) {
	$IDjoueur = $_SESSION['IDjoueur'];
	
	if ($vueBD=='Vue_marchandise')
		$T_Vue = $this->InterrogerBD('SELECT ID, code FROM Vue_marchandise');
	else $T_Vue = $this->InterrogerBD('SELECT ID, IDjoueur, code FROM '.$vueBD.' WHERE IDjoueur = :ID', array(':ID'=>$IDjoueur));
	echo"\t<tbody>\n";
	foreach($T_Vue as $réponseBD) {
		echo"\t",($réponseBD['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>'; // pose d'une ancre sur la ligne sélectionnée
		echo"\n{$réponseBD['code']}\t</tr>\n";
		if ($réponseBD['ID'] == $id_selectionné) {
			echo"\t<tr>\n\t<td colspan=\"{$this->nb_col_tableau}\" id=\"rapport\">\n\t\t";
			echo'<a href="#"><img src="Vue/images/fleche_haut.png" style="height:40px" align=right alt="remonter en haut de la page"></a>';
			echo"\n<!-- Début du rapport -->\n";
			$T_variables = $this->Récupérer_variables_rapport($vueBD, $IDjoueur, $id_selectionné);
			$this->Afficher_rapport($T_variables, $id_selectionné);
			echo"<!-- Fin du rapport -->\n";
		}
	}
	echo"\t</tbody>\n\t</table>\n";
}

protected function Récupérer_variables_rapport($vueBD, $IDjoueur, $id) { // retourne la listes des variables sous la forme d'un tableau associatif
	$T_variables = $this->InterrogerBD('SELECT * FROM '.$vueBD.'_rapport WHERE ID = :ID AND IDjoueur = :IDjoueur', array(':IDjoueur'=>$IDjoueur, ':ID'=>$id));
	return $T_variables[0];
}

protected function AbesoinsDe($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, false); }

protected function UtilePour($marchandise_ID) { $this->BesoinOuUtile($marchandise_ID, true); }

protected function BesoinOuUtile($marchandise_ID, $Butile) {
	if ($Butile) {
		$vue = 'Vue_marchandiseUtilePour';
		$titre = "Utile pour";
	} else {
		$vue = 'Vue_marchandiseABesoinDe';
		$titre = "N&eacute;cessite";
	}
	$T_reponseBD = $this->InterrogerBD("SELECT nom FROM {$vue} WHERE marchandise_ID = :ID", array(':ID'=>$marchandise_ID));
	if (count($T_reponseBD)>1) { // plusieurs lignes
		echo"\t<h1>{$titre} :</h1>\n\t<ul>\n";
		foreach($T_reponseBD as $ligneBD) echo "\t\t<li>{$ligneBD['nom']}</li>\n";
		echo"\t</ul>\n";
	} elseif (count($T_reponseBD)==1) echo"\t<p>{$titre} {$T_reponseBD[0]['nom']}</p>"; // une seule ligne
	// sinon on affiche rien
}

}
