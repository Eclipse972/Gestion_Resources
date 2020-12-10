CREATE VIEW Vue_usine AS
SELECT 
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	CONCAT(
		'\t\t<td><p id="gauche"><a href="?id=',CAST(type_usine.ID AS CHAR),'#selection"><img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>\n',
		'\t\t\t<a href="?id=',CAST(type_usine.ID AS CHAR),'#selection"><strong>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</strong></a>\n\t\t\t<p id="petite_image">',
		(SELECT GROUP_CONCAT( # requête qui crée la recette
					REPLACE(CAST(FORMAT(ABS(ingredient.quantité),0) AS CHAR),',',' '),
					'\t<img src="Vue/images/',marchandise.image,'.png" alt ="',marchandise.nom,'">',
					IF(ingredient.nature = 0,' + ',IF(ingredient.nature =1,' -> ',''))
					ORDER BY ingredient.nature ASC SEPARATOR ''
				) AS code
			FROM ingredient
			INNER JOIN marchandise ON ingredient.marchandise_ID = marchandise.ID
			WHERE ingredient.recette_ID = type_usine.production_ID
		),
		'</p>\n\t\t</td>\n\t\t<td><a href="formulaire.php">',CAST(usine.niveau AS CHAR),'</a></td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code,
	type_usine.nom AS nom_ligne
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
