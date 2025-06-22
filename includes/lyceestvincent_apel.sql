-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 juin 2025 à 15:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lyceestvincent_apel`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id_carte` int(11) NOT NULL,
  `num_carte` int(11) DEFAULT NULL,
  `id_uti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cheque`
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
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `libelle_classe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `libelle_classe`) VALUES
(1, 'Seconde'),
(2, 'Premiere'),
(3, 'Terminale');

-- --------------------------------------------------------

--
-- Structure de la table `debit`
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_uti` int(11) NOT NULL,
  `role_uti` varchar(255) DEFAULT NULL,
  `id_classe` int(11) NOT NULL,
  `date_nai_uti` date DEFAULT NULL,
  `nom_uti` varchar(255) DEFAULT NULL,
  `prenom_uti` varchar(255) DEFAULT NULL,
  `email_uti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_uti`, `role_uti`, `id_classe`, `date_nai_uti`, `nom_uti`, `prenom_uti`, `email_uti`) VALUES
(1, 'eleve', 3, '2005-09-19', 'Benkherouf', 'Sofiane', NULL),
(2, 'admin', 3, '2011-11-11', 'Idasiak', 'Mikael', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_carte`),
  ADD KEY `fk_id_user_carte` (`id_uti`);

--
-- Index pour la table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`),
  ADD KEY `fk_id_user` (`id_uti`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id_debit`),
  ADD KEY `fk_id_carte` (`id_carte`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_uti`),
  ADD KEY `fk_id_user_classe` (`id_classe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_uti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `fk_id_user_carte` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Contraintes pour la table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_uti`) REFERENCES `utilisateur` (`id_uti`);

--
-- Contraintes pour la table `debit`
--
ALTER TABLE `debit`
  ADD CONSTRAINT `fk_id_carte` FOREIGN KEY (`id_carte`) REFERENCES `carte` (`id_carte`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_id_user_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
