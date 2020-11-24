CREATE VIEW Vue_entrepot AS
SELECT 
	marchandise.ID,
	CONCAT(
		'\t\t<td><a href="?id=',marchandise.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'"></a></td>\n',
		'\t\t<td><a href="?id=',marchandise.ID,'#selection">',UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</a></td>\n',
		'\t\t<td>(niveau)</td>\n',
		'\t\t<td>(stock) ',unites.nom,'/h</td>\n'
	) AS code,
	marchandise.nom AS nom_ligne
FROM marchandise, unites
WHERE marchandise.unité_ID = unites.ID AND
marchandise.nature_ID BETWEEN 1 AND 2
