CREATE VIEW Vue_usine AS
SELECT 
	type_usine.ID,
	CONCAT(
		'\t\t<td><a href="?id=',type_usine.ID,'#selection"><img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'">',type_usine.nom,'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),'</td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),' ',unites.nom,'/h</td>\n'
	) AS code,
	type_usine.nom AS nom_ligne
FROM type_usine, marchandise, unites
WHERE type_usine.marchandise_ID = marchandise.ID
AND marchandise.unité_ID = unites.ID
