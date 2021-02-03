<?php
function Paramètre_ligne() { return (isset($_GET['ligne'])) ? intval($_GET['ligne']) : null; }
// reste à tester que la valeur est dans e bon intervalle

$_SESSION['ligne'] = Paramètre_ligne();

