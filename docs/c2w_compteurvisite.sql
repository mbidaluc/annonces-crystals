-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 23 Mai 2013 à 14:58
-- Version du serveur: 5.1.37
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `annonces_crystals`
--

-- --------------------------------------------------------

--
-- Structure de la table `c2w_compteurvisite`
--

CREATE TABLE IF NOT EXISTS `c2w_compteurvisite` (
  `idSession` varchar(256) NOT NULL,
  `ipAdress` varchar(15) NOT NULL,
  `dateConn` datetime NOT NULL,
  PRIMARY KEY (`idSession`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_compteurvisite`
--

INSERT INTO `c2w_compteurvisite` (`idSession`, `ipAdress`, `dateConn`) VALUES
('irh19lm9i20fmb1f41s8kgpr33', '127.0.0.1', '2013-05-23 13:45:57'),
('4kbf54aen4ud874q3hemfvviq4', '127.0.0.1', '2013-05-23 13:49:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
