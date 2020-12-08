CREATE VIEW Vue_entrepot AS
SELECT 
	entrepot.marchandise_ID AS ID
	,entrepot.joueur_ID AS IDjoueur
	,CONCAT(
		'\t\t<td><a href="?id=',entrepot.marchandise_ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'"><strong>',
		UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</strong></a></td>\n',
		'\t\t<td>',CAST(entrepot.niveau AS CHAR),'</td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(entrepot.stock,0) AS CHAR),',',' '),' ',unites.nom,'</td>\n'
	) AS code
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID BETWEEN 1 AND 2 #ressources et produits seulement pour le moment
