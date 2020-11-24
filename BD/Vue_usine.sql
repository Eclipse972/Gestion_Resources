CREATE VIEW Vue_usine AS
SELECT 
	type_usine.ID,
	CONCAT(
		'\t\t<td><a href="?id=',type_usine.ID,'#selection"><img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></td>',
		'\t\t<td><a href="?id=',type_usine.ID,'#selection"><h1>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</h1></a><p>(recette)</p></td>\n',
		'\t\t<td>(niveau)</td>\n',
		'\t\t<td>(production) ',unites.nom,'/h</td>\n'
	) AS code,
	type_usine.nom AS nom_ligne
FROM type_usine, marchandise, unites
WHERE type_usine.marchandise_ID = marchandise.ID
AND marchandise.unité_ID = unites.ID
