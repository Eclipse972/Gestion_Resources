<?php
function Paramètre_ligne() {
	if (isset($_GET['ligne']))
		$param = intval($_GET['ligne']);
	else $retour = null;
return $retour;
}

$_SESSION['ligne'] = Paramètre_ligne();

