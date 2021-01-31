<?php	// Récupère la paramètre onglet et crée la code de la liste des onglets

$T_ONGLET = array('joueur',		'usines',		'mines',		'entrepots',	'commerce');	// sert aussi pour la création des onglets sur la page
$T_SCRIPT = array('pageJoueur',	'pageTableau',	'pageTableau',	'pageTableau',	'pageTableau');	// script à charger suivant l'onglet
$T_CLASSE = array('',			'Usine',		'Mine',			'Entrepot',		'Commerce');	// classe associée à chaque onglet de type tableau

/* Fichiers à créer pour un développement d'un futur onglet nommé X. Ex: batiment spéciaux, missions...
 * nom de l'onlet	: ajouter X dans le tableau ci-dessus
 * feuille de style	: Vue/X.css en plus de commun.css
 * image de l'onglet: Vue/images/onglet_X.png
 *
 * si l'onglet est de type tableau voir le script pageTaleau
 * */

function Paramètre_onglet() {
	global $T_ONGLET;
	if (isset($_GET['onglet'])) {
		$param = intval($_GET['onglet']);
		$retour = isset($T_ONGLET[$param]) ? $param : 0;	// onglet joueur par défaut
	} else $retour = null;
	return $retour;
}

$_SESSION['onglet'] = Paramètre_onglet();

// construction des onglets
$CODE_ONGLET = "\t<ul>\n";
foreach($T_ONGLET as $clé => $valeur)
	$CODE_ONGLET .= "\t\t<li><a ".(($clé == $_SESSION['onglet']) ? 'id="onglet_actif" ' : '')."href=\"index.php?onglet={$clé}\"><img src=\"Vue/images/onglet_{$valeur}.png\" alt=\"onglet {$valeur}\"></a></li>\n";
$CODE_ONGLET .= "\t</ul>\n";
