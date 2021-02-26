DROP VIEW Vue_usine_prochaineProduction;
CREATE VIEW Vue_usine_prochaineProduction AS
SELECT
	type_usine.ID
	, usine.joueur_ID AS IDjoueur
	,CONCAT(
		LienMAJ(1, type_usine_ID, 3, 'la production souhait&eacute;e'),	REPLACE(CAST(FORMAT(usine.prod_souhaitee,0) AS CHAR),',',' '),'</a>'
		,' ',unites.nom
		,' pour une dur&eacute;e: ',ConvertirEnJhm(usine.prod_souhaitee * 3600 DIV (usine.niveau * type_usine.prod_niveau1))
	) AS prochaineProd
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
