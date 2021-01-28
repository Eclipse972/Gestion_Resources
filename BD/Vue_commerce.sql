CREATE VIEW Vue_commerce AS
SELECT
	commerce.joueur_ID AS IDjoueur,
	marchandise.ID,
	CONCAT(
		'<td><a href="?id=',ID,'#',ID,'"><img src="https://www.resources-game.ch/images/appimages/res',marchandise.IDimage, '.png" alt ="',marchandise.nom,'"><strong>',
		UCASE(LEFT(nom,1)),SUBSTRING(marchandise.nom,2,LENGTH(marchandise.nom)),'</strong></a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(marchandise.cours_ki ,0),',', ' '),'&euro;</td>\n',
		'\t\t<td>',REPLACE(FORMAT(marchandise.cours_max ,0),',', ' '),'&euro;</td>\n'
	) AS code,
	nom AS nom_ligne
FROM commerce
INNER JOIN marchandise ON commerce.marchandise_ID = marchandise.ID
WHERE marchandise.nature_ID > 0
