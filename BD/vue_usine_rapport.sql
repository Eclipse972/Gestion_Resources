CREATE VIEW Vue_usine_rapport AS
SELECT
	usine.joueur_ID AS IDjoueur,
	usine.type_usine_ID AS ID,
	type_usine.nom,
	type_usine.image,
	usine.niveau,
	usine.duree_prod_souhaitee,
	usine.date_fin_production
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
