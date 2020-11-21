CREATE VIEW Vue_usine AS
SELECT 
	ID,
	CONCAT(
		'\t\t<td><a href="?id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'">',nom,'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),'</td>\n',
		'\t\t<td>',REPLACE(FORMAT(0 ,0),',', ' '),'</td>\n'
	) AS code,
	nom AS nom_ligne
FROM type_usine
