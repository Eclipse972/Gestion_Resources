CREATE VIEW Vue_marchandiseAbesoin AS
SELECT
	marchandise.ID,
	marchandise.nom,
	GROUP_CONCAT('\t\t<li>',marS.nom,'</li>\n' SEPARATOR '') AS code
FROM recette
INNER JOIN ingredient		ON ingredient.recette_ID		= recette.ID
INNER JOIN marchandise		ON ingredient.marchandise_ID	= marchandise.ID
INNER JOIN nature_recette	ON recette.nature_ID			= nature_recette.ID

INNER JOIN ingredient ingS	ON ingS.recette_ID		= recette.ID
INNER JOIN marchandise marS	ON ingS.marchandise_ID	= marS.ID

WHERE ingredient.nature = 2 AND ingS.nature = 0
GROUP BY marchandise.ID
ORDER BY marchandise.ID ASC
