<?php
session_start(); // On démarre la session
require'Modele/classe_BD.php';
require'Modele/classe_Tableau.php';

// ID de la marchandise
$id_selectionné = (int) $_GET['id'];

define(ONGLET_ACTIF, 2);

include 'Vue/doctype.html';
