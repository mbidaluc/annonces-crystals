-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 01 Avril 2013 à 13:24
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
-- Structure de la table `c2w_adversiting`
--

CREATE TABLE IF NOT EXISTS `c2w_adversiting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifiant de la table',
  `altText` varchar(255) NOT NULL COMMENT 'texte alternatif de l''image',
  `image` varchar(255) NOT NULL COMMENT 'le nom de l''image',
  `dateBegin` datetime NOT NULL COMMENT 'date de publication',
  `dateEnd` datetime NOT NULL COMMENT 'date de fin de publication',
  `idPosition` tinyint(3) unsigned NOT NULL COMMENT 'identifiant de la positon',
  `idPage` tinyint(3) unsigned NOT NULL COMMENT 'identifiant de page',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `finalPrice` float NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `dureeAnnonce` varchar(20) NOT NULL,
  `diffusion` varchar(50) NOT NULL,
  `idUder` int(11) NOT NULL,
  `nbClick` int(11) NOT NULL DEFAULT '0',
  `typeFacturation` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPosition` (`idPosition`,`idPage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `c2w_adversiting`
--

INSERT INTO `c2w_adversiting` (`id`, `altText`, `image`, `dateBegin`, `dateEnd`, `idPosition`, `idPage`, `active`, `finalPrice`, `link`, `dureeAnnonce`, `diffusion`, `idUder`, `nbClick`, `typeFacturation`) VALUES
(2, 'dÃ©couvrÃ© notre nouveau site', '05-02-2013-15-10-06banner-home.png', '2013-02-01 00:00:00', '2013-02-28 00:00:00', 2, 12, 1, 1000, 'http://annonces-crystals.localhost', '', '', 0, 0, ''),
(3, 'dÃ©couvrÃ© notre nouveau site', '05-02-2013-14-42-48banner-interne.jpg', '2013-02-06 00:00:00', '2013-02-22 00:00:00', 4, 13, 1, 1000, 'http://annonces.localhost', '', '', 0, 0, ''),
(4, '', '', '2013-02-01 00:00:00', '2013-02-23 00:00:00', 0, 0, 0, 0, '', '', '', 0, 0, ''),
(6, 'c''est cool', '', '2013-02-25 00:00:00', '0000-00-00 00:00:00', 2, 11, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(7, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(8, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(9, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(10, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(11, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(12, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0, ''),
(13, 'dÃ©couvrÃ© notre nouveau site', '', '2013-03-08 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '4', 'plein temps', 2, 0, ''),
(14, 'dÃ©couvrÃ© notre nouveau site', '', '2013-03-11 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '3', 'periodique', 2, 0, ''),
(15, 'dÃ©couvrÃ© notre nouveau site', '11-03-2013-15-15-30auto.jpg', '2013-03-12 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '4', 'plein temps', 2, 0, ''),
(16, 'dÃ©couvrÃ© notre nouveau site', '13-03-2013-07-21-46banner-home.png', '2013-03-14 00:00:00', '0000-00-00 00:00:00', 4, 12, 1, 1000, 'http://annonces-crystals.localhost', '5', 'plein temps', 2, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
