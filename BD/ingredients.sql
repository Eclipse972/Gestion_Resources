-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 26 Novembre 2020 à 06:39
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
-- Structure de la table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `recette_ID` int(5) NOT NULL,
  `nature` int(1) NOT NULL COMMENT 'facilite la recherche: 0=ingrédients, 1=argent, 2produit',
  `marchandise_ID` int(5) NOT NULL,
  `quantité` int(5) NOT NULL COMMENT 'négatif si consommation',
  UNIQUE KEY `unicité` (`recette_ID`,`marchandise_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`recette_ID`, `nature`, `marchandise_ID`, `quantité`) VALUES
(1, 1, 1, 0),
(1, 2, 3, 1),
(2, 1, 1, 0),
(2, 2, 4, 1),
(3, 1, 1, 0),
(3, 2, 5, 1),
(4, 1, 1, 0),
(4, 2, 6, 1),
(5, 1, 1, 0),
(5, 2, 7, 1),
(6, 1, 1, 0),
(6, 2, 8, 1),
(7, 1, 1, 0),
(7, 2, 9, 1),
(8, 1, 1, 0),
(8, 2, 10, 1),
(9, 1, 1, 0),
(9, 2, 11, 1),
(10, 1, 1, 0),
(10, 2, 12, 1),
(11, 1, 1, 0),
(11, 2, 13, 1),
(12, 1, 1, 0),
(12, 2, 14, 1),
(13, 1, 1, 0),
(13, 2, 15, 1),
(14, 1, 1, 0),
(14, 2, 16, 1),
(15, 1, 1, 350),
(15, 0, 13, -7),
(15, 0, 7, -10),
(15, 2, 17, 1),
(16, 1, 1, 5000),
(16, 0, 4, -24),
(16, 2, 18, 4),
(17, 2, 19, 50),
(17, 1, 1, 10000),
(17, 0, 11, -8),
(18, 2, 20, 25),
(18, 1, 1, 250000),
(18, 0, 17, -1),
(18, 0, 18, -1),
(18, 0, 21, -1),
(19, 2, 21, 10),
(19, 1, 1, 75000),
(19, 0, 32, -20),
(19, 0, 34, -40),
(19, 0, 18, -10),
(20, 2, 24, 14),
(20, 1, 1, 20),
(20, 0, 9, -3),
(20, 0, 5, -2),
(21, 2, 22, 2),
(21, 0, 8, -1000),
(21, 0, 33, -1),
(21, 0, 19, -1),
(21, 1, 1, 50000),
(22, 1, 1, 10),
(22, 0, 3, -3),
(23, 2, 25, 50),
(23, 1, 1, 2500000),
(23, 0, 17, -100),
(23, 0, 21, -25),
(23, 0, 19, -50),
(24, 2, 26, 4),
(24, 1, 1, 150),
(24, 0, 15, -4),
(25, 2, 27, 8),
(25, 1, 1, 5000),
(25, 0, 34, -4),
(25, 0, 28, -3),
(25, 0, 35, -1),
(26, 2, 28, 3),
(26, 1, 1, 2500),
(26, 0, 6, -9),
(27, 2, 29, 1),
(27, 1, 1, 25000000),
(27, 0, 27, -25),
(27, 0, 37, -50),
(27, 0, 21, -250),
(28, 2, 30, 11),
(28, 1, 1, 90),
(28, 0, 5, -8),
(29, 2, 31, 35),
(29, 1, 1, 2400),
(29, 0, 28, -1),
(29, 0, 5, -3),
(30, 2, 32, 5),
(30, 1, 1, 5000),
(30, 0, 14, -115),
(31, 2, 33, 3),
(31, 1, 1, 20000),
(31, 0, 12, -20),
(32, 2, 34, 10),
(32, 1, 1, 400),
(32, 0, 15, -1),
(33, 2, 35, 2),
(33, 1, 1, 49500),
(33, 0, 16, -20),
(33, 0, 3, -1),
(33, 0, 26, -5),
(34, 2, 36, 10),
(34, 1, 1, 90000),
(34, 0, 37, -4),
(34, 0, 34, -2),
(34, 0, 27, -2),
(35, 2, 37, 4),
(35, 1, 1, 10000),
(35, 0, 10, -8),
(36, 2, 38, 8),
(36, 1, 1, 3000),
(36, 0, 16, -6),
(36, 0, 26, -8),
(36, 0, 5, -4),
(22, 2, 23, 2),
(37, 0, 5, -3000),
(37, 0, 23, -500),
(37, 0, 24, -9000),
(37, 0, 1, 10000000),
(38, 2, 24, -25000),
(38, 2, 38, -1500),
(38, 2, 17, -2500),
(38, 2, 1, 40000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
