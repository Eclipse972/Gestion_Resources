<?php
session_start();
function Nettoyer($donnée_numérique) { return (int) htmlspecialchars(stripslashes(trim($donnée_numérique))); }	// nettoie et convertit en entier

function MiseAJour($type_usineID, $champ, $valeur) {
	try	{
		include'../connexion.php';
		$BD = new PDO($dsn, $utilisateur, $mdp);
		$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$requete = $BD->prepare("UPDATE usine SET {$champ} = :valeur WHERE usine.joueur_ID = :IDjoueur AND usine.type_usine_ID = :ID");
		$requete->bindValue(':valeur',	$valeur,				PDO::PARAM_INT);
		$requete->bindValue(':IDjoueur',$_SESSION['IDjoueur'],	PDO::PARAM_INT);
		$requete->bindValue(':ID',		$type_usineID,			PDO::PARAM_INT);
		$requete->execute();
	} catch (PDOException $e) { exit('Erreur traitement formulaire: '.$e->getMessage()); }
	$BD = null;
}

$champ = $_GET['champ']; // nettoyage à prévoir
$type_usineID = Nettoyer($_GET['type']); // validation à prévoir
$valeur = Nettoyer($_GET['valeur']);
switch($champ) {
	case 'Niveau':
		MiseAJour($type_usineID, 'niveau', $valeur);
		break;
	/*case 'Production':
		MiseAJour($type_usineID, 'production', $valeur);
		break;
	case 'Quantite':
		MiseAJour($type_usineID, champ?, $valeur);
		break;
	case 'Temps':
		// calcul de la date de fin de production à faire
		MiseAJour($type_usineID, champ?, $valeur);
		break;*/
	default: // doit générer une erreur
/* J'ai testé $_SERVER['HTTP_REFERER'] mais ça renvoie à cette page qui est blanche.
 * et ça fonctionne uniquement quand le visiteur a cliqué sur un lien. Le lancement de cette page ne viens pas d'un lien oridnaire */
}
?>
<script>
	window.history.go(-1);
</script>
