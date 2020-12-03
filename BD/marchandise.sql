-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Jeu 03 Décembre 2020 à 21:54
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
-- Structure de la table `marchandise`
--

CREATE TABLE IF NOT EXISTS `marchandise` (
  `ID` tinyint(3) unsigned NOT NULL auto_increment,
  `nom` text collate latin1_general_ci NOT NULL,
  `image` varchar(30) collate latin1_general_ci NOT NULL COMMENT 'nom du fichier sans l''extension',
  `unité_ID` tinyint(3) unsigned NOT NULL default '1',
  `nature_ID` tinyint(1) unsigned NOT NULL COMMENT 'facilite la recherche: 0=resource, 1=produit, 2butin, 3unité',
  `cours_ki` bigint(20) unsigned NOT NULL,
  `cours_max` bigint(20) unsigned NOT NULL default '0',
  `moment` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `marchandise`
--

INSERT INTO `marchandise` (`ID`, `nom`, `image`, `unité_ID`, `nature_ID`, `cours_ki`, `cours_max`, `moment`) VALUES
(1, 'euro', 'euro', 7, 0, 1, 1, '2019-07-25 21:04:25'),
(2, 'caisse', 'caisse', 3, 0, 0, 0, '2019-07-25 21:04:25'),
(3, 'argile', 'argile', 1, 1, 323, 340, '2019-07-25 21:26:55'),
(4, 'bauxite', 'bauxite', 1, 1, 2020, 2250, '2019-07-25 21:26:55'),
(5, 'calcaire', 'calcaire', 1, 1, 392, 480, '2019-07-25 21:30:54'),
(6, 'chalcopyrite', 'chalcopyrite', 1, 1, 2567, 2780, '2019-07-25 21:30:54'),
(7, 'charbon', 'charbon', 1, 1, 2146, 2263, '2019-07-25 21:41:03'),
(8, 'diamant brut', 'diamant_brut', 5, 1, 1143, 3160, '2019-07-25 21:41:03'),
(9, 'gravier', 'gravier', 1, 1, 378, 455, '2019-07-25 21:42:01'),
(10, 'ilem&eacute;nite', 'ilemenite', 1, 1, 419, 450, '2019-07-25 21:43:59'),
(11, 'minerai d&apos;argent', 'mineraiDargent', 1, 1, 2566, 2566, '2019-07-25 21:46:18'),
(12, 'minerai d&apos;or', 'mineraiDor', 1, 1, 1448, 1448, '2019-07-25 21:46:18'),
(13, 'minerai de fer', 'minerai2fer', 1, 1, 1002, 2890, '2019-07-25 21:48:10'),
(14, 'minerai de lithium', 'minerai2lithium', 1, 1, 319, 813, '2019-07-25 21:48:10'),
(15, 'p&eacute;trole brut', 'petrole', 1, 1, 2496, 2756, '2019-07-25 21:49:37'),
(16, 'sable de quartz', 'sable', 1, 1, 461, 486, '2019-07-25 21:49:37'),
(17, 'acier', 'acier', 1, 2, 34688, 67095, '2019-07-25 21:53:11'),
(18, 'aluminium', 'alu', 1, 2, 88010, 91119, '2019-07-25 21:53:11'),
(19, 'argent', 'argent', 2, 2, 1918, 2015, '2019-07-25 22:00:33'),
(20, 'arme', 'arme', 3, 2, 300737, 374000, '2019-07-25 22:00:33'),
(21, 'batterie', 'batterie', 6, 2, 261991, 261991, '2019-07-30 03:29:43'),
(22, 'bijoux', 'bijoux', 2, 2, 1998050, 1998050, '2019-07-30 03:29:43'),
(23, 'briques', 'briques', 1, 2, 1156, 4105, '2019-07-30 03:31:45'),
(24, 'b&eacute;ton', 'beton', 1, 2, 3996, 6370, '2019-07-30 03:31:45'),
(25, 'camion', 'camion', 3, 2, 174903, 317100, '2019-07-30 03:36:01'),
(26, 'combustible fossile', 'essence', 1, 2, 30431, 34655, '2019-07-30 03:36:01'),
(27, 'composant &eacute;lectronique', 'composant_electronique', 1, 2, 68407, 68407, '2019-07-30 03:38:25'),
(28, 'cuivre', 'cuivre', 1, 2, 98394, 98400, '2019-07-30 03:38:25'),
(29, 'drone de scan', 'drone', 3, 2, 74996352, 75000002, '2019-07-30 03:40:30'),
(30, 'engrais', 'engrais', 1, 2, 2332, 2332, '2019-07-30 03:40:30'),
(31, 'insecticide', 'insecticide', 1, 2, 5389, 5389, '2019-07-30 03:41:07'),
(32, 'lithium', 'lithium', 1, 2, 29520, 49311, '2019-07-30 03:42:58'),
(33, 'or', 'or', 2, 2, 64437, 69080, '2019-07-30 03:42:58'),
(34, 'plastique', 'plastique', 1, 2, 2726, 5999, '2019-07-30 03:44:22'),
(35, 'silicium', 'silicium', 1, 2, 80904, 107350, '2019-07-30 03:44:22'),
(36, 'technologie m&eacute;dicale', 'tech_med', 1, 2, 197220, 197220, '2019-07-30 03:45:57'),
(37, 'titane', 'titane', 1, 2, 32971, 51055, '2019-07-30 03:45:57'),
(38, 'verre', 'verre', 1, 2, 33139, 54001, '2019-07-30 03:47:49'),
(39, 'diamant g&eacute;ant', '', 3, 3, 951069144, 951069144, '2019-07-30 03:47:49'),
(40, 'd&eacute;chet de verre', '', 1, 3, 26950, 37906, '2019-07-30 03:49:10'),
(41, 'd&eacute;chet plastique', '', 1, 3, 5338, 12385, '2019-07-30 03:49:10'),
(42, 'd&eacute;chet électronique', '', 1, 3, 100082, 164371, '2019-07-30 03:51:23'),
(43, 'ferraille', '', 1, 3, 14575, 21530, '2019-07-30 03:51:23'),
(44, 'fossile', '', 3, 3, 3063, 10615, '2019-07-30 03:52:51'),
(45, 'huile usag&eacute;e', '', 1, 3, 4937, 9450, '2019-07-30 03:52:51'),
(46, 'kit de maintenance', '', 3, 3, 10815124, 45300100, '2019-07-30 03:55:26'),
(47, 'monnaie romaine', '', 3, 3, 33226, 36750, '2019-07-30 03:55:26'),
(48, 'pi&egrave;ce en cuivre', '', 3, 3, 13944, 16400, '2019-07-30 03:57:23'),
(49, 'tech upgrade 1', '', 3, 3, 79891279, 80000000, '2019-07-30 03:57:23'),
(50, 'tech upgrade 2', '', 3, 3, 159647310, 176505105, '2019-07-30 03:59:12'),
(51, 'tech upgrade 3', '', 3, 3, 180918823, 200683875, '2019-07-30 03:59:12'),
(52, 'tech upgrade 4', '', 3, 3, 102246934, 102246934, '2019-07-30 04:00:29'),
(53, 'vieux pneus', '', 3, 3, 21248, 23715, '2019-07-30 04:00:29'),
(54, '&eacute;paves de drones', '', 3, 3, 6004516, 9769669, '2019-07-30 04:01:55'),
(55, 'arm&eacute;e priv&eacute;e', '', 4, 4, 12152024, 17850061, '2019-07-30 04:01:55'),
(56, 'chiens d&apos;attaque', '', 4, 4, 200000, 1157700, '2019-07-30 04:04:37'),
(57, 'chiens de garde', '', 4, 4, 83384, 416800, '2019-07-30 04:04:37'),
(58, 'force d&apos;&eacute;lite', '', 4, 4, 11990354, 38955001, '2019-07-30 04:06:31'),
(59, 'gangster', '', 4, 4, 2668075, 9000000, '2019-07-30 04:06:31'),
(60, '&eacute;quipe de sécurit&eacute;', '', 4, 4, 1334320, 4270000, '2019-07-30 04:07:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
