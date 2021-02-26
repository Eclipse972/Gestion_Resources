DROP VIEW Vue_usine;
CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
#-- définition des variables
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	FORMAT(usine.prod_en_cours - (usine.niveau * type_usine.prod_niveau1 * (SELECT dureeProd))/3600, 0) AS avancement,
	CONCAT(REPLACE(CAST(FORMAT(usine.prod_en_cours,0) AS CHAR),',',' '),' ',unites.nom) AS prodEnCours,
#-- valeurs par défaut pour le fomulaire
	usine.niveau,
	usine.prod_en_cours,
#-- création du code HTML
	CONCAT('<td>',
		Rapport_balise_a(1,type_usine.ID),					#-- fonction générant le lien pour le rapport
		'<span class="gauche">',							#-- pour mettre l'image à gauche du paragraphe
		ImageOfficielle(type_usine.IDimage, type_usine.nom),#-- fonction téléchargeant l'image officielle
		'</span>',
		MiseEnValeur(type_usine.nom),						#-- fonction de mise en valeur du texte
		#-- affichage de l'avancement
		IF ((SELECT dureeProd) = 0,'', #-- production terminée on ne fait rien sinon on affiche l'avancement
			CONCAT('\t\t\t<p>Avancement: ',
				IF ((SELECT avancement) < 0,
					'<span style="background-color:red"> Probl&egrave;me avec un des param&egrave;tres </span>',#--avertissement
					REPLACE((SELECT avancement),',',' ')	#--sinon on affiche la quantité déjà produite
				),' / ',
				LienMAJ(1, type_usine.ID, 1, 'production en cours'),(SELECT prodEnCours),'</a></p>\n'	#-- lien pour production en cours
			)
		),
		#-- temps restant de production enlien avec la date de fin de production
		'\t\t\t',
		LienMAJ(1, type_usine.ID, 2, 'le temps de production restant'),	#-- lien pour MAJ
			IF ((SELECT dureeProd) > 0, 'Temps de production restant: ', '<br>Production termin&eacute;e'),
			ConvertirEnJhm((SELECT dureeProd)),
		'</a>\n\t\t</td>\n\t\t<td>',
		LienMAJ(1, type_usine.ID, 0, 'niveau de l&apos;usine'),usine.niveau,'</a></td>\n',	#-- lien pour maj
		#-- capacité de production
		'\t\t<td>',REPLACE(CAST(FORMAT(type_usine.prod_niveau1*usine.niveau,0) AS CHAR),',',' '),' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
