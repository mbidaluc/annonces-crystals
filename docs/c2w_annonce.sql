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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `c2w_annonce`
--

INSERT INTO `c2w_annonce` (`id`, `designation`, `pays`, `ville`, `phone1`, `phone2`, `email`, `auteur`, `dateexp`, `idCategorie`, `idPriorite`, `idPosition`, `idUder`, `prixTotal`, `texte`, `is_actived`, `dateDebut`, `dureeAnnonce`, `nbClick`, `typeFacturation`, `link_rewrite`, `link`, `urlSortant`) VALUES
(1, '', '', '', '', '', 'zprje@yahoo.com', '', '2013-04-02 13:09:10', 1, 2, 5, 2, 2503, '', 0, '2013-02-19 13:09:10', 6, 0, '', '', '', ''),
(2, '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, NULL, NULL, '', 0, '0000-00-00 00:00:00', 0, 0, '', '', '', ''),
(3, 'azertyuio', 'zertyuiop', 'azertyuiop', '2345678', '09876543', 'ertyuio@ERTYUI.com', 'Le maitre rikudou', '2013-03-19 16:14:14', 1, 2, 0, 2, 4567890, 'zerty-+hgfdsxcfvgbhn;;cxwxcvbn;/gfdsqsdfgh+Ã¹*+hgfdwxcvbn;/fdxswxcvbn;', 1, '2013-03-06 16:14:14', 3, 0, 'click', '', '', ''),
(4, 'azertyuio', 'zertyuiop', 'azertyuiop', '2345678', '09876543', 'mbidalucalfred@yahoo.fr', 'Le maitre rikudou', '2013-03-18 16:14:20', 1, 3, 5, 2, 4567890, 'usfdjqkhlifsqb ucifsgeb, azfgkqj&lt;geif, iifoug sqvfu<br>', 1, '2013-03-06 16:14:20', 2, 0, 'click', '', '', ''),
(5, 'Ma premiere  annonce', 'Cameroun', 'Yaounde', '96 43 57 59', '76 05 01 75', 'mbidalucalfred@yahoo.fr', 'Luc Alfred MBIDA', '2013-03-11 16:14:25', 1, 1, 5, 2, 45, 'Superbe villa Ã  vendre:<br>* 04 Chambres;<br>* Un Salon;<br>* Une Douche<br>', 1, '2013-03-06 16:14:25', 5, 0, 'affichage', '', '', ''),
(6, '4x4 2011', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-19 03:25:59', 1, 0, 0, NULL, 2, 'une voiture de derniÃ¨re gÃ©nÃ©ration Ã  votre service<br>', 1, '2013-03-08 03:25:59', 1, 0, 'affichage', '', '', ''),
(7, 'Terrain Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-13 03:48:10', 1, 0, 0, NULL, 1000, 'Terrain de 1000 mÂ² Ã  vendre Ã  raison de 7000FCFA/mÂ². Appeler pour qu''ont en discute<br>', 1, '2013-03-08 03:48:10', 5, 0, 'affichage', '', '', ''),
(8, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'fozeutakoudjou@gmail.com', 'Takoudjou', '2013-03-12 04:05:48', 2, 0, 0, NULL, 10, 'Une maison de 5 piÃ¨ces de derniÃ¨re gÃ©nÃ©ration faite pour vous<br>', 1, '2013-03-08 04:05:47', 4, 0, 'affichage', '', '', ''),
(9, 'Maison Ã  vendre', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'ffozeu', '2013-03-13 05:37:19', 1, 0, 0, NULL, 2, 'une autres maison Ã  vendre<br>', 1, '2013-03-12 05:37:19', 1, 0, 'affichage', 'maison-a-vendre', '', ''),
(10, 'Terrain Ã  vendre odza', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-03-13 05:41:18', 12, 0, 0, NULL, 10800000, 'terrain Ã  vendre Ã  odza petit marchÃ©. pas loin de la route<br>', 1, '2013-03-12 05:41:18', 1, 0, 'affichage', 'terrain-a-vendre-odza', '', ''),
(13, 'Maison Ã  vendre olembÃ©', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', '', '2013-03-17 13:34:21', 1, 3, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u<br>', 1, '2013-03-12 13:34:21', 5, 0, 'affichage', 'maison-a-vendre-olembe', '', ''),
(14, 'Maison Ã  vendre olÃ©zoa', 'Cameroun', 'YaoundÃ©', '96155706', '', 'contact@crystals-services.com', 'Takoudjou', '2013-03-17 13:58:04', 1, 2, 0, 2, 25000000, 'une maison avec une trÃ¨s grande surface libre. appelÃ© et vous ne serez pas deÃ§u', 1, '2013-03-12 13:58:04', 5, 0, 'affichage', 'maison-a-vendre-olezoa', '', ''),
(19, 'Maison Ã  vendre', 'Cameroun', 'yaooundÃ©', '', '', 'ndjams1@gmail.com', '', '2013-04-12 10:59:51', 1, 2, 6, 2, 1000, 'maison Ã  vendre :2salons, 3 douches,2cuisines,4 chambresavec une indÃ©pendance.Au quartier biyem-assi Ã  100m de la route.<br>', 1, '2013-03-13 10:59:51', 30, 0, 'affichage', '', '', ''),
(20, 'documents perdu', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:08:44', 1, 0, 8, NULL, 0, 'Cartable de couleur noir oublier dans un taxi qui m''a transportÃ© de "mimboman" Ã  "carrefour kameni" immatriculÃ© ZH1234DS.veuillez me contacter au 99345432 contre forte recompense<br>', 1, '2013-03-13 11:08:44', 30, 0, 'affichage', '', '', ''),
(21, 'Fond de commerce', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:15:27', 1, 0, 8, NULL, 0, 'fond de commerce Ã  vendre!contacter moi au 23453257.TrÃ¨s bon prix.<br>', 1, '2013-03-13 11:15:27', 30, 0, 'affichage', '', '', ''),
(22, 'Ordinateur', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:15:33', 1, 0, 8, NULL, 0, 'Ordinateur Ã  vendre : P4 avec Ã©cran plat de 17 pouces.TrÃ¨s bon prix!stock limitÃ©<br>', 1, '2013-03-13 11:15:33', 30, 0, 'affichage', '', '', ''),
(23, 'Ordinateur', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:22:31', 1, 0, 8, NULL, 0, 'Votre mÃ©decin dÃ©sormais prÃ¨s de chez vous!pour tout vos problÃ©mes de santÃ©, n''hÃ©sitez plus!courez chez le docteur "SOIGNE TOUT".je suis situÃ© derriere le marchÃ© central.<br>', 1, '2013-03-13 11:22:31', 30, 0, 'affichage', '', '', ''),
(24, 'santÃ©', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:24:03', 1, 0, 8, NULL, 0, 'venez vite decouvrir les merveilles du docteur Ngeukam!situÃ© derrier la maison du parti!<br>', 1, '2013-03-13 11:24:03', 30, 0, 'affichage', '', '', ''),
(25, 'AUTRES', '', '', '', '', 'crystals-services@crystals.com', '', '2013-03-14 11:53:03', 1, 0, 8, NULL, 0, 'Enveloppe blanc Ã©garÃ© dans un taxi contenant des documents personnels et important!pour toute informations, contacter le 23454323 contre forte recompense.<br>', 1, '2013-03-13 11:53:03', 1, 0, 'affichage', '', '', ''),
(26, 'voiture', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:09', 4, 2, 6, 2, 2500000, 'Voiture de marque Toyota Ã  vendre:5portes,diesel,climatisÃ©!contact: 22343243<br>', 1, '2013-03-13 11:53:09', 30, 0, 'affichage', '', '', ''),
(27, 'voiture Ã  vendre', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:14', 4, 2, 6, 2, 23000000, 'Cadillaz Impreza Ã  vendre!climatisÃ©,diesel, boite vitesse automatique,300ch.moteur Ã  injection directe!<br>', 1, '2013-03-13 11:53:14', 30, 0, 'affichage', '', '', ''),
(28, 'Hotel', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:19', 8, 2, 6, 2, 45000, 'Hotel EL Belmondo!hotel 4 Ã©toiles situÃ© sur les rives du wouri!n''ayez plus l''embara du choix car dÃ©sormais, un seul choix s''offre Ã  vous!grande cÃ©remonie d''inauguration ce dimanche 23/12:2032Â§<br>Reservation: +234323445/+23456765<br><br>', 1, '2013-03-13 11:53:19', 30, 0, 'affichage', '', '', ''),
(29, 'Salon International sur les TIC au Cameroun', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:25', 9, 2, 6, 2, 34000, 'papayes de toute sorte chez nous...;Toutes vos communication d''entreprise, l''exposition de vos produits et \r\nservices, vos prestations de communication sur les TIC son bienvenus au \r\n5e Salon Internation de l''administration et de l''entreprise sur les NTIC', 1, '2013-03-13 11:53:25', 30, 0, 'affichage', '', '', ''),
(30, 'Architecte', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:30', 3, 2, 6, 2, 45000, 'besoin d''un architecte,alors contacter moi sur WWW.architectemoi.com.et vous ne serez pas dÃ©Ã§u!<br>', 1, '2013-03-13 11:53:30', 30, 0, 'affichage', '', '', ''),
(31, 'Ensegnement secondaire', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:35', 11, 2, 6, 2, 45000, 'LycÃ©e du Savoir ouvre dÃ©sormais ses portes aux enfants de deux sexes dÃ©sireux de bÃ©nÃ©ficier d''un encadrement dynamique et compÃ©tent!Parents,n''hÃ©sitez plus, vite vite inscrir vos enfants au "LYCÃ©E DU SAVOIR"!NB:place tres limitÃ©.<br>', 1, '2013-03-13 11:53:35', 30, 0, 'affichage', '', '', ''),
(32, 'PrÃ©t Ã  porter', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 11:53:39', 16, 2, 6, 2, 45000, 'PRET 0 PORTER DE LUXE OUVRE SES PORTES AU CARREFOUR BASTOS!vous aimez la qualitÃ©,alors, un seul lieu,uns eul magasin: System Dressing!<br>', 1, '2013-03-13 11:53:39', 30, 0, 'affichage', '', '', ''),
(33, 'agence immobiliere', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:18', 1, 2, 9, 2, 30000, '<ul id="annonces_speciales_scroller" class="clearfix"><li>\r\n                                <h4><a href="http://annonces-crystals.localhost/createannoncefront.html#" title="Agence immobiliÃ¨re continent">Agence immobiliÃ¨re Camerounaise</a></h4>\r\n                                <br>\r\n                                <div class="descr">\r\n                                    <div class="shot_text">Pour un logement confortable</div>\r\n                                    <span class="wrap_span"><span class="contact">TÃ©l :</span>22 06 21 29</span>\r\n                                    <span class="wrap_span"><span class="contact">@ :</span>contact@agencecamerounaise.com</span>\r\n                                </div>\r\n                            </li></ul>', 1, '2013-03-13 12:20:18', 30, 0, 'affichage', '', '', ''),
(34, 'Maiis', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:23', 2, 2, 9, 2, 30000, '30 sac de maiis de trÃ©s boe qualitÃ© a vendre.contact:maiiscam@yahoo.fr<br>', 1, '2013-03-13 12:20:23', 30, 0, 'affichage', '', '', ''),
(35, 'terrain a vendre', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:28', 18, 0, 9, 2, 30000, 'agence de lovcation des terrains.contact :locationdeterrain@hotmail.fr<br>tel:223234234<br>', 1, '2013-03-13 12:20:28', 30, 0, 'affichage', '', '', ''),
(36, 'BERGERS', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:12', 17, 2, 9, 2, 30000, 'agence de location des chien de garde!pplus particulierement de bergers Allemend!<br>contact:securdog@secur.com<br>', 1, '2013-03-13 12:20:12', 30, 0, 'affichage', '', '', ''),
(37, 'Fitnees', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:19:53', 10, 2, 9, 2, 30000, 'salle spÃ©cial de fitness ouvre ses portes sis derriere carrefour bastos!prise en charge et suivie!pour plus d''infos, contacter nous:fitnessclub@yahoo.com<br>tel:+123243423/+1212122324<br>', 1, '2013-03-13 12:19:53', 30, 0, 'affichage', '', '', ''),
(38, 'AUTRES', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 12:20:07', 1, 2, 9, 2, 30000, '<ul><li>\r\n                                                <h4><a href="http://annonces-crystals.localhost/createannoncefront.html#" title="">cartes et documents professionels</a></h4>\r\n                                                <div>produisez et securisez vos cartes produisez et securisez vos cartes </div>\r\n                                            </li></ul>', 1, '2013-03-13 12:20:07', 30, 0, 'affichage', '', '', ''),
(39, 'Chambres ', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:04', 19, 2, 7, 2, 75000, 'chambres modernes Ã  louer dans le quartier Emana!<br><br>', 1, '2013-03-13 14:30:04', 30, 0, 'affichage', '', '', ''),
(40, 'Vente', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:31', 9, 0, 7, 2, 75000, 'Pour tout vos articles informatiques Ã  vendre, conter nous et vous ne serez paz dessus<br>', 1, '2013-03-13 14:30:31', 30, 0, 'affichage', '', '', ''),
(41, 'Banque', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:26', 6, 2, 7, 2, 75000, 'Banque continentale ouvre ses portes aux publics avec plus de 150 services Ã  votre disposition<br>', 1, '2013-03-13 14:30:26', 30, 0, 'affichage', '', '', ''),
(42, 'Microfinance', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:21', 6, 2, 6, 2, 75000, 'CCA, le banque pour tous!<br><br>', 1, '2013-03-13 14:30:21', 30, 0, 'affichage', '', '', ''),
(43, 'Location', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:16', 4, 2, 7, 2, 75000, 'agence de location de voiture<br>', 1, '2013-03-13 14:30:16', 30, 0, 'affichage', '', '', ''),
(44, 'Decoration', '', '', '', '', 'crystals-services@crystals.com', '', '2013-04-12 14:30:09', 14, 0, 7, 2, 75000, 'Maison dÃ©co!votre Univers pour toute dÃ©coration interieur!<br>', 1, '2013-03-13 14:30:09', 30, 0, 'affichage', '', '', ''),
(45, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '2013-04-02 15:16:32', 1, 2, 7, 2, 25000000, 'Enveloppe blanc Ã©garÃ© dans un taxi contenant des documents personnels et\r\n important!pour toute informations, contacter le 23454323 contre forte \r\nrecompense.', 1, '2013-03-13 15:16:32', 20, 0, 'affichage', '', '', ''),
(46, 'ordinateur p4', 'Cameroun', 'YaoundÃ©', '96155706', '', 'ffozeu@crystals-services.com', 'Takoudjou', '0000-00-00 00:00:00', 1, 3, 7, 2, 2800000, '<br>', 0, '0000-00-00 00:00:00', 30, 0, 'affichage', 'o', '', ''),
(47, 'testing', '', '', '', '', 'annie.ntyama@gmail.com', '', '0000-00-00 00:00:00', 1, 3, 5, 2, 500, 'cwdkx:kcfhl,wdifyoiu<br>', 0, '0000-00-00 00:00:00', 1, 0, 'affichage', 'testing', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
