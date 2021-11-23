-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 23 nov. 2021 à 08:18
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afpa-crm`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `email`, `address`, `companyName`, `user_id`) VALUES
(52, 'customer2@email.com', 'address 2', 'companyName2', NULL),
(54, 'customer4@email.com', 'address 4', 'companyName4', NULL),
(55, 'customer5@email.com', 'address 5', 'companyName5', NULL),
(56, 'customer6@email.com', 'address 6', 'companyName6', NULL),
(57, 'customer7@email.com', 'address 7', 'companyName7', NULL),
(58, 'customer8@email.com', 'address 8', 'companyName8', NULL),
(59, 'customer9@email.com', 'address 9', 'companyName9', NULL),
(60, 'customer10@email.com', 'address 10', 'companyName10', NULL),
(61, 'tesyt@t.com', 'blabla', 'gdsfgs', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `sendingAt` date NOT NULL,
  `paidFor` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `amount`, `sendingAt`, `paidFor`, `status`, `customer_id`, `user_id`) VALUES
(31, 6999, '2021-11-16', '2022-03-30', 'CANCEL', NULL, NULL),
(32, 1750, '2021-11-16', '2022-05-27', 'SEND', NULL, NULL),
(33, 8893, '2021-11-16', '2022-01-17', 'CANCEL', NULL, NULL),
(34, 2522, '2021-11-16', '2022-09-03', 'PAID', NULL, NULL),
(35, 1501, '2021-11-16', '2022-04-27', 'PAID', NULL, NULL),
(36, 5247, '2021-11-16', '2022-09-05', 'PAID', NULL, NULL),
(37, 3171, '2021-11-16', '2022-02-24', 'CANCEL', NULL, NULL),
(38, 2735, '2021-11-16', '2021-12-07', 'PAID', NULL, NULL),
(39, 9800, '2021-11-16', '2022-07-27', 'PAID', NULL, NULL),
(40, 813, '2021-11-16', '2022-02-06', 'SEND', NULL, NULL),
(41, 55555555, '2021-11-01', '2021-11-19', 'SEND', NULL, NULL),
(42, 8888888, '2021-11-02', '2021-11-28', 'CANCEL', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
