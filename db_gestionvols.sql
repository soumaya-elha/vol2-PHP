-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 juin 2020 à 13:10
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_gestionvols`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `Prenom` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `CIN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `Nom`, `Prenom`, `Email`, `tel`, `CIN`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'SH6667', '0697546508'),
(2, 'AAAAA', 'lllllll', 'jjjjjj@jjj.kj', 'hh1234', '0600606060'),
(3, 'AAAAA', 'rrrrr', 'aaaaaaa@bb.col', 'hh1234', '0600606060'),
(4, 'AAAAA', 'rrrrr', 'aaaaaaa@bb.col', '06006060606', 'hhh345'),
(10, 'elhaigoune', 'sssss', 'aaaaaaa@bb.col', 'hh1234', '0675432187'),
(11, '', '', '', 'hh1234', '0600606060'),
(12, '', '', '', '', 'aaaaa'),
(13, '', '', '', 'hh1234', '0600606060'),
(14, 'soumaya', 'rrrrr', 'aaaaaaa@bb.col', 'hh1234', '0600606060'),
(15, '', '', '', '', ''),
(16, '', '', '', '', ''),
(17, 'soumaya', 'sssss', 'aaaaaaa@bb.col', 'hh1234', '0600606060'),
(18, '', '', '', '', ''),
(19, '', '', '', '', ''),
(20, '', '', '', '', ''),
(21, 'elhaigoune', 'rrrrr', 'elhaigoune.soumaya@gmail.com', '06006060606', 'hhh345'),
(22, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idVol` int(11) NOT NULL,
  `date_reseravtion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `idClient`, `idVol`, `date_reseravtion`) VALUES
(1, 1, 3, '2020-05-14 17:17:47'),
(2, 2, 2, '2020-05-18 08:19:19'),
(3, 3, 2, '2020-05-27 12:05:30'),
(4, 4, 2, '2020-05-27 12:05:55'),
(5, 5, 2, '2020-05-27 12:07:07'),
(6, 6, 2, '2020-05-27 12:11:11'),
(7, 7, 2, '2020-05-27 12:22:43'),
(8, 8, 2, '2020-05-27 14:33:13'),
(9, 9, 1, '2020-05-27 16:55:52'),
(10, 10, 2, '2020-05-31 11:46:38'),
(11, 11, 2, '2020-05-31 11:48:57'),
(12, 12, 2, '2020-05-31 11:49:14'),
(13, 13, 2, '2020-05-31 11:49:30'),
(14, 14, 1, '2020-06-01 08:43:29'),
(15, 15, 1, '2020-06-01 08:53:59'),
(16, 16, 1, '2020-06-01 09:17:32'),
(17, 17, 4, '2020-06-01 10:40:53'),
(18, 18, 1, '2020-06-05 15:13:18'),
(19, 19, 1, '2020-06-12 10:58:32'),
(20, 20, 1, '2020-06-12 11:30:40'),
(21, 21, 1, '2020-06-12 12:00:20'),
(22, 22, 1, '2020-06-12 12:09:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `groupeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fullname`, `groupeID`) VALUES
(5, 'taha', '123456', 't@t.om', 'taha srhayar', 1),
(6, 'somaya', '123456', 's@s.com', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `idVol` int(11) NOT NULL,
  `depart` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date_depart` date NOT NULL,
  `time` time NOT NULL,
  `prix` float NOT NULL,
  `place_disponible` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`idVol`, `depart`, `destination`, `date_depart`, `time`, `prix`, `place_disponible`, `display`) VALUES
(1, 'Safi', 'casablanca', '2020-05-28', '12:00:00', 100, 1, 1),
(2, 'dakhla', 'fes', '2020-05-31', '00:00:00', 300, -1, 1),
(3, 'dakhla', 'fes', '2020-06-18', '17:30:00', 300, 10, 1),
(4, 'fes', 'dakhla', '2020-06-18', '17:30:00', 300, 9, 1),
(6, 'XXXXX', 'BBBBB', '2000-03-05', '12:12:00', 1223, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`idVol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `idVol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
