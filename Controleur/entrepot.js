function OuvrirFormulaireMAJ(ID, image, alt, niveau, stock) {
// modification du formulaire
document.formulaireMAJ.ID.value			= ID;
document.formulaireMAJ.image.src		= "Vue/images/" + image + ".png";
document.formulaireMAJ.image.alt		= alt;
document.formulaireMAJ.niveau.value		= niveau;
document.formulaireMAJ.stock.value		= stock;

div = document.getElementById("conteneur_formulaire");
div.style.visibility = "visible";
}
