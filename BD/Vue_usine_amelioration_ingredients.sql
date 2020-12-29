CREATE VIEW Vue_usine_amelioration_ingredients AS
SELECT
	usine.joueur_ID
	,type_usine.ID AS ID
	,marchandise.nom
	,-ingredient.quantité * POWER(usine.niveau+1,2) AS Qte #consommation est négative
	,entrepot.stock
	,IF((SELECT Qte) > entrepot.stock,(SELECT Qte) - entrepot.stock,0) AS  manque
	,IF (marchandise.cours_max = 0, marchandise.cours_ki, marchandise.cours_max) AS PU
	,(SELECT manque) * (SELECT PU) AS achat
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN recette ON type_usine.amelioration_ID = recette.ID
INNER JOIN ingredient ON ingredient.recette_ID = recette.ID
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN entrepot ON entrepot.marchandise_ID = marchandise.ID AND entrepot.joueur_ID = usine.joueur_ID
WHERE ingredient.nature = 0 #ingrédient de la recette
