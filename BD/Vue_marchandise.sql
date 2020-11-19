CREATE VIEW Vue_marchandise AS
SELECT 
	ID,
	CONCAT('<a href="?id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'">',nom,'</a>') AS marchandise,
	CONCAT(cours_ki,'&euro;') AS cours_ki,
	CONCAT(cours_ki,'&euro;') AS cours_max
FROM marchandise WHERE nature_ID BETWEEN 1 AND 2
