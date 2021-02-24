DROP VIEW Vue_commerce;
CREATE VIEW Vue_commerce AS
SELECT
	commerce.joueur_ID AS IDjoueur,
	marchandise.ID,
	CONCAT('<td>',
		#-- fonction créant la balise a pour afficher le rapport
		(SELECT Rapport_balise_a(4,(SELECT marchandise.ID))),
		#-- fonction recherchant l'image officielle
		(SELECT ImageOfficielle((SELECT marchandise.IDimage),(SELECT marchandise.nom))),
		#-- fonction de mise en valeur du texte
		(SELECT MiseEnValeur(marchandise.nom)),
		'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(marchandise.cours_ki ,0),',', ' '),'&euro;</td>\n',
		'\t\t<td>',REPLACE(FORMAT(marchandise.cours_max ,0),',', ' '),'&euro;</td>\n'
	) AS code,
	nom AS nom_ligne
FROM commerce
INNER JOIN marchandise ON commerce.marchandise_ID = marchandise.ID
WHERE marchandise.nature_ID > 0
