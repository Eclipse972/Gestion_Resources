CREATE VIEW Vue_début_recette AS
SELECT 
	type_usine.ID,
	CONCAT('En produire: ',recette.production_base,unites.nom,
	' co&ucirc;te ',REPLACE(FORMAT(ingredients.quantité ,0),',', ' '),'&euro;') AS code
FROM type_usine, marchandise, recette, unites, ingredients
WHERE type_usine.marchandise_ID = marchandise.ID
AND type_usine.production_ID = recette.ID
AND marchandise.unité_ID = unites.ID
AND ingredients.recette_ID = recette.ID
AND ingredients.marchandise_ID = 1
