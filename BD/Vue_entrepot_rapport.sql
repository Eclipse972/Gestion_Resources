CREATE VIEW Vue_entrepot_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	entrepot.ID,
	entrepot.niveau,
	entrepot.stock,
	entrepot.marchandise_ID,
	'besoin de l&apos;entrepot' AS besoin,
	'Amélioration' AS amelioration
FROM joueur
INNER JOIN entrepot ON entrepot.joueur_ID = joueur.ID
