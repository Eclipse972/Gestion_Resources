DROP VIEW Vue_usine;
CREATE VIEW Vue_usine AS
SELECT
	type_usine.ID,
	usine.joueur_ID AS IDjoueur,
#-- définition des variables
	IF(UNIX_TIMESTAMP() > usine.date_fin_production, 0, usine.date_fin_production - UNIX_TIMESTAMP()) AS dureeProd,
	SeparateurMilliers(usine.prod_en_cours) AS prodEnCours,
	CAST(usine.prod_en_cours - (usine.niveau * type_usine.prod_niveau1 * (SELECT dureeProd)) DIV 3600 AS SIGNED INTEGER) AS avancement,
#-- valeurs par défaut pour le fomulaire
	usine.niveau,
	usine.prod_en_cours,
	usine.prod_souhaitee,
#-- création du code HTML
	CONCAT('<td>',
		Rapport_balise_a(1,type_usine.ID),						#-- fonction générant le lien pour le rapport
			'<span class="gauche">',							#-- pour mettre l'image à gauche du paragraphe
			ImageOfficielle(type_usine.IDimage, type_usine.nom),#-- fonction téléchargeant l'image officielle
			'</span>',
			MiseEnValeur(type_usine.nom),						#-- fonction de mise en valeur du texte
		'</a>',
		#-- affichage de l'avancement
		IF ((SELECT dureeProd) = 0,'', #-- production terminée on ne fait rien sinon on affiche l'avancement
			CONCAT('\t\t\t<p>Avancement: ',
				IF ((SELECT avancement) < 0,
					'<span style="background-color:red"> Probl&egrave;me avec un des param&egrave;tres </span>',#--avertissement
					REPLACE(CAST(FORMAT((SELECT avancement) ,0) AS CHAR),',',' ')	#--sinon on affiche la quantité déjà produite
				#--	SeparateurMilliers((SELECT avancement)) #-- provoque erreur #1271 - Illegal mix of collations for operation 'concat'
				),' / ',
				LienMAJ(1, type_usine.ID, 1, 'production en cours'),
					SeparateurMilliers(usine.prod_en_cours),
					' ',unites.nom,
				'</a></p>\n'	#-- lien pour production en cours
			)
		),
		#-- temps restant de production en lien avec la date de fin de production
		'\t\t\t',
		LienMAJ(1, type_usine.ID, 2, 'le temps de production restant'),	#-- lien pour MAJ
			IF ((SELECT dureeProd) > 0, 'Temps de production restant: ', '<br>Production termin&eacute;e'),
			ConvertirEnJhm((SELECT dureeProd)),
		'</a>\n\t\t</td>\n\t\t<td>',
		LienMAJ(1, type_usine.ID, 0, 'niveau de l&apos;usine'),usine.niveau,'</a></td>\n',	#-- lien pour maj
		#-- capacité de production
		'\t\t<td>',
		SeparateurMilliers(type_usine.prod_niveau1*usine.niveau),
		' ',unites.nom,'/h</td>\n'
	) AS code
FROM usine
INNER JOIN type_usine ON usine.type_usine_ID = type_usine.ID
INNER JOIN marchandise ON type_usine.marchandise_ID = marchandise.ID
INNER JOIN unites ON marchandise.unité_ID = unites.ID
