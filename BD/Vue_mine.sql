CREATE VIEW Vue_mine AS
SELECT
	mine.joueur_ID AS IDjoueur,
	type_mine.ID,
	CONCAT('<a href="#" onclick="OuvrirFormulaireMAJ(',type_mine.ID,',',
		'''',marchandise.IDimage,''',',
		''''',',			#--'''',type_mine.nom,''',', provoque un bug avec les noms contenant une apostrophe
		mine.etat,',',
		mine.prod_max,',',
		mine.nombre,')">')	AS lien_MAJ,
	CONCAT(
		'<td><a href="mines/',REPLACE(marchandise.name, ' ', '_'),'"><img src="https://www.resources-game.ch/images/appimages/res',marchandise.IDimage, '.png" alt ="',type_mine.nom,'"><strong>',
		UCASE(LEFT(type_mine.nom,1)),SUBSTRING(type_mine.nom,2,LENGTH(type_mine.nom)),'</strong></a></td>\n\t\t<td>',
		(SELECT lien_MAJ),mine.etat,'%</a></td>\n\t\t<td>',
		(SELECT lien_MAJ),mine.nombre,'</a></td>\n\t\t<td>',
		REPLACE(REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),'.',','),' ',unites.nom,'/h</td>\n\t\t<td>',
		(SELECT lien_MAJ),REPLACE(REPLACE(FORMAT(mine.prod_max,0),',',' '),'.',','),' ',unites.nom,'/h</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
