-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 15 Mars 2013 à 12:31
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
  PRIMARY KEY (`id`),
  KEY `idPosition` (`idPosition`,`idPage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `c2w_adversiting`
--

INSERT INTO `c2w_adversiting` (`id`, `altText`, `image`, `dateBegin`, `dateEnd`, `idPosition`, `idPage`, `active`, `finalPrice`, `link`, `dureeAnnonce`, `diffusion`, `idUder`, `nbClick`) VALUES
(2, 'dÃ©couvrÃ© notre nouveau site', '05-02-2013-15-10-06banner-home.png', '2013-02-01 00:00:00', '2013-02-28 00:00:00', 2, 12, 1, 1000, 'http://annonces-crystals.localhost', '', '', 0, 0),
(3, 'dÃ©couvrÃ© notre nouveau site', '05-02-2013-14-42-48banner-interne.jpg', '2013-02-06 00:00:00', '2013-02-22 00:00:00', 4, 13, 1, 1000, 'http://annonces.localhost', '', '', 0, 0),
(4, '', '', '2013-02-01 00:00:00', '2013-02-23 00:00:00', 0, 0, 0, 0, '', '', '', 0, 0),
(6, 'c''est cool', '', '2013-02-25 00:00:00', '0000-00-00 00:00:00', 2, 11, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(7, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(8, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(9, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(10, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(11, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(12, 'le master chef', '', '2001-01-02 00:00:00', '0000-00-00 00:00:00', 2, 9, 0, 0, 'www.google.cm', '5', 'periodique', 2, 0),
(13, 'dÃ©couvrÃ© notre nouveau site', '', '2013-03-08 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '4', 'plein temps', 2, 0),
(14, 'dÃ©couvrÃ© notre nouveau site', '', '2013-03-11 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '3', 'periodique', 2, 0),
(15, 'dÃ©couvrÃ© notre nouveau site', '11-03-2013-15-15-30auto.jpg', '2013-03-12 00:00:00', '0000-00-00 00:00:00', 2, 12, 0, 0, 'http://annonces-crystals.localhost', '4', 'plein temps', 2, 0),
(16, 'dÃ©couvrÃ© notre nouveau site', '13-03-2013-07-21-46banner-home.png', '2013-03-14 00:00:00', '0000-00-00 00:00:00', 4, 12, 1, 1000, 'http://annonces-crystals.localhost', '5', 'plein temps', 2, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `c2w_annonce`
--

INSERT INTO `c2w_annonce` (`id`, `designation`, `pays`, `ville`, `phone1`, `phone2`, `email`, `auteur`, `dateexp`, `idCategorie`, `idPriorite`, `idPosition`, `idUder`, `prixTotal`, `texte`, `is_actived`, `dateDebut`, `dureeAnnonce`, `nbClick`, `typeFacturation`, `link_rewrite`, `link`) VALUES
(1, '', '', '', '', '', 'zprje@yahoo.com', '', '2013-04-02 13:09:10', 1, 2, 5, 2, 2503, '', 0, '2013-02-19 13:09:10', 6, 0, '', '', ''),
(2, '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, 0, '', '', ''),
(3, 'azertyuio', 'zertyuiop', 'azertyuiop', '2345678', '09876543', 'ertyuio@ERTYUI.com', 'Le maitre rikudou', '2013-03-19 16:14:14', 1, 2, 0, 2, 4567890, 'zerty-+hgfdsxcfvgbhn;;cxwxcvbn;/gfdsqsdfgh+Ã¹*+hgfdwxcvbn;/fdxswxcvbn;', 1, '2013-03-06 16:14:14', 3, 0, 'click', '', ''),
(4, 'azertyuio', 'zertyuiop', 'azertyuiop', '2345678', '09876543', 'mbidalucalfred@yahoo.fr', 'Le maitre rikudou', '2013-03-18 16:14:20', 1, 3, 5, 2, 4567890, 'usfdjqkhlifsqb ucifsgeb, azfgkqj&lt;geif, iifoug sqvfu<br>', 1, '2013-03-06 16:14:20', 2, 0, 'click', '', ''),
(5, 'Ma premiere  annonce', 'Cameroun', 'Yaounde', '96 43 57 59', '76 05 01 75', 'mbidalucalfred@yahoo.fr', 'Luc Alfred MBIDA', '2013-03-11 16:14:25', 1, 1, 5, 2, 45, 'Superbe villa Ã  vendre:<br>* 04 Chambres;<br>* Un Salon;<br>* Une Douche<br>', 1, '2013-03-06 16:14:25', 5, 0, 'affichage', '', ''),
(6, '4x4 2011', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-19 03:25:59', 1, 0, 0, NULL, 2, 'une voiture de derniÃ¨re gÃ©nÃ©ration Ã  votre service<br>', 1, '2013-03-08 03:25:59', 1, 0, 'affichage', '', ''),
(7, 'Terrain Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-13 03:48:10', 1, 0, 0, NULL, 1000, 'Terrain de 1000 mÂ² Ã  vendre Ã  raison de 7000FCFA/mÂ². Appeler pour qu''ont en discute<br>', 1, '2013-03-08 03:48:10', 5, 0, 'affichage', '', ''),
(8, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'fozeutakoudjou@gmail.com', 'Takoudjou', '2013-03-12 04:05:48', 2, 0, 0, NULL, 10, 'Une maison de 5 piÃ¨ces de derniÃ¨re gÃ©nÃ©ration faite pour vous<br>', 1, '2013-03-08 04:05:47', 4, 0, 'affichage', '', ''),
(9, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-13 05:37:19', 1, 0, 0, NULL, 2, 'une autres maison Ã  vendre<br>', 1, '2013-03-12 05:37:19', 1, 0, 'affichage', 'maison-a-vendre', ''),
(10, 'Terrain Ã  vendre odza', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-03-13 05:41:18', 12, 0, 0, NULL, 10800000, 'terrain Ã  vendre Ã  odza petit marchÃ©. pas loin de la route<br>', 1, '2013-03-12 05:41:18', 1, 0, 'affichage', 'terrain-a-vendre-odza', ''),
(13, 'Maison Ã  vendre olembÃ©', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', '', '2013-03-17 13:34:21', 1, 3, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u<br>', 1, '2013-03-12 13:34:21', 5, 0, 'affichage', 'maison-a-vendre-olembe', ''),
(14, 'Maison Ã  vendre olÃ©zoa', 'Cameroun', 'YaoundÃ©', '96155706', '', 'contact@crystals-services.com', 'Takoudjou', '2013-03-17 13:58:04', 1, 2, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u', 1, '2013-03-12 13:58:04', 5, 0, 'affichage', 'maison-a-vendre-olezoa', ''),
(19, 'Maison Ã  vendre', 'Cameroun', 'yaooundÃ©', '', '', 'ndjams1@gmail.com', '', '2013-04-12 10:59:51', 1, 2, 6, 2, 1000, 'maison Ã  vendre :2salons, 3 douches,2cuisines,4 chambresavec une indÃ©pendance.Au quartier biyem-assi Ã  100m de la route.<br>', 1, '2013-03-13 10:59:51', 30, 0, 'affichage', '', ''),
(20, 'documents perdu', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:08:44', 1, 0, 8, NULL, 0, 'Cartable de couleur noir oublier dans un taxi qui m''a transportÃ© de "mimboman" Ã  "carrefour kameni" immatriculÃ© ZH1234DS.veuillez me contacter au 99345432 contre forte recompense<br>', 1, '2013-03-13 11:08:44', 30, 0, 'affichage', '', ''),
(21, 'Fond de commerce', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:15:27', 1, 0, 8, NULL, 0, 'fond de commerce Ã  vendre!contacter moi au 23453257.TrÃ¨s bon prix.<br>', 1, '2013-03-13 11:15:27', 30, 0, 'affichage', '', ''),
(22, 'Ordinateur', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:15:33', 1, 0, 8, NULL, 0, 'Ordinateur Ã  vendre : P4 avec Ã©cran plat de 17 pouces.TrÃ¨s bon prix!stock limitÃ©<br>', 1, '2013-03-13 11:15:33', 30, 0, 'affichage', '', ''),
(23, 'Ordinateur', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:22:31', 1, 0, 8, NULL, 0, 'Votre mÃ©decin dÃ©sormais prÃ¨s de chez vous!pour tout vos problÃ©mes de santÃ©, n''hÃ©sitez plus!courez chez le docteur "SOIGNE TOUT".je suis situÃ© derriere le marchÃ© central.<br>', 1, '2013-03-13 11:22:31', 30, 0, 'affichage', '', ''),
(24, 'santÃ©', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:24:03', 1, 0, 8, NULL, 0, 'venez vite decouvrir les merveilles du docteur Ngeukam!situÃ© derrier la maison du parti!<br>', 1, '2013-03-13 11:24:03', 30, 0, 'affichage', '', ''),
(25, 'AUTRES', '', '', '', '', 'crystals-services@crystals.com', '', '2013-03-14 11:53:03', 1, 0, 8, NULL, 0, 'Enveloppe blanc Ã©garÃ© dans un taxi contenant des documents personnels et important!pour toute informations, contacter le 23454323 contre forte recompense.<br>', 1, '2013-03-13 11:53:03', 1, 0, 'affichage', '', ''),
(26, 'voiture', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:09', 4, 2, 6, 2, 2500000, 'Voiture de marque Toyota Ã  vendre:5portes,diesel,climatisÃ©!contact: 22343243<br>', 1, '2013-03-13 11:53:09', 30, 0, 'affichage', '', ''),
(27, 'voiture Ã  vendre', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:14', 4, 2, 6, 2, 23000000, 'Cadillaz Impreza Ã  vendre!climatisÃ©,diesel, boite vitesse automatique,300ch.moteur Ã  injection directe!<br>', 1, '2013-03-13 11:53:14', 30, 0, 'affichage', '', ''),
(28, 'Hotel', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:19', 8, 2, 6, 2, 45000, 'Hotel EL Belmondo!hotel 4 Ã©toiles situÃ© sur les rives du wouri!n''ayez plus l''embara du choix car dÃ©sormais, un seul choix s''offre Ã  vous!grande cÃ©remonie d''inauguration ce dimanche 23/12:2032Â§<br>Reservation: +234323445/+23456765<br><br>', 1, '2013-03-13 11:53:19', 30, 0, 'affichage', '', ''),
(29, 'Salon International sur les TIC au Cameroun', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:25', 9, 2, 6, 2, 34000, 'papayes de toute sorte chez nous...;Toutes vos communication d''entreprise, l''exposition de vos produits et \r\nservices, vos prestations de communication sur les TIC son bienvenus au \r\n5e Salon Internation de l''administration et de l''entreprise sur les NTIC', 1, '2013-03-13 11:53:25', 30, 0, 'affichage', '', ''),
(30, 'Architecte', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:30', 3, 2, 6, 2, 45000, 'besoin d''un architecte,alors contacter moi sur WWW.architectemoi.com.et vous ne serez pas dÃ©Ã§u!<br>', 1, '2013-03-13 11:53:30', 30, 0, 'affichage', '', ''),
(31, 'Ensegnement secondaire', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:35', 11, 2, 6, 2, 45000, 'LycÃ©e du Savoir ouvre dÃ©sormais ses portes aux enfants de deux sexes dÃ©sireux de bÃ©nÃ©ficier d''un encadrement dynamique et compÃ©tent!Parents,n''hÃ©sitez plus, vite vite inscrir vos enfants au "LYCÃ©E DU SAVOIR"!NB:place tres limitÃ©.<br>', 1, '2013-03-13 11:53:35', 30, 0, 'affichage', '', ''),
(32, 'PrÃ©t Ã  porter', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:39', 16, 2, 6, 2, 45000, 'PRET 0 PORTER DE LUXE OUVRE SES PORTES AU CARREFOUR BASTOS!vous aimez la qualitÃ©,alors, un seul lieu,uns eul magasin: System Dressing!<br>', 1, '2013-03-13 11:53:39', 30, 0, 'affichage', '', ''),
(33, 'agence immobiliere', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:18', 1, 2, 9, 2, 30000, '<ul id="annonces_speciales_scroller" class="clearfix"><li>\r\n                                <h4><a href="http://annonces-crystals.localhost/createannoncefront.html#" title="Agence immobiliÃ¨re continent">Agence immobiliÃ¨re Camerounaise</a></h4>\r\n                                <br>\r\n                                <div class="descr">\r\n                                    <div class="shot_text">Pour un logement confortable</div>\r\n                                    <span class="wrap_span"><span class="contact">TÃ©l :</span>22 06 21 29</span>\r\n                                    <span class="wrap_span"><span class="contact">@ :</span>contact@agencecamerounaise.com</span>\r\n                                </div>\r\n                            </li></ul>', 1, '2013-03-13 12:20:18', 30, 0, 'affichage', '', ''),
(34, 'Maiis', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:23', 2, 2, 9, 2, 30000, '30 sac de maiis de trÃ©s boe qualitÃ© a vendre.contact:maiiscam@yahoo.fr<br>', 1, '2013-03-13 12:20:23', 30, 0, 'affichage', '', ''),
(35, 'terrain a vendre', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:28', 18, 0, 9, 2, 30000, 'agence de lovcation des terrains.contact :locationdeterrain@hotmail.fr<br>tel:223234234<br>', 1, '2013-03-13 12:20:28', 30, 0, 'affichage', '', ''),
(36, 'BERGERS', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:12', 17, 2, 9, 2, 30000, 'agence de location des chien de garde!pplus particulierement de bergers Allemend!<br>contact:securdog@secur.com<br>', 1, '2013-03-13 12:20:12', 30, 0, 'affichage', '', ''),
(37, 'Fitnees', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:19:53', 10, 2, 9, 2, 30000, 'salle spÃ©cial de fitness ouvre ses portes sis derriere carrefour bastos!prise en charge et suivie!pour plus d''infos, contacter nous:fitnessclub@yahoo.com<br>tel:+123243423/+1212122324<br>', 1, '2013-03-13 12:19:53', 30, 0, 'affichage', '', ''),
(38, 'AUTRES', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:07', 1, 2, 9, 2, 30000, '<ul><li>\r\n                                                <h4><a href="http://annonces-crystals.localhost/createannoncefront.html#" title="">cartes et documents professionels</a></h4>\r\n                                                <div>produisez et securisez vos cartes produisez et securisez vos cartes </div>\r\n                                            </li></ul>', 1, '2013-03-13 12:20:07', 30, 0, 'affichage', '', ''),
(39, 'Chambres ', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:04', 19, 2, 7, 2, 75000, 'chambres modernes Ã  louer dans le quartier Emana!<br><br>', 1, '2013-03-13 14:30:04', 30, 0, 'affichage', '', ''),
(40, 'Vente', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:31', 9, 0, 7, 2, 75000, 'Pour tout vos articles informatiques Ã  vendre, conter nous et vous ne serez paz dessus<br>', 1, '2013-03-13 14:30:31', 30, 0, 'affichage', '', ''),
(41, 'Banque', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:26', 6, 2, 7, 2, 75000, 'Banque continentale ouvre ses portes aux publics avec plus de 150 services Ã  votre disposition<br>', 1, '2013-03-13 14:30:26', 30, 0, 'affichage', '', ''),
(42, 'Microfinance', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:21', 6, 2, 6, 2, 75000, 'CCA, le banque pour tous!<br><br>', 1, '2013-03-13 14:30:21', 30, 0, 'affichage', '', ''),
(43, 'Location', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:16', 4, 2, 7, 2, 75000, 'agence de location de voiture<br>', 1, '2013-03-13 14:30:16', 30, 0, 'affichage', '', ''),
(44, 'Decoration', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:09', 14, 0, 7, 2, 75000, 'Maison dÃ©co!votre Univers pour toute dÃ©coration interieur!<br>', 1, '2013-03-13 14:30:09', 30, 0, 'affichage', '', ''),
(45, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-04-02 15:16:32', 1, 2, 7, 2, 25000000, 'Enveloppe blanc Ã©garÃ© dans un taxi contenant des documents personnels et\r\n important!pour toute informations, contacter le 23454323 contre forte \r\nrecompense.', 1, '2013-03-13 15:16:32', 20, 0, 'affichage', '', ''),
(46, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '0000-00-00 00:00:00', 1, 3, 7, 2, 2800000, '<br>', 0, '0000-00-00 00:00:00', 30, 0, 'affichage', 'o', '');

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
(1, 0, 'immobilier', '30-01-2013-07-00-22big-image.jpg', 'Appartement, villas, Maison, terrain ...<br>', 0, 1, 0, 'immobilier'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `c2w_newsmember`
--

INSERT INTO `c2w_newsmember` (`id_member`, `email_member`, `date_souscription`, `is_actived`, `nom_membre`, `phone`) VALUES
(1, 'maitrembida@yagoo.fr', '0000-00-00 00:00:00', 1, '', ''),
(3, 'ping@yui.fr', '0000-00-00 00:00:00', 1, '', '1234567'),
(4, 'ffozeu@crystals-services.com', '0000-00-00 00:00:00', 1, '', '0032796155706');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

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
(55, 'Mbida Luc Alfred', 62400, 'qsdvdsvdkjvdv kehfes', 'Annonces-cm', '96155706', '', '', 46, NULL, 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `c2w_page`
--

INSERT INTO `c2w_page` (`id`, `titre`, `bgImage`, `repeatX`, `repeatY`, `actived`, `contenu`, `metatitle`, `metadescription`, `metakeyword`, `identifiant`, `prix`) VALUES
(9, 'Contactez-nous', '13-03-2013-12-46-40bg-orange.png', 0, 0, 1, '<div id="info_left">\r\n<p class="adress"><span> Adresses:</span><br /> Chraorci ac convall varius level oreme campus leo. Done plomattis necloremips placerate bibe ndum. Crasi loid urna.</p>\r\n<p class="telephone"><span>Telephone :</span><span class="numero"> +237 00 00 00 Â Â  </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00 </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00</span></p>\r\n<p class="langue"><span>Langue de travail :Â  </span>FranÃ§ais</p>\r\n</div>', 'contact annonce', '<br>', 'Contactez-nous', 'contact', 11000),
(10, 'Inscription', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, 'tes tes teste test ets etts te ste<br>', 'Inscription', 'dadfzcfea eeefezaf<br>', 'Inscription', 'inscription', 12000),
(11, 'Login', '01-01-2001-03-56-11Coucher-de-soleil.jpg', 1, 1, 1, 'Page de connexion sur le site<br>', 'Login', '<br>', 'login', 'login', 1500),
(12, 'Bienvenue Sur Annonces CM', '29-01-2013-04-05-57annonces.png', 1, 1, 1, '<br>', '', 'Faites vos annonces ici<br>', 'Annonces, publicitÃ©, publication', 'home', 4500),
(13, 'Notre newsletters', '29-01-2013-10-09-42banner-home.png', 1, 1, 1, '<br>', '', '<br>', '', 'newsletter', 6000),
(14, 'Envoyer une annonce', '', 0, 0, 0, '', '', '', '', 'annonce', 100),
(15, 'CatÃ©gorie', '', 0, 0, 0, '', 'catÃ©gory', '', '', 'category', 100),
(16, 'DÃ©tail de l''annonce', '', 0, 0, 0, '', '', '', '', 'detail_annonce', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(14, '13-03-2013-15-11-21auto.jpg', '', 'principale', 45);

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
(2, 'alfred', 'Mbida', 'Luc Alfred', 'xxxxx@zzzz.cm', '', 'test', 'test', 1, 1, 'cameroun', 'yaounde', ' 567', '678', '', 'fhre ifn ks jn', 0),
(3, 'r', 'r', 'r', 'r', '', 'r', 'r', 1, 1, 'r', 'r', 'r', 'r', 'r', 'r', 0),
(4, 't', 't', 't', 't', '', 't', 't', 1, 1, 't', 't', 't', 't', 'tt', 'ttt', 0);
