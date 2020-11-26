-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 26 Novembre 2020 à 06:41
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
  `nature_ID` int(5) NOT NULL COMMENT 'voir nature recette',
  `nom` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=58 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`ID`, `nature_ID`, `nom`) VALUES
(1, 4, 'argile'),
(2, 4, 'bauxite'),
(3, 4, 'calcaire'),
(4, 4, 'chalcopyrite'),
(5, 4, 'charbon'),
(6, 4, 'diamant brut'),
(7, 4, 'gravier'),
(8, 4, 'ileménite'),
(9, 4, 'minerai d’argent'),
(10, 4, 'minerai d’or'),
(11, 4, 'minerai de fer'),
(12, 4, 'minerai de lithium'),
(13, 4, 'pétrole brut'),
(14, 4, 'sable de quartz'),
(15, 1, 'acier'),
(16, 1, 'aluminium'),
(17, 1, 'argent'),
(18, 1, 'arme'),
(19, 1, 'batterie'),
(20, 1, 'béton'),
(21, 1, 'bijoux'),
(22, 1, 'briques'),
(23, 1, 'camion'),
(24, 1, 'combustible fossile'),
(25, 1, 'composants électroniques'),
(26, 1, 'cuivre'),
(27, 1, 'drone de scan'),
(28, 1, 'engrais'),
(29, 1, 'insecticide'),
(30, 1, 'lithium'),
(31, 1, 'or'),
(32, 1, 'plastique'),
(33, 1, 'silicium'),
(34, 1, 'technologie médicale'),
(35, 1, 'titane'),
(36, 1, 'verre'),
(37, 2, 'aci&eacute;rie'),
(38, 2, 'usine d&apos;aluminium'),
(39, 2, 'rafinerie d&apos;argent'),
(40, 2, 'usine d&apos;armement'),
(41, 2, 'usine de batterie'),
(42, 2, 'usine de b&eacute;ton'),
(43, 2, 'orf&egrave;vre'),
(44, 2, 'usine de briques'),
(45, 2, 'usine de camions'),
(46, 2, 'raffinerie de p&eacute;trole'),
(47, 2, 'usine de composants &eacute;lectroniques'),
(48, 2, 'usine de cuivre'),
(49, 2, 'usine de drones'),
(50, 2, 'usine d&apos;engrais'),
(51, 2, 'usine d&apos;insecticides'),
(52, 2, 'raffinerie de lithium'),
(53, 2, 'raffinerie d&apos;or'),
(54, 2, 'usine de plastique'),
(55, 2, 'raffinerie de silicium'),
(56, 2, 'raffinerie de titane'),
(57, 2, 'verrerie');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
