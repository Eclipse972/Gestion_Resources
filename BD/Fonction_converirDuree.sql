DROP FUNCTION ConvertirEnJhm;
CREATE FUNCTION ConvertirEnJhm(dureeEnSecondes INT) RETURNS VARCHAR(99)
RETURN CONCAT(
	CASE (dureeEnSecondes DIV 86400)
		WHEN 0 THEN ''
		WHEN 1 THEN '1 jour '
		ELSE CONCAT(dureeEnSecondes DIV 86400,' jours ')
	END,
	CASE ((dureeEnSecondes DIV 3600) % 24)
		WHEN 0 THEN ''
		WHEN 1 THEN '1 heure '
		ELSE CONCAT((dureeEnSecondes DIV 3600) % 24,' heures ')
	END,
	CASE ((dureeEnSecondes DIV 60) % 60)
		WHEN 0 THEN ''
		WHEN 1 THEN '1 minute'
		ELSE CONCAT((dureeEnSecondes DIV 60) % 60,' minutes')
	END
);
