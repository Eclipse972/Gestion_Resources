<?php	// Récupère la paramètre onglet et crée la code de la liste des onglets
// variables globales utilisées dans d'autres scripts
$T_ONGLET	= array('joueur',		'usines',	'mines',	'entrepots',	'commerce'		);	// sert aussi pour la création des onglets sur la page
$T_PAGE		= array('PageJoueur',	'PageUsine','PageMine',	'PageEntrepot',	'PageCommerce'	);

function CréationOnglets() {
	global $T_ONGLET;
	$T_images  = array(	// image de chaque onglet
		'Vue/images/onglet_joueur',
		'https://www.resources-game.ch/images/appimages/nav_fabriken',
		'https://www.resources-game.ch/images/appimages/nav_foerderanlagen',
		'https://www.resources-game.ch/images/appimages/nav_lager',
		'https://www.resources-game.ch/images/appimages/nav_auftraege');
	$code = "\t<ul>\n";
	foreach($T_ONGLET as $clé => $valeur)
		$code .= "\t\t<li><a ".(($clé === $_SESSION['onglet']) ? 'id="onglet_actif" ' : '')."href=\"/?onglet={$clé}\"><img src=\"{$T_images[$clé]}.png\" alt=\"onglet {$valeur}\"></a></li>\n";
	return $code."\t</ul>\n";
}
