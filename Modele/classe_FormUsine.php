<?php
require'Modele/classe_Formulaire.php';

class FormUsine extends Formulaire {
	private $nomUsine;
	private $ID;
	private $imageUsine;
	private $niveau;
	private $duréeRestanteProd;	// compatible timestamp
	private $duree_prod_souhaitee;	// idem

public function Hydrate($ID) {
	$Tvariables=$this->Récupérer_variables_formulaire('Vue_usine',$ID); // recherche les données pour pré-remplir le formulaire	
	$this->nomUsine = $Tvariables['nom'];
	$this->ID = $Tvariables['ID'];
	$this->imageUsine = $Tvariables['image'];
	$this->niveau = $Tvariables['niveau'];
	$this->duréeRestanteProd = $Tvariables['dureeProd'];
	$this->duree_prod_souhaitee = $Tvariables['duree_prod_souhaitee'];
}

public function Afficher() {
	Formulaire::Commencer($this->imageUsine, $this->nomUsine, $this->ID);
?>
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" min="0" value="<?=$this->niveau?>" style="width:50px; margin-right:50px">
		
		<fieldset>
			<legend>Dur&eacute;e de production restante :</legend>

			<label for="jour">jour :</label>
			<input type="number" id="jour" name="jour" value="<?=(int)($this->duréeRestanteProd/86400)?>" min="0" style="width:45px; margin-right:9px">

			<label for="heure">heure :</label>
			<input type="number" id="heure" name="heure" value="<?=(int)($this->duréeRestanteProd/3600) % 24?>" min="0" max="23" style="width:35px; margin-right:9px">

			<label for="minute">minute :</label>
			<input type="number" id="minute" name="minute" value="<?=(int)($this->duréeRestanteProd/60) % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
			<p>Remarque: lors de l&apos;affichage des usines, il suffit de recharger la page pour mettre à jour cette dur&eacute;e.</p>
		</fieldset>

		<fieldset>
			<legend>Dur&eacute;e de production souhait&eacute;e :</legend>

			<label for="jour2">jour :</label>
			<input type="number" id="jour2" name="jour2" value="<?=(int)($this->duree_prod_souhaitee/86400)?>" min="0" style="width:45px; margin-right:9px">

			<label for="heure2">heure :</label>
			<input type="number" id="heure2" name="heure2" value="<?=(int)($this->duree_prod_souhaitee/3600) % 24?>" min="0" max="23" style="width:35px; margin-right:9px">

			<label for="minute2">minute :</label>
			<input type="number" id="minute2" name="minute2" value="<?=(int)($this->duree_prod_souhaitee/60) % 60?>" min="0" max="59" style="width:35px; margin-right:9px">
		</fieldset>
<?php
	Formulaire::Terminer();
}

public function Traiter() {
	try	{
		include'connexion.php';
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare('
			UPDATE usine
			SET niveau = :niveau,
				date_fin_production = UNIX_TIMESTAMP() + :dureeProd +9, # évite de perdre 1 minute 
				duree_prod_souhaitee = :dureeSouhaitee
			WHERE usine.joueur_ID = :IDjoueur AND usine.type_usine_ID = :ID');
		$requete->execute(array(
			':IDjoueur'			=>$_SESSION['IDjoueur'],
			':ID'				=>$this->Nettoyer($_POST['ID']),
			':niveau'			=>$this->Nettoyer($_POST['niveau']),
			':dureeProd'		=>60*$this->Nettoyer($_POST['minute']) 	+ 3600*$this->Nettoyer($_POST['heure'])  + 86400*$this->Nettoyer($_POST['jour']),
			':dureeSouhaitee'	=>60*$this->Nettoyer($_POST['minute2']) + 3600*$this->Nettoyer($_POST['heure2']) + 86400*$this->Nettoyer($_POST['jour2'])));
	} catch (PDOException $e) {
		exit('Erreur traitement formulaire: '.$e->getMessage());
	}
	$BD = null;
	header("location:http://gestion.resources.free.fr/usines.php?id={$_SESSION['ID']}#selection");
}
}
