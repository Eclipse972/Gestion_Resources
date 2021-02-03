<?php
// dictionnaire
$DICO = array(
	// erreurs de mon application
	0	=> 'Erreur inconnue',
	1	=> 'Un probl&egrave;me est survenu lors de l&apos;envoi de votre message'."\n".'R&eacute;essayez plus tard!',
	2	=> 'Un probl&egrave;me est survenu avec le formulaire',
	3	=> 'Identifiant formulaire inconnu',
	4	=> 'Onglet inexistant',
	5	=> 'Ligne inexistante',
	// erreurs serveur
	403	=> 'Acc&egrave;s interdit',
	404	=> 'Cette page n&apos;existe pas',
	500	=> 'Serveur satur&eacute;: essayez de recharger la page'
);
$CODE_ERREUR = (isset($DICO[$CODE_ERREUR])) ? $CODE_ERREUR : 0;
?>
<h1>Erreur <?=$CODE_ERREUR?>: <?=$DICO[$CODE_ERREUR]?></h1>
<p>S&eacute;lectionnez un des onglets en haut de cette page.</p>
<p>Si le probl&egrave;me persiste envoyez-moi un courriel en <a href="gestion.resources@free.fr">cliquant ici</a>.</p>
