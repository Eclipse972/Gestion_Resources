function MAJ(champ, usine, type, valeur) { // factorisation
	var dico = { // titre en fonction du mot-clé
		"Niveau"	: "Niveau",
		"Production": "Production totale",
		"Quantite"	: "Quantité déja produite",
		"Temps"		: "Temps restant à produire (J-HH-MM)"
	};
	var ID = prompt(usine + " - " + dico[champ] + "?", valeur); // utiliser regex pour valider le texte renvoyé
	if (ID==null) { // appui sur annuler: on ne fait rien
	} else { // le champ doit être mis à jour
		window.location.assign('/Controleur/MAJUsine.php?champ=' + champ + '&type=' + ID + '&valeur=' + valeur);
	}
}

function NiveauUsine(usine, IDtype, valeur) {	MAJ('Niveau', usine, IDtype, valeur);}
/*
function ProductionUsine(nom, IDtype, valeur) {	MAJ('Production',	usine, IDtype, valeur); }

function QuantiteProduite(nom, IDtype, valeur) { MAJ('Quantite',	usine, IDtype, valeur); }

function TempsRestant(nom, IDtype, valeur) {	MAJ('Temps',		usine, IDtype, valeur); }
*/
