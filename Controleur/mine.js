function OuvrirFormulaireMAJ(ID, image, alt, état, production, nombre) {
// hydratation du formulaire
document.formulaireMAJ.ID.value			= ID;
document.formulaireMAJ.image.src		= "Vue/images/" + image + ".png";
document.formulaireMAJ.image.alt		= alt;
document.formulaireMAJ.état.value		= état;
document.formulaireMAJ.production.value = production;
document.formulaireMAJ.nombre.value		= nombre;

document.getElementById("conteneur_formulaire").style.visibility = "visible";
}
