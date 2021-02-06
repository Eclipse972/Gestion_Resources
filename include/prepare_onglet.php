<?php	// Récupère la paramètre onglet et crée la code de la liste des onglets
// variables globales utilisées dans d'autres scripts
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

function CréationOnglets($IDsélectionné) {
	global $T_ONGLET;
	$T_images  = array(	// image de chaque onglet
		'Vue/images/onglet_joueur',
		'https://www.resources-game.ch/images/appimages/nav_fabriken',
		'https://www.resources-game.ch/images/appimages/nav_foerderanlagen',
		'https://www.resources-game.ch/images/appimages/nav_lager',
		'https://www.resources-game.ch/images/appimages/nav_auftraege');
	$code = "\t<ul>\n";
	foreach($T_ONGLET as $clé => $valeur)
		$code .= "\t\t<li><a ".(($clé == $IDsélectionné) ? 'id="onglet_actif" ' : '')."href=\"/?onglet={$clé}\"><img src=\"{$T_images[$clé]}.png\" alt=\"onglet {$valeur}\"></a></li>\n";
	return $code."\t</ul>\n";
}
