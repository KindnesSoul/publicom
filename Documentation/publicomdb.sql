-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 mai 2026 à 18:53
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `publicomdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `IDENTIFIANT` char(32) DEFAULT NULL,
  `MOTDEPASSE` char(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID`, `IDENTIFIANT`, `MOTDEPASSE`) VALUES
(1, 'admin', '$2y$10$18XJN64WAhI0cnKU45b.GulGC4ggrPozqZtByfNjZqIpZQB3IlEhq');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `IDCATEGORIE` int NOT NULL AUTO_INCREMENT,
  `NOM` char(32) NOT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL,
  PRIMARY KEY (`IDCATEGORIE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IDCATEGORIE`, `NOM`, `DESCRIPTION`) VALUES
(1, 'MessageDefaut', 'Catégorie des messages par défauts'),
(4, 'MessageUrgence', 'Catégorie des Messages d\'urgences');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOM` char(32) DEFAULT NULL,
  `CODEPOSTAL` bigint DEFAULT NULL,
  `DESCRIPTION` char(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`ID`, `NOM`, `CODEPOSTAL`, `DESCRIPTION`) VALUES
(4, 'Toulouse', 31000, 'Ville Rose'),
(6, 'Lyon', 69000, 'La ville de Lyon est une métropole française située au confluent du Rhône et de la Saône. Elle est connue pour son histoire riche, ayant été la capitale des Trois Gaules durant l\'Antiquité');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_COMMUNEMESSAGE` int NOT NULL,
  `TITRE` varchar(60) DEFAULT NULL,
  `CONTENU` varchar(600) DEFAULT NULL,
  `POLICETITRE` varchar(40) DEFAULT NULL,
  `POLICECONTENU` varchar(40) DEFAULT NULL,
  `ALIGNEMENT` enum('gauche','centre','droite') DEFAULT NULL,
  `FOND` char(80) DEFAULT NULL,
  `TAILLECONTENU` int DEFAULT NULL,
  `TAILLETITRE` int DEFAULT NULL,
  `PUBLIE` tinyint(1) DEFAULT NULL,
  `ID_CATEGORIEMESSAGE` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_MESSAGE_COMMUNE` (`ID_COMMUNEMESSAGE`),
  KEY `I_FK_MESSAGE_CATEGORIE` (`ID_CATEGORIEMESSAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID`, `ID_COMMUNEMESSAGE`, `TITRE`, `CONTENU`, `POLICETITRE`, `POLICECONTENU`, `ALIGNEMENT`, `FOND`, `TAILLECONTENU`, `TAILLETITRE`, `PUBLIE`, `ID_CATEGORIEMESSAGE`) VALUES
(13, 4, 'Transports Gratuits', 'Les transports sont gratuits', 'arial', 'arial', 'centre', 'uploads/1777711208_2b151d474a4f69176a25.webp', 32, 60, 0, 1),
(25, 6, 'Transports Gratuits', 'Les transports de Lyon sont GRATUITS!!!', 'arial', 'arial', 'centre', 'uploads/1777718648_1aaf77c95a44c7f61b7c.webp', 32, 60, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panneaux`
--

DROP TABLE IF EXISTS `panneaux`;
CREATE TABLE IF NOT EXISTS `panneaux` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_COMMUNEPANNEAUX` int NOT NULL,
  `NUMERO` int DEFAULT NULL,
  `LATITUDE` decimal(10,5) DEFAULT NULL,
  `LONGITUDE` decimal(10,5) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_PANNEAUX_COMMUNE` (`ID_COMMUNEPANNEAUX`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panneaux`
--

INSERT INTO `panneaux` (`ID`, `ID_COMMUNEPANNEAUX`, `NUMERO`, `LATITUDE`, `LONGITUDE`) VALUES
(7, 4, 1, 43.60500, 1.44265),
(8, 4, 2, 43.60650, 1.44464),
(9, 4, 3, 43.56782, 1.46454),
(10, 6, 1, 45.75449, 4.84673),
(11, 6, 2, 45.75020, 4.88823);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEURCOMMUNE` int NOT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `NOM` char(32) DEFAULT NULL,
  `IDENTIFIANT` char(32) DEFAULT NULL,
  `MOTDEPASSE` char(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_UTILISATEUR_COMMUNE` (`ID_UTILISATEURCOMMUNE`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `ID_UTILISATEURCOMMUNE`, `PRENOM`, `NOM`, `IDENTIFIANT`, `MOTDEPASSE`) VALUES
(16, 4, 'Bonnafe', 'Julien', 'jb', '$2y$10$14ialelnsszkEwLdPZUoFu/V92M8zTeg2z/QmzJ2PukAYQXjkeRVO'),
(18, 6, 'Jean', 'Lyon', 'Lyonnais', '$2y$10$a4hE/sCqT6jLpw/XyN0/2u56KKPh3tKqqK5RWBY.R4xsW1AI0gx0K');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_CATEGORIE` FOREIGN KEY (`ID_CATEGORIEMESSAGE`) REFERENCES `categorie` (`IDCATEGORIE`),
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ID_COMMUNEMESSAGE`) REFERENCES `commune` (`ID`);

--
-- Contraintes pour la table `panneaux`
--
ALTER TABLE `panneaux`
  ADD CONSTRAINT `panneaux_ibfk_1` FOREIGN KEY (`ID_COMMUNEPANNEAUX`) REFERENCES `commune` (`ID`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_UTILISATEURCOMMUNE`) REFERENCES `commune` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
