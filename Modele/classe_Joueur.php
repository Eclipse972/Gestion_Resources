<?php
class Joueur {
	private $IDjoueur;
	
public function Présentation() {
	echo"<p>Page de connexion en construction</p>\n";
}

public function Cadre_connexion() {
	ob_start();
	echo '<a href="index.php">Connexion</a>';
	$code = ob_get_contents();
	ob_end_clean();
	return $code;
}
}
