CREATE VIEW Vue_mine AS
SELECT
	type_mine.ID,
	CONCAT(
		'\t\t<td><a href="?id=',type_mine.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',type_mine.nom,'">',
		UCASE(LEFT(type_mine.nom,1)),SUBSTRING(type_mine.nom,2,LENGTH(type_mine.nom)),'</a></td>\n',
		'\t\t<td>(état)%</td>\n',
		'\t\t<td>(nombre)</td>\n',
		'\t\t<td>(production) ',unites.nom,'</td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM type_mine
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
