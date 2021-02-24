DROP FUNCTION ImageOfficielle;
CREATE FUNCTION ImageOfficielle(ID INT, nom TEXT) RETURNS VARCHAR(255)
	RETURN CONCAT('<img src="https://www.resources-game.ch/images/appimages/res',ID ,'.png" alt ="',nom,'">');
