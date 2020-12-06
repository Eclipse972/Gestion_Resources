CREATE VIEW Vue_entrepot AS
SELECT 
	marchandise.ID,
	entrepot.joueur_ID AS IDjoueur,
	CONCAT(
		'\t\t<td><a href="?id=',marchandise.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',marchandise.nom,'">',
		UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</a></td>\n',
		'\t\t<td>',entrepot.niveau,'</td>\n',
		'\t\t<td>',entrepot.stock,' ',unites.nom,'</td>\n'
	) AS code,
	marchandise.nom AS nom_ligne
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID BETWEEN 1 AND 2 #ressources et produits seulement pour le moment
