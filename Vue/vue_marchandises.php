<p align="right">Derni&egrave;re mise à jour le :</p>
	<table>
	<thead>
	<tr>
		<th>Marchandise</th>
		<th>cours Ki-market</th>
		<th>cours max</th>
	</tr>
	</thead>
	<tbody>
<?php
	$base = new base2donnees;
	$T_ligne = $base->Marchandise();
	for($i=0;$i<count($T_ligne);$i++) {
		echo "\t",($T_ligne[$i]['ID'] == $id_selectionné) ? '<tr id="selection">' : '<tr>',"\n"; // pose d'une ancre sur la ligne sélectionnée
		echo "\t\t",'<td>',$T_ligne[$i]['marchandise'],'</td>',"\n";
		echo "\t\t",'<td>',number_format($T_ligne[$i]['cours_ki'],0, ',', ' '),'&euro;</td>',"\n";
		echo "\t\t",'<td>',number_format($T_ligne[$i]['cours_max'],0, ',', ' '),'&euro;</td>',"\n";
		if ($T_ligne[$i]['ID'] == $id_selectionné) {
			echo  "\t",'<tr><td colspan="3" id="rapport">';
			echo'd&eacute;tails en construction';
			echo'</td></tr>',"\n";
		}
		echo "\t",'</tr>',"\n";
	}
?>
	</tbody>
	</table>
