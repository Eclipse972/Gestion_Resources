CREATE VIEW Vue_mine AS
SELECT
	type_mine.ID,
	mine.joueur_ID AS IDjoueur,
	CONCAT(
		'\t\t<td><a href="?id=',type_mine.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',type_mine.nom,'"><strong>',
		UCASE(LEFT(type_mine.nom,1)),SUBSTRING(type_mine.nom,2,LENGTH(type_mine.nom)),'</strong></a></td>\n',
		'\t\t<td>',mine.etat,'%</td>\n',
		'\t\t<td>',mine.nombre,'</td>\n',
		'\t\t<td>',REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
