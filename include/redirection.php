<?php
//header("Status: 200 OK", false, 200); // permet de garder l'URL transformée dans la barre d'adresse
// décomposition de l'adresse
list(/* adresse commence par / */, $ONGLET, $LIGNE) = explode('/', $adresse, 3);

// test du format des paramètres
$motif = '#^[a-z]+_?[a-z]+$#';	// chaque variable est composé uniquement de minuscules avec éventuellement un _ comme séparateur

if (!preg_match($motif, $ONGLET)) {	// onglet non conforme
	$ONGLET = '';
	$CODE_ERREUR = 4;
}
/*
if ($LIGNE == '') { // on ne fait rien
	}
elseif (!preg_match($motif, $LIGNE)) {	// ligne non conforme
	$ONGLET = '';
	$CODE_ERREUR = 5;
} /*else {	// recherche de l'ID de la ligne
}*/
