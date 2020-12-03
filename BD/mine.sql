-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 03 Décembre 2020 à 21:54
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
-- Structure de la table `mine`
--

CREATE TABLE IF NOT EXISTS `mine` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `type_mine_ID` tinyint(3) unsigned NOT NULL,
  `nombre` int(10) unsigned NOT NULL default '0',
  `prod_max` bigint(20) unsigned NOT NULL default '0',
  `etat` tinyint(1) unsigned NOT NULL default '0' COMMENT 'pourcentage en valeur entière',
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `joueur_ID` (`joueur_ID`,`type_mine_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `mine`
--

INSERT INTO `mine` (`ID`, `joueur_ID`, `type_mine_ID`, `nombre`, `prod_max`, `etat`, `ordre_affichage`) VALUES
(1, 1, 1, 10, 11111, 100, 0),
(2, 1, 2, 20, 2222, 69, 0),
(3, 1, 3, 510, 44444, 56, 0),
(4, 1, 4, 65, 15162, 15, 0),
(5, 1, 5, 87, 446, 89, 0),
(6, 1, 6, 12, 32565, 69, 0),
(7, 1, 7, 51, 48481, 24, 0),
(8, 1, 8, 7, 6519, 99, 0),
(9, 1, 9, 89, 1645, 54, 0),
(10, 1, 10, 78, 6456, 77, 0),
(11, 1, 11, 15, 561, 14, 0),
(12, 1, 12, 15, 6165, 92, 0),
(13, 1, 13, 0, 979, 58, 0),
(14, 1, 14, 651, 6516, 6, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
