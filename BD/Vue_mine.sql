DROP VIEW Vue_mine;
CREATE VIEW Vue_mine AS
SELECT
	mine.joueur_ID AS IDjoueur,
	type_mine.ID,
#-- valeur par défaut pour le formulaire MAJ
	mine.etat,
	mine.nombre,
	mine.prod_max,
#-- code HTML
	CONCAT('<td>',
		Rapport_balise_a(2, type_mine.ID),					#-- fonction générant le lien pour le rapport
		ImageOfficielle(marchandise.IDimage, type_mine.nom),#-- fonction téléchargeant l'image officielle
		MiseEnValeur(type_mine.nom),						#-- fonction de mise en valeur du texte
		'</a></td>\n\t\t<td>',
		LienMAJ(2, type_mine.ID, 1, '&eacute;tat de la mine'),mine.etat,'%</a></td>\n\t\t<td>',	#-- état
		LienMAJ(2, type_mine.ID, 0, 'le nombre de mine'),	mine.nombre,'</a></td>\n\t\t<td>',#-- nombre
		REPLACE(REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),'.',','),' ',unites.nom,'/h</td>\n\t\t<td>',#-- production actuelle
		#-- production max
		LienMAJ(2, type_mine.ID, 2, 'la production maximale de la mine'),	REPLACE(REPLACE(FORMAT(mine.prod_max,0),',',' '),'.',','),' ',unites.nom,'/h</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
