CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	(SELECT dureeProd) DIV 86400 AS jour,
	((SELECT dureeProd) DIV 3600) % 24 AS heure,
	((SELECT dureeProd) DIV 60) % 60 AS minutes, #--minute est un mot-clé SQL
	CONCAT('<a href="#" onclick="OuvrirFormulaireMAJ(',type_usine.ID,',',
		'''',type_usine.image,''',',
		''''',',			#--'''',type_usine.nom,''',', provoque un bug avec les noms contenant une apostrophe
		usine.niveau,',',
		usine.prod_en_cours,',',
		(SELECT jour),',', (SELECT heure),',', (SELECT minutes),')">')	AS lien_MAJ,
	FORMAT(usine.prod_en_cours - (usine.niveau * type_usine.prod_niveau1 * (SELECT dureeProd))/3600, 0) AS avancement,
	CONCAT(
		'<td><a href="?id=',type_usine.ID,'#',type_usine.ID,'"><span class="gauche"><img src="Vue/images/',type_usine.image,'.png" alt ="',type_usine.nom,'"></span>',
		'<strong>',UCASE(LEFT(type_usine.nom,1)),SUBSTRING(type_usine.nom,2,LENGTH(type_usine.nom)),'</strong></a>\n',
		IF ((SELECT dureeProd) = 0,'', #-- production terminée on ne fait rien sinon on affiche l'avancement
			CONCAT('\t\t\t<p>Avancement: ',
				IF ((SELECT avancement) < 0,
					'<span style="background-color:red"> Probl&egrave;me avec un des param&egrave;tres </span>',#--avertissement
					REPLACE((SELECT avancement),',',' ')	#--sinon on affiche la quantité déjà produite
				),' / ',
				(SELECT lien_MAJ), REPLACE(CAST(FORMAT(usine.prod_en_cours,0) AS CHAR),',',' '),' ',unites.nom,'</a></p>\n'
			)
		),
		'\t\t\t',(SELECT lien_MAJ),
		IF ((SELECT dureeProd) > 0, 'Temps de production restant: ', '<br>Production termin&eacute;e'),
		CASE (SELECT jour)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT((SELECT jour),' jours ')
		END,
		CASE (SELECT heure)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT((SELECT heure),' heures ')
		END,
		CASE (SELECT minutes)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT((SELECT minutes),' minutes')
		END,
		'</a>\n\t\t</td>\n\t\t<td>',(SELECT lien_MAJ),usine.niveau,'</a></td>\n',
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
