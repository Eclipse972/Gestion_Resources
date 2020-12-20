CREATE VIEW Vue_mine AS
SELECT
	mine.joueur_ID AS IDjoueur,
	type_mine.ID,
	CONCAT('<a href="formulaire.php?id=',CAST(type_mine.ID AS CHAR),'">') AS lien_formulaire,
	CONCAT(
		'\t\t<td><a href="?id=',type_mine.ID,'#selection"><img src="Vue/images/',marchandise.image, '.png" alt ="',type_mine.nom,'"><strong>',
		UCASE(LEFT(type_mine.nom,1)),SUBSTRING(type_mine.nom,2,LENGTH(type_mine.nom)),'</strong></a></td>\n\t\t<td>',
		'<a href ="#" onclick="Etat(',type_mine.ID,',',mine.etat,')"> ',mine.etat,'%</a></td>\n\t\t<td>',
		'<a href ="#" onclick="Nombre(',type_mine.ID,',',mine.nombre,')"> ',mine.nombre,'</a></td>\n\t\t<td>',
		REPLACE(REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),'.',','),' ',unites.nom,'/h</td>\n\t\t<td>',
		'<a href ="#" onclick="Production(',type_mine.ID,',',mine.prod_max,')"> ',REPLACE(REPLACE(FORMAT(mine.prod_max,0),',',' '),'.',','),' ',unites.nom,'/h</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
