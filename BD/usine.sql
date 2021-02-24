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
-- Structure de la table `usine`
--

CREATE TABLE IF NOT EXISTS `usine` (
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `type_usine_ID` tinyint(3) unsigned NOT NULL,
  `niveau` int(10) unsigned NOT NULL,
  `prod_en_cours` int(10) unsigned NOT NULL default '1' COMMENT 'quantité en  cours de production',
  `date_fin_production` int(10) unsigned NOT NULL default '0' COMMENT 'format timestamp',
  `prod_souhaitee` int(10) unsigned NOT NULL default '10000',
  `ordre_affichage` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`joueur_ID`,`type_usine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `usine`
--

INSERT INTO `usine` (`joueur_ID`, `type_usine_ID`, `niveau`, `prod_en_cours`, `date_fin_production`, `prod_souhaitee`, `ordre_affichage`) VALUES
(1, 1, 47, 92345899, 1614219448, 965555, 1),
(1, 2, 54, 12345690, 1614225807, 2000000, 2),
(1, 3, 36, 12345698, 1614218624, 3000000, 3),
(1, 4, 20, 9234578, 1609544991, 4000000, 4),
(1, 5, 22, 1, 1607829892, 500000, 5),
(1, 6, 16, 100000, 1610868759, 0, 6),
(1, 7, 328, 123456789, 1614287168, 0, 7),
(1, 8, 188, 26000000, 1609552886, 0, 8),
(1, 9, 11, 100000, 1609086224, 0, 9),
(1, 10, 44, 1, 1607891955, 0, 10),
(1, 11, 18, 1240000, 1609695100, 0, 11),
(1, 12, 32, 1, 1608149177, 0, 12),
(1, 13, 11, 1, 1608108114, 0, 13),
(1, 14, 53, 1, 1607528936, 0, 14),
(1, 15, 31, 1, 1607372676, 0, 15),
(1, 16, 22, 1, 1607669082, 0, 16),
(1, 17, 11, 4294967295, 1609205906, 0, 17),
(1, 18, 29, 1, 1607826153, 0, 18),
(1, 19, 18, 1, 1607567025, 0, 19),
(1, 20, 18, 1, 1607567026, 0, 20),
(1, 21, 17, 1, 1607779068, 0, 21),
(1, 22, 44, 1, 1607779052, 0, 22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
