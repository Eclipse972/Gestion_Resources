<?php
/***************************************************************************************************************************************************************
* Objectif: Importer les prix à partirdu fichier CSV du site Resource helper à l'adresse: https://resources-helper.de/#pricehistory
* 1- récupérer le fichier CSV sur le site resources-helper et le mettre sur le serveur de ma page perso
* 2- nettoyer le fichier: seules les première et dernière lignes sont utiles
* 3- extriare les prix de chaque marchandise et les mettre dans ma BD
****************************************************************************************************************************************************************/

function Récupérer_fichier() {
	// piste à explorer fsockopen
}

function Nettoyer_fichier() {
	// ouvrir le fichier et ne garder que les première et dernières lignes
	// transformer chaque colonne en ligne nom - valeur
	// créer une table import avec comme champs: ID, ki, max
	
}

function MAJ_BD() {
	// MAJ table marchandise avec la table import
	// supprimer la table import
}


