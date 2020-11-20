<?php
session_start(); // On démarre la session

// ID de la mine
$id_selectionné = (int) $_GET['id'];

define(ONGLET_ACTIF, 4);

include 'Vue/doctype.html';
