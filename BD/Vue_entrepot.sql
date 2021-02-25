DROP VIEW Vue_entrepot;
CREATE VIEW Vue_entrepot AS
SELECT
	entrepot.marchandise_ID AS ID,
	entrepot.joueur_ID AS IDjoueur,
#-- valeur pour formuaire MAJ
	entrepot.niveau,
	entrepot.stock,
#-- variables
	entrepot.niveau * entrepot.niveau * 5000 AS capacité,
	IF(marchandise.cours_ki > marchandise.cours_max, marchandise.cours_ki, marchandise.cours_max) AS PU,
#-- code HTML
	CONCAT('<td>',
		Rapport_balise_a(3, marchandise_ID),					#-- fonction générant la balise a du lien pour le rapport
		ImageOfficielle(marchandise.IDimage, marchandise.nom),	#-- fonction téléchargeant l'image officielle
		MiseEnValeur(marchandise.nom),							#-- fonction de mise en valeur du texte
		'</a>',
		IF((SELECT capacité) >= entrepot.stock, '', '<span style="background-color:red"> Niveau (capacit&eacute;) et stock incoh&eacute;rents </span>'),
		'</td>\n\t\t<td>',
		LienMAJ(3, marchandise_ID, 0, 'niveau'),	#-- niveau
		CAST(entrepot.niveau AS CHAR),'</a></td>\n\t\t<td>',
		REPLACE(CAST(FORMAT(entrepot.niveau * entrepot.niveau * 5000,0) AS CHAR),',',' '),' ',unites.nom,'</td>\n\t\t<td>',	#-- capacité
		LienMAJ(3, marchandise_ID, 1, 'quantit&eacute; stock&eacute;e'),	#-- stock
		REPLACE(CAST(FORMAT(entrepot.stock,0) AS CHAR),',',' '),' ',unites.nom,'</a></td>\n\t\t<td>',
		REPLACE(CAST(FORMAT(entrepot.stock * (SELECT PU),0) AS CHAR),',',' '),'</td>\n'
	) AS code
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID > 0
