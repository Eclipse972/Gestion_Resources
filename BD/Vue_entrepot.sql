CREATE VIEW Vue_entrepot AS
SELECT 
	marchandise.ID,
	CONCAT(
		'\t\t<td><a href="?id=',marchandise.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'">',marchandise.nom,'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),'</td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),' ',unites.nom,'/h</td>\n'
	) AS code,
	marchandise.nom AS nom_ligne
FROM marchandise, unites
WHERE marchandise.unité_ID = unites.ID AND
marchandise.nature_ID BETWEEN 1 AND 2
