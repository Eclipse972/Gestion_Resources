CREATE VIEW Vue_usine_production_ingredients AS
SELECT
	usine.joueur_ID
	,type_usine.ID AS ID
	,IF (marchandise.cours_max = 0, marchandise.cours_ki, marchandise.cours_max) AS PU
	,marchandise.nom

	,type_usine.prod_niveau1 * usine.niveau / résultat.quantité AS coef #-- coefficient multiplicateur pour la recette de production

	,-ingredient.quantité * (SELECT coef) AS Qte #consommation est négative
	,(SELECT Qte) * (SELECT PU) AS cout
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN recette ON type_usine.production_ID = recette.ID
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
INNER JOIN ingredient AS résultat ON résultat.recette_ID = recette.ID
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN entrepot ON entrepot.marchandise_ID = marchandise.ID AND entrepot.joueur_ID = usine.joueur_ID
WHERE ingredient.nature = 0 # ingrédient de la recette
	AND résultat.nature = 2	# résultat de la recette
