DROP FUNCTION Rapport_balise_a;
CREATE FUNCTION Rapport_balise_a(onglet INT, ligne INT) RETURNS varchar(99)
	RETURN CONCAT('<a href="/?onglet=',CAST(onglet AS CHAR),'&ligne=',CAST(ligne AS CHAR),'#',CAST(ligne AS CHAR),'" title="afficher d&eacute;tail">');
