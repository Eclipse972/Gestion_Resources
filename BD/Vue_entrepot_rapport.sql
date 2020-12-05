CREATE VIEW Vue_entrepot_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	entrepot.marchandise_ID AS ID,
	entrepot.niveau,
	entrepot.stock,
	'besoin de l&apos;entrepot' AS besoin,
	'Amélioration' AS amelioration
FROM joueur
INNER JOIN entrepot ON entrepot.joueur_ID = joueur.ID
