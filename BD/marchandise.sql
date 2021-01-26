-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Mar 26 Janvier 2021 à 20:58
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
  `name` text collate latin1_general_ci NOT NULL,
  `IDimage` tinyint(3) unsigned NOT NULL,
  `unité_ID` tinyint(1) unsigned NOT NULL default '1',
  `nature_ID` tinyint(1) unsigned NOT NULL COMMENT 'facilite la recherche: 0=resource, 1=produit, 2butin, 3unité et 0autre',
  `cours_ki` bigint(20) unsigned NOT NULL,
  `cours_max` bigint(20) unsigned NOT NULL default '0',
  `moment` int(11) unsigned NOT NULL COMMENT 'moment de la MAJ de la valeur',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `marchandise`
--

INSERT INTO `marchandise` (`ID`, `nom`, `name`, `IDimage`, `unité_ID`, `nature_ID`, `cours_ki`, `cours_max`, `moment`) VALUES
(1, 'euro', '', 1, 7, 0, 1, 1, 2019),
(2, 'caisse', '', 0, 3, 0, 0, 0, 2019),
(3, 'argile', 'clay', 2, 1, 1, 323, 0, 2019),
(4, 'bauxite', 'bauxite', 12, 1, 1, 2020, 2250, 2019),
(5, 'calcaire', 'limestone', 20, 1, 1, 392, 480, 2019),
(6, 'chalcopyrite', 'chalcopyrite', 26, 1, 1, 2567, 2780, 2019),
(7, 'charbon', 'coal', 8, 1, 1, 2146, 2263, 2019),
(8, 'diamant brut', 'rough diamonds', 81, 5, 1, 1143, 3160, 2019),
(9, 'gravier', 'gravel', 3, 1, 1, 378, 455, 2019),
(10, 'ilem&eacute;nite', 'ilmenite', 49, 1, 1, 419, 450, 2019),
(11, 'minerai d&apos;argent', 'silver ore', 15, 1, 1, 2566, 2566, 2019),
(12, 'minerai d&apos;or', 'gold ore', 14, 1, 1, 1448, 1448, 2019),
(13, 'minerai de fer', 'iron core', 13, 1, 1, 1002, 2890, 2019),
(14, 'minerai de lithium', 'lithium ore', 90, 1, 1, 319, 813, 2019),
(15, 'p&eacute;trole brut', 'crude oil', 10, 1, 1, 2496, 2756, 2019),
(16, 'sable de quartz', 'quartz sand', 53, 1, 1, 461, 486, 2019),
(17, 'acier', 'steel', 30, 1, 2, 34688, 67095, 2019),
(18, 'aluminium', 'aluminium', 32, 1, 2, 88010, 91119, 2019),
(19, 'argent', 'silver', 35, 2, 2, 1918, 2015, 2019),
(20, 'arme', 'weapons', 87, 3, 2, 300737, 374000, 2019),
(21, 'batterie', 'batteries', 93, 6, 2, 261991, 261991, 2019),
(22, 'bijoux', 'jewellery', 84, 2, 2, 1998050, 1998050, 2019),
(23, 'briques', 'bricks', 24, 1, 2, 1156, 4105, 2019),
(24, 'b&eacute;ton', 'concrete', 7, 1, 2, 3996, 6370, 2019),
(25, 'camion', 'trucks', 124, 3, 2, 174903, 317100, 2019),
(26, 'combustible fossile', 'fossil fuel', 38, 1, 2, 30431, 34655, 2019),
(27, 'composant &eacute;lectronique', 'electronics', 66, 1, 2, 68407, 68407, 2019),
(28, 'cuivre', 'copper', 36, 1, 2, 98394, 98400, 2019),
(29, 'drone de scan', 'scan drones', 117, 3, 2, 74996352, 75000002, 2019),
(30, 'engrais', 'fertilizer', 22, 1, 2, 2332, 2332, 2019),
(31, 'insecticide', 'insecticides', 28, 1, 2, 5389, 5389, 2019),
(32, 'lithium', 'lithium', 92, 1, 2, 29520, 49311, 2019),
(33, 'or', 'gold', 79, 2, 2, 64437, 69080, 2019),
(34, 'plastique', 'plastics', 58, 1, 2, 2726, 5999, 2019),
(35, 'silicium', 'sillicon', 67, 1, 2, 80904, 107350, 2019),
(36, 'technologie m&eacute;dicale', 'medical technology', 75, 1, 2, 197220, 197220, 2019),
(37, 'titane', 'titanium', 51, 1, 2, 32971, 51055, 2019),
(38, 'verre', 'glass', 60, 1, 2, 33139, 54001, 2019),
(39, 'diamant g&eacute;ant', 'giant diamond', 42, 3, 3, 951069144, 951069144, 2019),
(40, 'd&eacute;chet de verre', 'waste glass', 115, 1, 3, 26950, 37906, 2019),
(41, 'd&eacute;chet plastique', 'plastic scrap', 77, 1, 3, 5338, 12385, 2019),
(42, 'd&eacute;chet &eacute;lectronique', 'electronic scrap', 78, 1, 3, 100082, 164371, 2019),
(43, 'ferraille', 'scrap metal', 70, 1, 3, 14575, 21530, 2019),
(44, 'fossile', 'fossils', 41, 3, 3, 3063, 10615, 2019),
(45, 'huile usag&eacute;e', 'used oil', 74, 1, 3, 4937, 9450, 2019),
(46, 'kit de maintenance', 'maintenance kit', 43, 3, 3, 10815124, 45300100, 2019),
(47, 'monnaie romaine', 'roman coins', 40, 3, 3, 33226, 36750, 2019),
(48, 'pi&egrave;ce en cuivre', 'copper coins', 55, 3, 3, 13944, 16400, 2019),
(49, 'tech upgrade 1', 'tech upgrade 1', 44, 3, 3, 79891279, 80000000, 2019),
(50, 'tech upgrade 2', 'tech upgrade 2', 45, 3, 3, 159647310, 176505105, 2019),
(51, 'tech upgrade 3', 'tech upgrade 3', 46, 3, 3, 180918823, 200683875, 2019),
(52, 'tech upgrade 4', 'tech upgrade 4', 48, 3, 3, 102246934, 102246934, 2019),
(53, 'vieux pneus', 'old tires', 57, 3, 3, 21248, 23715, 2019),
(54, '&eacute;paves de drones', 'drone wreckage', 120, 3, 3, 6004516, 9769669, 2019),
(55, 'arm&eacute;e priv&eacute;e', 'private army', 104, 4, 4, 12152024, 17850061, 2019),
(56, 'chiens d&apos;attaque', 'attack dogs', 102, 4, 4, 200000, 1157700, 2019),
(57, 'chiens de garde', 'watch dogs', 96, 4, 4, 83384, 416800, 2019),
(58, 'force d&apos;&eacute;lite', 'elite force', 99, 4, 4, 11990354, 38955001, 2019),
(59, 'gangster', 'gangster', 103, 4, 4, 2668075, 9000000, 2019),
(60, '&eacute;quipe de s&eacute;curit&eacute;', 'security staff', 98, 4, 4, 1334320, 4270000, 2019);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
