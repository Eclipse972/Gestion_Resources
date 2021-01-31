<?php
function Paramètre_erreur() {
	if (isset($_GET['erreur']))
		$param = intval($_GET['erreur']);
	else $retour = null;
return $retour;
}

$CODE_ERREUR = Paramètre_erreur();
