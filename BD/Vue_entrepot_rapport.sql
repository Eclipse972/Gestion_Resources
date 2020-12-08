CREATE VIEW Vue_entrepot_rapport AS
SELECT
	entrepot.marchandise_ID AS ID
	,entrepot.joueur_ID AS IDjoueur
	,entrepot.niveau
	,entrepot.stock
	,entrepot.marchandise_ID
	,'besoin de l&apos;entrepot' AS besoin
	,'Amélioration' AS amelioration
FROM entrepot
