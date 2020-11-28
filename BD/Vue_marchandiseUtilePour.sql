CREATE VIEW Vue_marchandiseUtilePour AS
SELECT
	marchandise.ID,
	marchandise.nom,
	GROUP_CONCAT('\t\t<li>',
		nature_recette.nom, 
		IF (LEFT(recette.nom,1) IN ( 'a', 'e', 'i', 'o', 'u'),' d&apos;',' de '),
		recette.nom,'</li>\n'
		SEPARATOR '') AS code
FROM recette
INNER JOIN ingredients		ON ingredients.recette_ID		= recette.ID
INNER JOIN marchandise		ON ingredients.marchandise_ID	= marchandise.ID
INNER JOIN nature_recette	ON recette.nature_ID			= nature_recette.ID
WHERE ingredients.nature = 0
GROUP BY marchandise.ID
ORDER BY marchandise.ID ASC
