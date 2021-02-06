DROP PROCEDURE Rapport;
DELIMITER |
CREATE PROCEDURE Rapport(IN onglet INT, IN ID INT, IN nom TEXT, IN IDimage, OUT lien TEXT)
BEGIN
	SELECT CONCAT(
		#-- début lien
		'<a href="/?onglet=',onglet,'&ligne=',ID,'#',ID,'" title="afficher d&eacute;tail">',
		#-- image à gauche
		'<span class="gauche"><img src="https://www.resources-game.ch/images/appimages/res',IDimage,'.png" alt ="',nom,'"></span>',
		#-- nom
		'<strong>',UCASE(LEFT(nom,1)),SUBSTRING(nom,2,LENGTH(nom)),'</strong></a>\n'
	) INTO lien
END|
DELIMITER ;
