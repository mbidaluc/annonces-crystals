-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 14 Juin 2013 à 13:17
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `c2w_annonce`
--

INSERT INTO `c2w_annonce` (`id`, `designation`, `pays`, `ville`, `phone1`, `phone2`, `email`, `auteur`, `dateexp`, `idCategorie`, `idPriorite`, `idPosition`, `idUder`, `prixTotal`, `texte`, `is_actived`, `dateDebut`, `dureeAnnonce`, `nbClick`, `typeFacturation`, `link_rewrite`, `link`, `urlSortant`) VALUES
(9, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-13 05:37:19', 1, 0, 0, NULL, 2, 'une autres maison Ã  vendre<br>', 1, '2013-03-12 05:37:19', 1, 0, 'affichage', 'maison-a-vendre', '', ''),
(10, 'Terrain Ã  vendre odza', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-03-13 05:41:18', 12, 0, 0, NULL, 10800000, 'terrain Ã  vendre Ã  odza petit marchÃ©. pas loin de la route<br>', 1, '2013-03-12 05:41:18', 1, 0, 'affichage', 'terrain-a-vendre-odza', '', ''),
(13, 'Maison Ã  vendre olembÃ©', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', '', '2013-03-17 13:34:21', 1, 3, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u<br>', 1, '2013-03-12 13:34:21', 5, 2, 'affichage', 'maison-a-vendre-olembe', '', ''),
(14, 'Maison Ã  vendre olÃ©zoa', 'Cameroun', 'YaoundÃ©', '96155706', '', 'contact@crystals-services.com', 'Takoudjou', '2013-03-17 13:58:04', 1, 2, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u', 1, '2013-03-12 13:58:04', 5, 0, 'affichage', 'maison-a-vendre-olezoa', '', ''),
(46, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '0000-00-00 00:00:00', 1, 3, 7, 2, 2800000, '<br>', 0, '0000-00-00 00:00:00', 30, 0, 'affichage', 'o', '', ''),
(47, 'annonce', 'Cameroun', 'YaoundÃ©', '22256878', '23568941', 'btchedjou@aventica.com', 'fred', '0000-00-00 00:00:00', 1, 0, 0, NULL, 1000, '<br>', 0, '0000-00-00 00:00:00', 1, 1, 'affichage', 'annonce', '', ''),
(48, 'Maison Ã  vendre olembÃ© 2', 'Cameroun', 'YaoundÃ©', '96155706', '23568941', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-04-20 10:22:56', 1, 2, 6, 2, 2800000, 'dfjqofd fvdqs eigfqei gkefe eg egfeg<br>', 1, '2013-03-20 10:22:56', 31, 46, 'affichage', 'maison-a-vendre-olembe-2', '', ''),
(49, 'terrain Ã  vendre Ã  kolbikok', 'cameroun', 'yaoundÃ©', '99887755', '', 'contact@crystal.fr', 'alfred', '2013-05-16 15:24:43', 1, 0, 0, 2, 800000, 'un test complet de fonctionnement de cette partie<br>', 1, '2013-04-15 15:24:43', 31, 20, 'affichage', 'terrain-a-vendre-a-kolbikok', '', ''),
(50, 'terrain Ã  vendre Ã  kolbikok2', 'cameroun', 'yaoundÃ©', '99887755', '', 'contact@crystals-services.com', '', '2013-05-16 17:40:34', 1, 0, 8, NULL, 20000, '<h4><a href="http://annonces-crystals.localhost/createannoncefront.html" title="Maison Ã  vendre olembÃ© 2" target="_blank">Maison Ã  vendre olembÃ© 2</a></h4>\r\n						dfjqofd fvdqs eigfqei gkefe eg egfeg <br><h4><a href="http://annonces-crystals.localhost/createannoncefront.html" title="Maison Ã  vendre olembÃ© 2" target="_blank">Maison Ã  vendre olembÃ© 2</a></h4>\r\n						dfjqofd fvdqs eigfqei gkefe eg egfeg', 1, '2013-04-15 17:40:34', 31, 2, 'affichage', 'terrain-a-vendre-a-kolbikok2', '', ''),
(51, 'terrain Ã  vendre Ã  kolbikok', 'cameroun', 'yaoundÃ©', '99887755', '', 'contact@crystals-services.com', 'ffozeu', '0000-00-00 00:00:00', 1, 0, 7, 6, 800000, '<br>', 0, '0000-00-00 00:00:00', 20, 0, 'click', 'terrain-a-vendre-a-kolbikok', '', ''),
(52, 'maison Ã  vendre', 'cameroun', 'yaoundÃ©', '99887755', '', 'contact@crystal.fr', 'ffozeu', '0000-00-00 00:00:00', 12, 0, 7, 2, 45620, 'mfjrzkfnrk vr vrkvgrzkzgv vrz<br>', 0, '0000-00-00 00:00:00', 17, 0, 'affichage', 'maison-a-vendre', '', ''),
(53, 'maison Ã  vendre', 'cameroun', 'yaoundÃ©', '99887755', '', 'contact@crystal.fr', 'ffozeu', '0000-00-00 00:00:00', 12, 0, 0, NULL, 800000, 'miaezduezf ef eifeif e fefhezibf erzif felfezf<br>', 0, '0000-00-00 00:00:00', 16, 0, 'affichage', 'maison-a-vendre', '', ''),
(54, 'vente de tomates', 'Cameroun', 'yaoundÃ©', '96165874', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-06-06 04:27:34', 2, 2, 0, 2, 2500, 'les tomates produites dans le respect des normes du marchÃ© actuel<br>', 1, '2013-05-06 04:27:34', 31, 35, 'affichage', 'vente-de-tomates', '', ''),
(55, 'maison Ã  louer au quartier biyem-assi', 'Cameroun', 'yaoundÃ©', '96165874', '79483841', 'fozeutakoudjou@gmail.com', 'fozeu takoudjou', '2013-06-24 03:17:53', 13, 0, 7, 7, 100000, 'une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable. une maison avec terrasse et dans la barriÃ¨re Ã  un prix quasi cadeaux et discutable.', 1, '2013-05-24 03:17:53', 31, 34, 'affichage', 'maison-a-louer-au-quartier-biyem-assi', '', ''),
(56, 'maison Ã  vendre dans le quartier mbanda', 'cameroun', 'Ã©dea', '98487557', '', 'ffozeu@yahoo.fr', 'nakata', '2013-07-03 18:09:37', 13, 2, 7, 2, 25000000, '<br>', 1, '2013-06-02 18:09:37', 31, 19, 'affichage', 'maison-a-vendre-dans-le-quartier-mbanda', '', '');

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
(4, 1),
(5, 1),
(6, 1),
(7, 1);

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
  `frontVisitility` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFils`),
  UNIQUE KEY `link_rewrite` (`link_rewrite`),
  KEY `idParent` (`idParent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `c2w_categorie`
--

INSERT INTO `c2w_categorie` (`idFils`, `idParent`, `libelle`, `image`, `description`, `position`, `active`, `length`, `link_rewrite`, `defaultAnnonceImage`, `frontVisitility`) VALUES
(1, 0, 'immobilier', '30-01-2013-07-00-22big-image.jpg', 'Appartement, villas, Maison, terrain , immeuble, studio', 0, 1, 0, 'immobilier', '', 1),
(2, 0, 'agriculture', '07-02-2013-14-17-30agri.jpg', '<p>Produit et service agricoles ...</p>', 0, 1, 0, 'agriculture', '', 1),
(3, 0, 'Architecture et Design', '07-02-2013-14-14-35annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'architecture-et-design', '', 1),
(4, 0, 'Automobile', '07-02-2013-14-16-05auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'automobile', '', 1),
(5, 0, 'Pharmacie et Optique', '07-02-2013-14-21-28pharmacie.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'pharmacie-et-optique', '', 1),
(6, 0, 'Banque et Finances', '07-02-2013-14-22-24banque.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'banque-et-finances', '', 1),
(7, 0, 'Environnement', '07-02-2013-14-23-01env.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'environnement', '', 1),
(8, 0, 'Hotelerie et Restauration', '07-02-2013-14-23-41hotelerie.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'hotelerie-et-restauration', '', 1),
(9, 0, 'Informatique et TÃ©lÃ©com', '07-02-2013-14-24-28Informatique.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'informatique-et-telecom', '', 1),
(10, 0, 'Sport et Relaxation', '07-02-2013-14-25-23annonces2.jpg', '<p>Vente , achat , location etÂ  prÃªt ...</p>', 0, 1, 0, 'sport-et-relaxation', '', 1),
(11, 0, 'Education et foration', '07-02-2013-14-27-39edu.jpg', '<p>Formation professionnelle, uni ...</p>', 0, 1, 0, 'education-et-foration', '', 1),
(12, 1, 'Villas', '', '<p>test test test et teste</p>', 0, 1, 1, 'villas', '', 1),
(13, 1, 'Maison', '18-02-2013-16-28-57auto.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'maison', '', 1),
(14, 0, 'Meubles et intÃ©rieur', '22-02-2013-04-22-18other-product.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'meubles-et-interieur', '', 1),
(15, 0, 'Appreils et machines', '22-02-2013-04-23-30Informatique.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'appreils-et-machines', '', 1),
(16, 0, 'vÃªtements et chaussures', '22-02-2013-04-25-37annonces.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'vetements-et-chaussures', '', 1),
(17, 0, 'Animaux et vÃ©gÃ©tuax', '22-02-2013-04-26-35annonces2.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 0, 'animaux-et-vegetuax', '', 1),
(18, 1, 'Terrains', '22-02-2013-04-39-07big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'terrains', '', 1),
(19, 1, 'Chambres', '22-02-2013-04-40-13big-image.jpg', '<p>Vente , achat , location et prÃªt ...</p>', 0, 1, 1, 'chambres', '', 1),
(20, 5, 'Pharmacie de garde', '', '', 0, 1, 1, 'pharmacie-de-garde', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `c2w_chat_messages`
--

INSERT INTO `c2w_chat_messages` (`message_id`, `message_text`, `pseudo`, `timestamp`, `messageWriteto`, `concerningIdAnnonce`, `pseudoClient`, `pseudoAnnonceur`, `dateMsg`) VALUES
(1, 'salut serait-il possible de discutÃ© sur votre produits', 'alfred', 0, 2, 1, 'alfred', 'Annonceur', '2013-04-06'),
(2, 'un autre test\\n', 'alfred', 0, 2, 48, 'alfred', 'Annonceur', '2013-04-06'),
(3, 'je teste', 'alfred', 0, 2, 49, 'alfred', 'Annonceur', '2013-04-26'),
(4, 'bonjour', 'Annonceur', 0, 2, 49, 'anonymous', 'Annonceur', '2013-05-06'),
(5, 'test de fonctionnement', 'Annonceur', 0, 2, 49, 'anonymous', 'Annonceur', '2013-05-06');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `c2w_chat_online`
--

INSERT INTO `c2w_chat_online` (`online_id`, `online_ip`, `online_user`, `online_status`, `online_date`, `online_chat_with`) VALUES
(2, '', 'alfred', 1, '2013-04-06', 2);

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
('4kbf54aen4ud874q3hemfvviq4', '127.0.0.1', '2013-05-23 13:49:59'),
('au0gsuf1er8liicclq4uhr95k7', '127.0.0.1', '2013-05-23 13:41:05'),
('lrp0qpg8869ibtbvhjqfkd3ao6', '127.0.0.1', '2013-05-23 13:42:39'),
('i2dkkjqiapec1dcplrda5bt6s3', '127.0.0.1', '2013-05-24 02:33:53'),
('ugiphbckn3028kll0av18id797', '127.0.0.1', '2013-05-24 03:16:44'),
('rsou3d5g42ehg31gu6180p9i92', '127.0.0.1', '2013-05-24 06:17:12'),
('ek3gc8grl96e3sl3t9ogp6cbh2', '127.0.0.1', '2013-05-25 06:37:38'),
('35712nje9to2mnn4plrmsp4r81', '127.0.0.1', '2013-05-25 13:34:43'),
('05cc48o2o8uqo86s8p82748qd0', '127.0.0.1', '2013-05-27 03:07:28'),
('papcbk2espltvk6b87ar9qkuv5', '127.0.0.1', '2013-05-28 11:52:17'),
('ev2cfd00gat2r78g2hkfhr9mu4', '127.0.0.1', '2013-05-29 03:31:24'),
('o4uokupgq33frdmn8eha7ds0t4', '127.0.0.1', '2013-06-01 18:01:40'),
('l93s8lvumhg5010g0544lidm66', '127.0.0.1', '2013-06-02 17:56:39'),
('9h189ms60qeq966b0rko36q891', '127.0.0.1', '2013-06-02 17:56:40'),
('37pk3buas9jfi70mim78e90631', '127.0.0.1', '2013-06-02 17:56:41'),
('g6pl4cudm4joja1d1i1g758p27', '127.0.0.1', '2013-06-02 17:59:41'),
('dk086r7tu08232h2rrgkuoa1a0', '127.0.0.1', '2013-06-02 17:59:41'),
('hstu0cfr2u8uac2mg10c5ig551', '127.0.0.1', '2013-06-02 18:00:46'),
('9or4emd9a493ppfnte77ebm0j7', '127.0.0.1', '2013-06-03 17:38:19'),
('19kp8vittl5d0hq6e9nipo12f4', '127.0.0.1', '2013-06-03 22:16:58'),
('31tblf6bccjhdm7440ciji17e7', '127.0.0.1', '2013-06-05 12:49:49'),
('fslsi2o90544o0hona7bgc7qo4', '127.0.0.1', '2013-06-10 10:08:54'),
('8vsc4jmudnl4aqrufivk1s5a33', '127.0.0.1', '2013-06-11 09:34:20'),
('caq97sa64ucmmvu5bnroi4cv55', '127.0.0.1', '2013-06-12 04:42:34'),
('o7detvhroku8jdsihhp1nnk9h7', '127.0.0.1', '2013-06-12 06:14:48'),
('sspn2mtfkja68gugccv1568cb3', '127.0.0.1', '2013-06-12 06:16:04'),
('dcdeo4q2v0ksl7ractq6s0g0q7', '127.0.0.1', '2013-06-12 06:16:04'),
('af457q3hndmtpilhf5dj57s0i4', '127.0.0.1', '2013-06-13 04:12:52'),
('f3lcuse8l0sk7u2j3agldvhos0', '127.0.0.1', '2013-06-13 04:13:21'),
('ia3178tpato0j2rvm67binlt61', '127.0.0.1', '2013-06-13 04:13:22'),
('o61kkdn7ka5b529eo19tr4bfd4', '127.0.0.1', '2013-06-13 12:45:47'),
('i6dsa6l4llcnsd81rsf6gbhns1', '127.0.0.1', '2013-06-14 09:39:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `c2w_newsmember`
--

INSERT INTO `c2w_newsmember` (`id_member`, `email_member`, `date_souscription`, `is_actived`, `nom_membre`, `phone`) VALUES
(1, 'maitrembida@yagoo.fr', '0000-00-00 00:00:00', 1, '', ''),
(3, 'ping@yui.fr', '0000-00-00 00:00:00', 1, '', '1234567'),
(4, 'ffozeu@crystals-services.com', '0000-00-00 00:00:00', 1, '', '0032796155706'),
(5, 'btchedjou@aventica.com', '2013-03-20 10:16:24', 1, '', '22256878'),
(6, 'contact@crystal.fr', '2013-04-15 15:23:01', 1, '', '99887755'),
(7, 'contact@crystals-services.com', '2013-04-15 17:38:59', 1, '', '99887755'),
(8, 'fozeutakoudjou@gmail.com', '2013-05-24 03:12:18', 1, '', '96165874'),
(9, 'ffozeu@yahoo.fr', '2013-06-02 18:05:51', 1, '', '98487557');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

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
(58, 'Mbida Luc Alfred', 155, 'ruevebde', 'Annonces-cm', '99887755', '', '', 49, NULL, 4),
(59, '', 0, '', '', '', '', 'yaoundÃ©', 50, NULL, 0),
(60, 'Mbida Luc Alfred', 34034, 'jzbejfevefezfez', 'Annonces-cm', '99887755', '', '', 52, NULL, 4),
(61, '', 0, '', '', '', '', 'yaoundÃ©', 53, NULL, 0),
(62, 'Mbida Luc Alfred', 15500, 'gj efbezhf ezlf', 'Annonces-cm', '96165874', '', '', 54, NULL, 5),
(63, 'fozeu takoudjou francis andrÃ©', 62279, 'gj efbezhf ezlf', 'Annonces-cm', '96165874', '', '', 55, NULL, 4),
(64, 'Mbida Luc Alfred', 77531, 'fhdsjs mfhdsjvdbsjds', 'Annonces-cm', '98487557', '', '', 56, NULL, 4);

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
  `showfooteradv` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `c2w_page`
--

INSERT INTO `c2w_page` (`id`, `titre`, `bgImage`, `repeatX`, `repeatY`, `actived`, `contenu`, `metatitle`, `metadescription`, `metakeyword`, `identifiant`, `prix`, `showfooteradv`) VALUES
(9, 'Contactez-nous', '13-03-2013-12-46-40bg-orange.png', 0, 0, 1, '<div id="info_left">\r\n<p class="adress"><span> Adresses:</span><br /> Chraorci ac convall varius level oreme campus leo. Done plomattis necloremips placerate bibe ndum. Crasi loid urna.</p>\r\n<p class="telephone"><span>Telephone :</span><span class="numero"> +237 00 00 00 Â Â  </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00 </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00</span></p>\r\n<p class="langue"><span>Langue de travail :Â  </span>FranÃ§ais</p>\r\n</div>', 'contact annonce', '<br>', 'Contactez-nous', 'contact', 11000, 1),
(10, 'Inscription', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '<p>tes tes teste test ets etts te ste</p>', 'Inscription', 'dadfzcfea eeefezaf', 'Inscription', 'inscription', 12000, 1),
(11, 'Login', '01-01-2001-03-56-11Coucher-de-soleil.jpg', 1, 1, 1, 'Page de connexion sur le site<br>', 'Login', '<br>', 'login', 'login', 1500, 1),
(12, 'Bienvenue Sur Annonces CM', '29-01-2013-04-05-57annonces.png', 1, 1, 1, '', '', 'Faites vos annonces ici', 'Annonces, publicitÃ©, publication', 'home', 4500, 0),
(13, 'Notre newsletters', '', 1, 1, 1, '<br>', '', '<br>', '', 'newsletter', 6000, 1),
(14, 'Envoyer une annonce', '', 1, 1, 1, '', '', '', '', 'annonce', 100, 0),
(15, 'CatÃ©gorie', '', 0, 0, 0, '', 'catÃ©gory', '', '', 'category', 100, 1),
(16, 'DÃ©tail de l''annonce', '', 0, 0, 0, '', '', '', '', 'detail_annonce', 1, 1),
(17, 'conditions  annonce', '', 0, 0, 1, '<p>nnnnnnnnnnnnnnnnnnnn</p>', '', '', '', 'cga', 2345, 1),
(18, 'aide', '', 0, 0, 1, '<p>help help help .................</p>', '', '', '', 'aide', 456, 1),
(19, 'Envoyer une Annonces Publicitaires', '', 0, 0, 1, '', '', '', '', 'Adversiting', NULL, 1),
(20, 'Annonces du même auteur', '', 0, 0, 1, '', '', '', '', 'author_annonce', NULL, 1),
(21, 'Packs de crÃ©dits', '', 0, 0, 1, '', '', '', '', 'pack_credit', 5, 1),
(22, 'Formulaire de paiement', '', 0, 0, 1, '', '', '', '', 'paiement', 2, 1),
(23, 'Modes de paiement', '', 0, 0, 1, '', '', '', '', 'mode_paiement', 5, 1),
(24, 'Partenaires', '', 0, 0, 1, '', '', '', '', 'partenaires', 6, 1),
(25, 'RÃ©sultats de la recherche', '', 0, 0, 1, '', '', '', '', 'recherche', 7, 1),
(26, 'CrÃ©er un utilisateur', '', 0, 0, 1, '', '', '', '', 'create_user', 690, 1),
(27, 'Mon Compte', '', 0, 0, 1, '', '', '', '', 'mon_compte', 40, 1),
(28, 'Mes annonces', '', 0, 0, 1, '', '', '', '', 'mes_annonces', 12, 1),
(29, 'Mes Annonces Publicitaires', '', 0, 0, 1, '', '', '', '', 'mes_annonces_pub', 2345, 1),
(30, 'mobiles', '', 0, 0, 1, '', '', '', '', 'mobiles', 4500, 1),
(31, 'speciales', '', 0, 0, 1, '', '', '', '', 'speciales', 4500, 1),
(32, 'Urgences', '', 0, 0, 0, '', '', '', '', 'urgence', NULL, 1),
(33, 'EVENEMENT', '', 0, 0, 0, '', '', '', '', 'evenements', NULL, 1),
(34, 'A la Une', '', 0, 0, 0, '', '', '', '', 'alaune', NULL, 1);

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
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

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
(18, '15-04-2013-15-21-56annonces2.jpg', '', 'principale', 49),
(19, '15-04-2013-15-22-02agri.jpg', '', 'autres', 49),
(20, '15-04-2013-15-22-07auto.jpg', '', 'autres', 49),
(21, '15-04-2013-15-22-12annonces.jpg', '', 'autres', 49),
(22, '15-04-2013-15-22-20banque.jpg', '', 'autres', 49),
(23, '20-04-2013-13-01-13annonces2.jpg', '', 'principale', 52),
(24, '20-04-2013-13-01-18auto.jpg', '', 'autres', 52),
(25, '24-05-2013-03-10-55agri.jpg', '', 'principale', 55),
(26, '24-05-2013-03-10-59annonces.jpg', '', 'autres', 55),
(27, '24-05-2013-03-11-04annonces2.jpg', '', 'autres', 55),
(28, '24-05-2013-03-11-09auto.jpg', '', 'autres', 55),
(29, '24-05-2013-03-11-16banque.jpg', '', 'autres', 55),
(30, '24-05-2013-03-11-26big-image.jpg', '', 'autres', 55),
(31, '24-05-2013-03-11-37hotelerie.jpg', '', 'autres', 55),
(32, '24-05-2013-03-11-50other-product.jpg', '', 'autres', 55),
(33, '24-05-2013-03-12-03pharmacie.jpg', '', 'autres', 55),
(34, '02-06-2013-18-04-5700.-willpower-artwork.jpg', '', 'principale', 56);

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
(1, 1),
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
  `dateJour` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idPage` int(11) NOT NULL DEFAULT '0',
  `idPosition` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTanche`,`idAdversitind`,`dateJour`,`idPage`,`idPosition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `c2w_tranche_adversiting`
--

INSERT INTO `c2w_tranche_adversiting` (`idTanche`, `idAdversitind`, `dateJour`, `idPage`, `idPosition`) VALUES
(0, 0, '2001-01-02 08:01:03', 0, 0),
(0, 0, '2013-03-11 13:03:53', 0, 0),
(0, 0, '2013-03-11 15:03:47', 0, 0),
(0, 0, '2013-03-13 07:03:07', 0, 0),
(9, 12, '2001-01-02 00:00:00', 9, 2),
(9, 12, '2001-01-03 00:00:00', 9, 2),
(9, 12, '2001-01-04 00:00:00', 9, 2),
(9, 12, '2001-01-05 00:00:00', 9, 2),
(9, 12, '2001-01-06 00:00:00', 9, 2),
(9, 15, '2013-03-12 00:00:00', 12, 2),
(9, 15, '2013-03-13 00:00:00', 12, 2),
(9, 15, '2013-03-14 00:00:00', 12, 2),
(9, 15, '2013-03-15 00:00:00', 12, 2),
(9, 16, '2013-03-14 00:00:00', 12, 4),
(9, 16, '2013-03-15 00:00:00', 12, 4),
(9, 16, '2013-03-16 00:00:00', 12, 4),
(9, 16, '2013-03-17 00:00:00', 12, 4),
(9, 16, '2013-03-18 00:00:00', 12, 4),
(10, 12, '2001-01-02 00:00:00', 9, 2),
(10, 12, '2001-01-03 00:00:00', 9, 2),
(10, 12, '2001-01-04 00:00:00', 9, 2),
(10, 12, '2001-01-05 00:00:00', 9, 2),
(10, 12, '2001-01-06 00:00:00', 9, 2),
(10, 14, '2013-03-11 00:00:00', 12, 2),
(10, 14, '2013-03-12 00:00:00', 12, 2),
(10, 14, '2013-03-13 00:00:00', 12, 2),
(10, 16, '2013-03-14 00:00:00', 12, 4),
(10, 16, '2013-03-15 00:00:00', 12, 4),
(10, 16, '2013-03-16 00:00:00', 12, 4),
(10, 16, '2013-03-17 00:00:00', 12, 4),
(10, 16, '2013-03-18 00:00:00', 12, 4),
(11, 12, '2001-01-02 00:00:00', 9, 2),
(11, 12, '2001-01-03 00:00:00', 9, 2),
(11, 12, '2001-01-04 00:00:00', 9, 2),
(11, 12, '2001-01-05 00:00:00', 9, 2),
(11, 12, '2001-01-06 00:00:00', 9, 2),
(11, 14, '2013-03-11 00:00:00', 12, 2),
(11, 14, '2013-03-12 00:00:00', 12, 2),
(11, 14, '2013-03-13 00:00:00', 12, 2),
(11, 16, '2013-03-14 00:00:00', 12, 4),
(11, 16, '2013-03-15 00:00:00', 12, 4),
(11, 16, '2013-03-16 00:00:00', 12, 4),
(11, 16, '2013-03-17 00:00:00', 12, 4),
(11, 16, '2013-03-18 00:00:00', 12, 4),
(12, 12, '2001-01-02 00:00:00', 9, 2),
(12, 12, '2001-01-03 00:00:00', 9, 2),
(12, 12, '2001-01-04 00:00:00', 9, 2),
(12, 12, '2001-01-05 00:00:00', 9, 2),
(12, 12, '2001-01-06 00:00:00', 9, 2),
(12, 14, '2013-03-11 00:00:00', 12, 2),
(12, 14, '2013-03-12 00:00:00', 12, 2),
(12, 14, '2013-03-13 00:00:00', 12, 2),
(12, 16, '2013-03-14 00:00:00', 12, 4),
(12, 16, '2013-03-15 00:00:00', 12, 4),
(12, 16, '2013-03-16 00:00:00', 12, 4),
(12, 16, '2013-03-17 00:00:00', 12, 4),
(12, 16, '2013-03-18 00:00:00', 12, 4),
(13, 15, '2013-03-12 00:00:00', 12, 2),
(13, 15, '2013-03-13 00:00:00', 12, 2),
(13, 15, '2013-03-14 00:00:00', 12, 2),
(13, 15, '2013-03-15 00:00:00', 12, 2),
(13, 16, '2013-03-14 00:00:00', 12, 4),
(13, 16, '2013-03-15 00:00:00', 12, 4),
(13, 16, '2013-03-16 00:00:00', 12, 4),
(13, 16, '2013-03-17 00:00:00', 12, 4),
(13, 16, '2013-03-18 00:00:00', 12, 4),
(14, 14, '2013-03-11 00:00:00', 12, 2),
(14, 14, '2013-03-12 00:00:00', 12, 2),
(14, 14, '2013-03-13 00:00:00', 12, 2),
(14, 16, '2013-03-14 00:00:00', 12, 4),
(14, 16, '2013-03-15 00:00:00', 12, 4),
(14, 16, '2013-03-16 00:00:00', 12, 4),
(14, 16, '2013-03-17 00:00:00', 12, 4),
(14, 16, '2013-03-18 00:00:00', 12, 4),
(15, 15, '2013-03-12 00:00:00', 12, 2),
(15, 15, '2013-03-13 00:00:00', 12, 2),
(15, 15, '2013-03-14 00:00:00', 12, 2),
(15, 15, '2013-03-15 00:00:00', 12, 2),
(15, 16, '2013-03-14 00:00:00', 12, 4),
(15, 16, '2013-03-15 00:00:00', 12, 4),
(15, 16, '2013-03-16 00:00:00', 12, 4),
(15, 16, '2013-03-17 00:00:00', 12, 4),
(15, 16, '2013-03-18 00:00:00', 12, 4),
(16, 14, '2013-03-11 00:00:00', 12, 2),
(16, 14, '2013-03-12 00:00:00', 12, 2),
(16, 14, '2013-03-13 00:00:00', 12, 2),
(16, 16, '2013-03-14 00:00:00', 12, 4),
(16, 16, '2013-03-15 00:00:00', 12, 4),
(16, 16, '2013-03-16 00:00:00', 12, 4),
(16, 16, '2013-03-17 00:00:00', 12, 4),
(16, 16, '2013-03-18 00:00:00', 12, 4),
(17, 15, '2013-03-12 00:00:00', 12, 2),
(17, 15, '2013-03-13 00:00:00', 12, 2),
(17, 15, '2013-03-14 00:00:00', 12, 2),
(17, 15, '2013-03-15 00:00:00', 12, 2),
(17, 16, '2013-03-14 00:00:00', 12, 4),
(17, 16, '2013-03-15 00:00:00', 12, 4),
(17, 16, '2013-03-16 00:00:00', 12, 4),
(17, 16, '2013-03-17 00:00:00', 12, 4),
(17, 16, '2013-03-18 00:00:00', 12, 4),
(18, 14, '2013-03-11 00:00:00', 12, 2),
(18, 14, '2013-03-12 00:00:00', 12, 2),
(18, 14, '2013-03-13 00:00:00', 12, 2),
(18, 16, '2013-03-14 00:00:00', 12, 4),
(18, 16, '2013-03-15 00:00:00', 12, 4),
(18, 16, '2013-03-16 00:00:00', 12, 4),
(18, 16, '2013-03-17 00:00:00', 12, 4),
(18, 16, '2013-03-18 00:00:00', 12, 4),
(19, 14, '2013-03-11 00:00:00', 12, 2),
(19, 14, '2013-03-12 00:00:00', 12, 2),
(19, 14, '2013-03-13 00:00:00', 12, 2),
(19, 16, '2013-03-14 00:00:00', 12, 4),
(19, 16, '2013-03-15 00:00:00', 12, 4),
(19, 16, '2013-03-16 00:00:00', 12, 4),
(19, 16, '2013-03-17 00:00:00', 12, 4),
(19, 16, '2013-03-18 00:00:00', 12, 4),
(20, 15, '2013-03-12 00:00:00', 12, 2),
(20, 15, '2013-03-13 00:00:00', 12, 2),
(20, 15, '2013-03-14 00:00:00', 12, 2),
(20, 15, '2013-03-15 00:00:00', 12, 2),
(20, 16, '2013-03-14 00:00:00', 12, 4),
(20, 16, '2013-03-15 00:00:00', 12, 4),
(20, 16, '2013-03-16 00:00:00', 12, 4),
(20, 16, '2013-03-17 00:00:00', 12, 4),
(20, 16, '2013-03-18 00:00:00', 12, 4),
(21, 14, '2013-03-11 00:00:00', 12, 2),
(21, 14, '2013-03-12 00:00:00', 12, 2),
(21, 14, '2013-03-13 00:00:00', 12, 2),
(21, 16, '2013-03-14 00:00:00', 12, 4),
(21, 16, '2013-03-15 00:00:00', 12, 4),
(21, 16, '2013-03-16 00:00:00', 12, 4),
(21, 16, '2013-03-17 00:00:00', 12, 4),
(21, 16, '2013-03-18 00:00:00', 12, 4),
(22, 15, '2013-03-12 00:00:00', 12, 2),
(22, 15, '2013-03-13 00:00:00', 12, 2),
(22, 15, '2013-03-14 00:00:00', 12, 2),
(22, 15, '2013-03-15 00:00:00', 12, 2),
(22, 16, '2013-03-14 00:00:00', 12, 4),
(22, 16, '2013-03-15 00:00:00', 12, 4),
(22, 16, '2013-03-16 00:00:00', 12, 4),
(22, 16, '2013-03-17 00:00:00', 12, 4),
(22, 16, '2013-03-18 00:00:00', 12, 4),
(23, 15, '2013-03-12 00:00:00', 12, 2),
(23, 15, '2013-03-13 00:00:00', 12, 2),
(23, 15, '2013-03-14 00:00:00', 12, 2),
(23, 15, '2013-03-15 00:00:00', 12, 2),
(23, 16, '2013-03-14 00:00:00', 12, 4),
(23, 16, '2013-03-15 00:00:00', 12, 4),
(23, 16, '2013-03-16 00:00:00', 12, 4),
(23, 16, '2013-03-17 00:00:00', 12, 4),
(23, 16, '2013-03-18 00:00:00', 12, 4),
(24, 15, '2013-03-12 00:00:00', 12, 2),
(24, 15, '2013-03-13 00:00:00', 12, 2),
(24, 15, '2013-03-14 00:00:00', 12, 2),
(24, 15, '2013-03-15 00:00:00', 12, 2),
(24, 16, '2013-03-14 00:00:00', 12, 4),
(24, 16, '2013-03-15 00:00:00', 12, 4),
(24, 16, '2013-03-16 00:00:00', 12, 4),
(24, 16, '2013-03-17 00:00:00', 12, 4),
(24, 16, '2013-03-18 00:00:00', 12, 4),
(25, 15, '2013-03-12 00:00:00', 12, 2),
(25, 15, '2013-03-13 00:00:00', 12, 2),
(25, 15, '2013-03-14 00:00:00', 12, 2),
(25, 15, '2013-03-15 00:00:00', 12, 2),
(25, 16, '2013-03-14 00:00:00', 12, 4),
(25, 16, '2013-03-15 00:00:00', 12, 4),
(25, 16, '2013-03-16 00:00:00', 12, 4),
(25, 16, '2013-03-17 00:00:00', 12, 4),
(25, 16, '2013-03-18 00:00:00', 12, 4),
(26, 15, '2013-03-12 00:00:00', 12, 2),
(26, 15, '2013-03-13 00:00:00', 12, 2),
(26, 15, '2013-03-14 00:00:00', 12, 2),
(26, 15, '2013-03-15 00:00:00', 12, 2),
(26, 16, '2013-03-14 00:00:00', 12, 4),
(26, 16, '2013-03-15 00:00:00', 12, 4),
(26, 16, '2013-03-16 00:00:00', 12, 4),
(26, 16, '2013-03-17 00:00:00', 12, 4),
(26, 16, '2013-03-18 00:00:00', 12, 4),
(27, 15, '2013-03-12 00:00:00', 12, 2),
(27, 15, '2013-03-13 00:00:00', 12, 2),
(27, 15, '2013-03-14 00:00:00', 12, 2),
(27, 15, '2013-03-15 00:00:00', 12, 2),
(27, 16, '2013-03-14 00:00:00', 12, 4),
(27, 16, '2013-03-15 00:00:00', 12, 4),
(27, 16, '2013-03-16 00:00:00', 12, 4),
(27, 16, '2013-03-17 00:00:00', 12, 4),
(27, 16, '2013-03-18 00:00:00', 12, 4),
(28, 15, '2013-03-12 00:00:00', 12, 2),
(28, 15, '2013-03-13 00:00:00', 12, 2),
(28, 15, '2013-03-14 00:00:00', 12, 2),
(28, 15, '2013-03-15 00:00:00', 12, 2),
(28, 16, '2013-03-14 00:00:00', 12, 4),
(28, 16, '2013-03-15 00:00:00', 12, 4),
(28, 16, '2013-03-16 00:00:00', 12, 4),
(28, 16, '2013-03-17 00:00:00', 12, 4),
(28, 16, '2013-03-18 00:00:00', 12, 4),
(29, 15, '2013-03-12 00:00:00', 12, 2),
(29, 15, '2013-03-13 00:00:00', 12, 2),
(29, 15, '2013-03-14 00:00:00', 12, 2),
(29, 15, '2013-03-15 00:00:00', 12, 2),
(29, 16, '2013-03-14 00:00:00', 12, 4),
(29, 16, '2013-03-15 00:00:00', 12, 4),
(29, 16, '2013-03-16 00:00:00', 12, 4),
(29, 16, '2013-03-17 00:00:00', 12, 4),
(29, 16, '2013-03-18 00:00:00', 12, 4),
(30, 15, '2013-03-12 00:00:00', 12, 2),
(30, 15, '2013-03-13 00:00:00', 12, 2),
(30, 15, '2013-03-14 00:00:00', 12, 2),
(30, 15, '2013-03-15 00:00:00', 12, 2),
(30, 16, '2013-03-14 00:00:00', 12, 4),
(30, 16, '2013-03-15 00:00:00', 12, 4),
(30, 16, '2013-03-16 00:00:00', 12, 4),
(30, 16, '2013-03-17 00:00:00', 12, 4),
(30, 16, '2013-03-18 00:00:00', 12, 4),
(31, 15, '2013-03-12 00:00:00', 12, 2),
(31, 15, '2013-03-13 00:00:00', 12, 2),
(31, 15, '2013-03-14 00:00:00', 12, 2),
(31, 15, '2013-03-15 00:00:00', 12, 2),
(31, 16, '2013-03-14 00:00:00', 12, 4),
(31, 16, '2013-03-15 00:00:00', 12, 4),
(31, 16, '2013-03-16 00:00:00', 12, 4),
(31, 16, '2013-03-17 00:00:00', 12, 4),
(31, 16, '2013-03-18 00:00:00', 12, 4),
(32, 15, '2013-03-12 00:00:00', 12, 2),
(32, 15, '2013-03-13 00:00:00', 12, 2),
(32, 15, '2013-03-14 00:00:00', 12, 2),
(32, 15, '2013-03-15 00:00:00', 12, 2),
(32, 16, '2013-03-14 00:00:00', 12, 4),
(32, 16, '2013-03-15 00:00:00', 12, 4),
(32, 16, '2013-03-16 00:00:00', 12, 4),
(32, 16, '2013-03-17 00:00:00', 12, 4),
(32, 16, '2013-03-18 00:00:00', 12, 4);

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
  `password` varchar(40) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `c2w_utilisateurs`
--

INSERT INTO `c2w_utilisateurs` (`id`, `pseudo`, `nom`, `prenom`, `adresse`, `avatar`, `password`, `email`, `is_active`, `newsletter`, `pays`, `ville`, `code_postal`, `tel1`, `tel2`, `infos_complementaires`, `nbCredits`) VALUES
(2, 'alfred', 'Mbida', 'Luc Alfred', 'xxxxx@zzzz.cm', '', '823c0b2ff31a81adab5c1967107e9c50', 'test', 1, 1, 'cameroun', 'yaounde', ' 567', '678', '', 'fhre ifn ks jn', 0),
(3, 'r', 'r', 'r', 'r', '', 'r', 'r', 1, 1, 'r', 'r', 'r', 'r', 'r', 'r', 0),
(4, 't', 't', 't', 't', '', 't', 't', 1, 1, 't', 't', 't', 't', 'tt', 'ttt', 0),
(5, 'ffozeu', 'fozeu Takoudjou', 'francis', 'rue des acacia', '', 'admin', 'fozeutakoudjou@gmail.com', 1, 1, 'cameroun', 'yaoundÃ©', '', '96155706', '', '', 0),
(6, 'ffozeu2', 'fozeu Takoudjou', 'francis', 'rue des acacia', '', 'c2eb244f2a57ab6d66473b2812d61727', 'ffozeu@yahoo.fr', 1, 1, 'cameroun', 'yaoundÃ©', '', '96155706', '', '', 0),
(7, 'nakata', 'fozeu takoudjou', 'francis andrÃ©', 'rue des accacia', '', '173c79b164fa82a32338cf61aff4e821', 'ffozeu@crystals-services.com', 1, 1, 'Cameroun', 'yaoundÃ©', '00812', '96155706', '79483841', 'un Ãªtre trÃ¨s ouvert', 0);
