function OuvrirFormulaireMAJ(image, alt, niveau, production, jour, heure, minute) {
// modification du formulaire
document.formulaireMAJ.image.src		= "Vue/images/" + image + ".png";
document.formulaireMAJ.image.alt		= alt;
document.formulaireMAJ.niveau.value		= niveau;
document.formulaireMAJ.production.value = production;
document.formulaireMAJ.jour.value		= jour;
document.formulaireMAJ.heure.value		= heure;
document.formulaireMAJ.minute.value		= minute;

// affichage
div = document.getElementById("conteneur_formulaire");
div.style.visibility = "visible";
}

function FermerFormulaireMAJ() {
div = document.getElementById("conteneur_formulaire");
div.style.visibility = "hidden";
}

function MAJ(methode, type_usineID, valeur, expreg = '[0-9]+') { // factorisation
var question = {
	"Niveau"		: "Niveau de l'usine",
	"Production"	: "Production totale",
	"TempsProdRestant"	: "Temps restant à produire (J-HH-mm)"
};
var reponse = prompt(question[methode] + "?", valeur);
if (reponse != null) {
	const regex = RegExp('^' + expreg + '$');
	if (regex.test(reponse))
		window.location.assign('/Controleur/MAJUsine.php?methode=' + methode + '&type_usineID=' + type_usineID + '&valeur=' + reponse);
	else alert('Format invalide');
} // sinon on ne fait rien car annulation
}

function NiveauUsine(type_usineID, valeur) { MAJ('Niveau', type_usineID, valeur); }

function TempsProdRestant(type_usineID) { MAJ('TempsProdRestant', type_usineID, '', '[0-9]+-[0-2][0-9]-[0-5][0-9]'); }

function ProductionUsine(type_usineID, valeur) { MAJ('Production', type_usineID, valeur); }
