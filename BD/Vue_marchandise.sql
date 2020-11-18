CREATE VIEW Vue_marchandise AS
SELECT 
	ID,
	CONCAT('<a href="?ordre=detail&id=',ID,'#selection"><img src="Vue/images/',image, '.png" alt ="',nom,'">',nom,'</a>') AS marchandise,
	CONCAT('<a href="?ordre=MAJ&id=',ID,'#selection">',cours_ki,'€</a>') AS cours_ki,
	CONCAT('<a href="?ordre=MAJ&id=',ID,'#selection">',cours_max,'€</a>') AS cours_max
FROM marchandise WHERE nature_ID BETWEEN 1 AND 2
