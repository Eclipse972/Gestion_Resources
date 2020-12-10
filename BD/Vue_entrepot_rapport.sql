CREATE VIEW Vue_entrepot_rapport AS
SELECT
	entrepot.marchandise_ID AS ID
	,entrepot.joueur_ID AS IDjoueur
	,CONCAT('de ',
		marchandise.nom) AS nom
	,marchandise.image
	,entrepot.niveau
	,entrepot.stock
	,entrepot.marchandise_ID
	,'besoin de l&apos;entrepot' AS besoin
	,'Amélioration' AS amelioration
FROM entrepot
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
