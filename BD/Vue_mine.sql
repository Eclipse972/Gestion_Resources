CREATE VIEW Vue_mine AS
SELECT
	type_mine.ID,
	CONCAT(
		'\t\t<td><a href="?id=',type_mine.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',type_mine.nom,'"></a></td>\n',
		'\t\t<td><a href="?id=',type_mine.ID,'#selection">',type_mine.nom,'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),' ',unites.nom,'/h</td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM type_mine, marchandise, unites
WHERE type_mine.marchandise_ID = marchandise.ID
AND marchandise.unité_ID = unites.ID
