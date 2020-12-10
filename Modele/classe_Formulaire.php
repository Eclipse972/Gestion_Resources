<?php
abstract class Formulaire {
abstract public function Hydrate($ID);	// recherche les données pour pré-remplir le formulaire
abstract public function Afficher();	// afficher le formulaire
abstract public function Traiter();		// traiter les données reçues

protected function Récupérer_variables_formulaire($VueBD, $ID) {
	try	{
		include'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
		$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare("SELECT * FROM {$VueBD}_rapport WHERE IDjoueur = :IDjoueur AND ID = :ID");
		$requete->execute(array(':IDjoueur'=>$_SESSION['IDjoueur'], ':ID'=>$ID));
		$TreponseBD = $requete->fetch(PDO::FETCH_ASSOC); // une seule ligne à capturer qui contient toutes les variables pour afficher le formulaire
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	return $TreponseBD; // retourne la listes des variables sous la forme d'un tableau associatif
}

protected function Nettoyer($donnée_numérique) { // nettoie et convertit en entier
	$donnée_numérique = trim($donnée_numérique);
	$donnée_numérique = stripslashes($donnée_numérique);
	$donnée_numérique = htmlspecialchars($donnée_numérique);
	return (int) $donnée_numérique;
}


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
