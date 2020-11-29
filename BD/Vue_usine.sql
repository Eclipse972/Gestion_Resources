CREATE VIEW Vue_usine AS
SELECT 
	type_usine.ID,
	CONCAT(
		'\t\t<td><p><a href="?id=',type_usine.ID,'#selection"><img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>',
		'\t<a href="?id=',type_usine.ID,'#selection"><h1>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</h1></a>',
		'<p>(recette)</p></td>\n',
		'\t\t<td>(niveau)</td>\n',
		'\t\t<td>(production) ',unites.nom,'/h</td>\n'
	) AS code,
	type_usine.nom AS nom_ligne
FROM type_usine
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
