<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;
	protected $vueBD;
	protected $nomClasseLigne;

// pour les développements futurs
abstract public function Afficher_tete();	// en-tête du tableau
abstract public function CréerFormulaireMAJ();

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
	try	{
		include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare("SELECT ID, IDjoueur, code FROM {$this->vueBD} WHERE IDjoueur = :ID");
		$requete->bindValue(':ID', $IDjoueur);
		$requete->execute();
		$Tvue = $requete->fetchall(PDO::FETCH_ASSOC); // une seule ligne à capturer qui content toutes les variables pour afficher le rapport
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
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
