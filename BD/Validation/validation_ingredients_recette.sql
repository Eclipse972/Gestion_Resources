# Liste les ingrédients de chaque recette
CREATE VIEW validation_produit_recette AS
SELECT
	nature_recette.nom AS nature,
	recette.nom AS recette,
	recette.ID AS ID_recette,
	IF(marchandise_ID = 1,'cout de production',IF(ingredients.quantité >0,'produit','ingédient')) AS type,
	marchandise.nom AS résultat,
	ingredients.quantité
FROM recette, ingredients, marchandise, nature_recette
WHERE
	ingredients.recette_ID = recette.ID			# jointure
AND	ingredients.marchandise_ID = marchandise.ID	# jointure
AND recette.nature_ID = nature_recette.ID		# jointure
ORDER BY ingredients.recette_ID ASC, ingredients.nature DESC
