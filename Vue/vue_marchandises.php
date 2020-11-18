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
		echo "\t",'<tr>',"\n";
		echo "\t\t",'<td>',$T_ligne[$i]['marchandise'],'</td>',"\n";
		echo "\t\t",'<td>',$T_ligne[$i]['cours_ki'],'</td>',"\n";
		echo "\t\t",'<td>',$T_ligne[$i]['cours_max'],'</td>',"\n";
		echo "\t",'</tr>',"\n";
	}
?>
	</tbody>
	</table>
