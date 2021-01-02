-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Sam 02 Janvier 2021 à 03:24
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
  `prod_en_cours` int(10) unsigned NOT NULL default '1' COMMENT 'quantité en  cours de production',
  `date_fin_production` int(10) unsigned NOT NULL default '0' COMMENT 'format timestamp',
  `duree_prod_souhaitee` int(10) unsigned NOT NULL default '7200' COMMENT 'format timestamp',
  `ordre_affichage` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`joueur_ID`,`type_usine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `usine`
--

INSERT INTO `usine` (`joueur_ID`, `type_usine_ID`, `niveau`, `prod_en_cours`, `date_fin_production`, `duree_prod_souhaitee`, `ordre_affichage`) VALUES
(1, 1, 39, 9234599, 1609547106, 432000, 0),
(1, 2, 54, 1234569, 1609546412, 0, 1),
(1, 3, 36, 12345698, 1609545759, 7200, 2),
(1, 4, 20, 9234578, 1609544991, 7200, 3),
(1, 5, 22, 1, 1607829892, 7200, 4),
(1, 6, 16, 100000, 1609624384, 4320, 6),
(1, 7, 328, 1, 1609545182, 8640, 7),
(1, 8, 188, 26000000, 1609552886, 8640, 8),
(1, 9, 11, 100000, 1609086224, 8640, 9),
(1, 10, 44, 1, 1607891955, 8640, 10),
(1, 11, 18, 1240000, 1609695100, 8640, 11),
(1, 12, 32, 1, 1608149177, 8640, 12),
(1, 13, 11, 1, 1608108114, 8640, 13),
(1, 14, 53, 1, 1607528936, 4320, 0),
(1, 15, 31, 1, 1607372676, 2880, 0),
(1, 16, 22, 1, 1607669082, 8640, 5),
(1, 17, 11, 4294967295, 1609205906, 8640, 0),
(1, 18, 29, 1, 1607826153, 8640, 0),
(1, 19, 18, 1, 1607567025, 8640, 0),
(1, 20, 18, 1, 1607567026, 7200, 0),
(1, 21, 17, 1, 1607779068, 8640, 0),
(1, 22, 44, 1, 1607779052, 8640, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
