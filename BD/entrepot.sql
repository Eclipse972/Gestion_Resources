-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Sam 02 Janvier 2021 à 03:20
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
  `marchandise_ID` tinyint(3) unsigned NOT NULL,
  `joueur_ID` tinyint(3) unsigned NOT NULL default '1',
  `niveau` tinyint(3) unsigned NOT NULL default '0',
  `stock` bigint(20) unsigned NOT NULL default '0',
  `moment` int(11) NOT NULL,
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`marchandise_ID`,`joueur_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `entrepot`
--

INSERT INTO `entrepot` (`marchandise_ID`, `joueur_ID`, `niveau`, `stock`, `moment`, `ordre_affichage`) VALUES
(3, 1, 209, 220009, 2020, 0),
(4, 1, 6, 99, 2020, 0),
(5, 1, 78, 4500, 2020, 0),
(6, 1, 55, 515612, 2020, 0),
(7, 1, 5, 99, 2020, 0),
(8, 1, 15, 400, 2020, 0),
(9, 1, 10, 9, 2020, 0),
(10, 1, 8, 57865, 2020, 0),
(11, 1, 8, 0, 2020, 0),
(12, 1, 7, 0, 2020, 0),
(13, 1, 4, 1, 2020, 0),
(14, 1, 5, 0, 2020, 0),
(15, 1, 6, 0, 2020, 0),
(16, 1, 3, 0, 2020, 0),
(17, 1, 35, 946000, 2020, 0),
(18, 1, 1, 0, 2020, 0),
(19, 1, 0, 0, 2020, 0),
(20, 1, 0, 0, 2020, 0),
(21, 1, 0, 0, 2020, 0),
(22, 1, 0, 0, 2020, 0),
(23, 1, 105, 15000000, 2020, 0),
(24, 1, 109, 3000000, 2020, 0),
(25, 1, 0, 0, 2020, 0),
(26, 1, 0, 0, 2020, 0),
(27, 1, 0, 0, 2020, 0),
(28, 1, 0, 0, 2020, 0),
(29, 1, 1, 0, 2020, 0),
(30, 1, 0, 0, 2020, 0),
(3, 2, 10, 0, 2020, 0),
(4, 2, 11, 22, 2020, 0),
(31, 1, 10, 11, 2020, 0),
(32, 1, 99, 1, 2020, 0),
(33, 1, 1, 65, 2020, 0),
(34, 1, 88, 999, 2020, 0),
(35, 1, 4, 5, 2020, 0),
(36, 1, 6, 333, 2020, 0),
(37, 1, 60, 276, 2020, 0),
(38, 1, 144, 14445, 2020, 0),
(39, 1, 0, 0, 0, 37),
(40, 1, 0, 0, 0, 38),
(41, 1, 0, 0, 0, 39),
(42, 1, 0, 0, 0, 40),
(43, 1, 0, 0, 0, 41),
(44, 1, 0, 0, 0, 42),
(45, 1, 0, 0, 0, 43),
(46, 1, 0, 0, 0, 44),
(47, 1, 1, 325, 0, 45),
(48, 1, 0, 0, 0, 46),
(49, 1, 0, 0, 0, 47),
(50, 1, 0, 0, 0, 48),
(51, 1, 0, 0, 0, 49),
(52, 1, 0, 0, 0, 50),
(53, 1, 0, 0, 0, 51),
(54, 1, 0, 0, 0, 52),
(55, 1, 0, 0, 0, 53),
(56, 1, 0, 0, 0, 54),
(57, 1, 0, 0, 0, 55),
(58, 1, 0, 0, 0, 56),
(59, 1, 0, 0, 0, 57),
(60, 1, 0, 0, 0, 58),
(39, 2, 0, 0, 0, 37),
(40, 2, 0, 0, 0, 38),
(41, 2, 0, 0, 0, 39),
(42, 2, 0, 0, 0, 40),
(43, 2, 0, 0, 0, 41),
(44, 2, 0, 0, 0, 42),
(45, 2, 0, 0, 0, 43),
(46, 2, 0, 0, 0, 44),
(47, 2, 0, 0, 0, 45),
(48, 2, 0, 0, 0, 46),
(49, 2, 0, 0, 0, 47),
(50, 2, 0, 0, 0, 48),
(51, 2, 0, 0, 0, 49),
(52, 2, 0, 0, 0, 50),
(53, 2, 0, 0, 0, 51),
(54, 2, 0, 0, 0, 52),
(55, 2, 0, 0, 0, 53),
(56, 2, 0, 0, 0, 54),
(57, 2, 0, 0, 0, 55),
(58, 2, 0, 0, 0, 56),
(59, 2, 0, 0, 0, 57),
(60, 2, 0, 0, 0, 58);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
