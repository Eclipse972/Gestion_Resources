<?php
abstract class Page {
	abstract public function FeuilleDeStyle();
	abstract public function Section();

protected function CSS($nom) {
?>
	<link rel="stylesheet" href="Vue/<?=$nom?>.css" />
<?php
}
}

class PageJoueur extends Page {
public function FeuilleDeStyle()	{	$this->CSS('joueur');	}

public function Section() {
}
}

class PageErreur extends Page {
public function FeuilleDeStyle()	{	$this->CSS('erreur');	}

public function Section() {
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
abstract class PageTableau extends Page {
	protected $nb_col_tableau;

abstract public function Afficher_tete();
abstract public function Afficher_corps();

private function CSSTableau($nom) {	$this->CSS('table');	$this->CSS($nom);	}

public function Section() {
?>
	<div id="vers_le_haut"><a href="#"><img src="Vue/images/fleche_haut.png" alt="Retourner en haut" /></a></div>
<?php
	$this->Afficher_tete();	// méthode définie par les classes filles
	$this->Afficher_corps();
}

private function Afficher_thead($T_en_tete) {
	$this->nb_col_tableau = count($T_en_tete);
?>
	<table>
	<thead><tr>
<?php	foreach($T_en_tete as $valeur) echo "\t\t\t<th>$valeur</th>\n";?>
	</tr></thead>
<?php
}

private function Afficher_tboby($vueBD, $nomClasseLigne) {
	$IDjoueur = $_SESSION['IDjoueur'];
	$Tvue = ExecuterRequete("SELECT ID, IDjoueur, code FROM {$vueBD} WHERE IDjoueur = :ID", array(':ID' => $IDjoueur), 'construction du tableau d\'objets');
	$ligne = new $nomClasseLigne;
?>
	<tbody>
<?php
	foreach($Tvue as $réponseBD) {
		$ligne->Hydrater($réponseBD);
		echo $ligne->Afficher();
		// affichage du formulaire
		if ($réponseBD['ID'] == $_SESSION['id'])
			$ligne->AfficherFormulaireMAJ();
		// affichage du rapport
		if ($réponseBD['ID'] == $_SESSION['ligne']) {
			echo"\t<tr>\n\t\t<td colspan=\"{$this->nb_col_tableau}\" id=\"rapport\">\n<!-- Début du rapport -->\n";
			$ligne->AfficherRapport();
			echo"<!-- Fin du rapport -->\n\t\t</td>\n\t</tr>\n";
		}
	}
?>
	</tbody>
	</table>
<?php
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// classes filles de PageTableau
class PageUsine extends PageTableau {

public function FeuilleDeStyle() { parent::CSSTableau('usines'); }

public function Afficher_tete() { parent::Afficher_thead(array('Usine', 'Niveau', 'Production')); }

public function Afficher_corps() { parent::Afficher_tboby('Vue_usine', 'Usine'); }

}

class PageMine extends PageTableau {

public function FeuilleDeStyle() { parent::CSSTableau('mines'); }

public function Afficher_tete() { parent::Afficher_thead(array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max')); }

public function Afficher_corps() { parent::Afficher_tboby('Vue_mine', 'Mine'); }
}

class PageEntrepot extends PageTableau {

public function FeuilleDeStyle() { parent::CSSTableau('entrepots'); }

public function Afficher_tete() { parent::Afficher_thead(array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock', 'Valeur')); }

public function Afficher_corps() { parent::Afficher_tboby('Vue_entrepot', 'Entrepot'); }
}

class PageCommerce extends PageTableau {
private $date_MAJ;

public function __construct() {
	$this->date_MAJ = 'ind&eacute;termin&eacute;e'; // il va falloir trouver cette date lors de la MAJ des prix des marchandises
}

public function FeuilleDeStyle() { parent::CSSTableau('commerce'); }

public function Afficher_tete() {
?>
	<p align="right">Derni&egrave;re mise à jour le: <?=$this->date_MAJ?></p>
<?php
	parent::Afficher_thead(array('Marchandise', 'cours Ki-market',	'cours max'));
}

public function Afficher_corps() { parent::Afficher_tboby('Vue_commerce', 'Commerce'); }
}
