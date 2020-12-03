# Liste les ingrédients de chaque recette
CREATE VIEW validation_produit_recette AS
SELECT
	nature_recette.nom AS nature,
	recette.nom AS recette,
	recette.ID AS ID_recette,
	IF(marchandise_ID = 1,'cout',IF(ingredient.quantité >0,'produit','ingédient')) AS type,
	marchandise.nom AS résultat,
	ingredient.quantité
FROM recette
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN nature_recette ON recette.nature_ID = nature_recette.ID
ORDER BY ingredient.recette_ID ASC, ingredient.nature DESC
