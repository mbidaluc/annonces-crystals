-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 30 Avril 2013 à 16:31
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
-- Structure de la table `c2w_mails_params`
--

CREATE TABLE IF NOT EXISTS `c2w_mails_params` (
  `id` int(11) NOT NULL,
  `serveurMail` varchar(10) NOT NULL,
  `emailSite` varchar(100) NOT NULL,
  `nomExpediteur` varchar(100) NOT NULL,
  `identificationSMTP` tinyint(1) NOT NULL,
  `securiteSMTP` varchar(10) NOT NULL,
  `portSMTP` int(11) NOT NULL,
  `utilisateurSMTP` varchar(100) NOT NULL,
  `passwordSMTP` varchar(100) NOT NULL,
  `serveurSMTP` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_mails_params`
--

INSERT INTO `c2w_mails_params` (`id`, `serveurMail`, `emailSite`, `nomExpediteur`, `identificationSMTP`, `securiteSMTP`, `portSMTP`, `utilisateurSMTP`, `passwordSMTP`, `serveurSMTP`) VALUES
(1, 'phpmail', 'lucalfredmbida@gmail.com', 'Annonce-cm', 0, 'aucun', 25, 'ambida@crystals-services.com', 'outsourcing2', 'localhost');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
