CREATE VIEW Vue_usine_prochaineProduction_coutFixe AS
SELECT
	usine.joueur_ID
	,type_usine.ID AS ID
	,ROUND(ingredient.quantité * usine.prod_souhaitee / résultat.quantité) AS somme
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN recette ON type_usine.amelioration_ID = recette.ID
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
INNER JOIN ingredient AS résultat ON résultat.recette_ID = recette.ID
WHERE ingredient.nature = 1
	AND résultat.nature = 2	# résultat de la recette
