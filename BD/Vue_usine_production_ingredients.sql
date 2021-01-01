CREATE VIEW Vue_usine_production_ingredients AS
SELECT
	usine.joueur_ID
	,type_usine.ID AS ID
	,marchandise.nom
	,usine.prod_en_cours / résultat.quantité AS coef #-- coefficient multiplicateur pour la recette de production
	,ROUND(-ingredient.quantité * (SELECT coef)) AS Qte #consommation est négative
	,CONCAT('\t\t<tr><td>',marchandise.nom
			,'</td><td>',REPLACE(CAST(FORMAT((SELECT Qte) ,0) AS CHAR),',',' '),' ',unites.nom
			,'</td></tr>\n') AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN recette ON type_usine.production_ID = recette.ID
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
INNER JOIN ingredient AS résultat ON résultat.recette_ID = recette.ID
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE ingredient.nature = 0 # ingrédient de la recette
	AND résultat.nature = 2	# résultat de la recette
