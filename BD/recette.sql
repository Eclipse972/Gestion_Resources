-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Lun 23 Novembre 2020 à 01:53
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
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `ID` int(5) NOT NULL auto_increment,
  `nature_ID` int(5) NOT NULL,
  `nom` varchar(30) collate latin1_general_ci NOT NULL,
  `production_base` int(5) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=37 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`ID`, `nature_ID`, `nom`, `production_base`) VALUES
(1, 4, 'argile', 1),
(2, 4, 'bauxite', 1),
(3, 4, 'calcaire', 1),
(4, 4, 'chalcopyrite', 1),
(5, 4, 'charbon', 1),
(6, 4, 'diamant brut', 1),
(7, 4, 'gravier', 1),
(8, 4, 'ileménite', 1),
(9, 4, 'minerai d’argent', 1),
(10, 4, 'minerai d’or', 1),
(11, 4, 'minerai de fer', 1),
(12, 4, 'minerai de lithium', 1),
(13, 4, 'pétrole brut', 1),
(14, 4, 'sable de quartz', 1),
(15, 1, 'acier', 1),
(16, 1, 'aluminium', 4),
(17, 1, 'argent', 50),
(18, 1, 'arme', 25),
(19, 1, 'batterie', 10),
(20, 1, 'béton', 14),
(21, 1, 'bijoux', 2),
(22, 1, 'briques', 2),
(23, 1, 'camion', 50),
(24, 1, 'combustible fossile', 4),
(25, 1, 'composants électroniques', 8),
(26, 1, 'cuivre', 3),
(27, 1, 'drone de scan', 1),
(28, 1, 'engrais', 11),
(29, 1, 'insecticide', 35),
(30, 1, 'lithium', 5),
(31, 1, 'or', 3),
(32, 1, 'plastique', 10),
(33, 1, 'silicium', 2),
(34, 1, 'technologie médicale', 10),
(35, 1, 'titane', 4),
(36, 1, 'verre', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
