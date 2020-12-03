-- Vue pour l'affichage des recettes
-- /!\ dans l'affichage le code des image dans Phpmyadmin est remplacé par le balise alt de chaque image. Le code est nettement plus lisible mais c'est surpremnant.
CREATE VIEW Vue_recette AS
SELECT 
	ingredient.recette_ID AS ID,
	CONCAT(nature_recette.nom,' ',recette.nom) AS recette,
	GROUP_CONCAT(
		ABS(ingredient.quantité),
		'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
		IF(ingredient.nature = 0,' + ',IF(ingredient.nature =1,' -> ',''))
		ORDER BY ingredient.nature ASC SEPARATOR ''
	) AS code
FROM ingredient
INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
INNER JOIN recette ON ingredient.recette_ID = recette.ID
INNER JOIN nature_recette ON recette.nature_ID  = nature_recette.ID
GROUP BY ingredient.recette_ID
