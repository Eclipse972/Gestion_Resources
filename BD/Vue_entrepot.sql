CREATE VIEW Vue_entrepot AS
SELECT 
	entrepot.marchandise_ID AS ID,
	entrepot.joueur_ID AS IDjoueur,
	CONCAT('<a href="formulaire.php?id=',CAST(entrepot.marchandise_ID AS CHAR),'">') AS lien_formulaire,
	CONCAT(
		'\t\t<td><a href="?id=',entrepot.marchandise_ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'"><strong>',
		UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</strong></a></td>\n\t\t<td>',
		(SELECT lien_formulaire),CAST(entrepot.niveau AS CHAR),'</a></td>\n\t\t<td>',
		REPLACE(CAST(FORMAT(entrepot.niveau * entrepot.niveau * 5000,0) AS CHAR),',',' '),' ',unites.nom,'</td>\n\t\t<td>',
		(SELECT lien_formulaire),REPLACE(CAST(FORMAT(entrepot.stock,0) AS CHAR),',',' '),' ',unites.nom,'</a></td>\n'
	) AS code
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID > 1
