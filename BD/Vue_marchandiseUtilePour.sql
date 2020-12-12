CREATE VIEW Vue_marchandiseUtilePour AS 
SELECT
	ingredient.marchandise_ID,
	marchandise.nom AS marchandise,
	CONCAT(nature_recette.nom,
		IF(LEFT(recette.nom,1) IN ('a', 'e', 'i', 'o', 'u'),' d&apos;', ' de '),
		recette.nom) AS nom
FROM marchandise
INNER JOIN ingredient ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN recette ON ingredient.recette_ID = recette.ID
INNER JOIN nature_recette ON recette.nature_ID = nature_recette.ID
WHERE ingredient.nature = 0
ORDER BY ingredient.marchandise_ID ASC
