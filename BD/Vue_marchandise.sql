CREATE VIEW Vue_marchandise AS
SELECT 
	ID,
	CONCAT('<a href="?id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'">',nom,'</a>') AS marchandise,
	CONCAT(REPLACE(FORMAT(cours_ki ,0),',', ' '),'&euro;') AS cours_ki,
	CONCAT(REPLACE(FORMAT(cours_max ,0),',', ' '),'&euro;') AS cours_max
FROM marchandise WHERE nature_ID BETWEEN 1 AND 2
