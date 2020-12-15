function NiveauUsine(nom, type, valeur) {
	var ID = prompt('Niveau ' +  nom, valeur);
	if (ID==null) {
		window.location.assign('http://gestion.resources.free.fr/index.php');
	} else {
		window.location.assign('http://gestion.resources.free.fr/index.php?id=' + ID);
	}
}
