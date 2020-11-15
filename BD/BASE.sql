-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 15 Août 2019 à 22:21
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_resources`
--

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

CREATE TABLE IF NOT EXISTS `entrepot` (
  `ID` int(11) NOT NULL auto_increment,
  `marchandise_ID` int(11) NOT NULL,
  `joueur_ID` int(11) NOT NULL,
  `niveau` int(11) NOT NULL default '1',
  `quantité` int(11) NOT NULL default '0',
  `moment` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `unicité_entrepot` (`marchandise_ID`,`joueur_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `entrepot`
--


-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `pseudo` varchar(20) collate latin1_general_ci NOT NULL,
  `connecté?` tinyint(1) NOT NULL,
  `mdp_crypté` varchar(256) collate latin1_general_ci NOT NULL,
  `email` varchar(64) collate latin1_general_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `niveauQG` tinyint(1) unsigned NOT NULL,
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `unicité_joueur` (`pseudo`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`ID`, `pseudo`, `connecté?`, `mdp_crypté`, `email`, `niveau`, `niveauQG`) VALUES
(1, 'Lambda', 0, '', 'christophe.hervi@free.fr', 108, 5),
(2, '2Fer', 0, '', 'christophe.hervi@free.fr', 108, 5);

-- --------------------------------------------------------

--
-- Structure de la table `marchandise`
--

CREATE TABLE IF NOT EXISTS `marchandise` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(30) collate latin1_general_ci NOT NULL,
  `unité_ID` int(11) NOT NULL default '1',
  `nature_ID` tinyint(1) unsigned NOT NULL,
  `cours_ki` int(10) unsigned NOT NULL,
  `cours_max` int(10) unsigned NOT NULL default '0',
  `moment` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `marchandise`
--

INSERT INTO `marchandise` (`ID`, `nom`, `unité_ID`, `nature_ID`, `cours_ki`, `cours_max`, `moment`) VALUES
(1, 'argent', 0, 0, 1, 0, '2019-07-25 21:04:25'),
(2, 'caisse', 3, 0, 0, 0, '2019-07-25 21:04:25'),
(3, 'argile', 1, 1, 323, 340, '2019-07-25 21:26:55'),
(4, 'bauxite', 1, 1, 2020, 2250, '2019-07-25 21:26:55'),
(5, 'calcaire', 1, 1, 392, 480, '2019-07-25 21:30:54'),
(6, 'chalcopyrite', 1, 1, 2567, 2780, '2019-07-25 21:30:54'),
(7, 'charbon', 1, 1, 2146, 2263, '2019-07-25 21:41:03'),
(8, 'diamant brut', 5, 1, 1143, 3160, '2019-07-25 21:41:03'),
(9, 'gravier', 1, 1, 378, 455, '2019-07-25 21:42:01'),
(10, 'ileménite', 1, 1, 419, 450, '2019-07-25 21:43:59'),
(11, 'minerai d''argent', 1, 1, 2566, 0, '2019-07-25 21:46:18'),
(12, 'minerai d''or', 1, 1, 1448, 0, '2019-07-25 21:46:18'),
(13, 'minerai de fer', 1, 1, 1002, 2890, '2019-07-25 21:48:10'),
(14, 'minerai de lithium', 1, 1, 319, 813, '2019-07-25 21:48:10'),
(15, 'pétrole brut', 1, 1, 2496, 2756, '2019-07-25 21:49:37'),
(16, 'sable de quartz', 1, 1, 461, 486, '2019-07-25 21:49:37'),
(17, 'acier', 1, 2, 34688, 67095, '2019-07-25 21:53:11'),
(18, 'aluminium', 1, 2, 88010, 91119, '2019-07-25 21:53:11'),
(19, 'argent', 2, 2, 1918, 2015, '2019-07-25 22:00:33'),
(20, 'arme', 3, 2, 300737, 374000, '2019-07-25 22:00:33'),
(21, 'batterie', 6, 2, 261991, 0, '2019-07-30 03:29:43'),
(22, 'bijoux', 2, 2, 1998050, 0, '2019-07-30 03:29:43'),
(23, 'briques', 1, 2, 1156, 4105, '2019-07-30 03:31:45'),
(24, 'béton', 1, 2, 3996, 6370, '2019-07-30 03:31:45'),
(25, 'camions', 3, 2, 174903, 317100, '2019-07-30 03:36:01'),
(26, 'combustible fossile', 1, 2, 30431, 34655, '2019-07-30 03:36:01'),
(27, 'composants électroniques', 1, 2, 68407, 0, '2019-07-30 03:38:25'),
(28, 'cuivre', 1, 2, 98394, 98400, '2019-07-30 03:38:25'),
(29, 'drones de scan', 3, 2, 74996352, 75000002, '2019-07-30 03:40:30'),
(30, 'engrais', 1, 2, 2332, 0, '2019-07-30 03:40:30'),
(31, 'insecticides', 1, 2, 5389, 0, '2019-07-30 03:41:07'),
(32, 'lithium', 1, 2, 29520, 49311, '2019-07-30 03:42:58'),
(33, 'or', 2, 2, 64437, 69080, '2019-07-30 03:42:58'),
(34, 'plastique', 1, 2, 2726, 5999, '2019-07-30 03:44:22'),
(35, 'silicium', 1, 2, 80904, 107350, '2019-07-30 03:44:22'),
(36, 'technologie médicale', 1, 2, 197220, 0, '2019-07-30 03:45:57'),
(37, 'titane', 1, 2, 32971, 51055, '2019-07-30 03:45:57'),
(38, 'verre', 1, 2, 33139, 54001, '2019-07-30 03:47:49'),
(39, 'diamant géant', 3, 3, 951069144, 0, '2019-07-30 03:47:49'),
(40, 'déchet de verre', 1, 3, 26950, 37906, '2019-07-30 03:49:10'),
(41, 'déchet plastique', 1, 3, 5338, 12385, '2019-07-30 03:49:10'),
(42, 'déchet électronique', 1, 3, 100082, 164371, '2019-07-30 03:51:23'),
(43, 'ferraille', 1, 3, 14575, 21530, '2019-07-30 03:51:23'),
(44, 'fossile', 3, 3, 3063, 10615, '2019-07-30 03:52:51'),
(45, 'huile usagée', 1, 3, 4937, 9450, '2019-07-30 03:52:51'),
(46, 'kit de maintenance', 3, 3, 10815124, 45300100, '2019-07-30 03:55:26'),
(47, 'monnaie romaine', 3, 3, 33226, 36750, '2019-07-30 03:55:26'),
(48, 'pièce en cuivre', 3, 3, 13944, 16400, '2019-07-30 03:57:23'),
(49, 'tech upgrade 1', 3, 3, 79891279, 80000000, '2019-07-30 03:57:23'),
(50, 'tech upgrade 2', 3, 3, 159647310, 176505105, '2019-07-30 03:59:12'),
(51, 'tech upgrade 3', 3, 3, 180918823, 200683875, '2019-07-30 03:59:12'),
(52, 'tech upgrade 4', 3, 3, 102246934, 0, '2019-07-30 04:00:29'),
(53, 'vieux pneus', 3, 3, 21248, 23715, '2019-07-30 04:00:29'),
(54, 'épaves de drones', 3, 3, 6004516, 9769669, '2019-07-30 04:01:55'),
(55, 'armée privée', 4, 4, 12152024, 17850061, '2019-07-30 04:01:55'),
(56, 'chiens d''attaque', 4, 4, 200000, 1157700, '2019-07-30 04:04:37'),
(57, 'chiens de garde', 4, 4, 83384, 416800, '2019-07-30 04:04:37'),
(58, 'force d''élite', 4, 4, 11990354, 38955001, '2019-07-30 04:06:31'),
(59, 'gangster', 4, 4, 2668075, 9000000, '2019-07-30 04:06:31'),
(60, 'équipe de sécurité', 4, 4, 1334320, 4270000, '2019-07-30 04:07:25');

-- --------------------------------------------------------

--
-- Structure de la table `marchandise_QG`
--

CREATE TABLE IF NOT EXISTS `marchandise_QG` (
  `ID` int(11) NOT NULL auto_increment,
  `joueur_ID` int(11) NOT NULL,
  `marchandise_ID` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `marchandise_QG`
--


-- --------------------------------------------------------

--
-- Structure de la table `mine`
--

CREATE TABLE IF NOT EXISTS `mine` (
  `ID` int(11) NOT NULL auto_increment,
  `joueur_ID` int(11) NOT NULL,
  `type_mine_ID` int(11) NOT NULL,
  `prod_max` int(11) NOT NULL,
  `etat%` int(11) NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `joueur_ID` (`joueur_ID`,`type_mine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mine`
--


-- --------------------------------------------------------

--
-- Structure de la table `nature`
--

CREATE TABLE IF NOT EXISTS `nature` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(11) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nature de lamarchandise' AUTO_INCREMENT=9 ;

--
-- Contenu de la table `nature`
--

INSERT INTO `nature` (`ID`, `nom`) VALUES
(1, 'ressource'),
(2, 'produit'),
(3, 'butin'),
(4, 'unité');

-- --------------------------------------------------------

--
-- Structure de la table `type_mine`
--

CREATE TABLE IF NOT EXISTS `type_mine` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `marchandise_ID` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `type_mine`
--

INSERT INTO `type_mine` (`ID`, `nom`, `marchandise_ID`) VALUES
(1, 'mine d''argile', 3),
(2, 'mine de bauxite', 4),
(3, 'mine de calcaire', 5),
(4, 'mine de chacopyrite', 6),
(5, 'mine de charbon', 7),
(6, 'mine de diamants', 8),
(7, 'mine de graviers', 9),
(8, 'mine d''ileménite', 10),
(9, 'mine d''argent', 11),
(10, 'mine d''or', 12),
(11, 'mine de fer', 13),
(12, 'mine de lithium', 14),
(13, 'puits de pétrole', 15),
(14, 'mine de sable', 16);

-- --------------------------------------------------------

--
-- Structure de la table `type_usine`
--

CREATE TABLE IF NOT EXISTS `type_usine` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(40) collate latin1_general_ci NOT NULL,
  `marchandise_ID` int(11) NOT NULL,
  `production_ID` int(11) NOT NULL,
  `amelioration_ID` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `type_usine`
--

INSERT INTO `type_usine` (`ID`, `nom`, `marchandise_ID`, `production_ID`, `amelioration_ID`) VALUES
(1, 'aciérie', 17, 0, 0),
(2, 'usine d''aluminium', 18, 0, 0),
(3, 'usine d''argent', 19, 0, 0),
(4, 'usine d''armement', 20, 0, 0),
(5, 'usine de batteries', 21, 0, 0),
(6, 'orfèvre', 22, 0, 0),
(7, 'usine de briques', 23, 0, 0),
(8, 'usine de béton', 24, 0, 0),
(9, 'usine de camions', 25, 0, 0),
(10, 'raffinerie de pétrole', 26, 0, 0),
(11, 'usine de composants électroniques', 27, 0, 0),
(12, 'raffinerie de ciuivre', 28, 0, 0),
(13, 'usine de drones', 29, 0, 0),
(14, 'usine d''engrais', 30, 0, 0),
(15, 'usine d''insecticide', 31, 0, 0),
(16, 'usine de lithoum', 32, 0, 0),
(17, 'raffinerie d''or', 33, 0, 0),
(18, 'usine de plastique', 34, 0, 0),
(19, 'usine de silicium', 35, 0, 0),
(20, 'usine de technologie médicale', 36, 0, 0),
(21, 'usine de titane', 37, 0, 0),
(22, 'usine de verre', 38, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `unité`
--

CREATE TABLE IF NOT EXISTS `unité` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(9) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='unités de mesure pour les archandises' AUTO_INCREMENT=7 ;

--
-- Contenu de la table `unité`
--

INSERT INTO `unité` (`ID`, `nom`) VALUES
(1, 'm3'),
(2, 'kg'),
(3, 'pièce'),
(4, 'unité'),
(5, 'ct'),
(6, 'MWh');

-- --------------------------------------------------------

--
-- Structure de la table `usine`
--

CREATE TABLE IF NOT EXISTS `usine` (
  `ID` int(11) NOT NULL auto_increment,
  `joueur_ID` int(11) NOT NULL,
  `type_usine_ID` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `t_fin_production` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `joueur_ID` (`joueur_ID`,`type_usine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `usine`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
