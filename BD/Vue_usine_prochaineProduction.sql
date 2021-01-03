CREATE VIEW Vue_usine_prochaineProduction AS
SELECT
	type_usine.ID
	,usine.joueur_ID AS IDjoueur
	,CONCAT(REPLACE(CAST(FORMAT(usine.prod_souhaitee,0) AS CHAR),',',' '),' ',unites.nom
	) AS prochaineProd
	, ROUND(usine.prod_souhaitee / usine.niveau / type_usine.prod_niveau1) AS duree_prod_souhaitee # en heure
	,(SELECT duree_prod_souhaitee) DIV 24 AS jour
	,(SELECT duree_prod_souhaitee) % 24 AS heure
	,((SELECT duree_prod_souhaitee) * 60) % 60 AS minutes #-- minute est un mot-clé
	,CONCAT(
		CASE (SELECT jour)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT((SELECT jour),' jours ')
		END,
		CASE (SELECT heure)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT((SELECT heure),' heures ')
		END,
		CASE (SELECT minutes)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT((SELECT minutes),' minutes')
		END
	) AS duréeProductinoSouhaitée
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
