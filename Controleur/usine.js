function MAJ(champ, type, valeur) { // factorisation
	var dico = { // titre en fonction du mot-clé
		"Niveau"	: "Niveau",
		"Production": "Production totale",
		"Quantite"	: "Quantité déja produite",
		"Temps"		: "Temps restant à produire (J-HH-MM)"
	};
	var reponse = prompt(dico[champ] + "?", valeur); // utiliser regex pour valider le texte renvoyé
	if (reponse==null) { // appui sur annuler: on ne fait rien
	} else { // le champ doit être mis à jour
		window.location.assign('/Controleur/MAJUsine.php?champ=' + champ + '&type=' + type + '&valeur=' + reponse);
	}
}

function NiveauUsine(IDtype, valeur) {		MAJ('Niveau',	IDtype, valeur); }

function ProductionUsine(IDtype, valeur) {	MAJ('Production',IDtype,valeur); }

function QuantiteProduite(IDtype, valeur) { MAJ('Quantite',	IDtype, valeur); }

function TempsRestant(IDtype, valeur) {		MAJ('Temps',	IDtype, valeur); }

