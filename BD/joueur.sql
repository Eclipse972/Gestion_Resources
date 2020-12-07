-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Lun 07 Décembre 2020 à 21:31
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
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `pseudo` text collate latin1_general_ci NOT NULL,
  `connecté?` tinyint(1) NOT NULL,
  `mdp_chiffré` varchar(256) collate latin1_general_ci NOT NULL,
  `email` text collate latin1_general_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `niveauQG` tinyint(1) unsigned NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`ID`, `pseudo`, `connecté?`, `mdp_chiffré`, `email`, `niveau`, `niveauQG`) VALUES
(1, 'Lambda', 0, '', 'christophe.hervi@free.fr', 233, 5),
(2, '2Fer', 0, '', 'christophe.hervi@free.fr', 108, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
