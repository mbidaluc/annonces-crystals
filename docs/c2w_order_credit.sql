-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 13 Juin 2013 à 16:16
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
-- Structure de la table `c2w_order_credit`
--

CREATE TABLE IF NOT EXISTS `c2w_order_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_expediteur` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL,
  `num_bordero` varchar(50) NOT NULL,
  `beneficiaire` varchar(100) NOT NULL,
  `num_tel` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `idPack` int(11) DEFAULT '1',
  `idModpaiement` int(11) NOT NULL,
  `dateEnreg` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `paiementEff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `c2w_order_credit`
--

INSERT INTO `c2w_order_credit` (`id`, `nom_expediteur`, `montant`, `num_bordero`, `beneficiaire`, `num_tel`, `password`, `ville`, `idPack`, `idModpaiement`, `dateEnreg`, `idUser`, `paiementEff`) VALUES
(15, 'Mbida Luc Alfred', 3500, '654482', 'Annonces-cm', '78963', '', '', 2, 4, '2013-06-13 13:06:46', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
