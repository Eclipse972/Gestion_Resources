CREATE VIEW Vue_amélioration_usine AS
SELECT 
	type_usine.ID,
	type_usine.nom,
	GROUP_CONCAT('\t\t<li>',ABS(ingredients.quantité),' ',marchandise.nom,'</li>\n'
	ORDER BY ingredients.nature DESC, ingredients.quantité ASC SEPARATOR '') AS code
FROM type_usine
INNER JOIN recette ON type_usine.amelioration_ID = recette.ID
INNER JOIN ingredients ON ingredients.recette_ID = recette.ID
INNER JOIN marchandise ON ingredients.marchandise_ID = marchandise.ID
GROUP BY type_usine.ID
ORDER BY type_usine.ID ASC
