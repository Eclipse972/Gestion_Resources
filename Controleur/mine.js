function MAJ(methode, type_mineID, valeur, expreg = '[0-9]+') { // factorisation
var question = {
	"Etat"		: "Etat de la mine",
	"Production": "Production maximale",
	"Nombre"	: "Nombre de mine"
};
var reponse = prompt(question[methode] + "?", valeur);
if (reponse != null) {
	const regex = RegExp('^' + expreg + '$');
	if (regex.test(reponse))
		window.location.assign('/Controleur/MAJMine.php?methode=' + methode + '&type_mineID=' + type_mineID + '&valeur=' + reponse);
	else alert('Format invalide');
} // sinon on ne fait rien car annulation
}

function Nombre(type_mineID, valeur) { MAJ('Nombre', type_mineID, valeur); }

function Production(type_mineID, valeur) { MAJ('ProdMax', type_mineID, valeur); }

function Etat(type_mineID, valeur) { MAJ('Etat', type_mineID, valeur, '([0-9]{1,2}|100)'); }
