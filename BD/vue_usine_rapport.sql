CREATE VIEW Vue_usine_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	usine.ID,
	usine.niveau,
	usine.duree_prod_souhaitee,
	usine.date_fin_production
FROM joueur
INNER JOIN usine ON usine.joueur_ID = joueur.ID
