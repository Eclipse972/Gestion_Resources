-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Mar 30 Juillet 2019 à 05:00
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
  `ID` int(11) NOT NULL auto_increment,
  `nom` varchar(30) collate latin1_general_ci NOT NULL,
  `unité_ID` int(11) NOT NULL default '1',
  `nature_ID` tinyint(1) unsigned NOT NULL,
  `producteur` varchar(30) collate latin1_general_ci NOT NULL,
  `cours_ki` int(10) unsigned NOT NULL,
  `cours_max` int(10) unsigned NOT NULL default '0',
  `moment` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `marchandise`
--

INSERT INTO `marchandise` (`ID`, `nom`, `unité_ID`, `nature_ID`, `producteur`, `cours_ki`, `cours_max`, `moment`) VALUES
(1, 'argent', 0, 0, '', 1, 0, '2019-07-25 21:04:25'),
(2, 'caisse', 3, 0, '', 0, 0, '2019-07-25 21:04:25'),
(3, 'argile', 1, 1, 'mine d''argile', 323, 340, '2019-07-25 21:26:55'),
(4, 'bauxite', 1, 1, 'mine de bauxite', 2020, 2250, '2019-07-25 21:26:55'),
(5, 'calcaire', 1, 1, 'mine de calcaire', 392, 480, '2019-07-25 21:30:54'),
(6, 'chalcopyrite', 1, 1, 'mine de chacopyrite', 2567, 2780, '2019-07-25 21:30:54'),
(7, 'charbon', 1, 1, 'mine de charbon', 2146, 2263, '2019-07-25 21:41:03'),
(8, 'diamant brut', 5, 1, 'mine de diamants', 1143, 3160, '2019-07-25 21:41:03'),
(9, 'gravier', 1, 1, 'mine de graviers', 378, 455, '2019-07-25 21:42:01'),
(10, 'ileménite', 1, 1, 'mine d''ileménite', 419, 450, '2019-07-25 21:43:59'),
(11, 'minerai d''argent', 1, 1, 'mine d''argent', 2566, 0, '2019-07-25 21:46:18'),
(12, 'minerai d''or', 1, 1, 'mine d''or', 1448, 0, '2019-07-25 21:46:18'),
(13, 'minerai de fer', 1, 1, 'mine de fer', 1002, 2890, '2019-07-25 21:48:10'),
(14, 'minerai de lithium', 1, 1, 'mine de lithiul', 319, 813, '2019-07-25 21:48:10'),
(15, 'pétrole brut', 1, 1, 'puits de pétrole', 2496, 2756, '2019-07-25 21:49:37'),
(16, 'sable de quartz', 1, 1, 'mine de sable', 461, 486, '2019-07-25 21:49:37'),
(17, 'acier', 1, 2, 'aciérie', 34688, 67095, '2019-07-25 21:53:11'),
(18, 'aluminium', 1, 2, 'usine d''aluminium', 88010, 91119, '2019-07-25 21:53:11'),
(19, 'argent', 2, 2, 'usine d''argent', 1918, 2015, '2019-07-25 22:00:33'),
(20, 'arme', 3, 2, 'usine d''armement', 300737, 374000, '2019-07-25 22:00:33'),
(21, 'batterie', 6, 2, 'usine de batteries', 261991, 0, '2019-07-30 03:29:43'),
(22, 'bijoux', 2, 2, 'orfèvre', 1998050, 0, '2019-07-30 03:29:43'),
(23, 'briques', 1, 2, 'usine de briques', 1156, 4105, '2019-07-30 03:31:45'),
(24, 'béton', 1, 2, 'usine de béton', 3996, 6370, '2019-07-30 03:31:45'),
(25, 'camions', 3, 2, 'usine de camions', 174903, 317100, '2019-07-30 03:36:01'),
(26, 'combustible fossile', 1, 2, 'raffinerie de pétrole', 30431, 34655, '2019-07-30 03:36:01'),
(27, 'composants électroniques', 1, 2, 'usine de composant électroniqu', 68407, 0, '2019-07-30 03:38:25'),
(28, 'cuivre', 1, 2, 'raffinerie de ciuivre', 98394, 98400, '2019-07-30 03:38:25'),
(29, 'drones de scan', 3, 2, 'usine de drones', 74996352, 75000002, '2019-07-30 03:40:30'),
(30, 'engrais', 1, 2, 'usine d''engrais', 2332, 0, '2019-07-30 03:40:30'),
(31, 'insecticides', 1, 2, 'usine d''insecticide', 5389, 0, '2019-07-30 03:41:07'),
(32, 'lithium', 1, 2, 'usine de lithoum', 29520, 49311, '2019-07-30 03:42:58'),
(33, 'or', 2, 2, 'raffinerie d''or', 64437, 69080, '2019-07-30 03:42:58'),
(34, 'plastique', 1, 2, 'usine de plastique', 2726, 5999, '2019-07-30 03:44:22'),
(35, 'silicium', 1, 2, 'usine de silicium', 80904, 107350, '2019-07-30 03:44:22'),
(36, 'technologie médicale', 1, 2, 'usine de technologie médicale', 197220, 0, '2019-07-30 03:45:57'),
(37, 'titane', 1, 2, 'usine de titane', 32971, 51055, '2019-07-30 03:45:57'),
(38, 'verre', 1, 2, 'usine de verre', 33139, 54001, '2019-07-30 03:47:49'),
(39, 'diamant géant', 3, 3, '', 951069144, 0, '2019-07-30 03:47:49'),
(40, 'déchet de verre', 1, 3, '', 26950, 37906, '2019-07-30 03:49:10'),
(41, 'déchet plastique', 1, 3, '', 5338, 12385, '2019-07-30 03:49:10'),
(42, 'déchet électronique', 1, 3, '', 100082, 164371, '2019-07-30 03:51:23'),
(43, 'ferraille', 1, 3, '', 14575, 21530, '2019-07-30 03:51:23'),
(44, 'fossile', 3, 3, '', 3063, 10615, '2019-07-30 03:52:51'),
(45, 'huile usagée', 1, 3, '', 4937, 9450, '2019-07-30 03:52:51'),
(46, 'kit de maintenance', 3, 3, '', 10815124, 45300100, '2019-07-30 03:55:26'),
(47, 'monnaie romaine', 3, 3, '', 33226, 36750, '2019-07-30 03:55:26'),
(48, 'pièce en cuivre', 3, 3, '', 13944, 16400, '2019-07-30 03:57:23'),
(49, 'tech upgrade 1', 3, 3, '', 79891279, 80000000, '2019-07-30 03:57:23'),
(50, 'tech upgrade 2', 3, 3, '', 159647310, 176505105, '2019-07-30 03:59:12'),
(51, 'tech upgrade 3', 3, 3, '', 180918823, 200683875, '2019-07-30 03:59:12'),
(52, 'tech upgrade 4', 3, 3, '', 102246934, 0, '2019-07-30 04:00:29'),
(53, 'vieux pneus', 3, 3, '', 21248, 23715, '2019-07-30 04:00:29'),
(54, 'épaves de drones', 3, 3, '', 6004516, 9769669, '2019-07-30 04:01:55'),
(55, 'armée privée', 4, 4, '', 12152024, 17850061, '2019-07-30 04:01:55'),
(56, 'chiens d''attaque', 4, 4, '', 200000, 1157700, '2019-07-30 04:04:37'),
(57, 'chiens de garde', 4, 4, 'camp d''entrainement', 83384, 416800, '2019-07-30 04:04:37'),
(58, 'force d''élite', 4, 4, 'camp d''entrainement', 11990354, 38955001, '2019-07-30 04:06:31'),
(59, 'gangster', 4, 4, '', 2668075, 9000000, '2019-07-30 04:06:31'),
(60, 'équipe de sécurité', 4, 4, '', 1334320, 4270000, '2019-07-30 04:07:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
