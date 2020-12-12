-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Sam 12 Décembre 2020 à 06:26
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
-- Structure de la table `commerce`
--

CREATE TABLE IF NOT EXISTS `commerce` (
  `joueur_ID` tinyint(3) unsigned NOT NULL,
  `marchandise_ID` tinyint(3) unsigned NOT NULL,
  `ordre_affichage` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`joueur_ID`,`marchandise_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `commerce`
--

INSERT INTO `commerce` (`joueur_ID`, `marchandise_ID`, `ordre_affichage`) VALUES
(1, 3, 1),
(1, 4, 2),
(1, 5, 3),
(1, 6, 4),
(1, 7, 5),
(1, 8, 6),
(1, 9, 7),
(1, 10, 8),
(1, 11, 9),
(1, 12, 10),
(1, 13, 11),
(1, 14, 12),
(1, 15, 13),
(1, 16, 14),
(1, 17, 15),
(1, 18, 16),
(1, 19, 17),
(1, 20, 18),
(1, 21, 19),
(1, 22, 20),
(1, 23, 21),
(1, 24, 22),
(1, 25, 23),
(1, 26, 24),
(1, 27, 25),
(1, 28, 26),
(1, 29, 27),
(1, 30, 28),
(1, 31, 29),
(1, 32, 30),
(1, 33, 31),
(1, 34, 32),
(1, 35, 33),
(1, 36, 34),
(1, 37, 35),
(1, 38, 36),
(1, 39, 37),
(1, 40, 38),
(1, 41, 39),
(1, 42, 40),
(1, 43, 41),
(1, 44, 42),
(1, 45, 43),
(1, 46, 44),
(1, 47, 45),
(1, 48, 46),
(1, 49, 47),
(1, 50, 48),
(1, 51, 49),
(1, 52, 50),
(1, 53, 51),
(1, 54, 52),
(1, 55, 53),
(1, 56, 54),
(1, 57, 55),
(1, 58, 56),
(1, 59, 57),
(1, 60, 58),
(2, 3, 1),
(2, 4, 2),
(2, 5, 3),
(2, 6, 4),
(2, 7, 5),
(2, 8, 6),
(2, 9, 7),
(2, 10, 8),
(2, 11, 9),
(2, 12, 10),
(2, 13, 11),
(2, 14, 12),
(2, 15, 13),
(2, 16, 14),
(2, 17, 15),
(2, 18, 16),
(2, 19, 17),
(2, 20, 18),
(2, 21, 19),
(2, 22, 20),
(2, 23, 21),
(2, 24, 22),
(2, 25, 23),
(2, 26, 24),
(2, 27, 25),
(2, 28, 26),
(2, 29, 27),
(2, 30, 28),
(2, 31, 29),
(2, 32, 30),
(2, 33, 31),
(2, 34, 32),
(2, 35, 33),
(2, 36, 34),
(2, 37, 35),
(2, 38, 36),
(2, 39, 37),
(2, 40, 38),
(2, 41, 39),
(2, 42, 40),
(2, 43, 41),
(2, 44, 42),
(2, 45, 43),
(2, 46, 44),
(2, 47, 45),
(2, 48, 46),
(2, 49, 47),
(2, 50, 48),
(2, 51, 49),
(2, 52, 50),
(2, 53, 51),
(2, 54, 52),
(2, 55, 53),
(2, 56, 54),
(2, 57, 55),
(2, 58, 56),
(2, 59, 57),
(2, 60, 58);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
