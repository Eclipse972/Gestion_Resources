<?php
session_start();
$Tclasse = array(
//	onglet		=> classe associée
	'usines'	=> 'FormUsine',
	'mines'		=> 'FormMine',
	'entrepots'	=> 'FormEntrepot',
	'commerce'	=> 'FormCommerce'
);
// on récupère l'état sauvegardé dans la session
$IDjoueur = $_SESSION['IDjoueur'];
$onglet = $_SESSION['onglet'];
$ID = $_SESSION['ID'];

if ((!isset($IDjoueur)) || (!isset($onglet)) || (!isset($ID)) // position incomplète
	|| (!isset($Tclasse[$onglet]))) // onglet pas dans la liste
{
	$_SESSION['erreur'] = 2; // erreur formulaire
	header("Location:http://gestion.resources.free.fr/erreur.php"); // redirection vers la page d'erreur
} else {
	require"Modele/classe_{$Tclasse[$onglet]}.php";
	$formulaire = new $Tclasse[$onglet];
	if (empty($_POST)) {
		$formulaire->Hydrate();
		ob_start();
		$formulaire->Afficher();
		$SECTION = ob_get_contents();
		ob_end_clean();
	} else {
		$formulaire->Traiter();
		header("Location:http://gestion.resources.free.fr/{$onglet}.php?id={$ID}#selection"); 
	} 
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="shortcut icon" type="image/png" href="Vue/images/resources.ico">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:400,700">
	<link rel="stylesheet" href="Vue/commun.css" />
	<link rel="stylesheet" href="Vue/formulaire.css" />
	<title>Gestion de production pour le jeu Resources</title>
</head>

<body>
	<header><p><img src="Vue/images/logo.png" alt="logo officiel">Gestion de production pour le jeu <img src="Vue/images/logo2.png" alt="2e logo officiel"></p></header>

	<main>
		<section>
			<?=$SECTION?>
		</section>
	</main>

	<footer>
		<p>Site optimis&eacute; pour <img src="Vue/images/chrome.png" alt="Chrome"> et <img src="Vue/images/firefox.png" alt="Firefox"> - derni&egrave;re mise à jour: 4 d&eacute;cembre 2020</p>
	</footer>
</body>
</html>

