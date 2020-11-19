CREATE VIEW Vue_marchandise AS
SELECT 
	ID,
	CONCAT('<a href="?id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'">',nom,'</a>') AS marchandise,
	cours_ki,
	cours_max
FROM marchandise WHERE nature_ID BETWEEN 1 AND 2
