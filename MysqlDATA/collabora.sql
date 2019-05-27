-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 28 avr. 2019 à 10:01
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

DROP TABLE IF EXISTS `donnees`;
CREATE TABLE IF NOT EXISTS `donnees` (
  `id_donnees` int(7) NOT NULL AUTO_INCREMENT,
  `id_lieu` int(7) NOT NULL,
  `id_chrono` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  PRIMARY KEY (`id_donnees`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_entrees`
--

DROP TABLE IF EXISTS `donnees_entrees`;
CREATE TABLE IF NOT EXISTS `donnees_entrees` (
  `id_donnee_entree` int(2) NOT NULL AUTO_INCREMENT,
  `nom_donnees_entrees` varchar(100) NOT NULL,
  PRIMARY KEY (`id_donnee_entree`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_entrees_cor`
--

DROP TABLE IF EXISTS `donnees_entrees_cor`;
CREATE TABLE IF NOT EXISTS `donnees_entrees_cor` (
  `id_donnees_entrees_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_donnees` int(7) NOT NULL,
  `id_donnees_entrees` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_entrees_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_produites`
--

DROP TABLE IF EXISTS `donnees_produites`;
CREATE TABLE IF NOT EXISTS `donnees_produites` (
  `id_donnee_produites` int(2) NOT NULL AUTO_INCREMENT,
  `nom_donnes_produites` varchar(100) NOT NULL,
  PRIMARY KEY (`id_donnee_produites`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_produites_cor`
--

DROP TABLE IF EXISTS `donnees_produites_cor`;
CREATE TABLE IF NOT EXISTS `donnees_produites_cor` (
  `id_donnees_produites_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_donnees` int(7) NOT NULL,
  `id_donnees_produites` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_produites_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_tache_cor`
--

DROP TABLE IF EXISTS `donnees_tache_cor`;
CREATE TABLE IF NOT EXISTS `donnees_tache_cor` (
  `id_donnees_tache_cor` int(7) NOT NULL AUTO_INCREMENT,
  `id_donnees` int(7) NOT NULL,
  `id_tache` int(2) NOT NULL,
  PRIMARY KEY (`id_donnees_tache_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enjeu`
--

DROP TABLE IF EXISTS `enjeu`;
CREATE TABLE IF NOT EXISTS `enjeu` (
  `id_enjeu` int(2) NOT NULL AUTO_INCREMENT,
  `nom_enjeu` varchar(100) NOT NULL,
  PRIMARY KEY (`id_enjeu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
CREATE TABLE IF NOT EXISTS `institutions` (
  `id_institutions` int(11) NOT NULL AUTO_INCREMENT,
  `element_wikidata` varchar(70) NOT NULL,
  `nom_institution` varchar(255) NOT NULL,
  `id_lieu` int(7) NOT NULL,
  PRIMARY KEY (`id_institutions`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(4) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(70) NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `ojectif_det` text NOT NULL,
  `date_creation` year(4) DEFAULT NULL,
  `statut_plateforme` varchar(15) NOT NULL,
  `date_inactive` year(4) DEFAULT NULL,
  `public` text NOT NULL,
  `condition_contrib` text,
  `compte_contri` tinyint(1) NOT NULL,
  `historique` tinyint(1) NOT NULL,
  `carac_contributeur` text,
  `remuneration` tinyint(1) NOT NULL,
  `type_remuneration` text,
  `niveau_participation` int(70) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `type_validation` text,
  `charte` tinyint(1) NOT NULL,
  `nombre_contributeur` int(11) DEFAULT NULL,
  `couverture_geo` int(7) DEFAULT NULL,
  `couverture_chrono` int(7) DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statut_donnees_produites`
--

DROP TABLE IF EXISTS `statut_donnees_produites`;
CREATE TABLE IF NOT EXISTS `statut_donnees_produites` (
  `id_statut_donnees_produites` int(1) NOT NULL AUTO_INCREMENT,
  `nom_statut_donnees_produites` text NOT NULL,
  PRIMARY KEY (`id_statut_donnees_produites`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statut_donnees_produites_plateforme`
--

DROP TABLE IF EXISTS `statut_donnees_produites_plateforme`;
CREATE TABLE IF NOT EXISTS `statut_donnees_produites_plateforme` (
  `id_statut_donnees_produites_plateforme` int(7) NOT NULL,
  `id_plateforme` int(7) NOT NULL,
  `id_statut_donnees_produites` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(2) NOT NULL AUTO_INCREMENT,
  `nom_tache` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tache`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
