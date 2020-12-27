<?php
function ExecuterRequete($sql, $T_paramètres, $messageDerreur = '') {
try	{
	include (file_exists('connexion.php') ? 'connexion.php' : '../connexion.php');
	$BD = new PDO($dsn, $utilisateur, $mdp); // On se connecte au serveur MySQL
	$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$requete = $BD->prepare($sql);
	foreach($T_paramètres as $clé => $valeur)
		$requete->bindValue($clé, $valeur, PDO::PARAM_INT);
	$requete->execute();
	switch(substr($sql, 0, 6)) {
		case 'SELECT':
			$TreponseBD = $requete->fetchall(PDO::FETCH_ASSOC);
			$TreponseBD = (count($TreponseBD) > 1) ? $TreponseBD : $TreponseBD[0];
			break;
		case 'UPDATE':
			$TreponseBD = null;
			break;
		case 'DELETE':
			$TreponseBD = null;
			break;
		default:
			 throw new Exception('Type de requ&ecirc;te inconnu !'); // possible d'ếtre attrappé par catch?
	}
}
catch (PDOException $e) { exit("Erreur {$messageDerreur}\nMessage SQL: {$e->getMessage()}"); }
$BD = null; // fermeture de la connexion
return $TreponseBD;
}
