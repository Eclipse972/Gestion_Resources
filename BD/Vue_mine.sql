CREATE VIEW Vue_mine AS
SELECT
	type_mine.ID AS ID,
	CONCAT(
		'\t\t<td><a href="?id=',type_mine.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',type_mine.nom,'">',type_mine.nom,'</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM type_mine, marchandise
WHERE marchandise_ID = marchandise.ID
