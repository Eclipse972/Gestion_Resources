<?php
require'Modele/classe_Formulaire.php';

class FormEntrepot extends Formulaire {
private $nomEntrepot;
private $imageEntrepot;
private $niveau;
private $stock;

public function Hydrate($ID) {
	$Tvariables=$this->Récupérer_variables_formulaire('Vue_entrepot',$ID); // recherche les données pour pré-remplir le formulaire	
	$this->nomEntrepot = $Tvariables['nom'];
	$this->ID = $Tvariables['ID'];
	$this->imageEntrepot = $Tvariables['image'];
	$this->niveau = $Tvariables['niveau'];
	$this->stock = $Tvariables['stock'];
}

public function Afficher() {
	Formulaire::Commencer($this->imageEntrepot, 'de l&apos;entrep&ocirc;t '.$this->nomEntrepot, $this->ID);
?>
		<label for="niveau">Niveau :</label>
		<input type="number" id="niveau" name="niveau" value="<?=$this->niveau?>" style="width:50px; margin-right:50px">
		
		<label for="Stock">Stock :</label>
		<input type="number" id="stock" name="stock" value="<?=$this->stock?>" style="width:200px; margin-right:50px">
		<br>
<?php
	Formulaire::Terminer();
}

public function Traiter() {
	Formulaire::MiseAJour('UPDATE entrepot SET niveau = :niveau,	stock = :stock WHERE entrepot.joueur_ID = :IDjoueur AND entrepot.marchandise_ID = :ID',
		array(	':IDjoueur'	=>$_SESSION['IDjoueur'],
				':ID'		=>$this->Nettoyer($_POST['ID']),
				':niveau'	=>$this->Nettoyer($_POST['niveau']),
				':stock'	=>$this->Nettoyer($_POST['stock'])));
	header("location:http://gestion.resources.free.fr/usines.php?id={$_SESSION['ID']}#selection");
}
}

