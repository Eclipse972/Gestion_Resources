CREATE VIEW Vue_mine AS
SELECT
	mine.joueur_ID AS IDjoueur,
	type_mine.ID,
	#-- variables
	CONCAT('<a href="/?onglet=2&ligne=',type_mine.ID) AS lien,
	CONCAT('<a href="/?onglet=2&id=',type_mine.ID,'&champ=') AS lien_MAJ,
	#-- code HTML
	CONCAT('<td>',
		#-- rapport
		(SELECT lien),'#',type_mine.ID,'"><img src="https://www.resources-game.ch/images/appimages/res',marchandise.IDimage, '.png" alt ="',type_mine.nom,'"><strong>',
		UCASE(LEFT(type_mine.nom,1)),SUBSTRING(type_mine.nom,2,LENGTH(type_mine.nom)),'</strong></a></td>\n\t\t<td>',
		#-- état
		(SELECT lien_MAJ),'1#',type_mine.ID,'">',mine.etat,'%</a></td>\n\t\t<td>',
		#-- nombre
		(SELECT lien_MAJ),'0#',type_mine.ID,'">',mine.nombre,'</a></td>\n\t\t<td>',
		#-- production actuelle
		REPLACE(REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),'.',','),' ',unites.nom,'/h</td>\n\t\t<td>',
		#-- production max
		(SELECT lien_MAJ),'2#',type_mine.ID,'">',REPLACE(REPLACE(FORMAT(mine.prod_max,0),',',' '),'.',','),' ',unites.nom,'/h</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
