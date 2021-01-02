CREATE VIEW Vue_usine_prochaineProduction AS
SELECT
	type_usine.ID
	,usine.joueur_ID AS IDjoueur
	,CONCAT(REPLACE(CAST(FORMAT(usine.niveau * type_usine.prod_niveau1 * usine.duree_prod_souhaitee / 86400,0) AS CHAR),',',' '),' ',unites.nom
	) AS prochaineProd
	,(SELECT usine.duree_prod_souhaitee) DIV 86400 AS jour2
	,((SELECT usine.duree_prod_souhaitee) DIV 3600) % 24 AS heure2
	,((SELECT usine.duree_prod_souhaitee) DIV 60) % 60 AS minute2
	,CONCAT(
		CASE (SELECT jour2)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 jour '
			ELSE CONCAT((SELECT jour2),' jours ')
		END,
		CASE (SELECT heure2)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 heure '
			ELSE CONCAT((SELECT heure2),' heures ')
		END,
		CASE (SELECT minute2)
			WHEN 0 THEN ''
			WHEN 1 THEN '1 minute'
			ELSE CONCAT((SELECT minute2),' minutes')
		END
	) AS duréeProductinoSouhaitée
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
