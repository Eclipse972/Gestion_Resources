-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Lun 30 Novembre 2020 à 21:35
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
-- Structure de la table `usine`
--

CREATE TABLE IF NOT EXISTS `usine` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `type_usine_ID` tinyint(3) unsigned NOT NULL,
  `niveau` tinyint(3) unsigned NOT NULL,
  `t_fin_production` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ordre_affichage` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `joueur_ID` (`joueur_ID`,`type_usine_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `usine`
--

INSERT INTO `usine` (`ID`, `joueur_ID`, `type_usine_ID`, `niveau`, `t_fin_production`, `ordre_affichage`) VALUES
(1, 1, 1, 27, '2020-11-29 17:57:29', 0),
(2, 1, 2, 13, '2020-11-29 17:57:29', 1),
(3, 1, 3, 10, '2020-11-29 17:57:29', 2),
(4, 1, 4, 14, '2020-11-29 17:57:29', 3),
(5, 1, 5, 185, '2020-11-29 17:57:29', 4),
(6, 1, 6, 255, '2020-11-29 18:02:56', 6),
(7, 1, 7, 7, '2020-11-29 18:02:56', 7),
(8, 1, 8, 7, '2020-11-29 18:02:56', 8),
(9, 1, 9, 43, '2020-11-29 18:02:56', 9),
(10, 1, 10, 16, '2020-11-29 18:02:56', 10),
(11, 1, 11, 32, '2020-11-29 18:09:07', 11),
(12, 1, 12, 53, '2020-11-29 18:10:25', 12),
(13, 1, 13, 53, '2020-11-29 18:10:25', 13),
(14, 1, 14, 51, '2020-11-29 18:12:48', 0),
(15, 1, 15, 22, '2020-11-29 18:12:48', 0),
(16, 1, 16, 11, '2020-11-29 18:12:48', 5),
(17, 1, 17, 16, '2020-11-29 18:12:48', 0),
(18, 1, 18, 18, '2020-11-29 18:12:48', 0),
(19, 1, 19, 38, '2020-11-29 18:15:40', 0),
(20, 1, 20, 56, '2020-11-29 18:15:40', 0),
(21, 1, 21, 62, '2020-11-29 18:15:40', 0),
(22, 1, 22, 33, '2020-11-29 18:16:41', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
