-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 jan. 2024 à 21:13
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agri`
--
CREATE DATABASE IF NOT EXISTS `agri` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agri`;

-- --------------------------------------------------------

--
-- Structure de la table `systemsetting`
--

DROP TABLE IF EXISTS `systemsetting`;
CREATE TABLE IF NOT EXISTS `systemsetting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projectname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `coverimg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `systemsetting`
--

INSERT INTO `systemsetting` (`id`, `projectname`, `name`, `email`, `contact`, `adress`, `coverimg`) VALUES
(1, 'AGRI PROJECT', 'Jude Mpoyo', 'mpoyojude0@gmail.com', '+243975889135', 'Av. Rashidi/Q. Kasapa/C. Annexe/ Lubumbashi', 'judepic.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `tempuser`
--

DROP TABLE IF EXISTS `tempuser`;
CREATE TABLE IF NOT EXISTS `tempuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmationcode` int NOT NULL,
  `isconfirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tempuser`
--

INSERT INTO `tempuser` (`id`, `email`, `confirmationcode`, `isconfirmed`) VALUES
(16, 'erdogankross76@gmail.com', 400726, 0),
(1, 'mpoyojude01@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1 = admin, 2 = customer',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.gif',
  `about` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'apropos de moi',
  `profession` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'empty profession',
  `adress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'xxx/xx',
  `country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'RDC',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `username`, `sex`, `email`, `phone`, `password`, `type`, `avatar`, `about`, `profession`, `adress`, `country`, `date`) VALUES
(1, 'mpoyo', 'jude', 'admin', 'M', 'mpoyojude0@gmail.com', '+243975889135', '$2y$10$fROdQhgWp1YA06xepSXmh.HvfBZthNjVRT3syHxveGODmIYJEMTie', 1, 'judepic.jpeg', 'je suis un developpeur web passionné par la programmation j&amp;#39;étudie à l&amp;#39;isc lubumbashi', 'Web Developper', 'Av. Rashidi/Q. Kasapa/C. Annexe', 'RDC', '2024-01-03 00:00:00'),
(2, 'jude', 'mpoyo', 'Jmpoyo', 'M', 'mpoyojude0@gmai', '+243975889135', '$2y$10$fROdQhgWp1YA06xepSXmh.HvfBZthNjVRT3syHxveGODmIYJEMTie', 2, '', 'apropos de moi', 'empty profession', 'xxx/xx', 'RDC', '2024-01-04 00:00:00'),
(3, 'anonymous', 'anonymous', 'anonymous', 'M', 'anonymous@gmail.com', '+243975889135', '$2y$10$NC.k7J2x6AMZylNyHlowQOoUmbZc8Cjb0ip1mqGyX9oRseSwZ40Ae', 2, 'default.gif', 'apropos de moi', 'empty profession', 'xxx/xx', 'RDC', '2024-01-08 16:37:14'),
(4, 'mpoyo', 'jude', 'mpoyo', 'M', 'mpoyojude01@gmail.com', '+243975889135', '$2y$10$ZeSDMb6kNlrk18x4WT5eNuaRjaQw35buIQq1AD2JvGNwGlq4wAj6G', 2, '1705334640_2.jpg', 'apropos de moi', 'empty profession', 'xxx/xx', 'RDC', '2024-01-15 17:42:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
