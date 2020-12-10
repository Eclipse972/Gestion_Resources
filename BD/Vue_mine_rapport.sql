CREATE VIEW Vue_mine_rapport AS
SELECT
	mine.type_mine_ID AS ID,
	mine.joueur_ID AS IDjoueur,
	type_mine.nom,
	marchandise.image,
	mine.etat,
	mine.prod_max,
	mine.nombre
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
INNER JOIN marchandise ON type_mine.marchandise_ID = marchandise.ID
