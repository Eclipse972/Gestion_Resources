CREATE VIEW Vue_marchandiseABesoinDe AS
SELECT
	ingredient.marchandise_ID,
	marchandise.nom AS produit,
	marS.nom
FROM recette
INNER JOIN ingredient		ON ingredient.recette_ID		= recette.ID
INNER JOIN marchandise		ON ingredient.marchandise_ID	= marchandise.ID
INNER JOIN nature_recette	ON recette.nature_ID			= nature_recette.ID
INNER JOIN ingredient ingS	ON ingS.recette_ID		= recette.ID
INNER JOIN marchandise marS	ON ingS.marchandise_ID	= marS.ID
WHERE ingredient.nature = 2 AND ingS.nature = 0
ORDER BY ingredient.marchandise_ID ASC
