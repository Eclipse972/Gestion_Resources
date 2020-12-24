function OuvrirFormulaireMAJ(ID, image, alt, niveau, production, jour, heure, minute) {
// modification du formulaire
document.formulaireMAJ.image.src		= "Vue/images/" + image + ".png";
document.formulaireMAJ.image.alt		= alt;
document.formulaireMAJ.niveau.value		= niveau;
document.formulaireMAJ.production.value = production;
document.formulaireMAJ.jour.value		= jour;
document.formulaireMAJ.heure.value		= heure;
document.formulaireMAJ.minute.value		= minute;
document.formulaireMAJ.ID.value			= ID;

document.getElementById("conteneur_formulaire").style.visibility = "visible";
}
