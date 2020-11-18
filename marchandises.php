<?php
session_start(); // On démarre la session
require 'Modele/classe_BD.php';

$liste_ordre = array (
//	ordre => script. Pour ajouter un nouvel ordre il suffira d'ajouter une ligne
	'detail' => 'detail_marchandise',
	'MAJ'	 => 'MAJ_prix'
);

// ID de la marchandise
$id_selectionné = (int) $_GET['id'];

define(ONGLET_ACTIF, 2);

include 'Vue/doctype.html';
