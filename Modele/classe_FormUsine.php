<?php
require'Modele/classe_Formulaire.php';

class FormUsine extends Formulaire {
	private $niveau;
	private $date_fin_production;	// compatible timestamp
	private $duree_prod_souhaitee;	// idem

public function Hydrate() {
	$Tvariables=$this->Récupérer_variables_formulaire('Vue_usine'); // recherche les données pour pré-remplir le formulaire	
	$this->niveau = $Tvariables['niveau'];
	$this->date_fin_production = $Tvariables['date_fin_production'];
	$this->duree_prod_souhaitee = $Tvariables['duree_prod_souhaitee'];
}

public function Afficher() {
	$durée = max(0, $this->date_fin_production -  time()); // c'est un timestamp donc exprimé en secondes. donne 0 si la date est dépasssée
?>
	<h1>Mise &agrave; jour </h1>
	<form action="formulaire.php" method="post">
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" value="<?=$this->niveau?>" style="width:50px; margin-right:50px">
		
		<fieldset>
			<legend>Dur&eacute;e de production restante :</legend>

			<label for="jour">jour :</label>
			<input type="number" id="jour" name="jour" value="<?=(int)($durée/86400)?>" min="0" style="width:45px; margin-right:9px">

			<label for="heure">heure :</label>
			<input type="number" id="heure" name="heure" value="<?=(int)($durée/3600) % 24?>" min="" max="23" style="width:35px; margin-right:9px">

			<label for="minute">minute :</label>
			<input type="number" id="minute" name="minute" value="<?=(int)($durée/60) % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>

		<fieldset>
			<legend>Dur&eacute;e de production souhait&eacute;e :</legend>

			<label for="jour2">jour :</label>
			<input type="number" id="jour2" name="jour2" value="<?=(int)($this->duree_prod_souhaitee/86400)?>" min="0" max="7" style="width:25px; margin-right:9px">

			<label for="heure2">heure :</label>
			<input type="number" id="heure2" name="heure2" value="<?=(int)($this->duree_prod_souhaitee/3600) % 24?>" min="0" max="23" style="width:35px; margin-right:9px">

			<label for="minute2">minute :</label>
			<input type="number" id="minute2" name="minute2" value="<?=(int)($this->duree_prod_souhaitee/60) % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>

		<input type="submit" value="MAJ" style="margin-top:9px">
	</form>
<?php
}

public function Traiter() {
	$this->niveau = $this->Nettoyer($_POST['niveau']);
	$minute = $this->Nettoyer($_POST['minute']);
	$heure = $this->Nettoyer($_POST['heure']);
	$minute = $this->Nettoyer($_POST['jour']);
	// permet de calculer la durée restante de production en temps réel
	$this->dateFinProduction = time()+60*$minute+3600*$heure+86400*$jour; // en secondes

	$this->dureeProductionSouhaitée = 60*$this->Nettoyer($_POST['minute2']) + 3600*$this->Nettoyer($_POST['heure2']) + 86400*$this->Nettoyer($_POST['jour2']); // exprimée en minutes
	try	{
		include'connexion.php';
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare('
			UPDATE usine
			SET niveau = :niveau,
				date_fin_production = :date,
				duree_prod_souhaitee = :duree
			WHERE usine.joueur_ID = :IDjoueur AND usine.type_usine_ID = :ID');
		$requete->execute(array(
			':IDjoueur'=>$_SESSION['IDjoueur'],
			':ID'=>$_SESSION['ID'],
			':niveau'=>$this->niveau,
			':date'=>$this->dateFinProduction,
			':duree'=>$this->dureeProductionSouhaitée));
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	header("location:http://gestion.resources.free.fr/usines.php?id={$_SESSION['ID']}#selection");
}
}
