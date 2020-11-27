<?php
abstract class Tableau {
protected $nb_col_tableau;

public function __construct() {
?>	<table>
<?php
}

// pour les développements futurs
abstract public function Afficher_tete();					// en-tête du tableau
abstract public function Afficher_corps($id_selectionné);	// corps du tableau
abstract protected function Remplacement_variables($id);	// variable de remplacement pour le code donné par le vue
abstract protected function Afficher_rapport($id);			// affichage détaillé de la ligne
//---------------------------------------------------------

protected function Afficher_thead($T_en_tete) { // déclare le tableau avec en paramètres un tableau contenant les en-têtes à afficher
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
	
protected function Afficher_tbody($Vue_BD, $id_selectionné) {
?>
	<tbody>
<?php
	$BD = new base2donnees;
	$T_Vue = $BD->Récupère_Vue($Vue_BD); // récupère la vue
	
	foreach($T_Vue as $réponseBD) {
		echo "\t",($réponseBD['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		$code = $réponseBD['code'];
		$T_remplacement = $this->Remplacement_variables($réponseBD['ID']);
		foreach($T_remplacement as $nom => $valeur) $code = str_replace($nom, $valeur, $code);
		echo $code,"\t";
		echo '</tr>',"\n";
		if ($réponseBD['ID'] == $id_selectionné) {
?>
	<tr>
		<td colspan="<?=$this->nb_col_tableau?>" id="rapport">
		<a href="#">Remonter en haut de la page</a>
<!-- Début du rapport -->
<?php
		$this->Afficher_rapport($id_selectionné); // le 2e paramètre permet de récupérer le nom sans refaire une requête
?>
<!-- Fin du rapport -->
		</td>
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

// Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
