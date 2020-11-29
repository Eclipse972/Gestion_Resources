<?php
abstract class Tableau { // Remarque: chaque classe fille est associée à un CSS et doit définir les classes abstraites
	protected $nb_col_tableau;

public function __construct() {
?>	<table>
<?php
}

// pour les développements futurs
abstract public function Afficher_tete();					// en-tête du tableau
abstract public function Afficher_corps($id_selectionné);	// corps du tableau
abstract protected function Afficher_rapport($id);			// affichage détaillé de la ligne

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
	global $BDD;
	$T_Vue = $BDD->Récupère_Vue(); // récupère la vue
	
	foreach($T_Vue as $réponseBD) {
		echo "\t",($réponseBD['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		echo $réponseBD['code'],"\t</tr>\n";
		if ($réponseBD['ID'] == $id_selectionné) {
?>
	<tr>
		<td colspan="<?=$this->nb_col_tableau?>" id="rapport">
		<a href="#">Remonter en haut de la page</a>
<!-- Début du rapport -->
<?php
		$this->Afficher_rapport($id_selectionné);
?>
<!-- Fin du rapport -->
		</td>
	</tr>
<?php		
		} // fin du if
	}
?>
	</tbody>
	</table>
<?php
}
}
