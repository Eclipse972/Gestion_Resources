DROP VIEW Vue_mine;
CREATE VIEW Vue_mine AS
SELECT
	mine.joueur_ID AS IDjoueur,
	type_mine.ID,
	#-- valeur par défaut pour les formulaire MAJ
	mine.etat,
	mine.nombre,
	mine.prod_max,
	#-- début lien MAJ
	CONCAT('<a href="/?onglet=2&id=',type_mine.ID,'&champ=') AS lien_MAJ,
	#-- code HTML
	CONCAT('<td>',
		#-- fonction générant le lien pour le rapport
		(SELECT Rapport_balise_a(1,(SELECT type_mine.ID))),
		#-- fonction téléchargeant l'image officielle
		CAST((SELECT ImageOfficielle((SELECT marchandise.IDimage),(SELECT type_mine.nom))) AS CHAR),
		#-- fonction de mise en valeur du texte
		(SELECT MiseEnValeur(type_mine.nom)),
		'</a></td>\n\t\t<td>',
		#-- état
		(SELECT lien_MAJ),'1#',type_mine.ID,'" title="modifier état la mine">',mine.etat,'%</a></td>\n\t\t<td>',
		#-- nombre
		(SELECT lien_MAJ),'0#',type_mine.ID,'" title="modifier le nombre de mine">',mine.nombre,'</a></td>\n\t\t<td>',
		#-- production actuelle
		REPLACE(REPLACE(FORMAT(mine.prod_max*mine.etat/100,1),',',' '),'.',','),' ',unites.nom,'/h</td>\n\t\t<td>',
		#-- production max
		(SELECT lien_MAJ),'2#',type_mine.ID,'" title="modifier la production maximale de la mine">',REPLACE(REPLACE(FORMAT(mine.prod_max,0),',',' '),'.',','),' ',unites.nom,'/h</a></td>\n'
	) AS code,
	type_mine.nom AS nom_ligne
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
