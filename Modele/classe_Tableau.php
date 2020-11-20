<?php
class Tableau {
protected $Vue_BD;	// vue associé à la table. Elle prépare les données de la table pour l'affichage
protected $T_en_tete;	// tableau contenant les en-têtes du tableau à afficher
// dans le futur protected $Table_BD;	// table pour la MAJ des données

public function __construct($date) {
?>
<p align="right">Derni&egrave;re mise à jour le: <?=$date?></p>
	<table>
<?php
}

protected function Afficher_tete() { // déclare le tableau et affiche l'en-tête
?>
	<thead>
	<tr>
<?php	for($i=0;$i<count($this->T_en_tete);$i++) {	echo "\t\t",'<th>',$this->T_en_tete[$i],'</th>',"\n";	}	?>
	</tr>
	</thead>
<?php
}
	
protected function Afficher_corps($id_selectionné) {
?>
	<tbody>
<?php
	$BD = new base2donnees;
	$T_Vue = $BD->Récupère_Vue($this->Vue_BD); // récupère la vue
	
	for($i=0;$i<count($T_Vue);$i++) {
		echo "\t",($T_Vue[$i]['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		echo $T_Vue[$i]['code'],"\t";
		echo '</tr>',"\n";
		if ($T_Vue[$i]['ID'] == $id_selectionné) {
			echo "\t",'<tr>',"\n\t\t",'<td colspan="3" id="rapport">',"\n";
			$this->Afficher_rapport($id_selectionné,$T_Vue[$i]['nom_ligne']); // le 2e paramètre permet de récupérer le nom sans refaire une requête
			echo "\t\t",'</td>',"\n\t",'</tr>',"\n";
		}
	}
?>
	</tbody>
	</table>
<?php
}
}
/////////////////////////////////////////////////////////////////////////
class TMarchandise extends Tableau {
public function __construct($date) {
	$this->Vue_BD = 'Vue_marchandise';
	$this->T_en_tete = array('Marchandise', 'cours Ki-market',	'cours max');
	parent::__construct($date);
}

public function Afficher_tete() { parent::Afficher_tete(); }
public function Afficher_corps($id_selectionné) { parent::Afficher_corps($id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>
		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php	
}
}

