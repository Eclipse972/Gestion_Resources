<?php
class Tableau {
protected $nb_col_tableau;
public function __construct() {
?>	<table>
<?php
}

protected function Afficher_tete($T_en_tete) { // déclare le tableau avec en paramètres un tableau contenant les en-têtes à afficher
	$this->nb_col_tableau = count($T_en_tete)+1; // +celle pour l'image
?>
	<thead>
	<tr>
		<td><!-- colonne pour l'image --></td>
<?php	for($i=0;$i<count($T_en_tete);$i++) {	echo "\t\t",'<th>',$T_en_tete[$i],'</th>',"\n";	}	?>
	</tr>
	</thead>
<?php
}
	
protected function Afficher_corps($Vue_BD, $id_selectionné) {
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
			$this->Début_rapport($this->nb_col_tableau);
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
		<td colspan="<?=$this->nb_col_tableau?>" id="rapport">
<?php
}
protected function Fin_rapport() {
?>		</td>
	</tr>
<?php	
}
}
// classe TMarchandise -------------------------------------------------------------------------------------
class TMarchandise extends Tableau {
private $date_MAJ;
public function __construct() {
	$this->date_MAJ = 'ind&eacute;termin&eacute;e'; // il va faloir trouver cette date lors de la MAJ des prix des marchandises
?><p align="right">Derni&egrave;re mise à jour le: <?=$this->date_MAJ?></p><?php
	parent::__construct();
}

public function Afficher_tete() { parent::Afficher_tete(array('Marchandise', 'cours Ki-market',	'cours max')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_marchandise', $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}

// classe TMine -------------------------------------------------------------------------------------------------------------------
class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Mines', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_mine', $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
// classe TUsine -------------------------------------------------------------------------------------------------------------------
class TUsine extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_usine', $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
// classe TEntrepot -------------------------------------------------------------------------------------------------------------------
class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Usine', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_entrepot', $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
