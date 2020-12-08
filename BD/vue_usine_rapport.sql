CREATE VIEW Vue_usine_rapport AS
SELECT
	usine.joueur_ID AS IDjoueur,
	usine.type_usine_ID AS ID,
	usine.niveau,
	usine.duree_prod_souhaitee,
	usine.date_fin_production
FROM usine
