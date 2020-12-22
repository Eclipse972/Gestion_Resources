function OuvrirFormulaireMAJ(ID, image, alt, état, production, nombre) {
// hydratation du formulaire
document.formulaireMAJ.ID.value			= ID;
document.formulaireMAJ.image.src		= "Vue/images/" + image + ".png";
document.formulaireMAJ.image.alt		= alt;
document.formulaireMAJ.état.value		= état;
document.formulaireMAJ.production.value = production;
document.formulaireMAJ.nombre.value		= nombre;

div = document.getElementById("conteneur_formulaire");
div.style.visibility = "visible";
}
