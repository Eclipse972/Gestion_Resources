-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Sam 02 Janvier 2021 à 03:23
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
-- Structure de la table `nature_marchandise`
--

CREATE TABLE IF NOT EXISTS `nature_marchandise` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `nom` varchar(11) collate latin1_general_ci NOT NULL,
  `obtention` text collate latin1_general_ci NOT NULL COMMENT 'principal manière',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nature de la marchandise' AUTO_INCREMENT=9 ;

--
-- Contenu de la table `nature_marchandise`
--

INSERT INTO `nature_marchandise` (`ID`, `nom`, `obtention`) VALUES
(1, 'ressource', 'extraction'),
(2, 'produit', 'production'),
(3, 'butin', 'gain'),
(4, 'unité', 'recrutement');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
