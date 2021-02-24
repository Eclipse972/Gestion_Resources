DROP FUNCTION LienMAJ;
CREATE FUNCTION LienMAJ(onglet INT, id INT, champ INT, description TEXT) RETURNS TEXT
	RETURN CONCAT(
		'<a href="/?onglet=',CAST(onglet AS CHAR),
		'&id=',CAST(id AS CHAR),
		'&champ=',CAST(champ AS CHAR),
		'#',CAST(id AS CHAR),'" ',
		'title="',description,'">');
