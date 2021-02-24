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
	#-- début de lien MAJ
	CONCAT('<a href="/?onglet=3&id=',marchandise_ID,'&champ=') AS lien_MAJ,
	#-- code HTML
	CONCAT('<td>',
		#-- fonction générant le lien pour le rapport
		(SELECT Rapport_balise_a(3,(SELECT marchandise_ID))),
		'<img src="https://www.resources-game.ch/images/appimages/res',marchandise.IDimage, '.png" alt ="',marchandise.nom,'"><strong>',
		UCASE(LEFT(marchandise.nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</strong></a>',
		IF((SELECT capacité) >= entrepot.stock, '', '<span style="background-color:red"> Niveau (capacit&eacute;) et stock incoh&eacute;rents </span>'),
		'</td>\n\t\t<td>',
		#-- niveau
		(SELECT lien_MAJ),'0#',marchandise_ID,'" title="modifier niveau">',CAST(entrepot.niveau AS CHAR),'</a></td>\n\t\t<td>',
		#-- capacité
		REPLACE(CAST(FORMAT(entrepot.niveau * entrepot.niveau * 5000,0) AS CHAR),',',' '),' ',unites.nom,'</td>\n\t\t<td>',
		#-- stock
		(SELECT lien_MAJ),'1#',marchandise_ID,'" title="modifier quantit&eacute; stock&eacute;e">',REPLACE(CAST(FORMAT(entrepot.stock,0) AS CHAR),',',' '),' ',unites.nom,'</a></td>\n\t\t<td>',
		REPLACE(CAST(FORMAT(entrepot.stock * (SELECT PU),0) AS CHAR),',',' '),'</td>\n'
	) AS code
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
WHERE marchandise.nature_ID > 0
