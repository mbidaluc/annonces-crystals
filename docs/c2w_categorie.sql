-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 25 Avril 2013 à 12:07
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
-- Structure de la table `c2w_categorie`
--

CREATE TABLE IF NOT EXISTS `c2w_categorie` (
  `idFils` int(11) NOT NULL AUTO_INCREMENT,
  `idParent` int(11) DEFAULT NULL,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `length` tinyint(4) NOT NULL DEFAULT '0',
  `link_rewrite` varchar(255) NOT NULL,
  `defaultAnnonceImage` varchar(100) NOT NULL,
  PRIMARY KEY (`idFils`),
  UNIQUE KEY `link_rewrite` (`link_rewrite`),
  KEY `idParent` (`idParent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `c2w_categorie`
--

INSERT INTO `c2w_categorie` (`idFils`, `idParent`, `libelle`, `image`, `description`, `position`, `active`, `length`, `link_rewrite`, `defaultAnnonceImage`) VALUES
(1, 0, 'immobilier', '30-01-2013-07-00-22big-image.jpg', 'Appartement, villas, Maison, terrain , immeuble, studio', 0, 1, 0, 'immobilier', '25-04-2013-11-07-20meduimdefault.png'),
(2, 0, 'agriculture', '07-02-2013-14-17-30agri.jpg', '<p>Produit et service agricoles ...</p>', 0, 1, 0, 'agriculture', ''),
(3, 0, 'Architecture et Design', '07-02-2013-14-14-35annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'architecture-et-design', ''),
(4, 0, 'Automobile', '07-02-2013-14-16-05auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'automobile', ''),
(5, 0, 'Pharmacie et Optique', '07-02-2013-14-21-28pharmacie.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'pharmacie-et-optique', ''),
(6, 0, 'Banque et Finances', '07-02-2013-14-22-24banque.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'banque-et-finances', ''),
(7, 0, 'Environnement', '07-02-2013-14-23-01env.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'environnement', ''),
(8, 0, 'Hotelerie et Restauration', '07-02-2013-14-23-41hotelerie.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'hotelerie-et-restauration', ''),
(9, 0, 'Informatique et TÃ©lÃ©com', '07-02-2013-14-24-28Informatique.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'informatique-et-telecom', ''),
(10, 0, 'Sport et Relaxation', '07-02-2013-14-25-23annonces2.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'sport-et-relaxation', ''),
(11, 0, 'Education et foration', '07-02-2013-14-27-39edu.jpg', '<p>Formation professionnelle, uni ...</p>', 0, 1, 0, 'education-et-foration', ''),
(12, 1, 'Villas', '', '<p>test test test et teste</p>', 0, 1, 1, 'villas', ''),
(13, 1, 'Maison', '18-02-2013-16-28-57auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'maison', ''),
(14, 0, 'Meubles et intÃ©rieur', '22-02-2013-04-22-18other-product.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'meubles-et-interieur', ''),
(15, 0, 'Appreils et machines', '22-02-2013-04-23-30Informatique.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'appreils-et-machines', ''),
(16, 0, 'vÃªtements et chaussures', '22-02-2013-04-25-37annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'vetements-et-chaussures', ''),
(17, 0, 'Animaux et vÃ©gÃ©tuax', '22-02-2013-04-26-35annonces2.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'animaux-et-vegetuax', ''),
(18, 1, 'Terrains', '22-02-2013-04-39-07big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'terrains', ''),
(19, 1, 'Chambres', '22-02-2013-04-40-13big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'chambres', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
