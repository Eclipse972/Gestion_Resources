<?php
$Tableau = new TMarchandise('ind&eacute;termin&eacute;e');
$Tableau->Afficher_tete();
$Tableau->Afficher_corps('Vue_marchandise',3,$id_selectionné); // paramètre id_selectionné défini dans marchandise.php
