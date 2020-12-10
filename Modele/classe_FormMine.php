<?php
require'Modele/classe_Formulaire.php';

class FormMine extends Formulaire {
private $nomMine;
private $imageMine;
private $état;
private $prodMax;
private $nombre;

public function Hydrate($ID) {
	$Tvariables=$this->Récupérer_variables_formulaire('Vue_mine',$ID); // recherche les données pour pré-remplir le formulaire	
	$this->nomMine = $Tvariables['nom'];
	$this->ID = $Tvariables['ID'];
	$this->imageMine = $Tvariables['image'];
	$this->état = $Tvariables['etat'];
	$this->prodMax = $Tvariables['prod_max'];
	$this->nombre = $Tvariables['nombre'];
}

public function Afficher() {
	Formulaire::Commencer($this->imageMine, $this->nomMine, $this->ID);
?>
		<label for="nombre">Nombre de mine :</label>
		<input type="number" id="nombre" name="nombre" value="<?=$this->nombre?>" min="0" style="width:90px; margin-right:50px">
		
		<label for="etat">&Eacute;tat global :</label>
		<input type="number" id="etat" name="etat" value="<?=$this->état?>" min="0" max="100" style="width:42px; margin-right:50px">
		<br>
		<label for="prodMax">Production maximale :</label>
		<input type="number" id="prodMax" name="prodMax" value="<?=$this->prodMax?>" min="0" style="width:90px; margin-right:50px; margin-top:9px">
		<br>
<?php
	Formulaire::Terminer();
}

public function Traiter() {
	Formulaire::MiseAJour('UPDATE mine SET nombre = :nombre,	etat = :etat, prod_max = :prod_max WHERE mine.joueur_ID = :IDjoueur AND mine.type_mine_ID = :ID',
		array(	':IDjoueur'	=>$_SESSION['IDjoueur'],
				':ID'		=>$this->Nettoyer($_POST['ID']),
				':nombre'	=>$this->Nettoyer($_POST['nombre']),
				':etat'		=>$this->Nettoyer($_POST['etat']),
				':prod_max'	=>$this->Nettoyer($_POST['prodMax'])));
	header("location:http://gestion.resources.free.fr/mines.php?id={$_SESSION['ID']}#selection");
}
}

