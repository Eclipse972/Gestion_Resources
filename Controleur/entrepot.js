function MAJ(methode, marchandise_ID, valeur, expreg = '[0-9]+') { // factorisation
var question = {
	"Niveau": "Niveau de l'entrepot",
	"Stock"	: "Quantité en stock"
};
var reponse = prompt(question[methode] + "?", valeur);
if (reponse != null) {
	const regex = RegExp('^' + expreg + '$');
	if (regex.test(reponse))
		window.location.assign('/Controleur/MAJEntrepot.php?methode=' + methode + '&marchandise_ID=' + marchandise_ID + '&valeur=' + reponse);
	else alert('Format invalide');
} // sinon on ne fait rien car annulation
}

function Niveau(marchandise_ID, valeur) { MAJ('Niveau', marchandise_ID, valeur); }

function Stock(marchandise_ID, valeur) { MAJ('Stock', marchandise_ID, valeur); }
