-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 sep. 2022 à 09:19
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCom` int(11) NOT NULL,
  `description` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCom`, `description`, `utilisateur_id`) VALUES
(1, 'ceci est un com de Laurent', 4),
(2, 'Veuillez ajouter votre commentaire', 4),
(3, 'test', 5),
(6, 'Commentaire de Laurent', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Prenom` text NOT NULL,
  `password` text NOT NULL,
  `Email` text NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `DateNaissance` date DEFAULT current_timestamp(),
  `NumCB` bigint(16) NOT NULL,
  `Ville` varchar(164) NOT NULL,
  `Permission` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Prenom`, `password`, `Email`, `Nom`, `DateNaissance`, `NumCB`, `Ville`, `Permission`) VALUES
(1, 'SGBD', '77e7e78b05578758626744dcdf57007c71797399', 'root@gmail.com', 'SGBD', '2022-09-19', 9999999999999999, 'Villejuif', 2),
(2, 'Admin', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'admin@gmail.com', 'Admin', '2022-09-19', 0, 'Villemort', 1),
(3, 'Clement', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Clement.gras@efrei.net', 'Gras', '2000-01-11', 1234123412341234, 'Paris', 0),
(4, 'Laurent', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'laurent.huart@efrei.net', 'Huart', '2002-06-14', 1597159715971597, 'Villejuif', 0),
(5, 'Maxime', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'maxime.montavon@efrei.net', 'Montavon', '2001-07-21', 1234123412341234, 'Lille', 0),
(6, 'Alina', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'alina.castellan@efrei.net', 'Castellan', '2001-09-09', 2345234523452345, 'Villejuif', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `commentaire_ibfk_1` (`utilisateur_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
