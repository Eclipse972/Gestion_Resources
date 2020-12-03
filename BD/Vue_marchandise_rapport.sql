CREATE VIEW Vue_marchandise_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	entrepot.marchandise_ID AS ID,
	CONCAT('Liste des achats et ventes de ', joueur.pseudo) AS liste,
	(SELECT code FROM Vue_marchandiseUtilePour WHERE Vue_marchandiseUtilePour.ID = entrepot.marchandise_ID) AS utile,
	(SELECT code FROM Vue_marchandiseAbesoin WHERE Vue_marchandiseAbesoin.ID = entrepot.marchandise_ID) AS necessite
FROM joueur
INNER JOIN entrepot ON entrepot.joueur_ID = joueur.ID
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID #table et jointure à supprimer dans le futur?
