-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 06 Juin 2013 à 18:26
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `c2w_page`
--

INSERT INTO `c2w_page` (`id`, `titre`, `bgImage`, `repeatX`, `repeatY`, `actived`, `contenu`, `metatitle`, `metadescription`, `metakeyword`, `identifiant`, `prix`, `showfooteradv`) VALUES
(9, 'Contactez-nous', '13-03-2013-12-46-40bg-orange.png', 0, 0, 0, '<div id="info_left">\r\n<p class="adress"><span> Adresses:</span><br /> Chraorci ac convall varius level oreme campus leo. Done plomattis necloremips placerate bibe ndum. Crasi loid urna.</p>\r\n<p class="telephone"><span>Telephone :</span><span class="numero"> +237 00 00 00 Â Â  </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00 </span></p>\r\n<p class="telephone"><span class="numero">Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â  +237 00 00 00</span></p>\r\n<p class="langue"><span>Langue de travail :Â  </span>FranÃ§ais</p>\r\n</div>', 'contact annonce', '<br>', 'Contactez-nous', 'contact', 11000, 1),
(10, 'Inscription', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '<p>tes tes teste test ets etts te ste</p>', 'Inscription', 'dadfzcfea eeefezaf', 'Inscription', 'inscription', 12000, 1),
(11, 'Login', '01-01-2001-03-56-11Coucher-de-soleil.jpg', 1, 1, 1, 'Page de connexion sur le site<br>', 'Login', '<br>', 'login', 'login', 1500, 1),
(12, 'Bienvenue Sur Annonces CM', '29-01-2013-04-05-57annonces.png', 1, 1, 1, '<br>', '', 'Faites vos annonces ici<br>', 'Annonces, publicitÃ©, publication', 'home', 4500, 1),
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
(34, 'A la Une', '', 0, 0, 0, '', '', '', '', 'alaune', NULL, 1),
(35, 'popup abus', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '', '', '', '', 'abus', 0, 0),
(36, 'popup repondre Ã  l\\''annonce', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '', '', '', '', 'rep_ann', 0, 0),
(37, 'popup envoyer Ã  un amie', '01-01-2001-03-55-29N-nuphars.jpg', 1, 1, 1, '', '', '', '', 'env_ann_amie', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
