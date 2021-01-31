<?php
function Paramètre_champ() {
	if (isset($_GET['champ']))
		$param = intval($_GET['champ']);
	else $retour = null;
return $retour;
}
