CREATE VIEW Vue_marchandiseAbesoin AS
SELECT
	marchandise.ID,
	GROUP_CONCAT('\t\t<li>',marS.nom,'</li>\n' SEPARATOR '') AS code
FROM recette
INNER JOIN ingredients		ON ingredients.recette_ID		= recette.ID
INNER JOIN marchandise		ON ingredients.marchandise_ID	= marchandise.ID
INNER JOIN nature_recette	ON recette.nature_ID			= nature_recette.ID

INNER JOIN ingredients ingS	ON ingS.recette_ID		= recette.ID
INNER JOIN marchandise marS	ON ingS.marchandise_ID	= marS.ID

WHERE ingredients.nature = 2 AND ingS.nature = 0
GROUP BY marchandise.ID
ORDER BY marchandise.ID ASC
