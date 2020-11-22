-- permet d'associer l'usine à sa recette
CREATE VIEW Vue_recette_usine AS
SELECT type_usine.ID, Vue_recette.code
FROM Vue_recette, type_usine
WHERE type_usine.production_ID = Vue_recette.ID
