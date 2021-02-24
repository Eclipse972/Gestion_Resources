DROP FUNCTION Rapport_balise_a;
CREATE FUNCTION Rapport_balise_a(onglet INT, ligne INT) RETURNS varchar(99)
	RETURN CONCAT('<a href="/?onglet=',onglet,'&ligne=',ligne,'#',ligne,'" title="afficher d&eacute;tail">');
