<?php
require'Modele/classe_BD.php';
class BD_usines extends base2donnees {

protected function Tableau_parametres($ID) {
	return array (
		'recette'		=> $this->Récupère_recette_usine($ID),
		'niveau'		=> $this->Niveau_usine($ID),
		'production'	=> $this->Production_usine($ID)
	);
}

public function Récupère_vue() { //return parent::Récupère_Vue_brute('Vue_usine'); }
	$T_code = [];
	$No_ligne = 0;
	$this->resultat = $this->BD->query('SELECT * FROM Vue_usine'); // récupère les données de la vue
	//////////////////////////////////////////
	echo 'nb enr= ',count($this->resultat );
	///////////////////////////////////////////
	while ($ligne = $this->resultat->fetch()) {
		$T_code[$No_ligne]['ID'] = $ligne['ID'];
		$T_code[$No_ligne]['code'] = $this->Remplacement_variables($ligne['code'], $this->Tableau_parametres($ligne['ID']));// remplacement des variables
		$No_ligne++;
	}
	$this->resultat->closeCursor();
	return $T_code;
}

// méthodes pour récupérer les variables de chaque ligne du tableau	
public function Récupère_recette_usine($type_usineID) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_recette_usine WHERE ID = '.$type_usineID);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return $ligne['code'];
}

public function Niveau_usine($IDusine) {

	return $IDusine+5;
}

public function Production_usine($IDusine) {

	return number_format($IDusine*423,0,',',' ');
}

// méthodes nécessaires pour l'affichage du rapport
public function Amélioration_usine($IDusine) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_amélioration_usine WHERE ID = '.$IDusine);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Rien</p>\n";	
}

}
