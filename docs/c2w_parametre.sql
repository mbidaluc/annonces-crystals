-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 23 Mai 2013 à 14:59
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
-- Structure de la table `c2w_parametre`
--

CREATE TABLE IF NOT EXISTS `c2w_parametre` (
  `idParam` int(11) NOT NULL AUTO_INCREMENT,
  `nomSite` varchar(50) NOT NULL,
  `emailSite` varchar(50) NOT NULL,
  `bgImage` varchar(100) NOT NULL,
  `repeatX` tinyint(1) NOT NULL DEFAULT '0',
  `repeatY` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `metaDescription` text NOT NULL,
  `metaKeyWord` text NOT NULL,
  `coutDuree` varchar(20) DEFAULT NULL,
  `cout1image` int(11) DEFAULT NULL,
  `cout2image` int(11) DEFAULT NULL,
  `cout3image` int(11) DEFAULT NULL,
  `cout4image` int(11) DEFAULT NULL,
  `cout5image` int(11) DEFAULT NULL,
  `cout6image` int(11) DEFAULT NULL,
  `cout7image` int(11) DEFAULT NULL,
  `cout8image` int(11) DEFAULT NULL,
  `cout9image` int(11) DEFAULT NULL,
  `frequenceEnvNL` varchar(50) NOT NULL,
  `prixUniteAnnonce` int(11) NOT NULL,
  `defaultSpecialeImage` varchar(100) NOT NULL,
  `defaultUneImage` varchar(100) NOT NULL,
  `defaultEvtImage` varchar(100) NOT NULL,
  `defaultAnnonceImage` varchar(100) NOT NULL,
  `cptNbDigit` int(11) NOT NULL,
  `cptBeginDigit` int(11) NOT NULL,
  PRIMARY KEY (`idParam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `c2w_parametre`
--

INSERT INTO `c2w_parametre` (`idParam`, `nomSite`, `emailSite`, `bgImage`, `repeatX`, `repeatY`, `is_active`, `metaDescription`, `metaKeyWord`, `coutDuree`, `cout1image`, `cout2image`, `cout3image`, `cout4image`, `cout5image`, `cout6image`, `cout7image`, `cout8image`, `cout9image`, `frequenceEnvNL`, `prixUniteAnnonce`, `defaultSpecialeImage`, `defaultUneImage`, `defaultEvtImage`, `defaultAnnonceImage`, `cptNbDigit`, `cptBeginDigit`) VALUES
(1, 'Annonces CM', 'lucalfredMbida@yahoo.fr', 'php2C151358937282.png', 0, 1, 1, 'mbida mbida mbida mbida', 'test de fonctionnement', 'Jour', 1, 2, 3, 4, 5, 6, 7, 8, 9, 'Jour', 1, '24-04-2013-12-16-40pas-dimagebis.png', '24-04-2013-12-16-40pas-dimage3.png', '', '24-04-2013-12-16-40meduimdefault.png', 7, 10000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
