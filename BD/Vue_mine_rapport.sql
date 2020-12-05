CREATE VIEW Vue_mine_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	mine.ID,
	mine.etat,
	mine.prod_max,
	mine.nombre,
	type_mine.marchandise_ID
FROM joueur
INNER JOIN mine ON mine.joueur_ID = joueur.ID
INNER JOIN type_mine ON mine.type_mine_ID = type_mine.ID
