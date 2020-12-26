<?php
class Joueur {
	private $IDjoueur;

public function Présentation() {
	echo"<p>Page de connexion en construction</p>\n";
}

public function Cadre_connexion() {
	ob_start();
	echo "<a href=\"index.php\">Connexion</a>\n";
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}

public function Inscrire() {
	// création d'un enregistrement dans la table joueur
	// création de la liste des usines
	// création de la liste des mines
	// création de la liste des entrepot
	// création de la liste des commerces
}

public function  Connecter() {
}

public function  Déconnecter() {
}

public function ValiderInscription() {
}

public function Désinscrire() {
	// création de la liste des usines
	// création de la liste des mines
	// création de la liste des entrepot
	// création de la liste des commerces
	// enfn supppression du compte

}

}
