<?php
require'../Modele/classe_Formulaire.php';

class FormUsine extends Formulaire {
	private $niveau;
	private $date_fin_production;
	private $duree_prod_souhaitee;

public function Hydrate() {
	$Tvariables=Récupérer_variables_formulaire('Vue_usine'); // recherche les données pour pré-remplir le formulaire
	$this->niveau = $Tvariables['niveau'];
	$this->date_fin_production = $Tvariables['date_fin_production'];
	$this->duree_prod_souhaitee = $Tvariables['duree_prod_souhaitee'];
}

public Afficher() {
	// durée de fin de production est un timestamp donc exprimé en secondes
	$durée = max(0, $this->date_fin_production -  time()); // donne 0 si la date est dépasssée
	// /!\ champ duree_prod_souhaiteee exprimée en minutes 
?>
	<form action="Controleur/MAJusine.php" method="post">
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
			<input type="number" id="jour2" name="jour2" value="<?=(int)($this->duree_prod_souhaitee/1440)?>" min="0" max="7" style="width:25px; margin-right:9px">

			<label for="heure2">heure :</label>
			<input type="number" id="heure2" name="heure2" value="<?=(int)($this->duree_prod_souhaitee/60) % 24?>" min="0" max="23" style="width:35px; margin-right:9px">

			<label for="minute2">minute :</label>
			<input type="number" id="minute2" name="minute2" value="<?=$this->duree_prod_souhaitee % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>

		<input type="submit" value="MAJ" style="margin-top:9px">
	</form>
<?php
}

public function Traiter() {
	$niveau = Nettoyer($_POST['niveau']);

	// permet de calculer la durée restante de production en temps réel
	$dateFinProduction = time()	// en secondes
		+ 60*Nettoyer($_POST['minute']) 
		+ 3600*Nettoyer($_POST['heure']) 
		+ 86400*Nettoyer($_POST['jour']);

	// durée de production souhaitée exprimée en minutes
	$dureeProductionSouhaitée = Nettoyer($_POST['minute2'])
		+ 60*Nettoyer($_POST['heure2'])
		+ 1440*Nettoyer($_POST['jour2']);

	try	{
		include '../connexion.php';
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare('
			UPDATE usine
			SET niveau = :niveau,
				date_fin_production = :date,
				duree_prod_souhaitee = :duree
			WHERE usine.joueur_ID = :IDjoueur AND usine.ID = :ID');
		$requete->execute(array(
			':IDjoueur'=>$_SESSION['IDjoueur'],
			':ID'=>$_SESSION['ID'],
			':niveau'=>$niveau,
			':date'=>$dateFinProduction,
			':duree'=>$dureeProductionSouhaitée));
	} catch (PDOException $e) {
		exit('Erreur : '.$e->getMessage()); // faire un meilleur traitement de l'erreur
	}
	$BD = null; // on ferme la connexion
	header("location:http://gestion.resources.free.fr/usines.php?id={$_SESSION['ID']}#selection");
}
}
