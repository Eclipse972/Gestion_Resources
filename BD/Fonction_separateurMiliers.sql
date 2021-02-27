DROP FUNCTION SeparateurMilliers;
CREATE FUNCTION SeparateurMilliers(nombre INT) RETURNS VARCHAR(99)
	RETURN REPLACE(CAST(FORMAT(nombre,0) AS CHAR),',',' ');
