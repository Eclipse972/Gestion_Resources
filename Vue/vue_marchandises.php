<h1>Page marchandises en construction</h1>
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
		echo "\t\t",'<td>',$T_ligne[$i]['cours_ki'],'</td>',"\n";
		echo "\t\t",'<td>',$T_ligne[$i]['cours_max'],'</td>',"\n";
		if ($T_ligne[$i]['ID'] == $id_selectionné) {
			echo  "\t",'<tr><td colspan="3">Marchandise s&eacute;lectionn&eacute;e</td></tr>',"\n";
		}
		echo "\t",'</tr>',"\n";
	}
?>
	</tbody>
	</table>
