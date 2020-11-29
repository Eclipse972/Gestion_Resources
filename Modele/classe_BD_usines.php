<?php
require'Modele/classe_BD.php';
class BD_usines extends base2donnees {
	
public function Récupère_recette_usine($type_usineID) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_recette_usine WHERE ID = '.$type_usineID);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return $ligne['code'];
}

public function Niveau_usine($IDusine) {

	return $IDusine;
}

public function Production_usine($IDusine) {

	return number_format($IDusine*4823,0,',',' ');
}

public function Amélioration_usine($IDusine) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_amélioration_usine WHERE ID = '.$IDusine);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Rien</p>\n";	
}

}
