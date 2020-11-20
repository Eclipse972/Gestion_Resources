<?php
session_start(); // On démarre la session
require 'Modele/classe_BD.php';
require'Modele/classe_Tableau.php';

define(ONGLET_ACTIF, 1);

include('Vue/doctype.html');
