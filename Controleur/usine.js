function MAJ(caracteristique, type_usineID, valeur, expreg = '[0-9]{1,}') { // factorisation
var question = {
	"Niveau"	: "Niveau de l'usine",
	"Production": "Production totale",
	"Quantite"	: "Quantité déja produite",
	"Temps"		: "Temps restant à produire (J-HH-mm)"
};

var reponse = prompt(question[caracteristique] + "?", valeur); // utiliser regex pour valider le texte renvoyé
const regex = RegExp('^' + expreg + '$');

if (regex.test(reponse)) {
	if (expreg != '[0-9]{1,}') { // c'est une durée au format J-HH-mm
		eclatement = reponse.split('-');
		// extraction du nombre de ...
		jour	= eclatement[0];
		heure	= eclatement[1];
		minute	= eclatement[2];
		reponse = 60*minute + 3600*heure + 86400*jour; // conversion en secondes
	}
	window.location.assign('/Controleur/MAJUsine.php?champ=' + caracteristique + '&type=' + type_usineID + '&valeur=' + reponse);
}
}

function NiveauUsine(IDtype, valeur) { MAJ('Niveau',	IDtype, valeur); }

function TempsProdRestant(IDtype) { MAJ('Temps', IDtype, '', '[0-9]+-[0-2][0-9]-[0-5][0-9]'); }

function ProductionUsine(IDtype, valeur) { MAJ('Production',IDtype,valeur); }
