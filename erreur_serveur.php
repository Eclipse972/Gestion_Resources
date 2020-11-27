<?php	// permet de prendre en charge les erreurs coté serveur indiquées dans .htaccess
session_start(); // On démarre la session AVANT toute chose
$_SESSION['erreur'] = $_GET['erreur'];	// code erreur transmis par l'URL sauvegardé dans la session
header("Location: http://gestion.resources.free.fr/erreur.php"); // redirection vers la page d'erreur
?>
