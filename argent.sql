-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 jan. 2022 à 17:53
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `argent`
CREATE DATABASE IF NOT EXISTS `argent` CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `id_operation` int(11) NOT NULL,
  `date` date NOT NULL,
  `emmission` varchar(255) NOT NULL,
  `nom_client_E` varchar(255) NOT NULL,
  `solde` int(30) NOT NULL,
  `impot` int(8) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `num_tel` int(8) NOT NULL,
  `SSB` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id_operation`, `date`, `emmission`, `nom_client_E`, `solde`, `impot`, `destination`, `num_tel`, `SSB`) VALUES
(7, '2022-01-07', 'اركيز', 'salem', 8000, 250, 'lvirigue', 46565656, 'تم التسليم'),
(8, '2022-01-07', 'اركيز', 'nabgha', 9000, 500, 'ali', 48949494, 'تم التسليم'),
(11, '2022-01-07', 'اركيز', 'عرفات', 12000, 250, 'غلام', 43434343, 'تم التسليم'),
(12, '2022-01-07', 'اركيز', 'كرفور لحطب', 20000, 5000, 'يعقوب', 36363636, 'تم التسليم'),
(16, '2022-01-13', 'التيشطيات', 'Ahmedou Salem', 5000, 250, 'df', 36977373, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(8, 'Pure Coding', 'purecodingofficial@gmail.com', '0139a3c5cf42394be982e766c93f5ed0'),
(9, 'Ahmedou', 'ahmedou@gmail.com', '90762d012cef522fb01e3f97cef5a059'),
(10, 'Ahmed', 'ahmed@gmail.com', '3931719db7ab5349cf440bb5932f718b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id_operation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `id_operation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
