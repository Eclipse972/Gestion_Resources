-- Vue pour l'affichage des recettes
-- /!\ dans l'affichage le code des image dans Phpmyadmin est remplacé par le balise alt de chaque image. Le code est nettement plus lisible mais c'est surpremnant.
CREATE VIEW Vue_recette AS
SELECT 
	ingredients.recette_ID AS ID,
	GROUP_CONCAT(
		ABS(ingredients.quantité),
		'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
		IF(ingredients.nature = 0,' + ',IF(ingredients.nature =1,' -> ',''))
		ORDER BY ingredients.nature ASC SEPARATOR ''
	) as code
FROM ingredients
INNER JOIN marchandise ON ingredients.marchandise_ID = marchandise.ID
GROUP BY ingredients.recette_ID
