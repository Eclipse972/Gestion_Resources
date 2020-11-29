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
-- Structure de la vue `Vue_usine`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`gestion.resources`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_usine` AS select `type_usine`.`ID` AS `ID`,concat(_utf8'		<td><p id="gauche"><a href="?id=',`type_usine`.`ID`,_utf8'#selection"><img src="Vue/images/',`type_usine`.`image`,_utf8'.png" alt ="',`type_usine`.`nom`,_utf8'"></a></p>',_utf8'	<a href="?id=',`type_usine`.`ID`,_utf8'#selection"><h1>',ucase(left(`type_usine`.`nom`,1)),substr(`type_usine`.`nom`,2,length(`type_usine`.`nom`)),_utf8'</h1></a>',_utf8'<p id="petite_image">(recette)</p></td>\n',_utf8'		<td>(niveau)</td>\n',_utf8'		<td>(production) ',`unites`.`nom`,_utf8'/h</td>\n') AS `code`,`type_usine`.`nom` AS `nom_ligne` from ((`type_usine` join `marchandise` on((`type_usine`.`marchandise_ID` = `marchandise`.`ID`))) join `unites` on((`marchandise`.`unité_ID` = `unites`.`ID`)));

--
-- VIEW  `Vue_usine`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
