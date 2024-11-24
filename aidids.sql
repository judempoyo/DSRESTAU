-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2024 at 12:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aidids`
--
CREATE DATABASE IF NOT EXISTS `aidids` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `aidids`;

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `IdAdresse` int NOT NULL,
  `avenue` varchar(50) NOT NULL,
  `quartier` int NOT NULL,
  `commune` int NOT NULL,
  `ville` int NOT NULL,
  `IdUtilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `description`, `image`) VALUES
(3, 'dinner', 'dinner', '1719421860_img_1.jpg'),
(4, 'dejeuner', 'dejeunner', '1719491640_img_1.jpg'),
(5, 'boisson', 'boisson non alcoolisé', '1719516900_restaurant-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int NOT NULL,
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
  `ville` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idCommande`, `date`, `montant`, `statut`, `modePaiement`, `dateLIv`, `heureLiv`, `estPaye`, `IdUtilisateur`, `nomClient`, `emailClient`, `TelephoneClient`, `typeCommande`, `avenue`, `quartier`, `commune`, `ville`) VALUES
(1, '2024-06-30 16:20:46', 281880.00, 'approuver', 'Cash', '2024-06-30', '18:30:00', 0, 2, 'Divin sindani', 'sindanidivinds@gmail.com', '0975889135', 'livraison', 'rashidi', 'kasapa', 'annexe', 'lubumbashi'),
(2, '2024-06-30 16:26:45', 96280.00, 'approuver', 'MobileMoney', '2024-07-01', '12:30:00', 0, 2, 'Jude mpoyo', 'mpoyojude0@gmail.com', '0993394079', 'a emporter', '', '', '', ''),
(3, '2024-06-30 17:32:51', 96280.00, 'en attente', 'Cash', '2024-07-29', '08:32:00', 0, 2, 'JUDE MPOYO', 'mpoyojude0@gmail.com', '0975889135', 'livraison', 'rashidi', 'kasapa', 'annexe', 'lubumbashi'),
(4, '2024-06-30 18:16:33', 232000.00, 'approuver', 'Cash', '2024-06-26', '22:30:00', 0, 2, 'JUDE MPOYO', 'mpoyojude0@gmail.com', '0975889135', 'a emporter', 'rashidi', 'kasapa', 'annexe', 'lubumbashi'),
(5, '2024-06-30 18:29:26', 250560.00, 'approuver', 'CarteBancaire', '2024-08-07', '12:30:00', 0, 2, 'JUDE MPOYO', 'mpoyojude0@gmail.com', '0975889135', 'livraison', 'rashidi', 'kasapa', 'annexe', 'lubumbashi'),
(6, '2024-07-05 09:40:42', 185600.00, 'en attente', 'Cash', '2024-07-05', '00:30:00', 0, 2, 'josh', 'joshkaninda@gmail.com', '0894429094', 'livraison', 'av mande mutombo', 'kasapa', 'annexe', 'lubumbashi'),
(7, '2024-07-05 09:41:34', 185600.00, 'en attente', 'Cash', '2024-07-05', '00:30:00', 0, 2, 'josh', 'joshkaninda@gmail.com', '0894429094', 'livraison', 'av mande mutombo', 'kasapa', 'annexe', 'lubumbashi'),
(8, '2024-07-05 14:04:46', 92800.00, 'en attente', 'Cash', '2024-07-19', '14:06:00', 0, 2, 'Divin sindani', 'sindanidivinds@gmail.com', '0975889135', 'a emporter', '', '', '', ''),
(9, '2024-07-05 14:08:25', 92800.00, 'en attente', 'Cash', '2024-07-19', '14:06:00', 0, 2, 'Divin sindani', 'sindanidivinds@gmail.com', '0975889135', 'a emporter', '', '', '', ''),
(10, '2024-07-05 14:09:43', 92800.00, 'en attente', 'Cash', '2024-07-05', '15:00:00', 0, 2, 'josh kaninda', 'joshkaninda@gmail.com', '0975889135', 'livraison', 'av mande mutombo', 'kasapa', 'annexe', 'lubumbashi'),
(11, '2024-07-05 14:17:55', 92800.00, 'en attente', 'MobileMoney', '2024-07-05', '15:15:00', 0, 2, 'josh kaninda', 'joshkaninda@gmail.com', '0975889135', 'livraison', 'av mande mutombo', 'kasapa', 'annexe', 'lubumbashi'),
(12, '2024-07-05 14:19:46', 92800.00, 'en attente', 'MobileMoney', '2024-07-22', '14:23:00', 0, 2, 'Divin sindani', 'sindanidivinds@gmail.com', '0975889135', 'a emporter', 'av mande mutombo', 'kasapa', 'annexe', 'lubumbashi');

-- --------------------------------------------------------

--
-- Table structure for table `detailcommande`
--

CREATE TABLE `detailcommande` (
  `idDetailCommande` int NOT NULL,
  `qte` int NOT NULL,
  `prixUnitaire` int NOT NULL,
  `sousTotal` int NOT NULL,
  `idCommande` int NOT NULL,
  `idPlat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imageplat`
--

CREATE TABLE `imageplat` (
  `idImagePlat` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `idPlat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `imageplat`
--

INSERT INTO `imageplat` (`idImagePlat`, `photo`, `nom`, `idPlat`) VALUES
(2, '1719499980_food_pic.jpg', 'shawarma au chou', 3),
(3, '1719515640_pizza_image.png', 'pizza', 4),
(4, '1719575460_967f2120-e046-4e0b-a07f-4dde3bac3f4d.jpeg', 'Juicy', 6),
(5, '1719575640_1cd31b1e-2559-4180-9c8b-2a39c7047f8f.jpeg', 'Tilapia', 7),
(6, '1719698520_food_pic.jpg', 'tilapia au poulet', 7);

-- --------------------------------------------------------

--
-- Table structure for table `plat`
--

CREATE TABLE `plat` (
  `idPlat` int NOT NULL,
  `nom` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` double(10,2) NOT NULL,
  `qte` int NOT NULL,
  `idCategorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plat`
--

INSERT INTO `plat` (`idPlat`, `nom`, `description`, `prix`, `qte`, `idCategorie`) VALUES
(3, 'shawarma', 'shawarma.....est ideal pour le ...gougougaga est ndnklksl', 20000.00, 7, 4),
(4, 'pizza', 'la pizza est un aliment ideal pour le repas....', 40000.00, 2, 3),
(5, 'fruiticana', 'boisson fruiticana\r\nbdbdbd', 2000.00, 30, 5),
(6, 'juicy', 'boisson juicy\r\nbdbdbd', 1500.00, 45, 5),
(7, 'Tilapia', 'tilapia au poule', 80000.00, 56, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `nombrePersonne` int NOT NULL,
  `statutRes` set('en attente','approuver','refuser','') NOT NULL DEFAULT 'en attente',
  `commentaire` varchar(255) NOT NULL,
  `creerLe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUtilisateur` int NOT NULL,
  `emailClient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `date`, `heure`, `nombrePersonne`, `statutRes`, `commentaire`, `creerLe`, `idUtilisateur`, `emailClient`) VALUES
(1, '2024-06-30', '00:30:00', 2, 'approuver', 'reservation special.....', '2024-06-29 23:27:45', 2, 'mpoyojude0gmail.com'),
(2, '2024-07-29', '15:00:00', 8, 'approuver', 'anniversaire de gael....', '2024-06-29 23:29:29', 2, 'sindanidivinds@gmail.com'),
(3, '2024-08-23', '14:00:00', 8, 'approuver', 'fete de notre defense..........', '2024-06-29 23:32:02', 2, 'mpoyojude0@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `telephone` varchar(22) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.gif',
  `creerLe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifierLe` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `sexe`, `email`, `motdepasse`, `estAdmin`, `telephone`, `avatar`, `creerLe`, `modifierLe`) VALUES
(1, 'JUDE MPOYO', 'M', 'mpoyojude0@gmail.com', '$2y$10$5qhO/4ojH/739ZCVFIwPLu6gu3o1EG1BKVeNboKJXd3p4wmIZ3Hhe', 1, '0975889135', 'default.gif', '2024-06-24 15:45:37', NULL),
(2, 'Divin sindani', 'M', 'sindanidivinds@gmail.com', '$2y$10$5qhO/4ojH/739ZCVFIwPLu6gu3o1EG1BKVeNboKJXd3p4wmIZ3Hhe', 0, '0975889135', 'default.gif', '2024-06-24 15:45:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurtemporaire`
--

CREATE TABLE `utilisateurtemporaire` (
  `id` int NOT NULL,
  `email` varchar(70) NOT NULL,
  `codeCofirrmation` int NOT NULL,
  `estConfirmer` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateurtemporaire`
--

INSERT INTO `utilisateurtemporaire` (`id`, `email`, `codeCofirrmation`, `estConfirmer`) VALUES
(1, 'mpoyojude0@gmail.com', 108544, 1),
(2, 'jd@gmail.com', 123456, 0),
(3, 'nyangagaga@gmail.com', 903378, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`IdAdresse`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `IdUtilisateur` (`IdUtilisateur`);

--
-- Indexes for table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idPlat` (`idPlat`);

--
-- Indexes for table `imageplat`
--
ALTER TABLE `imageplat`
  ADD PRIMARY KEY (`idImagePlat`),
  ADD KEY `idPlat` (`idPlat`);

--
-- Indexes for table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`idPlat`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurtemporaire`
--
ALTER TABLE `utilisateurtemporaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `IdAdresse` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `imageplat`
--
ALTER TABLE `imageplat`
  MODIFY `idImagePlat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plat`
--
ALTER TABLE `plat`
  MODIFY `idPlat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurtemporaire`
--
ALTER TABLE `utilisateurtemporaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`IdUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD CONSTRAINT `detailcommande_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`),
  ADD CONSTRAINT `detailcommande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Constraints for table `imageplat`
--
ALTER TABLE `imageplat`
  ADD CONSTRAINT `imageplat_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`);

--
-- Constraints for table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
