-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Sam 30 Janvier 2021 à 11:08
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
-- Structure de la table `type_usine`
--

CREATE TABLE IF NOT EXISTS `type_usine` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `nom` varchar(40) collate latin1_general_ci NOT NULL,
  `IDimage` tinyint(3) unsigned NOT NULL COMMENT 'ID sur le site du jeu',
  `marchandise_ID` tinyint(3) unsigned NOT NULL COMMENT 'marchandise associée',
  `prod_niveau1` int(10) unsigned NOT NULL,
  `production_ID` tinyint(3) unsigned NOT NULL COMMENT 'identifiant recette',
  `amelioration_ID` tinyint(3) unsigned NOT NULL COMMENT 'identifiant recette d''amélioration',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `type_usine`
--

INSERT INTO `type_usine` (`ID`, `nom`, `IDimage`, `marchandise_ID`, `prod_niveau1`, `production_ID`, `amelioration_ID`) VALUES
(1, 'aci&eacute;rie', 31, 17, 450, 15, 37),
(2, 'usine d&apos;aluminium', 33, 18, 320, 16, 38),
(3, 'rafinerie d&apos;argent', 34, 19, 3000, 17, 39),
(4, 'usine d&apos;armement', 101, 20, 125, 18, 40),
(5, 'usine de batteries', 95, 21, 600, 19, 41),
(6, 'orf&egrave;vre', 85, 22, 100, 21, 43),
(7, 'usine de briques', 25, 23, 800, 22, 44),
(8, 'usine de b&eacute;ton', 6, 24, 2100, 20, 42),
(9, 'usine de camions', 125, 25, 100, 23, 45),
(10, 'raffinerie de p&eacute;trole', 39, 26, 640, 24, 46),
(11, 'usine de composants &eacute;lectroniques', 69, 27, 480, 25, 47),
(12, 'raffinerie de cuivre', 37, 28, 270, 26, 48),
(13, 'usine de drones', 118, 29, 1, 27, 49),
(14, 'usine d&apos;engrais', 23, 30, 1210, 28, 50),
(15, 'usine d&apos;insecticide', 29, 31, 3500, 29, 51),
(16, 'raffinerie de lithium', 91, 32, 750, 30, 52),
(17, 'raffinerie d&apos;or', 80, 33, 240, 31, 53),
(18, 'usine de plastique', 63, 34, 1800, 32, 54),
(19, 'usine de silicium', 68, 35, 120, 33, 55),
(20, 'usine de technologie m&eacute;dicale', 76, 36, 400, 34, 58),
(21, 'usine de titane', 52, 37, 320, 35, 56),
(22, 'verrerie', 61, 38, 640, 36, 57);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
