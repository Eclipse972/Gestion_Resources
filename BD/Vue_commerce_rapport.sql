CREATE VIEW Vue_commerce_rapport AS
SELECT
	commerce.joueur_ID AS IDjoueur,
	commerce.marchandise_ID AS ID,
	CONCAT('Liste des achats et ventes en construction IDjoueur=',commerce.joueur_ID,' et marchandise=',commerce.marchandise_ID) AS liste
FROM commerce
