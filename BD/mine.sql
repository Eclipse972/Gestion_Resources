-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Mer 24 Février 2021 à 02:58
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
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `type_mine_ID` tinyint(3) unsigned NOT NULL,
  `nombre` int(10) unsigned NOT NULL default '0',
  `prod_max` bigint(20) unsigned NOT NULL default '0',
  `etat` tinyint(1) unsigned NOT NULL default '0' COMMENT 'pourcentage en valeur entière',
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`joueur_ID`,`type_mine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `mine`
--

INSERT INTO `mine` (`joueur_ID`, `type_mine_ID`, `nombre`, `prod_max`, `etat`, `ordre_affichage`) VALUES
(1, 1, 111, 987599, 98, 0),
(1, 2, 750, 91900, 99, 0),
(1, 3, 112, 82424, 95, 0),
(1, 4, 4, 1675, 95, 0),
(1, 5, 27, 1000, 51, 0),
(1, 6, 1, 32565, 70, 0),
(1, 7, 51, 484000, 24, 0),
(1, 8, 78, 651988, 98, 0),
(1, 9, 89, 1645, 54, 0),
(1, 10, 78, 6456, 77, 0),
(1, 11, 15, 561, 14, 0),
(1, 12, 15, 6165, 92, 0),
(1, 13, 0, 979, 58, 0),
(1, 14, 659, 6516, 99, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
