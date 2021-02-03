<?php
function Paramètre_erreur() { return (isset($_GET['erreur'])) ? intval($_GET['erreur']) : null; }
// reste à tester que la valeur est dans e bon intervalle

$CODE_ERREUR = Paramètre_erreur();
