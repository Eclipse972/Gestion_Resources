<?php
abstract class Page {
	abstract public function FeuilleDeStyle();
	abstract public function Section();

protected function CSS($nom) {
?>
	<link rel="stylesheet" href="Vue/<?=$nom?>.css" />
<?php
}
/* Fichiers à créer pour un développement d'un futur onglet nommé X. Ex: batiment spéciaux, missions...
 * nom de la page	: créer une nouvelle classe X fille de la classe Page. Si l'onglet est de type tableau étendre la classe PageTableau
 * feuille de style	: Vue/X.css en plus de commun.css
 * image de l'onglet: Vue/images/onglet_X.png
 * */
}

class PageJoueur extends Page {
public function FeuilleDeStyle()	{	$this->CSS('joueur');	}

public function Section() {
?>
<p>Page joueur en construction</p>
<?php
}
}

class PageErreur extends Page {
public function FeuilleDeStyle()	{	$this->CSS('erreur');	}

public function Section() {
	$DICO = array(	// dictionnaire
		// erreurs de mon application
		0	=> 'Erreur inconnue',
		1	=> 'Un probl&egrave;me est survenu lors de l&apos;envoi de votre message'."\n".'R&eacute;essayez plus tard!',
		2	=> 'Un probl&egrave;me est survenu avec le formulaire',
		3	=> 'Identifiant formulaire inconnu',
		4	=> 'Onglet inexistant',
		5	=> 'Ligne inexistante',
		6	=> 'Param&egrave;tres dans l&apos;URL incoh&eacute;rents',
		// erreurs serveur
		403	=> 'Acc&egrave;s interdit',
		404	=> 'Cette page n&apos;existe pas',
		500	=> 'Serveur satur&eacute;: essayez de recharger la page'
	);
	$code_erreur = (isset($DICO[$_SESSION['erreur']])) ? $_SESSION['erreur'] : 0;
?>
	<h1>Erreur <?=$code_erreur?>: <?=$DICO[$code_erreur]?></h1>
	<p>S&eacute;lectionnez un des onglets en haut de cette page.</p>
	<p>Si le probl&egrave;me persiste envoyez-moi un courriel en <a href="gestion.resources@free.fr">cliquant ici</a>.</p>
<?php
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
abstract class PageTableau extends Page {
	protected $nb_col_tableau;

abstract public function Afficher_tete();
abstract public function Afficher_corps();

public function __construct() {
	// la session contient déjà le numéro de l'onglet
	// liste exhaustive des paramètres. Ce sont tous des entiers
	$T_paramètresURL = array(
		'ligne' => 0,	// ligne à détailler
		'id'	=> 0,	// ligne à MAJ
		'champ' => 0);	// champ à modifier
	foreach($T_paramètresURL as $clé => $valeur) {
		$T_paramètresURL[$clé] = (isset($_GET[$clé])) ? intval($_GET[$clé]) : null;// récupération des paramètres sans test de validité des valeurs
	}
	switch ((isset($T_paramètresURL['ligne']) ? 1 : 0) + (isset($T_paramètresURL['id']) ? 2 : 0) + (isset($T_paramètresURL['champ']) ? 4 : 0))
	{	// MAJ du contexte suivant la situation
		case 0: // aucun paramètre supplémentaire
			$_SESSION['ligne'] = $_SESSION['id'] = $_SESSION['champ'] = null;
			break;
		case 1:	// ligne uniquement => affichage de la liste avec le rapport de la ligne sélectionnée
			$_SESSION['ligne'] = $T_paramètresURL['ligne'];
			$_SESSION['id']	= $_SESSION['champ'] = null;
			break;
		case 6: // id + champ => MAJ du champ pour la ligne id.
			// on ne modifie pas $_SESSION['ligne'] car si un rapport est affiché il doit le rester
			$_SESSION['id']		= $T_paramètresURL['id'];
			$_SESSION['champ']	= $T_paramètresURL['champ'];
			break;
		default:// pas la peine d'aller plus loin
			$_SESSION['ligne'] = $_SESSION['id'] = $_SESSION['champ'] = null;
			header("location:/?erreur=6");
	}
}

protected function CSSTableau($nom) {	$this->CSS('table');	$this->CSS($nom);	}

public function Section() {
?>
	<div id="vers_le_haut"><a href="#"><img src="Vue/images/fleche_haut.png" alt="Retourner en haut" /></a></div>
<?php
	$this->Afficher_tete();	// méthode définie par les classes filles
	$this->Afficher_corps();
}

protected function Afficher_thead($T_en_tete) {
	$this->nb_col_tableau = count($T_en_tete);
?>
	<table>
	<thead><tr>
<?php	foreach($T_en_tete as $valeur) echo "\t\t\t<th>$valeur</th>\n";?>
	</tr></thead>
<?php
}

protected function Afficher_tboby($vueBD, $nomClasseLigne) {
	require'classe_LigneTableau.php';
	require"Modele/classe_{$nomClasseLigne}.php";		// ligne associée à la page
	$ligne = new $nomClasseLigne;

	$IDjoueur = $_SESSION['IDjoueur'];
	$Tvue = ExecuterRequete("SELECT * FROM {$vueBD} WHERE IDjoueur = :ID", array(':ID' => $IDjoueur), 'construction du tableau d\'objets');
?>
	<tbody>
<?php
	foreach($Tvue as $réponseBD) {
		$ligne->Hydrater($réponseBD);
		echo $ligne->Afficher();
		// affichage du formulaire
		if ($réponseBD['ID'] == $_SESSION['id']) {
			echo"\t<tr>\n\t\t<td colspan=\"2\" id=\"formulaireMAJ\">\n";
			echo"\t\t<form method=\"post\" action=\"?onglet={$_SESSION['onglet']}&id={$_SESSION['id']}&champ={$_SESSION['champ']}\">\n";
			$ligne->AfficherFormulaireMAJ($_SESSION['champ']);
			echo"\t\t\t<br><button type=\"submit\">Valider</button><button type=\"reset\">RAZ</button>\n";
			echo"\t\t</form>\n\t\t</td>\n\t</tr>\n";
		}
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
protected $date_MAJ;

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
