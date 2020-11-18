-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Mer 18 Novembre 2020 à 10:52
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
  `marchandise_ID` int(11) NOT NULL COMMENT 'marchandise associée',
  `production_ID` int(11) NOT NULL COMMENT 'identifiant recette',
  `amelioration_ID` int(11) NOT NULL COMMENT 'identifiant recette',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `type_usine`
--

INSERT INTO `type_usine` (`ID`, `nom`, `marchandise_ID`, `production_ID`, `amelioration_ID`) VALUES
(1, 'aciérie', 17, 0, 0),
(2, 'usine d''aluminium', 18, 0, 0),
(3, 'usine d''argent', 19, 0, 0),
(4, 'usine d''armement', 20, 0, 0),
(5, 'usine de batteries', 21, 0, 0),
(6, 'orfèvre', 22, 0, 0),
(7, 'usine de briques', 23, 0, 0),
(8, 'usine de béton', 24, 0, 0),
(9, 'usine de camions', 25, 0, 0),
(10, 'raffinerie de pétrole', 26, 0, 0),
(11, 'usine de composants électroniques', 27, 0, 0),
(12, 'raffinerie de ciuivre', 28, 0, 0),
(13, 'usine de drones', 29, 0, 0),
(14, 'usine d''engrais', 30, 0, 0),
(15, 'usine d''insecticide', 31, 0, 0),
(16, 'usine de lithoum', 32, 0, 0),
(17, 'raffinerie d''or', 33, 0, 0),
(18, 'usine de plastique', 34, 0, 0),
(19, 'usine de silicium', 35, 0, 0),
(20, 'usine de technologie médicale', 36, 0, 0),
(21, 'usine de titane', 37, 0, 0),
(22, 'usine de verre', 38, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
