-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Lun 30 Novembre 2020 à 21:32
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
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `marchandise_ID` tinyint(3) unsigned NOT NULL,
  `joueur_ID` tinyint(3) unsigned NOT NULL default '1',
  `niveau` tinyint(3) unsigned NOT NULL default '0',
  `stock` bigint(20) unsigned NOT NULL default '0',
  `moment` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `unicité_entrepot` (`marchandise_ID`,`joueur_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=29 ;

--
-- Contenu de la table `entrepot`
--

INSERT INTO `entrepot` (`ID`, `marchandise_ID`, `joueur_ID`, `niveau`, `stock`, `moment`, `ordre_affichage`) VALUES
(1, 3, 1, 1, 0, '2020-11-30 19:39:48', 0),
(2, 4, 1, 4, 0, '2020-11-30 19:39:48', 0),
(3, 5, 1, 7, 0, '2020-11-30 19:39:48', 0),
(4, 6, 1, 2, 0, '2020-11-30 19:41:27', 0),
(5, 7, 1, 5, 0, '2020-11-30 19:41:27', 0),
(6, 8, 1, 8, 0, '2020-11-30 19:41:27', 0),
(7, 9, 1, 10, 9, '2020-11-30 19:41:27', 0),
(8, 10, 1, 6, 99, '2020-11-30 19:41:27', 0),
(0, 11, 1, 8, 0, '2020-11-30 19:41:27', 0),
(10, 12, 1, 7, 0, '2020-11-30 19:41:27', 0),
(11, 13, 1, 4, 0, '2020-11-30 19:41:27', 0),
(12, 14, 1, 5, 0, '2020-11-30 19:41:27', 0),
(13, 15, 1, 6, 0, '2020-11-30 19:41:27', 0),
(14, 16, 1, 3, 0, '2020-11-30 19:43:39', 0),
(15, 17, 1, 2, 0, '2020-11-30 19:43:39', 0),
(16, 18, 1, 1, 0, '2020-11-30 19:43:39', 0),
(17, 19, 0, 0, 0, '2020-11-30 19:43:39', 0),
(18, 20, 1, 0, 0, '2020-11-30 19:43:39', 0),
(19, 21, 1, 0, 0, '2020-11-30 19:43:39', 0),
(20, 22, 1, 0, 0, '2020-11-30 19:43:39', 0),
(21, 23, 1, 0, 0, '2020-11-30 19:43:39', 0),
(22, 24, 1, 0, 0, '2020-11-30 19:43:39', 0),
(23, 25, 1, 0, 0, '2020-11-30 19:43:39', 0),
(24, 26, 1, 0, 0, '2020-11-30 19:43:39', 0),
(25, 27, 1, 0, 0, '2020-11-30 19:43:39', 0),
(26, 28, 1, 0, 0, '2020-11-30 19:43:39', 0),
(27, 29, 1, 0, 0, '2020-11-30 19:43:39', 0),
(28, 30, 1, 0, 0, '2020-11-30 19:43:39', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
