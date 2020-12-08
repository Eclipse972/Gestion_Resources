<?php
// remplissage de la table commerce
try	{
	include 'connexion.php'; // les variables de connexion sont définies dans ce script non suivi par git
	$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$requete = $BD->prepare('INSERT INTO commerce (joueur_ID, marchandise_ID, ordre_affichage) VALUES (:IDJoueur, :marchandise_ID, :place)');
	for ($IDJoueur=1; $IDJoueur<3; $IDJoueur++)
		for($marchandise_ID=3; $marchandise_ID<61; $marchandise_ID++)
			$requete->execute(array(':IDJoueur'=>$IDJoueur, ':marchandise_ID'=>$marchandise_ID, ':place'=>$marchandise_ID-2));
} catch (PDOException $e) {
	exit('Erreur : '.$e->getMessage());
}
$BD = null; // on ferme la connexion
echo "fin sans encombre";
