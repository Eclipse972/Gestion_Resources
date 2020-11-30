CREATE VIEW Vue_usine AS
SELECT 
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	CONCAT(
		'\t\t<td><p id="gauche"><a href="?id=',type_usine.ID,'#selection"><img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>\n',
		'\t\t\t<a href="?id=',type_usine.ID,'#selection"><h1>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</h1></a>\n',
		'\t\t\t<p id="petite_image">',Vue_recette.code,'</p>\n\t\t</td>\n',
		'\t\t<td>',usine.niveau,'</td>\n',
		'\t\t<td>',type_usine.prod_niveau1*usine.niveau,' ',unites.nom,'/h</td>\n'
	) AS code,
	type_usine.nom AS nom_ligne
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
INNER JOIN Vue_recette ON type_usine.production_ID = Vue_recette.ID
