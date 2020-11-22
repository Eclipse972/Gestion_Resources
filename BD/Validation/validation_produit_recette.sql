# cherche incohérences nom recette et produit de la recette
CREATE VIEW validation_produit_recette AS
SELECT
	nature_recette.nom AS nature,
	recette.nom AS recette,
	recette.ID AS ID_recette,
	marchandise.nom AS résultat,
	ingredients.quantité
FROM recette, ingredients, marchandise, nature_recette
WHERE
	ingredients.recette_ID = recette.ID			# jointure
AND	ingredients.marchandise_ID = marchandise.ID	# jointure
AND recette.nature_ID = nature_recette.ID		# jointure
AND ingredients.quantité > 0					# quantité produite
AND marchandise.ID > 2							# ni argent ni caisse
AND recette.nom <> marchandise.nom				# incohérence entre nom et résultat
