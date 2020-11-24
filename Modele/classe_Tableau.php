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
		foreach($T_remplacement as $nom => $valeur) $code = str_replace($nom, $valeur, $code);
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

protected function Mise_en_forme($Tvariables) { // rajoute les balises à reperer dans le code donné par chaque vue
	$T_balisé = [];
	foreach($Tvariables as $nom => $valeur)
		$T_balisé['('.$nom.')'] = $valeur;
	return $T_balisé;
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

protected function Remplacement_variables($vue,$id) {
	return parent::Mise_en_forme([]); // pas de données de joueur pour les marchandises
}

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}

// classe TMine -------------------------------------------------------------------------------------------------------------------
class TMine extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Mines', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_mine', $id_selectionné); }

protected function Remplacement_variables($vue,$id) {
	$BD = new base2donnees;
	$TVariables['production'] = $BD->Production_mine(1,$id); // recherche données du joueur dans la base
	return parent::Mise_en_forme($TVariables);
}

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
// classe TUsine -------------------------------------------------------------------------------------------------------------------
class TUsine extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_usine', $id_selectionné); }

protected function Remplacement_variables($vue,$id) {
	$BD = new base2donnees;
	$TVariables['recette'] = $BD->Récupère_recette_usine($id); // recherche données du joueur dans la base
	$TVariables['niveau'] = $BD->Niveau_usine(1,$id);
	$TVariables['production'] = $BD->Production_usine(1,$id);
	return parent::Mise_en_forme($TVariables);
}

public function Afficher_rapport($id, $nom_ligne) {
	echo 'Rapport ',$nom_ligne,' en construction',"\n";
}
}
// classe TEntrepot -------------------------------------------------------------------------------------------------------------------
class TEntrepot extends Tableau {

public function Afficher_tete() { parent::Afficher_tete(array('Entrep&ocirc;t', 'Niveau', 'Stock')); }

public function Afficher_corps($id_selectionné) { parent::Afficher_corps('Vue_entrepot', $id_selectionné); }

protected function Remplacement_variables($vue,$id) {
	$BD = new base2donnees;
	$TVariables['niveau'] = $BD->Niveau_entrepot(1,$id);
	$TVariables['stock'] = $BD->Stock(1,$id);
	return parent::Mise_en_forme($TVariables);
}

public function Afficher_rapport($id, $nom_ligne) {
?>		<p>Rapport <?=$nom_ligne?> en construction</p>
<?php
}
}
