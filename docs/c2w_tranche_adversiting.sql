-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 08 Avril 2013 à 13:29
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
-- Structure de la table `c2w_tranche_adversiting`
--

CREATE TABLE IF NOT EXISTS `c2w_tranche_adversiting` (
  `idTanche` int(11) NOT NULL DEFAULT '0',
  `idAdversitind` int(11) NOT NULL DEFAULT '0',
  `dateJour` date NOT NULL,
  `idPage` int(11) NOT NULL DEFAULT '0',
  `idPosition` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTanche`,`idAdversitind`,`dateJour`,`idPage`,`idPosition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_tranche_adversiting`
--

INSERT INTO `c2w_tranche_adversiting` (`idTanche`, `idAdversitind`, `dateJour`, `idPage`, `idPosition`) VALUES
(20, 1, '2013-04-08', 12, 2),
(20, 1, '2013-04-09', 12, 2),
(20, 1, '2013-04-10', 12, 2),
(21, 1, '2013-04-08', 12, 2),
(21, 1, '2013-04-09', 12, 2),
(21, 1, '2013-04-10', 12, 2),
(22, 1, '2013-04-08', 12, 2),
(22, 1, '2013-04-09', 12, 2),
(22, 1, '2013-04-10', 12, 2),
(23, 1, '2013-04-08', 12, 2),
(23, 1, '2013-04-09', 12, 2),
(23, 1, '2013-04-10', 12, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
