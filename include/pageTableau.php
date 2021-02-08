<?php
function PageTableau()	{
	global $T_CLASSE;
	$classe = $T_CLASSE[$_SESSION['onglet']];
	// chargement des classes...
	require'Modele/classe_Tableau.php';			// mère des tableaux
	require"Modele/classe_Tableau{$classe}.php";// tableau associée à l'onglet
	require'Modele/classe_LigneTableau.php';	// mère des lignes de tableau
	require"Modele/classe_{$classe}.php";		// ligne associée à l'onglet

	$classeTableau = 'Tableau'.$classe;
	$Tableau = new $classeTableau;
	if (empty($_POST)) {
		ob_start();
		echo"\t<div id=\"vers_le_haut\"><a href=\"#\"><img src=\"Vue/images/fleche_haut.png\" alt=\"Retourner en haut\" /></a></div>\n";
		$Tableau->Afficher_tete();
		$Tableau->Afficher_corps();
		$Tableau->CréerFormulaireMAJ();
		$tampon = ob_get_contents();
		ob_clean();
	}
	else {
		$Tpost = [];
		foreach($_POST as $clé => $valeur)
			$Tpost[$clé] = (int)htmlspecialchars(stripslashes(trim($valeur)));
		$Tableau->TraiterFormulaireMAJ($Tpost);
		$tampon = '';
	}
	return $tampon;
}
