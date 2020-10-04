-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 04 oct. 2020 à 17:35
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banque_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `AccountID` int(15) NOT NULL,
  `ownerID` int(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `CreationDate` date NOT NULL,
  `Rate` int(2) NOT NULL,
  `DiscoveredMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`AccountID`, `ownerID`, `type`, `amount`, `CreationDate`, `Rate`, `DiscoveredMax`) VALUES
(1, 1, 'compte courant', 1000, '2020-10-04', 0, 1000),
(2, 1, 'livret A', 200, '2020-10-04', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Birth` date NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` mediumint(6) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Password`, `Email`, `Firstname`, `Lastname`, `Birth`, `Adress`, `City`, `PostalCode`, `Phone`, `Category`) VALUES
(1, '', 'antoine.chemin@free.fr', 'Chemin', 'Antoine', '0000-00-00', '25 rue du terrain', 'rouen', 76100, '0620961766', ''),
(3, 'motdepasse', 'agnesnomrandie@hotmail.com', 'Chemin', 'Agnes', '0000-00-00', '25 rue du terrain', 'rouen', 76100, '0606060606', '');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `operationID` int(15) NOT NULL,
  `account` int(15) NOT NULL,
  `typeOf` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `amount` int(15) NOT NULL,
  `allowed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`operationID`, `account`, `typeOf`, `date`, `amount`, `allowed`) VALUES
(1, 1, 'retrait', '2020-10-04', 100, 'yes'),
(2, 2, 'depot', '0000-00-00', 100, 'yes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`operationID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `operationID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
