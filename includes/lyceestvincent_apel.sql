-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-lyceestvincent.alwaysdata.net
-- Generation Time: Jun 16, 2025 at 03:43 PM
-- Server version: 10.11.13-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyceestvincent_apel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carte`
--

CREATE TABLE `carte` (
  `id_carte` int(11) NOT NULL,
  `num_carte` int(11) DEFAULT NULL,
  `id_uti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id_cheque` int(11) NOT NULL,
  `num_cheque` varchar(255) DEFAULT NULL,
  `personne_cheque` date DEFAULT NULL,
  `mtn_encaisse_cheque` float DEFAULT NULL,
  `mtn_rendu_cheque` float DEFAULT NULL,
  `com_cheque` varchar(255) DEFAULT NULL,
  `date_encaisse_cheque` datetime DEFAULT NULL,
  `date_rendu_cheque` datetime DEFAULT NULL,
  `id_uti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `libelle_classe` varchar(255) DEFAULT NULL,
  `id_uti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id_debit` int(11) NOT NULL,
  `mtn_debit` float DEFAULT NULL,
  `date_debit` date DEFAULT NULL,
  `com_debit` varchar(255) NOT NULL,
  `id_carte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_uti` int(11) NOT NULL,
  `role_uti` varchar(255) DEFAULT NULL,
  `date_nai_uti` date DEFAULT NULL,
  `nom_uti` varchar(255) DEFAULT NULL,
  `prenom_uti` varchar(255) DEFAULT NULL,
  `email_uti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_carte`),
  ADD KEY `fk_id_user_carte` (`id_uti`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`),
  ADD KEY `fk_id_user` (`id_uti`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `fk_id_user_classe` (`id_uti`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id_debit`),
  ADD KEY `fk_id_carte` (`id_carte`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_uti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_uti` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `fk_id_user_carte` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Constraints for table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_id_user_classe` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Constraints for table `debit`
--
ALTER TABLE `debit`
  ADD CONSTRAINT `fk_id_carte` FOREIGN KEY (`id_carte`) REFERENCES `carte` (`id_carte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
