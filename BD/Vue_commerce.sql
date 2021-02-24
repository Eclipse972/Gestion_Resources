DROP VIEW Vue_commerce;
CREATE VIEW Vue_commerce AS
SELECT
	commerce.joueur_ID AS IDjoueur,
	marchandise.ID,
	CONCAT('<td>',
		#-- fonction créant la balise a pour afficher le rapport
		Rapport_balise_a(4, marchandise.ID),
		#-- fonction recherchant l'image officielle
		ImageOfficielle(IDimage, nom),
		#-- fonction de mise en valeur du texte
		MiseEnValeur(nom),
		'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(cours_ki ,0),',', ' '),'&euro;</td>\n',
		'\t\t<td>',REPLACE(FORMAT(cours_max,0),',', ' '),'&euro;</td>\n'
	) AS code,
	nom AS nom_ligne
FROM commerce
INNER JOIN marchandise ON commerce.marchandise_ID = marchandise.ID
WHERE marchandise.nature_ID > 0
