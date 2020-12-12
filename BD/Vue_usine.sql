CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	CONCAT('<a href="?id=',CAST(type_usine.ID AS CHAR),'#selection">') AS lien_rapport, # utilisé 2 fois
	CONCAT('<a href="formulaire.php?id=',CAST(type_usine.ID AS CHAR),'">') AS lien_formulaire, # idem
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	CONCAT(
		'\t\t<td><p id="gauche">',(SELECT lien_rapport),'<img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>\n\t\t\t',
		(SELECT lien_rapport),'<strong>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</strong></a>\n\t\t\t<p id="petite_image">',
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
		'<br>',(SELECT lien_formulaire),
		IF ((SELECT dureeProd) = 0, 'Production terminée', 'Temps de production restant: '),
		CASE FORMAT((SELECT dureeProd)/86400, 0)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT(FORMAT((SELECT dureeProd)/86400, 0),' jours ')
		END,
		CASE FORMAT((SELECT dureeProd)/3600, 0)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT(FORMAT((SELECT dureeProd)/3600, 0) % 24,' heures ')
		END,
		CASE FORMAT((SELECT dureeProd)/60, 0)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT(FORMAT((SELECT dureeProd)/60, 0) % 60,' minutes')
		END,
		'</a></p>\n\t\t</td>\n\t\t<td>',(SELECT lien_formulaire),CAST(usine.niveau AS CHAR),'</a></td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
