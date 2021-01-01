CREATE VIEW Vue_recette AS
SELECT type_usine.ID AS ID,
	GROUP_CONCAT(
		IF(ingredient.quantité < 0, -ingredient.quantité, ingredient.quantité)
		,'<img src="Vue/images/',marchandise.image,'.png" alt="',marchandise.nom,'">"'
		,marchandise.nom
		,CASE ingredient.nature
			WHEN 0 THEN ' +'
			WHEN 1 THEN ' ->'
			ELSE ''
		END
	ORDER BY ingredient.nature ASC
	SEPARATOR ' ') AS formule
FROM ingredient
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN type_usine ON type_usine.production_ID = ingredient.recette_ID
GROUP BY ingredient.recette_ID
