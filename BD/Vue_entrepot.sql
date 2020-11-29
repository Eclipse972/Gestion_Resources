-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: gestion.resources.sql.free.fr
-- Généré le : Dim 29 Novembre 2020 à 10:40
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
-- Structure de la vue `Vue_entrepot`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`gestion.resources`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_entrepot` AS select `marchandise`.`ID` AS `ID`,concat(_utf8'		<td><a href="?id=',`marchandise`.`ID`,_utf8'#selection"><img src="Vue/images/',`marchandise`.`image`,_utf8'.png" alt ="',`marchandise`.`nom`,_utf8'">',ucase(left(`marchandise`.`nom`,1)),substr(`marchandise`.`nom`,2,length(`marchandise`.`nom`)),_utf8'</a></td>\n',_utf8'		<td>(niveau)</td>\n',_utf8'		<td>(stock) ',`unites`.`nom`,_utf8'/h</td>\n') AS `code`,`marchandise`.`nom` AS `nom_ligne` from (`marchandise` join `unites` on((`marchandise`.`unité_ID` = `unites`.`ID`))) where (`marchandise`.`nature_ID` between 1 and 2);

--
-- VIEW  `Vue_entrepot`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
