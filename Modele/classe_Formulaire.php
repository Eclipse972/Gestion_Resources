<?php
abstract class Formulaire {
abstract public function Hydrate($ID);	// recherche les données pour pré-remplir le formulaire
abstract public function Afficher();	// afficher le formulaire
abstract public function Traiter();		// traiter les données reçues

protected function Récupérer_variables_formulaire($VueBD, $ID) { // renvoie les variables pour hydrater le formulaire
	try	{
		include'connexion.php';
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare("SELECT * FROM {$VueBD}_rapport WHERE IDjoueur = :IDjoueur AND ID = :ID");
		$requete->execute(array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$ID));
		$TreponseBD = $requete->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage());
	}
	$BD = null;
	return $TreponseBD;
}

protected function Nettoyer($donnée_numérique) { return (int) htmlspecialchars(stripslashes(trim($donnée_numérique))); }	// nettoie et convertit en entier

protected function DébutFormulaire($image, $nom, $ID) {
?>
	<img src="Vue/images/<?=$image?>.png" alt="<?=$nom?>">
	<form action="formulaire.php" method="post">
		<h1>Mise &agrave; jour <?=$nom?></h1>
		<input type="hidden" id="ID" name ="ID" value="<?=$ID?>">
<?php
}

protected function FinFormulaire() {
?>
		<input type="submit" value="Valider" style="margin-top:9px">
	</form>
<?php
}
}
