CREATE VIEW Vue_mine_rapport AS
SELECT
	mine.type_mine_ID AS ID,
	mine.joueur_ID AS IDjoueur,
	mine.etat,
	mine.prod_max,
	mine.nombre,
	type_mine.marchandise_ID
FROM mine
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
