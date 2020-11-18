<?php
session_start(); // On démarre la session
require 'Modele/classe_BD.php';
define(ONGLET_ACTIF, 3);

include('Vue/doctype.html');
