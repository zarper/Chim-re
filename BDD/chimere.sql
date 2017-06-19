-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Juin 2017 à 15:37
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chimere`
--

-- --------------------------------------------------------

--
-- Structure de la table `bijoux`
--

CREATE TABLE `bijoux` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `cout` int(11) NOT NULL,
  `datedebprev` datetime NOT NULL,
  `datefinprev` datetime NOT NULL,
  `datedeb` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `bijoux`
--

INSERT INTO `bijoux` (`id`, `nom`, `description`, `cout`, `datedebprev`, `datefinprev`, `datedeb`, `datefin`, `client_id`) VALUES
(6, 'Collier tesla', 'bijou de nicolaï tesla', 100, '2017-05-19 00:00:00', '2017-06-22 00:00:00', '2017-05-19 00:00:00', '2017-06-16 18:33:32', 1),
(8, 'bijoux tolstoï', 'bijou de Leon Tolstoï', 99, '2017-05-19 00:00:00', '2017-05-19 00:00:00', '2017-05-19 00:00:00', '2017-05-19 00:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `telephone`, `adresse`) VALUES
(1, 'nicolai', 'tesla', '0752523561', '2 rue jean jaures'),
(3, 'tolstoï', 'leon', '0752741852', '2 rue de la liberté');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `id` int(11) NOT NULL,
  `heuretravail` int(11) NOT NULL,
  `bijou_id_etape` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etape`
--

INSERT INTO `etape` (`id`, `heuretravail`, `bijou_id_etape`, `description`, `photo`) VALUES
(1, 5, 6, 'création de l''arceau du colier', 'bijoux_bague.jpg'),
(3, 8, 6, 'confection du diamant', 'bijoux_collier.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `metier_id`) VALUES
(4, 'chef', 'chef', 'chef@chef.com', 'chef@chef.com', 0, NULL, '$2y$13$JLB/BuBhOdcOalZi3LJD0uu9K3cSaBIP5U5a6xxNPqO15MA7irgfm', '2017-06-16 06:03:34', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 'chef', 'chef', 2),
(5, 'adrienlg', 'adrienlg', 'adrien.legeldron@gmail.com', 'adrien.legeldron@gmail.com', 1, NULL, '$2y$13$vwV0gxIOfZxyUumNuZXM2eCSV/29VU8tBOORmhQqYd1yL/8Zx3Pbi', '2017-06-19 15:31:45', NULL, NULL, 'a:0:{}', NULL, NULL, NULL),
(6, 'administrateur', 'administrateur', 'administrateur@admin.com', 'administrateur@admin.com', 1, NULL, '$2y$13$Ot7kA1bILBdHc.efoCkRGuJNxM/HC0yiCryTkSBJI94MlTYnTs/wi', '2017-06-19 11:04:12', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vu` tinyint(1) NOT NULL,
  `tache_id_incident` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `incident`
--

INSERT INTO `incident` (`id`, `description`, `vu`, `tache_id_incident`) VALUES
(3, 'la perceuse doit être changer', 1, 3),
(7, 'RAS', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `stock_id_materiel` int(11) NOT NULL,
  `tache_id_materiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`id`, `nom`, `quantite`, `stock_id_materiel`, `tache_id_materiel`) VALUES
(1, 'fil de cuivre', 5, 1, 3),
(4, 'barre de fer', 15, 8, 8);

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE `metier` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `metier`
--

INSERT INTO `metier` (`id`, `nom`) VALUES
(1, 'Tailleur'),
(2, 'Fondeur');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `quantitestock` int(11) NOT NULL,
  `seuil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`id`, `nom`, `prix`, `quantitestock`, `seuil`) VALUES
(1, 'cuivre', 5, 50, 45),
(8, 'fer', 15, 20, 10);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `comentaire` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etape_id_tache` int(11) NOT NULL,
  `user_id_tache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `description`, `datedebut`, `datefin`, `comentaire`, `etape_id_tache`, `user_id_tache`) VALUES
(3, 'Création du circuit électrique', '2017-06-01 00:00:00', '2017-06-02 23:41:38', 'Ras', 1, 6),
(4, 'Insertion du circuit électrique dans le colier', NULL, NULL, NULL, 1, 6),
(8, 'Création du circuit électrique du collier', '2017-06-14 00:00:00', NULL, NULL, 1, 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bijoux`
--
ALTER TABLE `bijoux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7B5AF50919EB6921` (`client_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_285F75DD2A542F9D` (`bijou_id_etape`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  ADD KEY `IDX_957A6479ED16FA20` (`metier_id`);

--
-- Index pour la table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3D03A11AFED1EAC1` (`tache_id_incident`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_18D2B091DB00FB4A` (`tache_id_materiel`),
  ADD KEY `IDX_18D2B09197C7FA30` (`stock_id_materiel`);

--
-- Index pour la table `metier`
--
ALTER TABLE `metier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_938720756C5803BA` (`etape_id_tache`),
  ADD KEY `IDX_938720759D8F8545` (`user_id_tache`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bijoux`
--
ALTER TABLE `bijoux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `metier`
--
ALTER TABLE `metier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bijoux`
--
ALTER TABLE `bijoux`
  ADD CONSTRAINT `FK_7B5AF50919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `FK_285F75DD2A542F9D` FOREIGN KEY (`bijou_id_etape`) REFERENCES `bijoux` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A6479ED16FA20` FOREIGN KEY (`metier_id`) REFERENCES `metier` (`id`);

--
-- Contraintes pour la table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `FK_3D03A11AFED1EAC1` FOREIGN KEY (`tache_id_incident`) REFERENCES `tache` (`id`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_18D2B09197C7FA30` FOREIGN KEY (`stock_id_materiel`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `FK_18D2B091DB00FB4A` FOREIGN KEY (`tache_id_materiel`) REFERENCES `tache` (`id`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `FK_938720756C5803BA` FOREIGN KEY (`etape_id_tache`) REFERENCES `etape` (`id`),
  ADD CONSTRAINT `FK_938720759D8F8545` FOREIGN KEY (`user_id_tache`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
