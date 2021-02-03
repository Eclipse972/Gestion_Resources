<?php
function Paramètre_champ() { return (isset($_GET['champ'])) ? intval($_GET['champ']) : null; }
// reste à tester que la valeur est dans e bon intervalle
