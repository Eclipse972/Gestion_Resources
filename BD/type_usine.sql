-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 26 Novembre 2020 à 06:42
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
-- Structure de la table `type_usine`
--

CREATE TABLE IF NOT EXISTS `type_usine` (
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(40) collate latin1_general_ci NOT NULL,
  `image` varchar(30) collate latin1_general_ci NOT NULL,
  `marchandise_ID` int(11) NOT NULL COMMENT 'marchandise associée',
  `production_ID` int(11) NOT NULL COMMENT 'identifiant recette',
  `amelioration_ID` int(11) NOT NULL COMMENT 'identifiant recette',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `type_usine`
--

INSERT INTO `type_usine` (`ID`, `nom`, `image`, `marchandise_ID`, `production_ID`, `amelioration_ID`) VALUES
(1, 'aci&eacute;rie', 'acierie', 17, 15, 0),
(2, 'usine d&apos;aluminium', 'usine_aluminium', 18, 16, 0),
(3, 'rafinerie d&apos;argent', 'raffinerie_argent', 19, 17, 0),
(4, 'usine d&apos;armement', 'usineDarmes', 20, 18, 0),
(5, 'usine de batteries', 'usine_batterie', 21, 19, 0),
(6, 'orf&egrave;vre', 'orfevre', 22, 21, 0),
(7, 'usine de briques', 'usine_brique', 23, 22, 0),
(8, 'usine de b&eacute;ton', 'usine_beton', 24, 20, 0),
(9, 'usine de camions', 'usine_camion', 25, 23, 0),
(10, 'raffinerie de p&eacute;trole', 'raffinerie_petrole', 26, 24, 0),
(11, 'usine de composants &eacute;lectroniques', 'usine_electronique', 27, 25, 0),
(12, 'raffinerie de cuivre', 'raffinerie_cuivre', 28, 26, 0),
(13, 'usine de drones', 'usine_drone', 29, 27, 0),
(14, 'usine d&apos;engrais', 'usineDengrais', 30, 28, 0),
(15, 'usine d&apos;insecticide', 'usine_insecticide', 31, 29, 0),
(16, 'usine de lithum', 'usine_lithium', 32, 30, 0),
(17, 'raffinerie d&apos;or', 'raffinerie_or', 33, 31, 0),
(18, 'usine de plastique', 'usine_plastique', 34, 32, 0),
(19, 'usine de silicium', 'usine_silicium', 35, 33, 0),
(20, 'usine de technologie m&eacute;dicale', 'usine_techMed', 36, 34, 0),
(21, 'usine de titane', 'usine_titane', 37, 35, 0),
(22, 'usine de verre', 'verrerie', 38, 36, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
