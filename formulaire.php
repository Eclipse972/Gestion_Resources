<?php
session_start();
$IDjoueur = $_SESSION['IDjoueur'];
$onglet = $_SESSION['onglet'];
if  ((!isset($IDjoueur)) ||	(!isset($onglet)))	{
	$_SESSION['erreur'] = 2;
	header("Location:http://gestion.resources.free.fr/erreur.php");
}
$Tclasse = array(
	//	onglet		=> classe associée
		'usines'	=> 'FormUsine',
		'mines'		=> 'FormMine',
		'entrepots'	=> 'FormEntrepot',
		'commerce'	=> 'FormCommerce'
	);
require"Modele/classe_{$Tclasse[$onglet]}.php";
$formulaire = new $Tclasse[$onglet];

if (empty($_POST))	{
	$ID = (int) $_GET['id'];
	if (!$formulaire->IDvalide($ID)) {
		$_SESSION['erreur'] = 3;
		header("Location:http://gestion.resources.free.fr/erreur.php");
	}
	$formulaire->Hydrate($ID);
	ob_start();
	$formulaire->Afficher();
	$SECTION = ob_get_contents();
	ob_end_clean();
} else {	// traitement
		$formulaire->Traiter();
		header("Location:http://gestion.resources.free.fr/{$onglet}.php?id={$ID}#selection");
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
<?php include'Vue/pied2page.html';?>
</body>
</html>

