-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 14 Mars 2013 à 13:45
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

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
-- Structure de la table `c2w_abus`
--

CREATE TABLE IF NOT EXISTS `c2w_abus` (
  `idAbus` int(11) NOT NULL AUTO_INCREMENT,
  `NomSignaleur` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`idAbus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `c2w_abus`
--

INSERT INTO `c2w_abus` (`idAbus`, `NomSignaleur`, `email`, `message`, `id`) VALUES
(1, 'alfred', 'mbidalucalfred@yahoo.fr', ' jbc<;kn;', 19);
