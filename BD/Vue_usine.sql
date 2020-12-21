CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	CONCAT('<a href="?id=',CAST(type_usine.ID AS CHAR),'#selection">') AS lien_rapport, # utilisé 2 fois
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	(SELECT dureeProd) DIV 86400 AS jour,
	((SELECT dureeProd) DIV 3600) % 24 AS heure,
	((SELECT dureeProd) DIV 60) % 60 AS minutes, # minute est un mot-clé SQL
	CONCAT('<a href="#" onclick="OuvrirFormulaireMAJ(',usine.joueur_ID,',',
		'''',type_usine.image,''',',
		''''',',			--'''',type_usine.nom,''',', provoque un bug avec les noms avec un apostrophe
		usine.niveau,',',
		usine.prod_en_cours,',',
		(SELECT jour),',', (SELECT heure),',', (SELECT minutes),')">')	AS lien_MAJ,
	FORMAT(usine.prod_en_cours - (usine.niveau * type_usine.prod_niveau1 * (SELECT dureeProd))/3600, 0) AS avancement,
	CONCAT(
		'\t\t<td><p id="gauche">',(SELECT lien_rapport),'<img src="Vue/images/',type_usine.image, '.png" alt ="',type_usine.nom,'"></a></p>\n\t\t\t',
		(SELECT lien_rapport),'<strong>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</strong></a>\n',
		IF ((SELECT dureeProd) = 0,'',
			CONCAT('\t\t\t<p>Avancement: ',IF ((SELECT avancement) < 0,'<span style="background-color:red"> Probl&egrave;me avec un des param&egrave;tres </span>',REPLACE((SELECT avancement),',',' ')),
				' / ',(SELECT lien_MAJ), REPLACE(CAST(FORMAT(usine.prod_en_cours,0) AS CHAR),',',' '),' ',unites.nom,'</a></p>\n')),
		'\t\t\t<p>',(SELECT lien_MAJ),
		IF ((SELECT dureeProd) > 0, 'Temps de production restant: ', 'Production termin&eacute;e'),
		CASE (SELECT jour)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT(CAST((SELECT jour) AS CHAR),' jours ')
		END,
		CASE (SELECT heure)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT(CAST((SELECT heure) AS CHAR),' heures ')
		END,
		CASE (SELECT minutes)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT(CAST((SELECT minutes) AS CHAR),' minutes')
		END,
		'</a></p>\n\t\t</td>\n\t\t<td>',(SELECT lien_MAJ),CAST(usine.niveau AS CHAR),'</a></td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
