<?php
class Tableau {
private $ID_joueur;
private $Vue_BD;	// vue associé à la table. Elle prépare les données de la table pour l'affichage
// dans le futur private $Table_BD;	// table pour la MAJ des données

protected function Creer_tableau($en_tete, $date) { // déclare le tbleau et affiche l'en-tête
?>
	<p align="right">Derni&egrave;re mise à jour le: <?=$date?></p>
	<table>
	<thead>
	<tr>
<?php	for($i=0;$i<count($en_tete);$i++) {	echo "\t\t",'<th>',$en_tete[$i],'</th>',"\n";	}	?>
	</tr>
	</thead>
	<tbody>
<?php
}

public function Terminer() { // status public pour être exploitable par toute les classe fille sans ajouter de code
?>
	</tbody>
	</table>
<?php
}

public function Récupère_Vue($vueBD, $WHERE = '1') { // récupère les données de la vue de la BD
	$BD = new base2donnees;
	$T_code = null;
	$i = 0;
	$this->resultat = $this->BD->query('SELECT * FROM '.$vueBD.'WHERE '.$WHERE);
	while ($ligne = $this->resultat->fetch()) {	// récupère et agrège le code
		$T_code[$i] = $ligne;
		$i++;
	}
	return $T_code;
}
	
public function Ajouter_ligne($Tcolonnes) { for($i=1;$i<count($Tcolonnes);$i++) echo "\t\t",'<td>',$Tcolonnes[$i],'</td>',"\n";	}
}

class TMarchandise extends Tableau {
public function Creer_tableau($date ='ind&eacute;termin&eacute;e') { parent::Creer_tableau(array('Marchandise', 'cours Ki-market', 'cours max'), $date); }

public Afficher() {
	
}
}

