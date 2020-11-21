CREATE VIEW Vue_marchandise AS
SELECT 
	ID,
	CONCAT(
		'\t\t<td><a href="?id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'"></a></td>\n',
		'\t\t<td><a href="?id=',ID,'#selection">',nom,'</a></td>\n',
		'\t\t<td>',REPLACE(FORMAT(cours_ki ,0),',', ' '),'&euro;</td>\n',
		'\t\t<td>',REPLACE(FORMAT(cours_max ,0),',', ' '),'&euro;</td>\n'
	) AS code,
	nom AS nom_ligne
FROM marchandise WHERE nature_ID BETWEEN 1 AND 2
