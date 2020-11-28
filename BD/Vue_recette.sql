-- Vue pour l'affichage des recettes
-- /!\ dans l'affichage le code des image dans Phpmyadmin est remplacé par le balise alt de chaque image. Le code est nettement plus lisible mais c'est surpremnant.
CREATE VIEW Vue_recette AS
SELECT 
	ingredients.recette_ID AS ID,
	CONCAT(nature_recette.nom,' ',recette.nom) AS recette,
	GROUP_CONCAT(
		ABS(ingredients.quantité),
		'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
		IF(ingredients.nature = 0,' + ',IF(ingredients.nature =1,' -> ',''))
		ORDER BY ingredients.nature ASC SEPARATOR ''
	) AS code
FROM ingredients
INNER JOIN marchandise ON ingredients.marchandise_ID = marchandise.ID
INNER JOIN recette ON ingredients.recette_ID = recette.ID
INNER JOIN nature_recette ON recette.nature_ID  = nature_recette.ID
GROUP BY ingredients.recette_ID
