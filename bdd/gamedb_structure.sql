-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 mars 2023 à 09:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `blessures_chevaux`
--

DROP TABLE IF EXISTS `blessures_chevaux`;
CREATE TABLE IF NOT EXISTS `blessures_chevaux` (
  `nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id` int NOT NULL,
  `chevaux_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chevaux_id` (`chevaux_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `calendrier_joueur`
--

DROP TABLE IF EXISTS `calendrier_joueur`;
CREATE TABLE IF NOT EXISTS `calendrier_joueur` (
  `tache_id` int DEFAULT NULL,
  `joueur_id` int DEFAULT NULL,
  KEY `joueur_id` (`joueur_id`),
  KEY `tache_id` (`tache_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `centre_equestre`
--

DROP TABLE IF EXISTS `centre_equestre`;
CREATE TABLE IF NOT EXISTS `centre_equestre` (
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `joueur_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `capacite` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chevaux`
--

DROP TABLE IF EXISTS `chevaux`;
CREATE TABLE IF NOT EXISTS `chevaux` (
  `level` int DEFAULT NULL,
  `mental_sociability` int DEFAULT NULL,
  `mental_temperament` int DEFAULT NULL,
  `physical_speed` int DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `race` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `moral_status` int DEFAULT NULL,
  `mental_intelligence` int DEFAULT NULL,
  `proprete_status` int DEFAULT NULL,
  `physical_resistance` int DEFAULT NULL,
  `global_status` int DEFAULT NULL,
  `physical_detente` int DEFAULT NULL,
  `fatigue_status` int DEFAULT NULL,
  `sante_status` int DEFAULT NULL,
  `stresse_status` int DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) DEFAULT NULL,
  `joueur_id` int NOT NULL,
  `physical_endurance` int DEFAULT NULL,
  `faim_status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classement_articles`
--

DROP TABLE IF EXISTS `classement_articles`;
CREATE TABLE IF NOT EXISTS `classement_articles` (
  `item_id` int DEFAULT NULL,
  `rank` int DEFAULT NULL,
  `id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `club_hippiques`
--

DROP TABLE IF EXISTS `club_hippiques`;
CREATE TABLE IF NOT EXISTS `club_hippiques` (
  `id_gerant` int DEFAULT NULL,
  `id` int NOT NULL,
  `capacite` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gerant` (`id_gerant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte_en_banque`
--

DROP TABLE IF EXISTS `compte_en_banque`;
CREATE TABLE IF NOT EXISTS `compte_en_banque` (
  `identifiant` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `joueur_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `operation_date` datetime NOT NULL,
  `montant` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`),
  KEY `joueur_id` (`joueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

DROP TABLE IF EXISTS `concours`;
CREATE TABLE IF NOT EXISTS `concours` (
  `centre_hippique_id` int DEFAULT NULL,
  `debut` date DEFAULT NULL,
  `infrastructure_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `fin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `infrastructure_id` (`infrastructure_id`),
  KEY `item_id` (`item_id`),
  KEY `centre_hippique_id` (`centre_hippique_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `date_operation`
--

DROP TABLE IF EXISTS `date_operation`;
CREATE TABLE IF NOT EXISTS `date_operation` (
  `compte_en_banque_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compte_en_banque_id` (`compte_en_banque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille_items`
--

DROP TABLE IF EXISTS `famille_items`;
CREATE TABLE IF NOT EXISTS `famille_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `infrastructure`
--

DROP TABLE IF EXISTS `infrastructure`;
CREATE TABLE IF NOT EXISTS `infrastructure` (
  `prix` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `centre_equestre_id` int DEFAULT NULL,
  `capacite_accueil_items` int DEFAULT NULL,
  `club_hippique_id` int DEFAULT NULL,
  `niveau` int DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `famille` varchar(50) DEFAULT NULL,
  `consommation_ressources` int DEFAULT NULL,
  `capacite_accueil_chevaux` int DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `club_hippique_id` (`club_hippique_id`),
  KEY `centre_equestre_id` (`centre_equestre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `player_id` int DEFAULT NULL,
  `rank` int DEFAULT NULL,
  `id` int NOT NULL,
  `concours_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `concours_id` (`concours_id`),
  KEY `player_id` (`player_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `joueur_id` int DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `famille_items_id` int DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `infrastructure_id` int DEFAULT NULL,
  `niveau` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `famille_items_id` (`famille_items_id`),
  KEY `joueur_id` (`joueur_id`),
  KEY `infrastructure_id` (`infrastructure_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items_chevaux`
--

DROP TABLE IF EXISTS `items_chevaux`;
CREATE TABLE IF NOT EXISTS `items_chevaux` (
  `id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `chevaux_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chevaux_id` (`chevaux_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `argent` int NOT NULL DEFAULT '0',
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `adresse_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `derniere_connexion` datetime NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `adresse_site` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `pseudonyme` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `avatar` blob,
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `genre` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresse_ip` (`adresse_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `journal_quotidien`
--

DROP TABLE IF EXISTS `journal_quotidien`;
CREATE TABLE IF NOT EXISTS `journal_quotidien` (
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `weather_forecast` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `article_type` enum('calculated','random') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `headline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `magasins`
--

DROP TABLE IF EXISTS `magasins`;
CREATE TABLE IF NOT EXISTS `magasins` (
  `items_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastructure_id` int DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `club_hippique_id` int DEFAULT NULL,
  `centre_equestre_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `club_hippique_id` (`club_hippique_id`),
  KEY `centre_equestre_id` (`centre_equestre_id`),
  KEY `infrastructure_id` (`infrastructure_id`),
  KEY `items_id` (`items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maladies_chevaux`
--

DROP TABLE IF EXISTS `maladies_chevaux`;
CREATE TABLE IF NOT EXISTS `maladies_chevaux` (
  `nom` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id` int NOT NULL,
  `chevaux_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chevaux_id` (`chevaux_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parasites_chevaux`
--

DROP TABLE IF EXISTS `parasites_chevaux`;
CREATE TABLE IF NOT EXISTS `parasites_chevaux` (
  `chevaux_id` int DEFAULT NULL,
  `id` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chevaux_id` (`chevaux_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `date_fin` datetime NOT NULL,
  `taches_automatisees_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `date_debut` datetime NOT NULL,
  `nom_tache` varchar(255) NOT NULL,
  `joueur_id` int DEFAULT NULL,
  `centre_equestre_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`),
  KEY `taches_automatisees_id` (`taches_automatisees_id`),
  KEY `centre_equestre_id` (`centre_equestre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `object_id` int DEFAULT NULL,
  `frequence` int DEFAULT NULL,
  `id` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `joueur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `taches_automatisees`
--

DROP TABLE IF EXISTS `taches_automatisees`;
CREATE TABLE IF NOT EXISTS `taches_automatisees` (
  `joueur_id` int DEFAULT NULL,
  `frequence` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `identifiant_objet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `centre_equestre_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `identifiant_unique` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`),
  KEY `centre_equestre_id` (`centre_equestre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
