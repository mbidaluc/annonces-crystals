-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 15 Avril 2013 à 17:59
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
-- Structure de la table `c2w_abus`
--

CREATE TABLE IF NOT EXISTS `c2w_abus` (
  `idAbus` int(11) NOT NULL AUTO_INCREMENT,
  `NomSignaleur` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`idAbus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `c2w_abus`
--

INSERT INTO `c2w_abus` (`idAbus`, `NomSignaleur`, `email`, `message`, `id`) VALUES
(1, 'alfred', 'mbidalucalfred@yahoo.fr', ' jbc<;kn;', 19),
(2, '', '', ' ', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `c2w_adversiting`
--

INSERT INTO `c2w_adversiting` (`id`, `altText`, `image`, `dateBegin`, `dateEnd`, `idPosition`, `idPage`, `active`, `finalPrice`, `link`, `dureeAnnonce`, `diffusion`, `idUder`, `nbClick`, `typeFacturation`) VALUES
(1, 'le rikudou', '11-04-2013-15-40-18Coucher-de-soleil.jpg', '2013-04-11 00:00:00', '0000-00-00 00:00:00', 10, 12, 1, 0, 'http://google.cm', '2', 'periodique', 2, 0, 'affichage');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_annonce`
--

CREATE TABLE IF NOT EXISTS `c2w_annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `dateexp` datetime NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idPriorite` int(11) NOT NULL,
  `idPosition` int(11) NOT NULL,
  `idUder` int(11) DEFAULT NULL,
  `prixTotal` int(11) DEFAULT NULL,
  `texte` text NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '0',
  `dateDebut` datetime NOT NULL,
  `dureeAnnonce` int(11) NOT NULL,
  `nbClick` int(11) NOT NULL DEFAULT '0',
  `typeFacturation` varchar(50) NOT NULL,
  `link_rewrite` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `urlSortant` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `c2w_annonce`
--

INSERT INTO `c2w_annonce` (`id`, `designation`, `pays`, `ville`, `phone1`, `phone2`, `email`, `auteur`, `dateexp`, `idCategorie`, `idPriorite`, `idPosition`, `idUder`, `prixTotal`, `texte`, `is_actived`, `dateDebut`, `dureeAnnonce`, `nbClick`, `typeFacturation`, `link_rewrite`, `link`, `urlSortant`) VALUES
(9, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-04-20 05:37:19', 1, 0, 0, 2, 2, 'une autres maison Ã  vendre<br>', 1, '2013-03-12 05:37:19', 1, 2, 'affichage', 'maison-a-vendre', '', ''),
(10, 'Terrain Ã  vendre odza', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-04-13 05:41:18', 12, 0, 0, 2, 10800000, 'terrain Ã  vendre Ã  odza petit marchÃ©. pas loin de la route<br>', 1, '2013-03-12 05:41:18', 1, 1, 'affichage', 'terrain-a-vendre-odza', '', ''),
(13, 'Maison Ã  vendre olembÃ©', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', '', '2013-03-17 13:34:21', 1, 3, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u<br>', 1, '2013-03-12 13:34:21', 5, 0, 'affichage', 'maison-a-vendre-olembe', '', ''),
(14, 'Maison Ã  vendre olÃ©zoa', 'Cameroun', 'YaoundÃ©', '96155706', '', 'contact@crystals-services.com', 'Takoudjou', '2013-03-17 13:58:04', 1, 2, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u', 1, '2013-03-12 13:58:04', 5, 3, 'affichage', 'maison-a-vendre-olezoa', '', ''),
(46, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '0000-00-00 00:00:00', 1, 3, 7, 2, 2800000, '<br>', 0, '0000-00-00 00:00:00', 30, 0, 'affichage', 'o', '', ''),
(47, 'annonce', 'Cameroun', 'YaoundÃ©', '22256878', '23568941', 'btchedjou@aventica.com', 'fred', '0000-00-00 00:00:00', 1, 0, 0, NULL, 1000, '<br>', 0, '0000-00-00 00:00:00', 1, 1, 'affichage', 'annonce', '', ''),
(48, 'Maison Ã  vendre olembÃ© 2', 'Cameroun', 'YaoundÃ©', '96155706', '23568941', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-04-20 10:22:56', 1, 2, 6, 2, 2800000, 'dfjqofd fvdqs eigfqei gkefe eg egfeg<br>', 1, '2013-03-20 10:22:56', 31, 4, 'affichage', 'maison-a-vendre-olembe-2', '', ''),
(49, 'Chaisre Ã  vendre', 'Cameroun', 'Obala', '96435749', '', 'annie.ntyama@gmail.com', 'Alfred MBIDA', '2013-04-21 13:57:49', 1, 2, 0, 2, 3500, 'Superbe chaise Ã  vendre trÃ¨s bon prix<br>', 1, '2013-04-11 13:57:49', 10, 2, 'affichage', 'chaisre-a-vendre', '', ''),
(51, '4X4 peugeo', 'Cameroun', 'Obala', '96435749', '', 'mbidalucalfred@yahoo.fr', 'Alfred MBIDA', '2013-04-14 14:37:10', 1, 2, 8, 2, 15000000, 'Superbe 4X4 peugeo surÃ©quipÃ©', 1, '2013-04-11 14:37:10', 3, 0, 'affichage', '4x4-peugeo', '', ''),
(53, 'Villas Ã  vendre', 'Cameroun', 'Yaounde', '96435749', '', 'mbidalucalfred@yahoo.fr', '', '2013-04-12 00:00:00', 12, 2, 0, 2, 15000000, 'lmndlv nwvc:s<<br>dwkjvkd<br>kwxj<br>', 1, '2013-04-11 00:00:00', 2, 7, 'affichage', 'villas-a-vendre', '', ''),
(54, 'bamboula', '', '', '', '', 'mbidalucalfred@yahoo.fr', '', '2013-04-17 16:44:13', 3, 2, 8, 2, 3500, 'super! super', 1, '2013-04-15 16:44:13', 2, 0, 'affichage', 'bamboula', '', ''),
(55, 'Villas Ã  vendre', '', '', '', '', 'annie.ntyama@gmail.com', '', '2013-04-18 16:45:40', 2, 1, 9, 2, 3500, 'hiiiiiiiiiiiiiiiiihaaaaaaaaaaaa', 1, '2013-04-15 16:45:40', 3, 0, 'affichage', 'villas-a-vendre', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_appartenir`
--

CREATE TABLE IF NOT EXISTS `c2w_appartenir` (
  `idUser` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idGroup`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_appartenir`
--

INSERT INTO `c2w_appartenir` (`idUser`, `idGroup`) VALUES
(2, 3),
(3, 1),
(4, 1);

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
  PRIMARY KEY (`idFils`),
  UNIQUE KEY `link_rewrite` (`link_rewrite`),
  KEY `idParent` (`idParent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `c2w_categorie`
--

INSERT INTO `c2w_categorie` (`idFils`, `idParent`, `libelle`, `image`, `description`, `position`, `active`, `length`, `link_rewrite`) VALUES
(1, 0, 'immobilier', '30-01-2013-07-00-22big-image.jpg', 'Appartement, villas, Maison, terrain , immeuble, studio', 0, 1, 0, 'immobilier'),
(2, 0, 'agriculture', '07-02-2013-14-17-30agri.jpg', '<p>Produit et service agricoles ...</p>', 0, 1, 0, 'agriculture'),
(3, 0, 'Architecture et Design', '07-02-2013-14-14-35annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'architecture-et-design'),
(4, 0, 'Automobile', '07-02-2013-14-16-05auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'automobile'),
(5, 0, 'Pharmacie et Optique', '07-02-2013-14-21-28pharmacie.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'pharmacie-et-optique'),
(6, 0, 'Banque et Finances', '07-02-2013-14-22-24banque.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'banque-et-finances'),
(7, 0, 'Environnement', '07-02-2013-14-23-01env.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'environnement'),
(8, 0, 'Hotelerie et Restauration', '07-02-2013-14-23-41hotelerie.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'hotelerie-et-restauration'),
(9, 0, 'Informatique et TÃ©lÃ©com', '07-02-2013-14-24-28Informatique.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'informatique-et-telecom'),
(10, 0, 'Sport et Relaxation', '07-02-2013-14-25-23annonces2.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'sport-et-relaxation'),
(11, 0, 'Education et foration', '07-02-2013-14-27-39edu.jpg', '<p>Formation professionnelle, uni ...</p>', 0, 1, 0, 'education-et-foration'),
(12, 1, 'Villas', '', '<p>test test test et teste</p>', 0, 1, 1, 'villas'),
(13, 1, 'Maison', '18-02-2013-16-28-57auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'maison'),
(14, 0, 'Meubles et intÃ©rieur', '22-02-2013-04-22-18other-product.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'meubles-et-interieur'),
(15, 0, 'Appreils et machines', '22-02-2013-04-23-30Informatique.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'appreils-et-machines'),
(16, 0, 'vÃªtements et chaussures', '22-02-2013-04-25-37annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'vetements-et-chaussures'),
(17, 0, 'Animaux et vÃ©gÃ©tuax', '22-02-2013-04-26-35annonces2.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'animaux-et-vegetuax'),
(18, 1, 'Terrains', '22-02-2013-04-39-07big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'terrains'),
(19, 1, 'Chambres', '22-02-2013-04-40-13big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'chambres');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_chat_messages`
--

CREATE TABLE IF NOT EXISTS `c2w_chat_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` longtext CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `messageWriteto` int(11) NOT NULL,
  `concerningIdAnnonce` int(11) NOT NULL,
  `pseudoClient` varchar(25) NOT NULL,
  `pseudoAnnonceur` varchar(25) NOT NULL DEFAULT 'Annonceur',
  `dateMsg` date NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `c2w_chat_messages`
--

INSERT INTO `c2w_chat_messages` (`message_id`, `message_text`, `pseudo`, `timestamp`, `messageWriteto`, `concerningIdAnnonce`, `pseudoClient`, `pseudoAnnonceur`, `dateMsg`) VALUES
(1, 'salut serait-il possible de discutÃ© sur votre produits', 'alfred', 0, 2, 1, 'alfred', 'Annonceur', '2013-04-06'),
(2, 'un autre test\\n', 'alfred', 0, 2, 48, 'alfred', 'Annonceur', '2013-04-06');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_chat_online`
--

CREATE TABLE IF NOT EXISTS `c2w_chat_online` (
  `online_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_ip` varchar(100) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `online_user` varchar(255) NOT NULL,
  `online_status` int(11) NOT NULL DEFAULT '1',
  `online_date` date NOT NULL,
  `online_chat_with` int(11) NOT NULL,
  PRIMARY KEY (`online_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `c2w_chat_online`
--

INSERT INTO `c2w_chat_online` (`online_id`, `online_ip`, `online_user`, `online_status`, `online_date`, `online_chat_with`) VALUES
(2, '', 'alfred', 1, '2013-04-06', 2);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_droit`
--

CREATE TABLE IF NOT EXISTS `c2w_droit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `c2w_droit`
--

INSERT INTO `c2w_droit` (`id`, `libelle`) VALUES
(1, 'Ajouter'),
(2, 'Modifier'),
(3, 'Supprimer'),
(4, 'acces admin');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_groupe_utilisateur`
--

CREATE TABLE IF NOT EXISTS `c2w_groupe_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `c2w_groupe_utilisateur`
--

INSERT INTO `c2w_groupe_utilisateur` (`id`, `nom_groupe`) VALUES
(1, 'Enregistre'),
(2, 'Administrateur'),
(3, 'Super Administrateur'),
(8, 'le maitre');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_hook`
--

CREATE TABLE IF NOT EXISTS `c2w_hook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `technicalName` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `coutCredit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `technicalName` (`technicalName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `c2w_hook`
--

INSERT INTO `c2w_hook` (`id`, `name`, `technicalName`, `type`, `price`, `active`, `description`, `coutCredit`) VALUES
(2, 'Zone pub 1', 'pub_1', 'pub', 1000, 1, 'Il serait intÃ©ressant que votre banniÃ¨re ai une dimension de 500x100', 5),
(4, 'Zone pub 2', 'pub_2', 'pub', 2000, 1, '', 0),
(5, 'Urgence', 'urgence', 'annonce', 2000, 1, '', 0),
(6, 'EvÃ©nenments', 'evenements', 'annonce', 1000, 1, 'Cette zone vous permets de poster vos Ã©vÃ©nement sur le site', 3),
(7, 'A la une', 'a_la_une', 'annonce', 2000, 1, 'Vous permet de mettre vos annonces en avant', 5),
(8, 'Annonces mobiles', 'mobiles', 'annonce', 0, 1, '', 1),
(9, 'Annonces spÃ©ciales', 'speciales', 'annonce', 500, 1, '', 2),
(10, 'Zone pub 3', 'pub_3', 'pub', 1000, 1, '', 2),
(11, 'Zone pub 4', 'pub_4', 'pub', 1000, 1, '', 2),
(12, 'Zone pub 5', 'pub_5', 'pub', 500, 1, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_mode_paiement`
--

CREATE TABLE IF NOT EXISTS `c2w_mode_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `c2w_mode_paiement`
--

INSERT INTO `c2w_mode_paiement` (`id`, `nom`, `description`, `logo`, `lien`, `is_actived`) VALUES
(1, 'test', 'test', '14-02-2013-10-11-26annonces2.jpg', 'test', 1),
(4, 'bingo 1', 'paiement par destin', '01-01-2001-02-58-31Annonce-DC.jpg', 'azertyui', 1),
(5, 'fskfnl', 'prototype', '01-01-2001-02-59-12Coucher-de-soleil.jpg', ':rgzergp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_newsletters`
--

CREATE TABLE IF NOT EXISTS `c2w_newsletters` (
  `idCategorie` int(255) NOT NULL,
  `IdMembers` int(11) NOT NULL,
  PRIMARY KEY (`idCategorie`,`IdMembers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_newsletters`
--

INSERT INTO `c2w_newsletters` (`idCategorie`, `IdMembers`) VALUES
(0, 7),
(1, 1),
(1, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(12, 4),
(13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_newsmember`
--

CREATE TABLE IF NOT EXISTS `c2w_newsmember` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `email_member` text NOT NULL,
  `date_souscription` datetime NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `nom_membre` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `c2w_newsmember`
--

INSERT INTO `c2w_newsmember` (`id_member`, `email_member`, `date_souscription`, `is_actived`, `nom_membre`, `phone`) VALUES
(1, 'maitrembida@yagoo.fr', '0000-00-00 00:00:00', 1, '', ''),
(3, 'ping@yui.fr', '0000-00-00 00:00:00', 1, '', '1234567'),
(4, 'ffozeu@crystals-services.com', '0000-00-00 00:00:00', 1, '', '0032796155706'),
(5, 'btchedjou@aventica.com', '2013-03-20 10:16:24', 1, '', '22256878'),
(6, 'annie.ntyama@gmail.com', '2013-04-11 13:56:15', 1, '', '96435749'),
(8, 'mbidalucalfred@yahoo.fr', '2013-04-11 17:27:12', 1, '', '96435749');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_order`
--

CREATE TABLE IF NOT EXISTS `c2w_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_expediteur` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL,
  `num_bordero` varchar(50) NOT NULL,
  `beneficiaire` varchar(100) NOT NULL,
  `num_tel` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `idAnnonce` int(11) DEFAULT '1',
  `idAnnoncepub` int(11) DEFAULT NULL,
  `idModpaiement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `c2w_order`
--

INSERT INTO `c2w_order` (`id`, `nom_expediteur`, `montant`, `num_bordero`, `beneficiaire`, `num_tel`, `password`, `ville`, `idAnnonce`, `idAnnoncepub`, `idModpaiement`) VALUES
(1, 'bida luc alfred', 2500, 'z8M2345678', 'annonces crystals', '456789', 'master', 'Ngola', 1, 0, 0),
(2, '', 0, '', '', '', '', '', 2, 0, 0),
(3, 'Le maitre rikudou', 2999, '678903', 'Crystals-services', '67890', 'testeur', 'Ngoundere', NULL, 6, 5),
(4, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 7, 5),
(5, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 8, 5),
(6, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 9, 5),
(7, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 10, 5),
(8, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 11, 5),
(9, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'RTYUIOL', '2345678', 'XCVBN', 'POIUYTR', NULL, 12, 5),
(10, 'Mbida Luc Alfred', 15015, '23456ZERTY', 'Annonces-cm', '96 43 57 59', 'ALF', 'YaoundÃ©', 5, NULL, 5),
(11, '', 0, '', '', '', '', 'YaoundÃ©', 6, NULL, 0),
(12, '', 0, '', '', '', '', 'YaoundÃ©', 7, NULL, 0),
(13, '', 0, '', '', '', '', 'YaoundÃ©', 8, NULL, 0),
(14, 'Mbida Luc Alfred', 1000, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '98155706', '', '', NULL, 13, 1),
(15, 'Mbida Luc Alfred', 24150, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '98155706', 'testtest', '', NULL, 14, 4),
(16, 'Mbida Luc Alfred', 5500, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '98155706', '', '', NULL, 15, 4),
(17, '', 0, '', '', '', '', 'YaoundÃ©', 9, NULL, 0),
(18, '', 0, '', '', '', '', 'YaoundÃ©', 10, NULL, 0),
(19, 'Mbida Luc Alfred', 415, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', 'testtest', '', 11, NULL, 4),
(20, 'Mbida Luc Alfred', 415, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', 'testtest', '', 12, NULL, 4),
(21, 'Mbida Luc Alfred', 415, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', 'testtest', '', 13, NULL, 4),
(22, 'Mbida Luc Alfred', 2515, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', '', '', 14, NULL, 4),
(23, 'Mbida Luc Alfred', 32500, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '98155706', '', '', NULL, 16, 4),
(24, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+22322345', 'test', 'yaoundÃ©', 15, NULL, 5),
(25, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+22322345', 'test', 'yaoundÃ©', 16, NULL, 5),
(26, '', 0, '', '', '', '', '', 17, NULL, 0),
(27, 'Mbida Luc Alfred', 15000, 'jhknljlnl', 'Annonces-cm', 'hghghjg', '', '', 18, NULL, 4),
(28, 'Mbida Luc Alfred', 45000, '2312345332', 'Annonces-cm', '+1234545644', '', '', 19, NULL, 5),
(29, '', 0, '', '', '', '', '', 20, NULL, 0),
(30, '', 0, '', '', '', '', '', 21, NULL, 0),
(31, '', 0, '', '', '', '', '', 22, NULL, 0),
(32, '', 0, '', '', '', '', '', 23, NULL, 0),
(33, '', 0, '', '', '', '', '', 24, NULL, 0),
(34, '', 0, '', '', '', '', '', 25, NULL, 0),
(35, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 26, NULL, 5),
(36, 'Mbida Luc Alfred', 45000, '2312345332', 'Annonces-cm', '+1234545644', '', '', 27, NULL, 5),
(37, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 28, NULL, 5),
(38, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 29, NULL, 5),
(39, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 30, NULL, 5),
(40, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 31, NULL, 5),
(41, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 32, NULL, 5),
(42, 'Mbida Luc Alfred', 30000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 33, NULL, 5),
(43, 'Mbida Luc Alfred', 30000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 34, NULL, 5),
(44, 'Mbida Luc Alfred', 15000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 35, NULL, 5),
(45, 'Mbida Luc Alfred', 30000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 36, NULL, 5),
(46, 'Mbida Luc Alfred', 30000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 37, NULL, 5),
(47, 'Mbida Luc Alfred', 30000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 38, NULL, 5),
(48, 'Mbida Luc Alfred', 75000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 39, NULL, 5),
(49, 'Mbida Luc Alfred', 60000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 40, NULL, 5),
(50, 'Mbida Luc Alfred', 75000, '2312345332', 'Annonces-cm', '+1234545644', '', '', 41, NULL, 5),
(51, 'Mbida Luc Alfred', 45000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 42, NULL, 5),
(52, 'Mbida Luc Alfred', 75000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 43, NULL, 5),
(53, 'Mbida Luc Alfred', 60000, '129294823948932', 'Annonces-cm', '+1234545644', '', '', 44, NULL, 5),
(54, 'Mbida Luc Alfred', 50020, 'qsdvdsvdkjvdv', 'Annonces-cm', '96155706', '', '', 45, NULL, 4),
(55, 'Mbida Luc Alfred', 62400, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', '', '', 46, NULL, 4),
(56, '', 0, '', '', '', '', 'YaoundÃ©', 47, NULL, 0),
(57, 'Mbida Luc Alfred', 46593, 'qsdvdsvdkjvdv', 'Annonces-cm', '96155706', '', '', 48, NULL, 5),
(58, 'Mbida Luc Alfred', 5030, '005AZERTY', 'Annonces-cm', '96435749', 'rikudou', 'Yaounde', 49, NULL, 5),
(59, 'Mbida Luc Alfred', 503, '005AZERTY', 'Annonces-cm', '96435749', 'rikudou', 'Yaounde', 53, NULL, 5);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `c2w_order_credit`
--

INSERT INTO `c2w_order_credit` (`id`, `nom_expediteur`, `montant`, `num_bordero`, `beneficiaire`, `num_tel`, `password`, `ville`, `idPack`, `idModpaiement`, `dateEnreg`) VALUES
(10, 'Le maitre rikudou', 2999, 'ZERTYUIO', 'Crystals-services', '2345678', 'XCVBN', 'Ngoundere', 2, 4, '0000-00-00 00:00:00'),
(11, 'Mbida Luc Alfred', 3500, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '98155706', '', '', 2, 4, '2013-03-09 13:03:06');

-- --------------------------------------------------------

--
-- Structure de la table `c2w_pack_credits`
--

CREATE TABLE IF NOT EXISTS `c2w_pack_credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `c2w_pack_credits`
--

INSERT INTO `c2w_pack_credits` (`id`, `libelle`, `credit`, `prix`) VALUES
(2, 'Kdo', 350, 3500);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_page`
--

CREATE TABLE IF NOT EXISTS `c2w_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `bgImage` text NOT NULL,
  `repeatX` tinyint(1) NOT NULL DEFAULT '0',
  `repeatY` tinyint(1) NOT NULL DEFAULT '0',
  `actived` tinyint(1) NOT NULL DEFAULT '0',
  `contenu` text NOT NULL,
  `metatitle` text NOT NULL,
  `metadescription` text NOT NULL,
  `metakeyword` text NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `c2w_page`
--

INSERT INTO `c2w_page` (`id`, `titre`, `bgImage`, `repeatX`, `repeatY`, `actived`, `contenu`, `metatitle`, `metadescription`, `metakeyword`, `identifiant`, `prix`) VALUES
(9, 'Contactez-nous', '13-03-2013-12-46-40bg-orange.png', 0, 0, 1, '<div id="info_left">\r\n<p class="adress"><span> Adresses:</span><br /> Chraorci ac convall varius level oreme campus leo. Done plomattis necloremips placerate bibe ndum. Crasi loid urna.</p>\r\n<p class="telephone"><span>Telephone :</span><span class="numero"> +237 00 00 00 Â Â  </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00 </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00</span></p>\r\n<p class="langue"><span>Langue de travail :Â  </span>FranÃ§ais</p>\r\n</div>', 'contact annonce', '<br>', 'Contactez-nous', 'contact', 11000),
(10, 'Inscription', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '<p>tes tes teste test ets etts te ste</p>', 'Inscription', 'dadfzcfea eeefezaf', 'Inscription', 'inscription', 12000),
(11, 'Login', '01-01-2001-03-56-11Coucher-de-soleil.jpg', 1, 1, 1, 'Page de connexion sur le site<br>', 'Login', '<br>', 'login', 'login', 1500),
(12, 'Bienvenue Sur Annonces CM', '29-01-2013-04-05-57annonces.png', 1, 1, 1, '<br>', '', 'Faites vos annonces ici<br>', 'Annonces, publicitÃ©, publication', 'home', 4500),
(13, 'Notre newsletters', '29-01-2013-10-09-42banner-home.png', 1, 1, 1, '<br>', '', '<br>', '', 'newsletter', 6000),
(14, 'Envoyer une annonce', '', 0, 0, 0, '', '', '', '', 'annonce', 100),
(15, 'CatÃ©gorie', '', 0, 0, 0, '', 'catÃ©gory', '', '', 'category', 100),
(16, 'DÃ©tail de l''annonce', '', 0, 0, 0, '', '', '', '', 'detail_annonce', 1),
(17, 'conditions  annonce', '', 0, 0, 1, '<p>nnnnnnnnnnnnnnnnnnnn</p>', '', '', '', 'cga', 2345),
(18, 'aide', '', 0, 0, 1, '<p>help help help .................</p>', '', '', '', 'aide', 456),
(19, 'Envoyer une Annonces Publicitaires', '', 0, 0, 1, '', '', '', '', 'Adversiting', NULL),
(20, 'Annonces du même auteur', '', 0, 0, 1, '', '', '', '', 'author_annonce', NULL),
(21, 'Packs de crÃ©dits', '', 0, 0, 1, '', '', '', '', 'pack_credit', 5),
(22, 'Formulaire de paiement', '', 0, 0, 1, '', '', '', '', 'paiement', 2),
(23, 'Modes de paiement', '', 0, 0, 1, '', '', '', '', 'mode_paiement', 5),
(24, 'Partenaires', '', 0, 0, 1, '', '', '', '', 'partenaires', 6),
(25, 'RÃ©sultats de la recherche', '', 0, 0, 1, '', '', '', '', 'recherche', 7),
(26, 'CrÃ©er un utilisateur', '', 0, 0, 1, '', '', '', '', 'create_user', 690),
(27, 'Mon Compte', '', 0, 0, 1, '', '', '', '', 'mon_compte', 40),
(28, 'Mes annonces', '', 0, 0, 1, '', '', '', '', 'mes_annonces', 12),
(29, 'Mes Annonces Publicitaires', '', 0, 0, 1, '', '', '', '', 'mes_annonces_pub', 2345),
(30, 'mobiles', '', 0, 0, 1, '', '', '', '', 'mobiles', 4500),
(31, 'speciales', '', 0, 0, 1, '', '', '', '', 'speciales', 4500);

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
  PRIMARY KEY (`idParam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `c2w_parametre`
--

INSERT INTO `c2w_parametre` (`idParam`, `nomSite`, `emailSite`, `bgImage`, `repeatX`, `repeatY`, `is_active`, `metaDescription`, `metaKeyWord`, `coutDuree`, `cout1image`, `cout2image`, `cout3image`, `cout4image`, `cout5image`, `cout6image`, `cout7image`, `cout8image`, `cout9image`, `frequenceEnvNL`, `prixUniteAnnonce`) VALUES
(1, 'Annonces CM', 'lucalfredMbida@yahoo.fr', 'php2C151358937282.png', 0, 1, 1, 'mbida mbida mbida mbida', 'test de fonctionnement', 'Jour', 1, 2, 3, 4, 5, 6, 7, 8, 9, 'Jour', 1);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_partenaire`
--

CREATE TABLE IF NOT EXISTS `c2w_partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lien` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `c2w_partenaire`
--

INSERT INTO `c2w_partenaire` (`id`, `nom`, `logo`, `description`, `lien`, `is_active`) VALUES
(1, 'SONKENG SOUNA', '14-03-2013-01-17-12annonces.png', '', 'ff', 1);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_partenaire_membre`
--

CREATE TABLE IF NOT EXISTS `c2w_partenaire_membre` (
  `idMembre` int(11) NOT NULL,
  `idPartenaire` int(11) NOT NULL,
  PRIMARY KEY (`idMembre`,`idPartenaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_partenaire_membre`
--

INSERT INTO `c2w_partenaire_membre` (`idMembre`, `idPartenaire`) VALUES
(5, 1),
(6, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_photos_annonces`
--

CREATE TABLE IF NOT EXISTS `c2w_photos_annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `c2w_photos_annonces`
--

INSERT INTO `c2w_photos_annonces` (`id`, `url`, `description`, `type`, `idAnnonce`) VALUES
(1, '01-01-2001-04-08-45Ny-nuphars.jpg', '', 'principale', 1),
(2, '01-01-2001-04-08-49Collines.jpg', '', 'principale', 1),
(3, '01-01-2001-04-08-52Coucher-de-soleil.jpg', '', 'principale', 1),
(4, '06-03-2013-13-35-46Annonce-DC.jpg', '', 'principale', 4),
(5, '06-03-2013-15-54-58Collines.jpg', '', 'principale', 5),
(6, '06-03-2013-15-55-02Coucher-de-soleil.jpg', '', 'principale', 5),
(7, '06-03-2013-15-55-05Ny-nuphars.jpg', '', 'principale', 5),
(8, '12-03-2013-13-27-12big-image.jpg', '', 'principale', 13),
(9, '12-03-2013-13-27-29other-product.jpg', '', 'autres', 13),
(10, '12-03-2013-13-27-42img-speciales.png', '', 'autres', 13),
(11, '12-03-2013-13-56-56big-image.jpg', '', 'principale', 14),
(12, '12-03-2013-13-57-07other-product.jpg', '', 'autres', 14),
(13, '12-03-2013-13-57-16edu.jpg', '', 'autres', 14),
(14, '13-03-2013-15-11-21auto.jpg', '', 'principale', 45),
(15, '20-03-2013-10-18-08annonces.jpg', '', 'principale', 48),
(16, '20-03-2013-10-18-13annonces2.jpg', '', 'autres', 48),
(17, '20-03-2013-10-18-46agri.jpg', '', 'autres', 48),
(18, '11-04-2013-13-55-48Collines.jpg', '', 'principale', 49),
(19, '11-04-2013-13-55-51Coucher-de-soleil.jpg', '', 'autres', 49),
(20, '11-04-2013-13-55-56Ny-nuphars.jpg', '', 'autres', 49),
(21, '11-04-2013-14-36-29Collines.jpg', '', 'principale', 51),
(22, '11-04-2013-14-36-40Ny-nuphars.jpg', '', 'autres', 51),
(23, '11-04-2013-17-28-28Ny-nuphars.jpg', '', 'principale', 53),
(24, '11-04-2013-17-28-33Coucher-de-soleil.jpg', '', 'autres', 53),
(25, '11-04-2013-17-28-35Collines.jpg', '', 'autres', 53);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_posseder`
--

CREATE TABLE IF NOT EXISTS `c2w_posseder` (
  `idGroup` int(11) NOT NULL,
  `idDroit` int(11) NOT NULL,
  PRIMARY KEY (`idGroup`,`idDroit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_posseder`
--

INSERT INTO `c2w_posseder` (`idGroup`, `idDroit`) VALUES
(3, 4),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_priorite`
--

CREATE TABLE IF NOT EXISTS `c2w_priorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `c2w_priorite`
--

INSERT INTO `c2w_priorite` (`id`, `libelle`, `prix`) VALUES
(1, 'en tÃªte', 1000),
(2, '1 Ã¨re ligne', 500),
(3, '2Ã© ligne', 80);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_tranche`
--

CREATE TABLE IF NOT EXISTS `c2w_tranche` (
  `idTanche` int(11) NOT NULL AUTO_INCREMENT,
  `heureDeb` time NOT NULL,
  `heureFin` time NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`idTanche`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `c2w_tranche`
--

INSERT INTO `c2w_tranche` (`idTanche`, `heureDeb`, `heureFin`, `prix`) VALUES
(9, '00:00:00', '01:00:00', 10),
(10, '01:00:00', '02:00:00', 50),
(11, '02:00:00', '03:00:00', 50),
(12, '03:00:00', '04:00:00', 500),
(13, '04:00:00', '05:00:00', 500),
(14, '05:00:00', '06:00:00', 500),
(15, '06:00:00', '07:00:00', 500),
(16, '07:00:00', '08:00:00', 500),
(17, '08:00:00', '09:00:00', 500),
(18, '09:00:00', '10:00:00', 400),
(19, '10:00:00', '11:00:00', 100),
(20, '11:00:00', '12:00:00', 300),
(21, '12:00:00', '13:00:00', 450),
(22, '13:00:00', '14:00:00', 400),
(23, '14:00:00', '15:00:00', 300),
(24, '15:00:00', '16:00:00', 100),
(25, '16:00:00', '17:00:00', 200),
(26, '17:00:00', '18:00:00', 400),
(27, '18:00:00', '19:00:00', 350),
(28, '19:00:00', '20:00:00', 400),
(29, '20:00:00', '21:00:00', 150),
(30, '21:00:00', '22:00:00', 200),
(31, '22:00:00', '23:00:00', 400),
(32, '23:00:00', '00:00:00', 300);

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
(24, 1, '2013-04-11', 12, 4),
(24, 1, '2013-04-12', 12, 4),
(25, 1, '2013-04-11', 12, 4),
(25, 1, '2013-04-12', 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `c2w_type_annonce`
--

CREATE TABLE IF NOT EXISTS `c2w_type_annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `c2w_type_annonce`
--


-- --------------------------------------------------------

--
-- Structure de la table `c2w_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `c2w_utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `infos_complementaires` text NOT NULL,
  `nbCredits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `c2w_utilisateurs`
--

INSERT INTO `c2w_utilisateurs` (`id`, `pseudo`, `nom`, `prenom`, `adresse`, `avatar`, `password`, `email`, `is_active`, `newsletter`, `pays`, `ville`, `code_postal`, `tel1`, `tel2`, `infos_complementaires`, `nbCredits`) VALUES
(2, 'alfred', 'Mbida', 'Luc Alfred', 'xxxxx@zzzz.cm', '', 'test', 'test', 1, 1, 'cameroun', 'yaounde', ' 567', '678', '', 'fhre ifn ks jn', 495),
(3, 'r', 'r', 'r', 'r', '', 'r', 'r', 1, 1, 'r', 'r', 'r', 'r', 'r', 'r', 0),
(4, 't', 't', 't', 't', '', 't', 't', 1, 1, 't', 't', 't', 't', 'tt', 'ttt', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
