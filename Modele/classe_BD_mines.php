<?php
require'Modele/classe_BD.php';
class BD_mines extends base2donnees {

public function Production_mine($IDmine) {
	
	return number_format($IDmine*5000,0,',',' ');
}

public function Etat_mine($IDmine) {
	
	return number_format($IDmine*4,0,',',' ');
}

public function Nombre_mine($IDmine) {
	
	return number_format($IDmine*23,0,',',' ');
}

public function MineUtilePour($IDmine) {
	// recherche de l'ID de la marchandise associée à la mine
	$this->resultat = $this->BD->query('SELECT marchandise_ID FROM type_mine WHERE ID = '.$IDmine);
	$ligne = $this->resultat->fetch(); // un seul résultat
	$IDmarchandise = $ligne['marchandise_ID'];
	return '';//$this->MarchandiseUtilePour($IDmarchandise);
}
}
