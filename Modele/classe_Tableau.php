<?php
class Tableau {
public function __construct($date) {
?>
<p align="right">Derni&egrave;re mise à jour le: <?=$date?></p>
	<table>
<?php
}

protected function Afficher_tete($T_en_tete) { // déclare le tableau avec en paramètres un tableau contenant les en-têtes à afficher
?>
	<thead>
	<tr>
<?php	for($i=0;$i<count($T_en_tete);$i++) {	echo "\t\t",'<th>',$T_en_tete[$i],'</th>',"\n";	}	?>
	</tr>
	</thead>
<?php
}
	
protected function Afficher_corps($Vue_BD, $nb_col_rapport, $id_selectionné) {
?>
	<tbody>
<?php
	$BD = new base2donnees;
	$T_Vue = $BD->Récupère_Vue($Vue_BD); // récupère la vue
	
	for($i=0;$i<count($T_Vue);$i++) {
		echo "\t",($T_Vue[$i]['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		echo $T_Vue[$i]['code'],"\t";
		echo '</tr>',"\n";
		if ($T_Vue[$i]['ID'] == $id_selectionné) {
			$this->Début_rapport($nb_col_rapport);
			$this->Afficher_rapport($id_selectionné,$T_Vue[$i]['nom_ligne']); // le 2e paramètre permet de récupérer le nom sans refaire une requête
			$this->Fin_rapport();
		}
	}
?>
	</tbody>
	</table>
<?php
}

protected function Début_rapport($nb_col_rapport) {
?>	<tr>
		<td colspan="<?=$nb_col_rapport?>" id="rapport">
<?php
}
protected function Fin_rapport() {
?>		</td>
	</tr>
<?php	
}
}
// Les classes fille utilisées dans les onglets
class TMarchandise extends Tableau {
public function __construct($date) { parent::__construct($date); }

public function Afficher_tete() { parent::Afficher_tete(array('Marchandise', 'cours Ki-market',	'cours max')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_marchandise',3, $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
} // fin de classe TMarchandise

class TMine extends Tableau {
public function __construct($date) { parent::__construct($date); }

public function Afficher_tete() { parent::Afficher_tete(array('Mines')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_mine',1, $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
} // fin de clase TMine
