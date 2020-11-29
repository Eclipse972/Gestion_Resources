<?php
require'Modele/classe_BD.php';

class BD_marchandises extends base2donnees {

// méthodes nécessaires pour l'affichage du tableau	

// méthodes nécessaires pour l'affichage du rapport
public function MarchandiseUtilePour($IDmarchandise) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_marchandiseUtilePour WHERE ID = '.$IDmarchandise);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Gagner des sous!</p>\n";
}

public function MarchandiseAbesoin($IDmarchandise) {
	$this->resultat = $this->BD->query('SELECT code FROM Vue_marchandiseAbesoin WHERE ID = '.$IDmarchandise);
	$ligne = $this->resultat->fetch(); // un seul résultat
	return (isset($ligne['code'])) ? "<ul>\n".$ligne['code']."\t</ul>\n" : "<p>Rien</p>\n";	
}
}
