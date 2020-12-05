<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;

public function __construct() {
?>	<table>
<?php
}

// pour les développements futurs
abstract public function Afficher_tete();					// en-tête du tableau
abstract public function Afficher_corps($id_selectionné);	// corps du tableau
abstract protected function Afficher_rapport($id);			// affichage détaillé de la ligne


// Affichage de la page
protected function Afficher_thead($T_en_tete) { // déclare le tableau avec en paramètres un tableau contenant les en-têtes à afficher
	$this->nb_col_tableau = count($T_en_tete);
?>
	<thead>
	<tr>
<?php	foreach($T_en_tete as $valeur) echo "\t\t<th>$valeur</th>\n";	?>
	</tr>
	</thead>
<?php
}
	
protected function Afficher_tbody($vueBD, $id_selectionné) {
	$IDjoueur = (isset($_SESSION['ID'])) ? $_SESSION['ID'] : 1; // joueur lambda pour le moment
	try	{ // code inspiré du site de P.Giraud
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		if ($vueBD == 'Vue_marchandise')
			$requete = $BD->prepare('SELECT ID, code FROM Vue_marchandise'); // la vue marchandise est indépendante du joueur sauf lorsque l'ordre d'afichage sera implémenté
		else {
			$requete = $BD->prepare('SELECT ID, IDjoueur, code FROM '.$vueBD.' WHERE IDjoueur = :ID'); // FROM :vue WHERE  avec bindValue(':vue',$vue) provoque une erreur de syntaxe
			$requete->bindValue(':ID',$IDjoueur, PDO::PARAM_INT);
		}
		$requete->execute();
		$T_Vue = $requete->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
?>
	<tbody>
<?php
	foreach($T_Vue as $réponseBD) {
		echo "\t",($réponseBD['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		echo "{$réponseBD['code']}\t</tr>\n";
		if ($réponseBD['ID'] == $id_selectionné) {
			$T_variables = $this->Récupérer_variables_rapport($vueBD, $IDjoueur, $id_selectionné);
?>	<tr>
		<td colspan="<?=$this->nb_col_tableau?>" id="rapport">
		<a href="#"><img src="Vue/images/fleche_haut.png" style="height:40px" align=right alt="remonter en haut de la page"></a>
<!-- Début du rapport -->
<?php
		$this->Afficher_rapport($T_variables);
?>
<!-- Fin du rapport -->
		</td>
	</tr>
<?php		
		} // fin du if
	}
?>
	</tbody>
	</table>
<?php
}

protected function Récupérer_variables_rapport($vueBD, $IDjoueur, $id) {
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$requete = $BD->prepare('SELECT * FROM '.$vueBD.'_rapport WHERE ID = :ID AND IDjoueur = :IDjoueur');
		$requete->bindValue(':IDjoueur',$IDjoueur, PDO::PARAM_INT);
		$requete->bindValue(':ID',$id, PDO::PARAM_INT);
		$requete->execute();
		$liste_variables = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne à capturer qui content toutes les variables pour afficher le rapport
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	return $liste_variables; // retourne la listes des variables sous la forme d'un tableau associatif
}

protected function Besoins($marchandise_ID) {
	try {
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL

	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
}

protected function UtilePour($marchandise_ID) {
	try {
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$requete = $BD->prepare("
			SELECT CONCAT(nature_recette.nom,
				IF(LEFT(recette.nom,1) IN ('a', 'e', 'i', 'o', 'u'),' d&apos;', ' de '),
				recette.nom) AS recette
			FROM marchandise
			INNER JOIN ingredient ON ingredient.marchandise_ID = marchandise.ID
			INNER JOIN recette ON ingredient.recette_ID = recette.ID
			INNER JOIN nature_recette ON recette.nature_ID = nature_recette.ID
			WHERE ingredient.nature = 0 AND marchandise.ID = :ID");
		$requete->bindValue(':ID',$marchandise_ID, PDO::PARAM_INT);
		$requete->execute();
		$liste_recettes = $requete->fetchall(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	echo'<h1>Utile pour ...</h1>';
	if (isset($liste_recettes)) {
		if (count($liste_recettes)>1) { // plusieurs lignes
			echo"\t<ul>";
			foreach($liste_recettes as $ligneBD) echo "\t\t<li>{$ligneBD['recette']}</li>\n";
			echo"\t</ul>";
		} else echo"\t<p>{$liste_recettes[0]['recette']}</p>"; // une seule ligne
	} else echo'Gagner de l&apos;argent!'; // liste vide
}

}
