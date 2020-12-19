CREATE VIEW Vue_entrepot AS
SELECT
	entrepot.marchandise_ID AS ID,
	entrepot.joueur_ID AS IDjoueur,
	entrepot.niveau * entrepot.niveau * 5000 AS capacité,
	CONCAT(
		'\t\t<td><a href="?id=',entrepot.marchandise_ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'"><strong>',
		UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</strong></a>',
		IF((SELECT capacité) >= entrepot.stock, '', '<span style="background-color:red"> Niveau (capacit&eacute;) et stock incoh&eacute;rents </span>'),
		'</td>\n\t\t<td>',
		'<a onclick="Niveau(',CAST(marchandise.ID AS CHAR),',',CAST(entrepot.niveau AS CHAR),')">',
		CAST(entrepot.niveau AS CHAR),'</a></td>\n\t\t<td>',
		REPLACE(CAST(FORMAT(entrepot.niveau * entrepot.niveau * 5000,0) AS CHAR),',',' '),' ',unites.nom,'</td>\n\t\t<td>',
		'<a onclick="Stock(',CAST(marchandise.ID AS CHAR),',',CAST(entrepot.stock AS CHAR),')">',
		REPLACE(CAST(FORMAT(entrepot.stock,0) AS CHAR),',',' '),' ',unites.nom,'</a></td>\n'
	) AS code
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID > 0
