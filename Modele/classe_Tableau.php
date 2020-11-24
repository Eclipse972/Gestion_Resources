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
		<th><!-- colonne pour l'image --></th>
<?php	foreach($T_en_tete as $valeur) {	echo "\t\t",'<th>',$valeur,'</th>',"\n";	}	?>
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
	
	foreach($T_Vue as $réponseBD) {
		echo "\t",($réponseBD['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		$code = $réponseBD['code'];
		$T_remplacement = $this->Remplacement_variables($Vue_BD,$réponseBD['ID']);
		foreach($T_remplacement as $nom => $valeur) $code = str_replace('('.$nom.')', $valeur, $code);
		echo $code,"\t";
		echo '</tr>',"\n";
		if ($réponseBD['ID'] == $id_selectionné) {
		?>	<tr>
				<td colspan="<?=$this->nb_col_tableau?>" id="rapport">
		<?php
			$this->Afficher_rapport($id_selectionné,$réponseBD['nom_ligne']); // le 2e paramètre permet de récupérer le nom sans refaire une requête
		?>		</td>
			</tr>
		<?php		
		}
	}
?>
	</tbody>
	</table>
<?php
}

private function Remplacement_variables($vue,$id) {
	$BD = new base2donnees;
	switch($vue) {
	case 'Vue_usine':
		$TVariables = [
			'recette' => $BD->Récupère_recette($id),
			'niveau' => $id*$id,
			'production' => $id*$id*$id*4823
		];
		break;
	case 'Vue_entrepot':
		$TVariables = ['niveau' => $id*$id, 'stock' => $id*$id*$id*4563];
		break;
	case 'Vue_mine': // détermination des variables de la id-ième mine
		$TVariables['production'] = $id*12345;
		break;
	case 'Vue_marchandise':
		$TVariables = [];
	}
	return $TVariables;
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
	echo 'Rapport ',$nom_ligne,' en construction',"\n";
}
}
// classe TEntrepot -------------------------------------------------------------------------------------------------------------------
class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_entrepot', $id_selectionné); }

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
