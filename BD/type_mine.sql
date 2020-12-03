-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 03 Décembre 2020 à 21:55
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
-- Structure de la table `type_mine`
--

CREATE TABLE IF NOT EXISTS `type_mine` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `marchandise_ID` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `type_mine`
--

INSERT INTO `type_mine` (`ID`, `nom`, `marchandise_ID`) VALUES
(1, 'mine d&apos;argile', 3),
(2, 'mine de bauxite', 4),
(3, 'mine de calcaire', 5),
(4, 'mine de chacopyrite', 6),
(5, 'mine de charbon', 7),
(6, 'mine de diamants', 8),
(7, 'mine de graviers', 9),
(8, 'mine d&apos;ilem&eacute;nite', 10),
(9, 'mine d&apos;argent', 11),
(10, 'mine d&apos;or', 12),
(11, 'mine de fer', 13),
(12, 'mine de lithium', 14),
(13, 'puits de p&eacute;trole', 15),
(14, 'mine de sable', 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
