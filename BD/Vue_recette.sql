# Pépare la lise des ingédints pour chaque recette
CREATE VIEW Vue_recette AS
SELECT 
	ingredients.recette_ID AS ID,
	GROUP_CONCAT(
		ABS(ingredients.quantité),
		'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
		IF(ingredients.nature = 0,' + ',IF(ingredients.nature =1,' -> ',''))
	SEPARATOR '') as code
FROM ingredients, marchandise
WHERE ingredients.marchandise_ID = marchandise.ID
ORDER BY ingredients.nature ASC
GROUP BY ingredients.recette_ID;

# ordonnner les ingrédients
SELECT 
	ingredients.recette_ID AS ID,
	CONCAT(
		ABS(ingredients.quantité),
		'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
		IF(ingredients.nature = 0,' + ',IF(ingredients.nature =1,' -> ',''))
	) as code
FROM ingredients, marchandise
WHERE ingredients.marchandise_ID = marchandise.ID
ORDER BY ingredients.recette_ID ASC,ingredients.nature ASC;

# imbrication
SELECT ID, GROUP_CONCAT(code, SEPARATOR '') AS code
FROM (-- table des ingrédients préalablement triée correctement
	SELECT 
		ingredients.recette_ID AS ID,
		CONCAT(
			ABS(ingredients.quantité),
			'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
			IF(ingredients.nature = 0,' + ',IF(ingredients.nature =1,' -> ',''))
		) as code
	FROM ingredients, marchandise
	WHERE ingredients.marchandise_ID = marchandise.ID
	ORDER BY ingredients.recette_ID ASC,ingredients.nature ASC
) AS preparation
GROUP BY ID
ORDER BY ID DESC
