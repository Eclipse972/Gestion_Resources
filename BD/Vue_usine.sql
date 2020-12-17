CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	CONCAT('<a href="?id=',CAST(type_usine.ID AS CHAR),'#selection">') AS lien_rapport, # utilisé 2 fois
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	CONCAT(
		'\t\t<td><p id="gauche">',(SELECT lien_rapport),'<img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>\n\t\t\t',
		(SELECT lien_rapport),'<strong>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</strong></a>\n',
		IF ((SELECT dureeProd) > 0, '\t\t\t<p>Avancement: X/Y</p>\n',''), # X et Y non encore définis
		'\t\t\t<p><a onclick="TempsProdRestant(',CAST(type_usine.ID AS CHAR),')">',
		IF ((SELECT dureeProd) > 0, 'Temps de production restant: ', 'Production termin&eacute;e'),
		CASE (SELECT dureeProd) DIV 86400
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT(CAST((SELECT dureeProd) DIV 86400 AS CHAR),' jours ')
		END,
		CASE ((SELECT dureeProd) DIV 3600) % 24
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT(CAST(((SELECT dureeProd) DIV 3600) % 24 AS CHAR),' heures ')
		END,
		CASE ((SELECT dureeProd) DIV 60) % 60
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT(CAST(((SELECT dureeProd) DIV 60) % 60 AS CHAR),' minutes')
		END,
		'</a></p>\n\t\t</td>\n\t\t<td><a onclick="NiveauUsine(',CAST(type_usine.ID AS CHAR),',',CAST(usine.niveau AS CHAR),')">',CAST(usine.niveau AS CHAR),'</a></td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
