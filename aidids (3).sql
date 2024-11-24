-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 août 2024 à 11:15
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aidids`
--
CREATE DATABASE IF NOT EXISTS `aidids` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `aidids`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `IdAdresse` int NOT NULL AUTO_INCREMENT,
  `avenue` varchar(50) NOT NULL,
  `quartier` int NOT NULL,
  `commune` int NOT NULL,
  `ville` int NOT NULL,
  `IdUtilisateur` int NOT NULL,
  PRIMARY KEY (`IdAdresse`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `description`, `image`) VALUES
(6, 'Entrées', '', ''),
(7, 'Petit-Déjeuner', '', ''),
(8, 'Déjeuner', '', ''),
(9, 'Dinner', '', ''),
(10, 'Boisson', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` double(10,2) NOT NULL,
  `statut` set('approuver','en attente','annuler','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'en attente',
  `modePaiement` set('Cash','MobileMoney','CarteBancaire','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateLIv` date NOT NULL,
  `heureLiv` time NOT NULL,
  `estPaye` tinyint(1) NOT NULL DEFAULT '0',
  `IdUtilisateur` int NOT NULL,
  `nomClient` varchar(40) NOT NULL,
  `emailClient` varchar(100) NOT NULL,
  `TelephoneClient` varchar(25) NOT NULL,
  `typeCommande` set('a emporter','livraison') NOT NULL,
  `avenue` varchar(50) DEFAULT NULL,
  `quartier` varchar(50) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `IdUtilisateur` (`IdUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

DROP TABLE IF EXISTS `detailcommande`;
CREATE TABLE IF NOT EXISTS `detailcommande` (
  `idDetailCommande` int NOT NULL AUTO_INCREMENT,
  `qte` int NOT NULL,
  `prixUnitaire` int NOT NULL,
  `sousTotal` int NOT NULL,
  `idCommande` int NOT NULL,
  `idPlat` int NOT NULL,
  PRIMARY KEY (`idDetailCommande`),
  KEY `idCommande` (`idCommande`),
  KEY `idPlat` (`idPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `imageplat`
--

DROP TABLE IF EXISTS `imageplat`;
CREATE TABLE IF NOT EXISTS `imageplat` (
  `idImagePlat` int NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `idPlat` int NOT NULL,
  PRIMARY KEY (`idImagePlat`),
  KEY `idPlat` (`idPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `imageplat`
--

INSERT INTO `imageplat` (`idImagePlat`, `photo`, `nom`, `idPlat`) VALUES
(7, '1720691940_0e3549277141994774dbea7c60a9782d.jpg', 'Spagheti', 9),
(8, '1720692000_0a82fce96f93b4cf76bd20b59100d77e.jpg', 'Spagheti au poulet', 9),
(9, '1720692060_29a10026778fa153964460fae94eca84.jpg', 'Spagheti', 9),
(10, '1720692060_9d3460367464d113708f8518ca853294.jpg', 'Shawarma', 10),
(11, '1720692900_d89a53a1d0d9676ae49080f71c1b6ed5.jpg', 'Sauce poulet', 11),
(12, '1720692960_42e67f49b787cd98e3e83f31bc512e2c.jpg', 'Gombo', 12),
(13, '1720693020_e5eeaf8a9ac2e1f8b22d8378c861ed52.jpg', 'Pizz', 13),
(14, '1720693080_a2f8bf27951771bcc515624564c5bad8.jpg', 'Frites', 14),
(15, '1720693200_d89a53a1d0d9676ae49080f71c1b6ed5.jpg', 'Poulet', 15),
(16, '1720693260_d7bfa5e322aa3165f6089f4f299d382b.jpg', 'Frites', 16),
(17, '1720693320_15315c6b7ca9d84ca84f26775af4c42c.jpg', 'Feuille de manioc', 17),
(18, '1720693320_1ffcb180dfa40e6dd38f30b88cb6ebd6.jpg', 'Fretin', 18),
(19, '1720693380_7db4820b10291c6eaf016209f4474935.jpg', 'Tilapia', 19),
(20, '1720693380_6cb85f23f87e7cd698274fdb922da959.jpg', 'Cuisses de poulet', 20),
(21, '1720693440_22e0cd7063ce7d57864a3486a30ef56d.jpg', 'Viande de chévre', 21),
(22, '1720693500_d219a42a782949afede961ef1ff10e0c.jpg', 'Chenille', 22),
(23, '1720693560_cd10f0791d7243765f3e2c0da7355aef.jpg', 'Oeuf', 23),
(24, '1720693860_bff3e414b46b308fca9bc984bd1df281.jpg', 'Poulet', 15),
(25, '1720694760_d2901f3caf62f69ce32cc20f6b5ec047.jpg', 'Humburger', 8),
(26, '1720695000_81ec1f4a91cb95bc925b5ebba4f9a67b.jpg', 'Tilapia Grillé', 24),
(27, '1720695240_c1dbb79f10bc258a9b23bc33a284eda8.jpg', 'RIz avec sauce', 25),
(28, '1720695540_3dce1a9ff282d6993af6b98739499b22.jpg', 'Viande de chévre', 26),
(29, '1720695660_7eba7f6a1f7c12fde69a14a7d949628c.jpg', 'Spagheti', 28),
(30, '1720699380_b73610fb8e20886bc1c61e27675c26a7.jpg', 'Coca cola', 29),
(31, '1720699440_0c7f715767d70087c1659adad03c2e1e.jpg', 'Fanta', 30),
(32, '1720699440_794cbb8191e33e6a3769625b837f38ce.jpg', 'Sprite', 31),
(33, '1720699500_f50277df25ce8c3e941f3310717038a0.jpg', 'Castel', 33),
(34, '1720699500_5c407f25cdbd7d821bbc612250aee85e.jpg', 'Pepsi', 34),
(35, '1720699560_7d99b2e2727c7c4cddd0537d64f1ed60.jpg', 'Heineken', 36),
(36, '1720699560_5d6c1c10740105616e45325a6c9640ab.jpg', 'Guinness', 37),
(37, '1720699620_15c3e8ee6f1e23916849ecf763aed549.jpg', 'Amarula', 39),
(38, '1720699680_7396589cd0581962c3930a835f2ab82d.jpg', 'Savana', 57);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `idPlat` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` double(10,2) NOT NULL,
  `qte` int NOT NULL,
  `idCategorie` int NOT NULL,
  PRIMARY KEY (`idPlat`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`idPlat`, `nom`, `description`, `prix`, `qte`, `idCategorie`) VALUES
(8, 'Humburger', 'Racipe', 20000.00, 7, 6),
(9, 'Spagheti', 'au poulet', 30000.00, 15, 8),
(10, 'Shawarma', 'au viande', 15000.00, 8, 6),
(11, 'Sauce poulet', '', 25000.00, 14, 9),
(12, 'Sauce gombo', 'au poisson', 15000.00, 10, 9),
(13, 'Pizza', 'peperoni', 30000.00, 40, 7),
(14, 'Frites', 'avec poulet', 25000.00, 15, 9),
(15, 'Poulet', 'entière', 35000.00, 25, 9),
(16, 'Frites', 'Banane plantain', 25000.00, 15, 9),
(17, 'Feuille de manioc', 'avec fufu', 20000.00, 40, 9),
(18, 'Fretin', 'avec fufu', 25000.00, 40, 9),
(19, 'Tilapia', 'sauce rouge', 25000.00, 40, 9),
(20, 'Cuisses de poulet', 'Grillé', 30000.00, 25, 9),
(21, 'Viande de chévre', '', 25000.00, 25, 9),
(22, 'Chenille', 'sauce', 15000.00, 25, 9),
(23, 'Oeuf', 'Grillé', 25000.00, 40, 7),
(24, 'Tilapia', 'Grillé', 35000.00, 25, 9),
(25, 'Riz', '', 20000.00, 40, 8),
(26, 'Viande de chévre', 'avec frites', 40000.00, 25, 8),
(27, 'Oeuf avec frites', '', 25000.00, 15, 7),
(28, 'Oeuf avec spagheti', '', 25000.00, 10, 7),
(29, 'Coca', '', 10000.00, 49, 10),
(30, 'Fanta', '', 10000.00, 40, 10),
(31, 'Sprite', '', 10000.00, 55, 10),
(32, 'Simba', '', 14000.00, 56, 10),
(33, 'Castel', '', 14000.00, 56, 10),
(34, 'Pepsi', '', 10000.00, 25, 10),
(35, 'Doppel', '', 13000.00, 56, 10),
(36, 'Heineken', '', 10000.00, 25, 10),
(37, 'Guinness', '', 12000.00, 25, 10),
(38, '33Export', '', 12000.00, 40, 10),
(39, 'Amarula', '', 20000.00, 56, 10),
(40, 'KIK', '', 15000.00, 56, 6),
(41, 'PUIPU', '', 10000.00, 25, 6),
(42, 'P%OIUYT', '', 16000.00, 15, 6),
(43, 'OUYT', '', 10000.00, 10, 6),
(44, 'POI', '', 20000.00, 15, 6),
(45, 'POIUJHG', '', 18000.00, 15, 6),
(46, 'POIUY', '', 16000.00, 25, 6),
(47, 'PIUY', '', 16000.00, 15, 7),
(48, 'OIU', '', 20000.00, 15, 7),
(49, '¨POIUYT', '', 25000.00, 25, 7),
(50, '¨9YT', '', 20000.00, 15, 7),
(52, 'BV', '', 25000.00, 25, 8),
(53, 'POI', '', 25000.00, 15, 8),
(54, 'JH', '', 20000.00, 40, 8),
(55, 'KJ', '', 25000.00, 25, 8),
(56, 'OLJH', '', 20000.00, 40, 8),
(57, 'Savana', '', 15000.00, 20, 10),
(59, '¨PIUY', '', 25000.00, 50, 8),
(60, '£¨POI', '', 30000.00, 20, 8),
(61, '£¨POIU', '', 30000.00, 20, 8),
(62, 'OIUYT', '', 30000.00, 15, 8),
(63, '%IU', '', 15000.00, 15, 6),
(64, 'POIUY', '', 20000.00, 50, 6),
(65, '£¨POIUYT', '', 20000.00, 20, 6),
(66, 'POIUY', '', 20000.00, 20, 7),
(67, '£¨POI', '', 25000.00, 20, 7),
(68, 'POIUY', '', 25000.00, 50, 7),
(69, 'PHG', '', 20000.00, 15, 7);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `nombrePersonne` int NOT NULL,
  `statutRes` set('en attente','approuver','refuser','') NOT NULL DEFAULT 'en attente',
  `commentaire` varchar(255) NOT NULL,
  `creerLe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUtilisateur` int NOT NULL,
  `emailClient` varchar(255) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `date`, `heure`, `nombrePersonne`, `statutRes`, `commentaire`, `creerLe`, `idUtilisateur`, `emailClient`) VALUES
(7, '2024-07-18', '11:15:00', 6, 'en attente', 'mjdcl nvlbvnvm;lm  bm', '2024-07-13 11:15:03', 2, 'sindanidivinds@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `telephone` varchar(22) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.gif',
  `creerLe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifierLe` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `sexe`, `email`, `motdepasse`, `estAdmin`, `telephone`, `avatar`, `creerLe`, `modifierLe`) VALUES
(1, 'JUDE MPOYO', 'M', 'mpoyojude0@gmail.com', '$2y$10$5qhO/4ojH/739ZCVFIwPLu6gu3o1EG1BKVeNboKJXd3p4wmIZ3Hhe', 1, '0975889135', 'default.gif', '2024-06-24 15:45:37', NULL),
(2, 'Divin sindani', 'M', 'sindanidivinds@gmail.com', '$2y$10$5qhO/4ojH/739ZCVFIwPLu6gu3o1EG1BKVeNboKJXd3p4wmIZ3Hhe', 0, '0975889135', 'default.gif', '2024-06-24 15:45:37', NULL),
(3, 'Pascal', 'M', 'mangalapascal5@gmail.com', '$2y$10$M1eKBZjkGIX4EH6cpeLcKuYuaWjJwJu.aY4Jp3m1vjnoogQn9Phpu', 0, '0975381764', '1720187220_c025ecd1-3ba3-4eac-8e14-a4f1cdeeb042.jpeg', '2024-07-05 15:46:13', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurtemporaire`
--

DROP TABLE IF EXISTS `utilisateurtemporaire`;
CREATE TABLE IF NOT EXISTS `utilisateurtemporaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  `codeCofirrmation` int NOT NULL,
  `estConfirmer` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurtemporaire`
--

INSERT INTO `utilisateurtemporaire` (`id`, `email`, `codeCofirrmation`, `estConfirmer`) VALUES
(1, 'mpoyojude0@gmail.com', 108544, 1),
(2, 'jd@gmail.com', 123456, 0),
(3, 'nyangagaga@gmail.com', 903378, 0),
(4, 'mangalapascal5@gmail.com', 210502, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD CONSTRAINT `detailcommande_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`),
  ADD CONSTRAINT `detailcommande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Contraintes pour la table `imageplat`
--
ALTER TABLE `imageplat`
  ADD CONSTRAINT `imageplat_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
