<?php
abstract class Page {
	abstract public function Section();
/* Méthode à implémenter dans les classe filles
 * public function FeuilleDeStyle();
 * public function TraiterFormulaire();
 * */

	protected function FeuilleDeStyle($nom) {
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

	public function TraiterFormulaire() {}
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
class PageTableau extends Page {
	protected $nb_col_tableau;
	protected $nomCSS;
	protected $T_enTete;
	protected $vueBD;
	protected $nomClasseLigne;

	public function __construct() {
		// la session contient déjà le numéro de l'onglet
		// liste exhaustive des paramètres. Ce sont tous des entiers
		$T_paramètresURL = array(
			'ligne' => 0,	// ligne à détailler
			'id'	=> 0,	// ligne à MAJ
			'champ' => 0);	// champ à modifier

		// récupération des paramètres sans test de validité des valeurs
		foreach($T_paramètresURL as $clé => $valeur)	$T_paramètresURL[$clé] = (isset($_GET[$clé])) ? intval($_GET[$clé]) : null;

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

	public function FeuilleDeStyle() {
		parent::FeuilleDeStyle('table');
		parent::FeuilleDeStyle($this->nomCSS);
	}

	public function Section() {
	?>
		<div id="vers_le_haut"><a href="#"><img src="Vue/images/fleche_haut.png" alt="Retourner en haut" /></a></div>
	<?php
		$this->Afficher_tete();
		$this->Afficher_corps();
	}

	public function TraiterFormulaire() {
		require'classe_LigneTableau.php';
		require"classe_{$this->nomClasseLigne}.php";
		// construction de l'objet ligne
		$réponseBD = ExecuterRequete("SELECT * FROM {$this->vueBD} WHERE IDjoueur = :IDjoueur AND ID = :ID",
									array(':IDjoueur' => $_SESSION['IDjoueur'], ':ID' => $_SESSION['id']), 'construction due l\'objet pout MAJ formulaire');
		$ligne = new $this->nomClasseLigne;
		$ligne->Hydrater($réponseBD[0]);
		// MAJ  de la BD
		$ligne->MAJ_BD();
	}

	public function PageRetour() { return "?onglet={$_SESSION['onglet']}".((isset($_SESSION['ligne'])) ? "&ligne={$_SESSION['ligne']}#{$_SESSION['ligne']}" : "#{$_SESSION['id']}"); }

	protected function Afficher_tete() {
		$this->nb_col_tableau = count($this->T_enTete);
?>
	<table>
		<thead><tr>
<?php	foreach($this->T_enTete as $valeur) echo "\t\t\t<th>$valeur</th>\n";?>
		</tr></thead>
<?php
	}

	protected function Afficher_corps() {
		require'classe_LigneTableau.php';
		require"classe_{$this->nomClasseLigne}.php";	// ligne associée à la page
		$ligne = new $this->nomClasseLigne;

		$Tvue = ExecuterRequete("SELECT * FROM {$this->vueBD} WHERE IDjoueur = :ID", array(':ID' => $_SESSION['IDjoueur']), 'construction du tableau d\'objets');
?>
		<tbody>
<?php
		foreach($Tvue as $réponseBD) {
			$ligne->Hydrater($réponseBD);
			$ligne->Afficher();
			if ($réponseBD['ID'] == $_SESSION['id'])	$ligne->AfficherFormulaireMAJ();
			if ($réponseBD['ID'] == $_SESSION['ligne'])	$ligne->AfficherRapport($this->nb_col_tableau);
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
	public function __construct() {
		parent::__construct();
		$this->nomCSS = 'usines';
		$this->T_enTete = array('Usine', 'Niveau', 'Production');
		$this->vueBD = 'Vue_usine';
		$this->nomClasseLigne = 'Usine';
	}
}

class PageMine extends PageTableau {
	public function __construct() {
		parent::__construct();
		$this->nomCSS = 'mines';
		$this->T_enTete = array('Mines', '&Eacute;tat','Nombre', 'Production', 'Production max');
		$this->vueBD = 'Vue_mine';
		$this->nomClasseLigne = 'Mine';
	}
}

class PageEntrepot extends PageTableau {
	public function __construct() {
		parent::__construct();
		$this->nomCSS = 'entrepots';
		$this->T_enTete = array('Entrep&ocirc;t', 'Niveau', 'Capacit&eacute;', 'Stock', 'Valeur');
		$this->vueBD = 'Vue_entrepot';
		$this->nomClasseLigne = 'Entrepot';
	}
}

class PageCommerce extends PageTableau {
	protected $date_MAJ;

	public function __construct() {
		parent::__construct();
		$this->nomCSS = 'commerce';
		$this->T_enTete = array('Marchandise', 'cours Ki-market',	'cours max');
		$this->vueBD = 'Vue_commerce';
		$this->nomClasseLigne = 'Commerce';
		$this->date_MAJ = 'ind&eacute;termin&eacute;e'; // il va falloir trouver cette date lors de la MAJ des prix des marchandises
	}

	public function Afficher_tete() {
		?>
		<p align="right">Derni&egrave;re mise à jour le: <?=$this->date_MAJ?></p>
		<?php
		parent::Afficher_tete();
	}
}
