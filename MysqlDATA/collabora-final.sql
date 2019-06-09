-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 juin 2019 à 21:07
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `collabora`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(8) NOT NULL,
  `pwd` varchar(8) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mail` varchar(70) NOT NULL,
  `nb_modification` int(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `archive_capture`
--

DROP TABLE IF EXISTS `archive_capture`;
CREATE TABLE IF NOT EXISTS `archive_capture` (
  `id_archive` int(7) NOT NULL AUTO_INCREMENT,
  `url_archive` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_archive` varchar(255) NOT NULL,
  PRIMARY KEY (`id_archive`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `archive_plateforme`
--

DROP TABLE IF EXISTS `archive_plateforme`;
CREATE TABLE IF NOT EXISTS `archive_plateforme` (
  `id_archive_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_archive` int(7) NOT NULL,
  PRIMARY KEY (`id_archive_plateforme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(2) NOT NULL AUTO_INCREMENT,
  `nom_domaine` varchar(255) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `nom_domaine`) VALUES
(1, 'Biologie, medecine et sante'),
(2, 'Mathematiques et leurs interactions'),
(3, 'Physique'),
(4, 'Chimie'),
(5, 'Sciences de la terre et de l\'univers, espace'),
(6, 'Sciences humaines et humanites'),
(7, 'Sciences agronomiques et ecologiques'),
(8, 'Sciences de la societe'),
(9, 'Sciences pour l\'ingenieur'),
(10, 'Sciences et technologies de l\'information et de la communication');

-- --------------------------------------------------------

--
-- Structure de la table `domaine_plateforme`
--

DROP TABLE IF EXISTS `domaine_plateforme`;
CREATE TABLE IF NOT EXISTS `domaine_plateforme` (
  `id_domaine_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_domaine` int(2) NOT NULL,
  PRIMARY KEY (`id_domaine_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domaine_plateforme`
--

INSERT INTO `domaine_plateforme` (`id_domaine_plateforme`, `id_plateforme`, `id_domaine`) VALUES
(1, 1, 6),
(2, 2, 3),
(3, 3, 6),
(4, 4, 6),
(5, 5, 6),
(6, 6, 6),
(7, 7, 6),
(8, 8, 6),
(9, 9, 5),
(10, 9, 7),
(11, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `donnees_entrees`
--

DROP TABLE IF EXISTS `donnees_entrees`;
CREATE TABLE IF NOT EXISTS `donnees_entrees` (
  `id_donnees_entrees` int(2) NOT NULL AUTO_INCREMENT,
  `nom_donnees_entrees` varchar(100) NOT NULL,
  PRIMARY KEY (`id_donnees_entrees`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees_entrees`
--

INSERT INTO `donnees_entrees` (`id_donnees_entrees`, `nom_donnees_entrees`) VALUES
(1, 'Texte'),
(2, 'Image'),
(3, 'Donnees structurees (TEI)'),
(4, 'Video'),
(5, 'Audio'),
(6, 'Documents');

-- --------------------------------------------------------

--
-- Structure de la table `donnees_entrees_cor`
--

DROP TABLE IF EXISTS `donnees_entrees_cor`;
CREATE TABLE IF NOT EXISTS `donnees_entrees_cor` (
  `id_donnees_entrees_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_donnees_entrees` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_entrees_cor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees_entrees_cor`
--

INSERT INTO `donnees_entrees_cor` (`id_donnees_entrees_cor`, `id_plateforme`, `id_donnees_entrees`) VALUES
(1, 1, 1),
(2, 3, 3),
(3, 4, 1),
(4, 5, 1),
(5, 6, 6),
(6, 7, 6),
(7, 8, 1),
(8, 9, 1),
(9, 10, 2),
(10, 5, 2),
(11, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `donnees_produites`
--

DROP TABLE IF EXISTS `donnees_produites`;
CREATE TABLE IF NOT EXISTS `donnees_produites` (
  `id_donnees_produites` int(2) NOT NULL AUTO_INCREMENT,
  `nom_donnees_produites` varchar(100) NOT NULL,
  PRIMARY KEY (`id_donnees_produites`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees_produites`
--

INSERT INTO `donnees_produites` (`id_donnees_produites`, `nom_donnees_produites`) VALUES
(1, 'Metadonnees de description'),
(2, 'Document structure'),
(3, 'Visualisation'),
(4, 'Metadonnees d\'indexation');

-- --------------------------------------------------------

--
-- Structure de la table `donnees_produites_cor`
--

DROP TABLE IF EXISTS `donnees_produites_cor`;
CREATE TABLE IF NOT EXISTS `donnees_produites_cor` (
  `id_donnees_produites_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_donnees_produites` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_produites_cor`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees_produites_cor`
--

INSERT INTO `donnees_produites_cor` (`id_donnees_produites_cor`, `id_plateforme`, `id_donnees_produites`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 3, 3),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 6, 2),
(8, 7, 1),
(9, 7, 2),
(10, 8, 2),
(11, 8, 3),
(12, 9, 1),
(13, 9, 3),
(14, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `donnees_tache_cor`
--

DROP TABLE IF EXISTS `donnees_tache_cor`;
CREATE TABLE IF NOT EXISTS `donnees_tache_cor` (
  `id_donnees_tache_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_tache` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_tache_cor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees_tache_cor`
--

INSERT INTO `donnees_tache_cor` (`id_donnees_tache_cor`, `id_plateforme`, `id_tache`) VALUES
(1, 1, 2),
(2, 4, 3),
(3, 5, 5),
(4, 5, 9),
(5, 6, 2),
(6, 7, 2),
(7, 8, 3),
(8, 9, 5),
(9, 9, 9),
(10, 9, 3),
(11, 10, 13);

-- --------------------------------------------------------

--
-- Structure de la table `enjeu`
--

DROP TABLE IF EXISTS `enjeu`;
CREATE TABLE IF NOT EXISTS `enjeu` (
  `id_enjeu` int(2) NOT NULL AUTO_INCREMENT,
  `nom_enjeu` varchar(100) NOT NULL,
  PRIMARY KEY (`id_enjeu`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enjeu`
--

INSERT INTO `enjeu` (`id_enjeu`, `nom_enjeu`) VALUES
(1, 'Production de connaissance scientifique'),
(2, 'Mediation'),
(3, 'Valorisation'),
(4, 'Patrimonialisation'),
(5, 'Lien social'),
(6, 'Creation d activite economique');

-- --------------------------------------------------------

--
-- Structure de la table `enjeu_plateforme`
--

DROP TABLE IF EXISTS `enjeu_plateforme`;
CREATE TABLE IF NOT EXISTS `enjeu_plateforme` (
  `id_enjeu_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_enjeu` int(2) NOT NULL,
  PRIMARY KEY (`id_enjeu_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enjeu_plateforme`
--

INSERT INTO `enjeu_plateforme` (`id_enjeu_plateforme`, `id_plateforme`, `id_enjeu`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 2, 5),
(4, 3, 3),
(5, 3, 4),
(6, 4, 3),
(7, 5, 1),
(8, 6, 2),
(9, 6, 3),
(10, 6, 4),
(11, 7, 2),
(12, 7, 3),
(13, 7, 4),
(14, 8, 4),
(15, 9, 1),
(16, 9, 5),
(17, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `financeur`
--

DROP TABLE IF EXISTS `financeur`;
CREATE TABLE IF NOT EXISTS `financeur` (
  `id_financeur` int(7) NOT NULL AUTO_INCREMENT,
  `id_institution` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  PRIMARY KEY (`id_financeur`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `financeur`
--

INSERT INTO `financeur` (`id_financeur`, `id_institution`, `id_plateforme`) VALUES
(1, 2, 1),
(2, 31, 2),
(3, 4, 4),
(4, 8, 5),
(5, 9, 5),
(6, 10, 5),
(7, 5, 5),
(8, 7, 6),
(9, 13, 6),
(10, 12, 6),
(11, 13, 7),
(12, 7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
CREATE TABLE IF NOT EXISTS `institutions` (
  `id_institutions` int(11) NOT NULL AUTO_INCREMENT,
  `element_wikidata` varchar(70) DEFAULT NULL,
  `nom_institution` varchar(255) NOT NULL,
  `id_lieu` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_institutions`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `institutions`
--

INSERT INTO `institutions` (`id_institutions`, `element_wikidata`, `nom_institution`, `id_lieu`) VALUES
(1, 'Q430682', 'Tate', 0),
(2, 'Q5742662', 'Heritage Lottery Fund', 0),
(3, 'Q5742662', 'Ludwig Maximilian University of Munich', 0),
(4, 'Q707283', 'Fondation allemande pour la recherche', 0),
(5, 'Q160302', 'University of Edinburgh', 0),
(6, 'Q540751', 'Anglia Ruskin University', 0),
(7, 'Q2656157', 'Zooniverse', 0),
(8, 'Q6535298', 'Leverhulme Trust', 0),
(9, 'Q326276', 'Wellcome Trust', 0),
(10, 'Q723551', 'British Academy', 0),
(11, 'Q219555', 'New York Public Library', 0),
(12, 'Q392703', 'Archives nationales (Royaume-Uni)', 0),
(13, 'Q749808', 'Imperial War Museum', 0),
(14, 'Q2496006', 'Université de Cergy-Pontoise', 0),
(15, 'Q2860507', 'Archives départementales des Yvelines', 0),
(16, 'Q273570', 'École nationale des chartes', 0),
(17, 'Q1194988', 'Université Paris 8', 0),
(18, 'Q182542', 'Archives nationales', 0),
(19, 'Q75706', 'Ministère des Armées', 0),
(20, 'Q3212295', 'Revue française de généalogie', 0),
(21, NULL, 'Fondation des Sciences du Patrimoine', 0),
(22, NULL, 'La Gazette des Ancêtres', 0),
(23, NULL, 'En Evor', 0),
(24, 'Q1144750', 'Université de technologie du Queensland', 0),
(25, 'Q56612844', 'Centre of Excellence for Mathematical & Statistical Frontiers', 0),
(26, 'Q4824311', 'Australian Institute of Marine Science', 0),
(27, 'Q924265', 'Aarhus University', 0),
(28, NULL, 'AU Ideas Center for Community Driven Research', 0),
(29, 'Q965731', 'California Academy of Sciences', 0),
(30, 'Q167186', 'National Geographic Society', 0),
(31, 'Q42944', 'CERN', 0),
(32, 'Q34433', 'Université d\'Oxford', 0);

-- --------------------------------------------------------

--
-- Structure de la table `institution_concernee`
--

DROP TABLE IF EXISTS `institution_concernee`;
CREATE TABLE IF NOT EXISTS `institution_concernee` (
  `id_institution_concernee` int(7) NOT NULL AUTO_INCREMENT,
  `id_institution` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  PRIMARY KEY (`id_institution_concernee`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `institution_concernee`
--

INSERT INTO `institution_concernee` (`id_institution_concernee`, `id_institution`, `id_plateforme`) VALUES
(1, 1, 1),
(2, 31, 2),
(3, 18, 3),
(4, 3, 4),
(5, 11, 6),
(6, 13, 6),
(7, 12, 6),
(8, 13, 7),
(9, 12, 7);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(4) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(70) NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `nom_langue`) VALUES
(1, 'Anglais'),
(2, 'Arabe'),
(3, 'Chinois'),
(4, 'Espagnol'),
(5, 'Francais'),
(6, 'Russe'),
(7, 'Albanais'),
(8, 'Allemand'),
(9, 'Armenien'),
(10, 'Aymara'),
(11, 'Bengali'),
(12, 'Catalan'),
(13, 'Coreen'),
(14, 'Croate'),
(15, 'Danois'),
(16, 'Finnois'),
(17, 'Grec'),
(18, 'Hongrois'),
(19, 'Italien'),
(20, 'Japonais'),
(21, 'Kiswahili'),
(22, 'Malais'),
(23, 'Mongol'),
(24, 'Néerlandais'),
(25, 'Ourdou'),
(26, 'Persan'),
(27, 'Portugais'),
(28, 'Quechua'),
(29, 'Roumain'),
(30, 'Samoan'),
(31, 'Serbe'),
(32, 'Sesotho'),
(33, 'Slovaque'),
(34, 'Slovène'),
(35, 'Suédois'),
(36, 'Tamoul'),
(37, 'Turc'),
(38, 'Afrikaans'),
(39, 'Amharique'),
(40, 'Azéri'),
(41, 'Bichelamar'),
(42, 'Biélorusse'),
(43, 'Birman'),
(44, 'Bulgare'),
(45, 'Chichewa'),
(46, 'Cinghalais'),
(47, 'Créole de Guinée-Bissau'),
(48, 'Créole haïtien'),
(49, 'Créole seychellois'),
(50, 'Divehi'),
(51, 'Dzongkha'),
(52, 'Estonien'),
(53, 'Fidjien'),
(54, 'Filipino'),
(55, 'Géorgien'),
(56, 'Gilbertin'),
(57, 'Guarani'),
(58, 'Hébreu'),
(59, 'Hindoustani'),
(60, 'Hindi'),
(61, 'Hiri Motu'),
(62, 'Iban'),
(63, 'Indonésien'),
(64, 'Irlandais'),
(65, 'Islandais'),
(66, 'Kazakh'),
(67, 'Khmer'),
(68, 'Kirghiz'),
(69, 'Kirundi'),
(70, 'Lao'),
(71, 'Letton'),
(72, 'Lituanien'),
(73, 'Luxembourgeois'),
(74, 'Macédonien'),
(75, 'Maltais'),
(76, 'Maori'),
(77, 'Maori des Îles Cook'),
(78, 'Marshallais'),
(79, 'Monténégrin'),
(80, 'Nauruan'),
(81, 'Népalais'),
(82, 'Norvégien'),
(83, 'Ouzbek'),
(84, 'Pachto'),
(85, 'Paluan'),
(86, 'Polonais'),
(87, 'Sango'),
(88, 'Shikomor'),
(89, 'Shona'),
(90, 'Sindebele'),
(91, 'Somali'),
(92, 'Tadjik'),
(93, 'Tamazight'),
(94, 'Tchèque'),
(95, 'Tétoum'),
(96, 'Tigrinya'),
(97, 'Thaï'),
(98, 'Tok Pisin'),
(99, 'Tongien'),
(100, 'Turkmène'),
(101, 'Tuvaluan'),
(102, 'Ukrainien'),
(103, 'Vietnamien'),
(104, 'Anguar'),
(105, 'Occitan-Aranais'),
(106, 'Basque'),
(107, 'Cantonais'),
(108, 'Carolinien'),
(109, 'Chamorro'),
(110, 'Galicien'),
(111, 'Gallois'),
(112, 'Hatohabei'),
(113, 'Hawaiien'),
(114, 'Inuktitut'),
(115, 'Kurde'),
(116, 'Ladin'),
(117, 'Limbourgeois'),
(118, 'Mannois'),
(119, 'Mirandais'),
(120, 'Ndébélé'),
(121, 'Ouïghour'),
(122, 'Romanche'),
(123, 'Ruthène'),
(124, 'Sarde'),
(125, 'Sorabe'),
(126, 'Sotho du Nord'),
(127, 'Sotho du Sud'),
(128, 'Swati'),
(129, 'Tibétain'),
(130, 'Tsonga'),
(131, 'Tswana'),
(132, 'Venda'),
(133, 'Xhosa'),
(134, 'Zoulou');

-- --------------------------------------------------------

--
-- Structure de la table `langue_plateforme`
--

DROP TABLE IF EXISTS `langue_plateforme`;
CREATE TABLE IF NOT EXISTS `langue_plateforme` (
  `id_langue_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_langue` int(4) NOT NULL,
  PRIMARY KEY (`id_langue_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langue_plateforme`
--

INSERT INTO `langue_plateforme` (`id_langue_plateforme`, `id_plateforme`, `id_langue`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 4, 1),
(4, 4, 5),
(5, 4, 8),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 5),
(10, 9, 7),
(11, 9, 8),
(12, 9, 1),
(13, 9, 2),
(14, 9, 12),
(15, 9, 3),
(16, 9, 13),
(17, 9, 15),
(18, 9, 4),
(19, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `media_ext`
--

DROP TABLE IF EXISTS `media_ext`;
CREATE TABLE IF NOT EXISTS `media_ext` (
  `id_media_ext` int(5) NOT NULL AUTO_INCREMENT,
  `nom_media_ext` varchar(255) NOT NULL,
  PRIMARY KEY (`id_media_ext`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media_ext_interface`
--

DROP TABLE IF EXISTS `media_ext_interface`;
CREATE TABLE IF NOT EXISTS `media_ext_interface` (
  `id_media_ext_interface` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_media_ext` int(5) NOT NULL,
  PRIMARY KEY (`id_media_ext_interface`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media_int`
--

DROP TABLE IF EXISTS `media_int`;
CREATE TABLE IF NOT EXISTS `media_int` (
  `id_media_int` int(5) NOT NULL AUTO_INCREMENT,
  `nom_media_int` varchar(255) NOT NULL,
  PRIMARY KEY (`id_media_int`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media_int_interface`
--

DROP TABLE IF EXISTS `media_int_interface`;
CREATE TABLE IF NOT EXISTS `media_int_interface` (
  `id_media_int_interface` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_media_int` int(5) NOT NULL,
  PRIMARY KEY (`id_media_int_interface`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `id_objectif` int(2) NOT NULL AUTO_INCREMENT,
  `nom_objectif` varchar(100) NOT NULL,
  PRIMARY KEY (`id_objectif`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`id_objectif`, `nom_objectif`) VALUES
(1, 'Enrichissement du contenu'),
(2, 'Collecte'),
(3, 'Inventaire patrimonial'),
(4, 'Action citoyenne'),
(5, 'Experimentation'),
(6, 'Creation de contenu'),
(7, 'Curation');

-- --------------------------------------------------------

--
-- Structure de la table `objectif_plateforme`
--

DROP TABLE IF EXISTS `objectif_plateforme`;
CREATE TABLE IF NOT EXISTS `objectif_plateforme` (
  `id_objectif_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_objectif` int(2) NOT NULL,
  PRIMARY KEY (`id_objectif_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif_plateforme`
--

INSERT INTO `objectif_plateforme` (`id_objectif_plateforme`, `id_plateforme`, `id_objectif`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 2, 5),
(5, 2, 2),
(7, 3, 3),
(8, 4, 1),
(9, 5, 2),
(10, 6, 1),
(11, 7, 1),
(12, 8, 3),
(13, 9, 2),
(14, 10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id_partenaire` int(7) NOT NULL AUTO_INCREMENT,
  `id_institution` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `id_institution`, `id_plateforme`) VALUES
(1, 7, 1),
(2, 21, 3),
(3, 7, 6),
(4, 13, 6),
(5, 12, 6),
(6, 13, 7),
(7, 7, 7),
(8, 20, 8),
(9, 23, 8),
(10, 22, 8),
(11, 30, 9);

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

DROP TABLE IF EXISTS `pilote`;
CREATE TABLE IF NOT EXISTS `pilote` (
  `id_pilote` int(7) NOT NULL AUTO_INCREMENT,
  `id_institution` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  PRIMARY KEY (`id_pilote`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`id_pilote`, `id_institution`, `id_plateforme`) VALUES
(1, 1, 1),
(2, 31, 2),
(3, 14, 3),
(4, 15, 3),
(5, 16, 3),
(6, 17, 3),
(7, 3, 4),
(8, 5, 5),
(9, 6, 5),
(10, 11, 6),
(11, 12, 7),
(14, 32, 10),
(13, 29, 9),
(12, 19, 8);

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

DROP TABLE IF EXISTS `plateforme`;
CREATE TABLE IF NOT EXISTS `plateforme` (
  `id_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(200) NOT NULL,
  `url_source` varchar(255) NOT NULL,
  `descriptif` text NOT NULL,
  `objectif_det` text NOT NULL,
  `date_creation` year(4) DEFAULT NULL,
  `statut_plateforme` varchar(15) NOT NULL,
  `date_inactive` year(4) DEFAULT NULL,
  `lieu_pilote` varchar(100) DEFAULT NULL,
  `public` text NOT NULL,
  `condition_contrib` text,
  `compte_contri` tinyint(1) NOT NULL,
  `historique` tinyint(1) NOT NULL,
  `carac_contributeur` text,
  `remuneration` tinyint(1) NOT NULL,
  `type_remuneration` text,
  `niveau_participation` varchar(70) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `type_validation` text,
  `charte` tinyint(1) NOT NULL,
  `nombre_contributeur` int(11) DEFAULT NULL,
  `couverture_geo_donnees` varchar(100) DEFAULT NULL,
  `couverture_chrono_donnees` varchar(100) DEFAULT NULL,
  `degre_avancement` varchar(255) DEFAULT NULL,
  `consulter_donnees` tinyint(1) NOT NULL,
  `telecharger_donnees` tinyint(1) NOT NULL,
  `statut_donnees_telechargees` text,
  `outils_com_interne` text,
  `lien_medias_sociaux` tinyint(1) NOT NULL,
  `media_sociaux_det` text,
  `lien_institution` tinyint(1) NOT NULL,
  `lien_institution_det` text,
  `ref_biblio` text,
  `date_saisie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`id_plateforme`, `nom_projet`, `url_source`, `descriptif`, `objectif_det`, `date_creation`, `statut_plateforme`, `date_inactive`, `lieu_pilote`, `public`, `condition_contrib`, `compte_contri`, `historique`, `carac_contributeur`, `remuneration`, `type_remuneration`, `niveau_participation`, `validation`, `type_validation`, `charte`, `nombre_contributeur`, `couverture_geo_donnees`, `couverture_chrono_donnees`, `degre_avancement`, `consulter_donnees`, `telecharger_donnees`, `statut_donnees_telechargees`, `outils_com_interne`, `lien_medias_sociaux`, `media_sociaux_det`, `lien_institution`, `lien_institution_det`, `ref_biblio`, `date_saisie`) VALUES
(1, 'AnnoTate', 'https://anno.tate.org.uk/', 'En plus de créer de l\'art, de nombreux artistes ont écrit des journaux intimes, des lettres et des carnets de croquis qui contiennent de nombreux détails sur leur vie et leur processus créatif. Aidez-nous à transcrire des documents de la collection de la Tate, et à révéler la vie secrète des artistes', 'AnnoTate est un outil de transcription conçu pour permettre aux bénévoles de lire et de transcrire les papiers personnels d\'artistes nés en Grande-Bretagne et émigrés, dont Josef Herman, Barbara Hepworth et Kurt Schwitters. Tirés des plus grandes archives d\'art britannique au monde - Tate Archive - les participants peuvent aider à fournir des transcriptions en texte intégral de documents manuscrits, aidant à révéler l\'inspiration et les histoires derrière certaines des plus grandes œuvres du siècle dernier.', 2015, 'Active', NULL, 'Royaume-Uni', 'Volontaires', 'Aspects de paléographie (transcription)', 1, 0, 'Possibilité de s\'identifier via son compte Zooniverse', 1, 'Accès à des documents numérisés et non encore transcrits', 'Crowdsourcing', 1, 'Vérification par l\'équipe du Tate museum avant de mettre les transcriptions en ligne (?)', 0, NULL, 'Royaume-Uni', NULL, NULL, 1, 0, NULL, 'Forum', 0, NULL, 1, 'Intégration des transcriptions sur le site du Tate (?)', NULL, '2019-05-01 17:11:14'),
(2, 'Test4Theory', 'http://lhcathome.web.cern.ch/projects/test4theory', 'Ces simulations utilisent des modèles théoriques basés sur le modèle standard de la physique des particules et sont calculées à l\'aide de méthodes de Monte Carlo. Les modèles théoriques ont des paramètres réglables et l\'objectif est qu\'un ensemble donné de paramètres (appelé \"tune\") s\'adapte à la plus large gamme possible de résultats expérimentaux.', 'Le projet Test4Theory permet aux volontaires d\'effectuer des simulations de collisions de particules à haute énergie sur leur ordinateur personnel.', 2011, 'Active', NULL, 'Suisse', 'Volontaires', 'Installation d\'une application de virtualisation', 0, 0, NULL, 0, NULL, 'Crowdsourcing', 0, NULL, 0, NULL, 'Mondiale / Internationale', 'Epoque contemporaine (présent)', NULL, 0, 1, 'Sous licence domaine public', NULL, 0, NULL, 1, 'Avec le CERN : https://home.cern/', NULL, '2019-05-07 19:34:59'),
(3, 'Testaments de poilus', 'https://testaments-de-poilus.huma-num.fr/#!/', 'Le projet « Testaments de Poilus » fait appel à des internautes bénévoles pour transcrire et enrichir le texte des testaments laissés par les soldats morts pour la France. Les testaments mis en ligne se trouvent dans les fonds des archives notariales des Archives nationales et celles des Archives départementales des Yvelines.', 'Le contributeur doit réorganiser l\'information du testamen sous forme d\'un document structuré (TEI).', 2018, 'Inactive', NULL, 'France', 'Eclairés', NULL, 1, 1, NULL, 0, NULL, 'Science participative', 1, 'Validation par les administrateurs du projet', 1, NULL, 'France', '2Oème siècle', '72% validés', 1, 0, NULL, 'Site internet officiel qui montre l\'évolution du projet', 1, 'Réseaux sociaux (Facebook, Twitter et Instagram)', 0, NULL, NULL, '2019-05-08 12:40:21'),
(4, 'ARTigo', 'http://www.artigo.org/', 'L\'histoire de l\'art se réfère aux œuvres originales, souvent également à leur reproductions. Ces reproductions sont de nos jours disponibles sous forme digitale dans des bases de données qui peuvent en contenir des millions. Comment accéder à ces reproductions d\'après de multiples critères? Un critère de recherche peut être un certain contenu ou une certaine forme. Le développement d\'algorithmiques de reconnaissance de tels critères en étant encore à ses débuts, des mots-clés sont associés aux reproductions que l\'on appelle métadonnées.', 'La recherche de reproduction est effectuée sur des mots-clés et non pas directement sur les reproductions elles-mêmes. Associer les mots-clés appropriés à des millions de reproduction est une tâche qui coûte beaucoup de temps et requiert un grand nombre de personnes. C\'est cette tâche que nous vous proposons, dans un jeu.', 2013, 'Active', NULL, 'Allemagne', 'Non précisé', 'Jugement', 1, 1, 'Permet d\'enregistrer ses scores sous son pseudonyme', 1, 'Apprentissage en accédant aux oeuvres des collections de l\'Université de Munich + Distraction du fait de la gamification (tableau des highscore)', 'Intelligence distribuée', 1, 'Par les pairs : si les joueurs de chaque paire utilisent les mêmes termes, ainsi que des termes qui ont été utilisés lors de parties précédentes', 0, NULL, NULL, NULL, NULL, 1, 1, 'Sous licence Creative Commons BY-NC-SA 4.0', NULL, 0, NULL, 0, NULL, NULL, '2019-06-09 17:06:33'),
(10, 'Galaxie Zoo', 'https://www.zooniverse.org/projects/zookeeper/galaxy-zoo/', 'Galaxy Zoo est un projet astronomique en lignequi propose aux internautes de collaborer au projet de classifier plus d\'un million de galaxies.', 'Les internautes bénévoles doivent travailler sur des images prises par le programme Sloan Digital Sky Survey et décider si les galaxies sont elliptiques ou spirales et signaler si elles possèdent des particularités comme avoir des spirales en forme de barre ou bien avoir subi des transformations.', 2007, 'Active', NULL, 'Royaume-Uni', 'Novices', NULL, 0, 0, NULL, 0, NULL, 'Crowdsourcing', 0, NULL, 1, 1, 'Mondiale / Internationale', NULL, NULL, 0, 0, NULL, 'blog qui recense l\'avancement des classification', 0, NULL, 1, 'Les chercheurs vont réutiliser cette classification pour améliorer leur recherche.', NULL, '2019-06-09 19:41:47'),
(5, 'Project Soothe', 'http://www.projectsoothe.com/', 'Nous espérons y parvenir en vous invitant à nous envoyer des photos qui vous apaiseront. Nous afficherons ensuite ces images sur notre galerie de site Web et recueillerons les commentaires des téléspectateurs pour savoir si ces images les apaisent aussi. (....) Toutes les images nous sont fournies par des membres du public du monde entier, comme vous.', 'Notre but est d\'en apprendre davantage sur l\'expérience quotidienne de l\'apaisement de soi. (...) Ces images seront ensuite combinées en une grande banque de photos pour les recherches futures et les thérapies psychologiques.', 2014, 'Active', NULL, 'Royaume-Uni', 'N\'importe qui âgé de plus de 12 ans', 'Jugement', 0, 0, NULL, 0, NULL, 'Intelligence distribuée', 0, NULL, 0, NULL, NULL, NULL, 'Plus de 700 images', 1, 0, NULL, NULL, 1, 'Un compte Twitter (https://twitter.com/projectsoothe ; utilisation du hashtga #CitizenScience), Facebook (https://www.facebook.com/projectsoothe) et Instagram (https://www.instagram.com/project_soothe/) dédié.', 0, NULL, NULL, '2019-06-09 19:25:29'),
(6, 'Emigrant City', 'http://emigrantcity.nypl.org/#/', 'Ces documents uniques révèlent la vie et les rêves des immigrants qui ont contribué à la création de New York. Registres immobiliers du 19e et du début du 20e siècle de la Emigrant Savings Bank. En 1995, Emigrant Bank a généreusement fait don à la New York Public Library de nombreux documents d\'archives qui constituent des ressources historiques et généalogiques précieuses sur la vie des familles immigrantes. La Bibliothèque a microfilmé l\'ensemble de la collection et compilé un instrument de recherche détaillé qui donne un aperçu de toute la portée des dossiers de la banque d\'épargne des émigrants. Cette collection, qui fait l\'objet d\'un trafic important, est conservée à la Division des manuscrits et des archives. Cependant, les utilisateurs le rencontrent principalement par l\'intermédiaire de la division Irma et Paul Milstein de l\'histoire des États-Unis, de l\'histoire locale et de la généalogie.\r\nLa compatibilité du lecteur d\'écran est activée.\r\n', 'L\'objectif de l\'initiative de transcription de Emigrant City est de produire des documents structurés au niveau du bâtiment pour environ 6 400 prêts hypothécaires numérisés. La création de cet index de noms et de détails hypothécaires, qui peut être consulté par mots-clés, devrait être d\'une grande utilité pour les généalogistes et fournira un ensemble de données historiques intrigant pour les humanistes et les chercheurs en sciences humaines numériques. De plus, parce que ces enregistrements de biens comprennent des informations géographiques détaillées, ils contribueront aux efforts d\'agrégation des données spatiales autour de la nouvelle plate-forme de cartographie historique de la bibliothèque, le NYC Space/Time Directory.', 2013, 'Active', NULL, 'Etats-Unis', 'Volontaires', NULL, 0, 0, 'Possible de créer un compte', 0, NULL, 'Intelligence distribuée', 1, 'consensus si transcrit 3 fois de manière identique', 1, NULL, 'New-York', '19ème siècle', NULL, 0, 1, 'Sous licence domaine public', 'Forum', 1, 'Twitter', 1, 'https://www.nypl.org/collections/labs', NULL, '2019-06-09 19:25:29'),
(7, 'Operation War Diary', 'https://www.operationwardiary.org/', 'L\'histoire de l\'armée britannique sur le front occidental pendant la Première Guerre mondiale attend d\'être découverte dans 1,5 million de pages de journaux de guerre des unités. Nous avons besoin de votre aide pour révéler les histoires de ceux qui ont combattu dans le conflit mondial qui a façonné le monde dans lequel nous vivons aujourd\'hui. Operation War Diary réunit des documents originaux de la Première Guerre mondiale provenant des Archives nationales, l\'expertise historique de l\'IWM et le pouvoir de la communauté Zooniverse.\r\n', 'Enrichir les descriptions du catalogue des Archives nationales pour les journaux de guerre de l\'unité, fournir des preuves de l\'expérience des personnes nommées dans le cadre du projet Lives of the First World War de l\'IWM, présenter aux universitaires de grandes quantités de données précises pour les aider à mieux comprendre comment la guerre s\'est déroulée.', 2014, 'Active', NULL, 'Angleterre', 'Volontaires', NULL, 0, 0, 'Possible de créer un compte', 0, NULL, 'Intelligence distribuée', 1, 'consensus si transcrit 3 fois de manière identique', 1, NULL, 'Angleterre', '20ème siècle', NULL, 0, 0, NULL, 'Forum et Blog', 1, 'Twitter(https://twitter.com/OpWarDiary)  Facebook (https://www.facebook.com/OperationWarDiary)', 1, 'http://iwm.org.uk/  +   http://www.nationalarchives.gov.uk/first-world-war/', NULL, '2019-06-09 19:25:29'),
(8, 'Un jour un poilu', 'https://www.1jour1poilu.com/', 'Le projet « 1 Jour – 1 Poilu » est né en novembre 2013, dans la foulée de l’ouverture au public du programme de transcription des fiches des soldats morts pour la France au titre de la Grande Guerre sur le site Mémoire des Hommes', 'Cette démarche de labellisation « Centenaire » a donc pour premier objectif d’accroître la visibilité et la notoriété du projet pour élargir la base des participants. ', 2013, 'Clos', 2018, 'France', 'Novices', NULL, 1, 1, NULL, 0, NULL, 'Science participative', 1, 'validation par les administrateurs du projet', 1, 1, 'France', '20ème siècle', '100% (1,4 million de fiches)', 0, 0, NULL, 'site internet officiel qui montre l\'évolution du projet', 1, 'Réseaux sociaux (Facebook, Twitter et Instagram)', 0, NULL, NULL, '2019-06-09 19:25:29'),
(9, 'iNaturalist', 'https://www.inaturalist.org/', 'L\'une des applications nature les plus populaires au monde, iNaturalist vous aide à identifier les plantes et les animaux qui vous entourent. Entrez en contact avec une communauté de plus de 750 000 scientifiques et naturalistes qui peuvent vous aider à en apprendre davantage sur la nature !', 'En enregistrant et en partageant vos observations, vous créerez des données de qualité pour les scientifiques qui travaillent à mieux comprendre et protéger la nature.\" \"Nous partageons vos découvertes avec les dépôts de données scientifique comme l’Établissement pour l’Information sur la Biodiversité Globale pour aider les scientifiques à trouver et utiliser vos données.', 2008, 'Active', NULL, 'Etats-Unis', 'Scientifiques et naturalistes', 'Compétences en zoologie et en botanique (connaissances des epèces) + Appareil photo', 1, 1, 'Possibilité de créer un compte, avec les fonctionnalités suivantes : profil, observations, calendrier, IDs, listes, journal, favoris, projets', 1, 'Classements mensuels et annuels des contributeurs les plus actifs, et mentions de ceux qui participent à l\'organisation du site. Nombre d\'observations, d\'espèces, d\'identifications et d\'abonnés visibles par tous.', 'Collaboration complète', 1, 'Par les pairs et via évaluation de la qualité des données (grille d\'évaluation) : si la date et l\'emplacement sont spécifiés, que l\'ID de l\'espèce est établi au moins par deux personnes, que la date est actuelle, l\'emplacement exact, etc.)', 1, 1, 'Mondiale / Internationale', 'Epoque contemporaine (présent)', 'Plus de 18 millions d\'observations au 20/04/2019', 1, 1, 'L\'utilisation de cette API est soumise aux Conditions d\'utilisation et à la Politique de confidentialité d\'iNaturalist.', 'Commentaires, annotations, forum, \"journal\"', 1, 'Facebook : https://fr-fr.facebook.com/inaturalist/\r\nTwitter : https://twitter.com/inaturalist\r\nInstagram : https://www.instagram.com/inaturalistorg/\r\nSur Instagram et Twitter, utilisation des hashtag #iNat (par le compte de la plateforme) et #iNaturalist', 0, NULL, NULL, '2019-06-09 19:25:29');

-- --------------------------------------------------------

--
-- Structure de la table `statut_donnees_produites`
--

DROP TABLE IF EXISTS `statut_donnees_produites`;
CREATE TABLE IF NOT EXISTS `statut_donnees_produites` (
  `id_statut_donnees_produites` int(1) NOT NULL AUTO_INCREMENT,
  `nom_statut_donnees_produites` text NOT NULL,
  PRIMARY KEY (`id_statut_donnees_produites`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut_donnees_produites`
--

INSERT INTO `statut_donnees_produites` (`id_statut_donnees_produites`, `nom_statut_donnees_produites`) VALUES
(1, 'Donnees ouvertes'),
(2, 'Droit d\'auteur'),
(3, 'Non precise');

-- --------------------------------------------------------

--
-- Structure de la table `statut_donnees_produites_plateforme`
--

DROP TABLE IF EXISTS `statut_donnees_produites_plateforme`;
CREATE TABLE IF NOT EXISTS `statut_donnees_produites_plateforme` (
  `id_statut_donnees_produites_plateforme` int(7) NOT NULL AUTO_INCREMENT,
  `id_plateforme` int(7) NOT NULL,
  `id_statut_donnees_produites` int(1) NOT NULL,
  PRIMARY KEY (`id_statut_donnees_produites_plateforme`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut_donnees_produites_plateforme`
--

INSERT INTO `statut_donnees_produites_plateforme` (`id_statut_donnees_produites_plateforme`, `id_plateforme`, `id_statut_donnees_produites`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 3),
(4, 4, 3),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 3),
(9, 9, 3),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(2) NOT NULL AUTO_INCREMENT,
  `nom_tache` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tache`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `nom_tache`) VALUES
(1, 'Traduction'),
(2, 'Annotation'),
(3, 'Indexation'),
(4, 'Deposer un  document'),
(5, 'Deposer une photo'),
(6, 'Numeriser'),
(7, 'Relecture'),
(8, 'Verification'),
(9, 'Evaluation'),
(10, 'Creation d un contenu'),
(11, 'Vote'),
(12, 'Test d outil'),
(13, 'Classification');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(8) NOT NULL,
  `pwd` varchar(8) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mail` varchar(70) NOT NULL,
  `nb_modification` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
