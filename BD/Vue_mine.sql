-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Dim 29 Novembre 2020 à 10:39
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
-- Structure de la vue `Vue_mine`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`gestion.resources`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_mine` AS select `type_mine`.`ID` AS `ID`,concat(_utf8'		<td><a href="?id=',`type_mine`.`ID`,_utf8'#selection"><img src="Vue/images/',`marchandise`.`image`,_utf8'.png" alt ="',`type_mine`.`nom`,_utf8'">',ucase(left(`type_mine`.`nom`,1)),substr(`type_mine`.`nom`,2,length(`type_mine`.`nom`)),_utf8'</a></td>\n',_utf8'		<td>(état)%</td>\n',_utf8'		<td>(nombre)</td>\n',_utf8'		<td>(production) ',`unites`.`nom`,_utf8'</td>\n') AS `code`,`type_mine`.`nom` AS `nom_ligne` from ((`type_mine` join `marchandise` on((`type_mine`.`marchandise_ID` = `marchandise`.`ID`))) join `unites` on((`marchandise`.`unité_ID` = `unites`.`ID`)));

--
-- VIEW  `Vue_mine`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
