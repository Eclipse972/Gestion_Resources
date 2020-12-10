-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 10 Décembre 2020 à 02:13
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
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `type_usine_ID` tinyint(3) unsigned NOT NULL,
  `niveau` int(10) unsigned NOT NULL,
  `date_fin_production` int(10) unsigned NOT NULL default '0' COMMENT 'format timestamp',
  `duree_prod_souhaitee` int(10) unsigned NOT NULL default '7200' COMMENT 'format timestamp',
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`joueur_ID`,`type_usine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `usine`
--

INSERT INTO `usine` (`joueur_ID`, `type_usine_ID`, `niveau`, `date_fin_production`, `duree_prod_souhaitee`, `ordre_affichage`) VALUES
(1, 1, 20, 1607560289, 8199, 0),
(1, 2, 27, 1607298872, 0, 1),
(1, 3, 13, 1609870326, 7200, 2),
(1, 4, 10, 1608789730, 7200, 3),
(1, 5, 14, 1607458030, 7200, 4),
(1, 6, 14, 1607398072, 4320, 6),
(1, 7, 458, 1607482419, 8640, 7),
(1, 8, 186, 1607886003, 8640, 8),
(1, 9, 7, 1608246869, 8640, 9),
(1, 10, 43, 1607891955, 8640, 10),
(1, 11, 18, 1607408173, 8640, 11),
(1, 12, 32, 1608149177, 8640, 12),
(1, 13, 7, 1608108114, 8640, 13),
(1, 14, 53, 1607528936, 4320, 0),
(1, 15, 31, 1607372676, 2880, 0),
(1, 16, 22, 1607669082, 8640, 5),
(1, 17, 11, 1609205906, 8640, 0),
(1, 18, 29, 1607826153, 8640, 0),
(1, 19, 18, 1607567025, 8640, 0),
(1, 20, 18, 1607567026, 7200, 0),
(1, 21, 15, 1607779068, 8640, 0),
(1, 22, 39, 1607779052, 8640, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
