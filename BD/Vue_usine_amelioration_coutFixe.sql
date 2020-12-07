CREATE VIEW Vue_usine_amelioration_coutFixe AS 
SELECT
	usine.joueur_ID
	,usine.ID
	,ingredient.quantité * POWER(usine.niveau+1,2) AS somme
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN recette ON type_usine.amelioration_ID = recette.ID
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
WHERE ingredient.nature = 1
