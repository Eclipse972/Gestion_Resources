<?php
// import des prix à partir de l'URL http://r.jakumo.org/prices.php
// free ne permet pas la lecture de fichier ailleurs que chez
// Warning: file(http://r.jakumo.org/prices.php): failed to open stream: Connection timed out in /var/www/sdb/b/4/gestion.resources/essai_importPrix.php on line 3
// vérifier si le serveur refuse de lire une page en dehors de la page perso. Fonctionne avce  http://gestion.resources.free.fr mais pas avec dossiers.techniques.free.fr
$Tligne = fopen("http://dossiers.techniques.free.fr", "r");

// Affiche toutes les lignes du tableau comme code HTML, avec les numéros de ligne
/*if ($Tligne)
	foreach ($Tligne as $line_num => $line)	echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
else echo "échec de connexio";
*/
