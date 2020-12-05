CREATE VIEW Vue_entrepot_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	entrepot.marchandise_ID AS ID,
	entrepot.niveau,
	entrepot.stock,
	'besoin de l&apos;entrepot' AS besoin,
	'Amélioration' AS amelioration,
	(SELECT code FROM Vue_marchandiseAbesoin WHERE Vue_marchandiseAbesoin.ID = entrepot.marchandise_ID) AS necessite
FROM joueur
INNER JOIN entrepot ON entrepot.joueur_ID = joueur.ID
