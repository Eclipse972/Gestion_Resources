CREATE VIEW Vue_marchandise_rapport AS
SELECT
	joueur.ID AS IDjoueur,
	marchandise.ID,
	CONCAT('Liste des achats et ventes de ', joueur.pseudo) AS liste,
	(SELECT code FROM Vue_marchandiseAbesoin WHERE Vue_marchandiseAbesoin.ID = marchandise.ID) AS necessite
FROM joueur
INNER JOIN entrepot ON entrepot.joueur_ID = joueur.ID
INNER JOIN marchandise ON entrepot.marchandise_ID = marchandise.ID
