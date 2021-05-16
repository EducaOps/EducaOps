-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 16 mai 2021 à 13:58
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BD_EducaOps`
--
CREATE DATABASE IF NOT EXISTS `BD_EducaOps` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `BD_EducaOps`;

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`%` PROCEDURE `GetUtilisateurEducaOps` ()  BEGIN
    SELECT U.UtiNomComplet , RU.NomRole FROM Utilisateur U INNER JOIN RoleUtilisateur RU
ON U.UtiRole = RU.IDRole;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `GetVerifUtilisateurExist` (`EmailUtilisateur` VARCHAR(100), `MotDePasse` VARCHAR(100))  BEGIN
    SELECT
        U.UtiNomComplet,
        RU.NomRole,
        U.UtiRole

    FROM Utilisateur U INNER JOIN RoleUtilisateur RU
    ON U.UtiRole = RU.IDRole
    WHERE
            UtiEmail = EmailUtilisateur
      AND
            UtiMotDePasse = MotDePasse;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `Insertion_Tache` (IN `P_Titre_Tache` CHAR(40), `P_Description_Tache` CHAR(250), `P_Avancement_Tache` INT)  BEGIN
INSERT INTO tache (Titre_Tache, Description_Tache, Avancement_Tache) VALUES (P_Titre_Tache, P_Description_Tache, P_Avancement_Tache);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `Modification_Tache` (IN `P_ID_Tache` INT, `P_Titre_Tache` CHAR(40), `P_Description_Tache` CHAR(250), `P_Avancement_Tache` INT)  BEGIN
UPDATE tache  SET Titre_Tache = P_Titre_Tache, Description_Tache = P_Description_Tache, Avancement_Tache = P_Avancement_Tache WHERE ID_Tache = P_ID_Tache;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `SetUtilisateurEducaOps` (`NomUti` VARCHAR(38), `GroupUti` INT, `EmailUti` VARCHAR(100), `MotDePasse` VARCHAR(100))  BEGIN
    INSERT INTO Utilisateur (UtiNomComplet, UtiGroupe, UtiEmail, UtiMotDePasse)
    VALUE (NomUti, GroupUti, EmailUti, MotDePasse);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `Supression_Tache` (IN `P_ID_Tache` INT)  BEGIN
DELETE From tache WHERE ID_Tache = P_ID_Tache;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `Tache_En_Cour` ()  BEGIN
SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 0;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `Tache_Fini` ()  BEGIN
SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Assigner`
--

CREATE TABLE `Assigner` (
  `UtiEmail` varchar(100) NOT NULL,
  `IdTache` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RoleUtilisateur`
--

CREATE TABLE `RoleUtilisateur` (
  `IDRole` int NOT NULL,
  `NomRole` varchar(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `RoleUtilisateur`
--

INSERT INTO `RoleUtilisateur` (`IDRole`, `NomRole`) VALUES
(0, 'Admin'),
(1, 'Professeur'),
(2, 'Elève');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `ID_Tache` int NOT NULL,
  `Titre_Tache` varchar(40) NOT NULL,
  `Description_Tache` varchar(400) NOT NULL,
  `Avancement_Tache` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`ID_Tache`, `Titre_Tache`, `Description_Tache`, `Avancement_Tache`) VALUES
(20, 'Une nouvelle taches pour l\'utilisateur', 'Bienvenue sur cette tache', 0),
(21, 'C\'est juste une idée', 'Bienvenue pour cette idée', 0),
(22, 'Encore un bug', 'Le bug doit étres résolu', 0),
(24, 'Faire un MCD', 'Compléter la description avec un MLD', 1),
(25, 'Faire un devis pour des serveurs', 'Il nous faut un serveur capable d\'utiliser des technologie web et des base de données relationnel c\'est comme ça que sa marche bien', 0),
(26, 'Finir la documentation technique', 'La doc et bien finie', 1),
(27, 'Faire une maquette du projet', 'Maquette OK', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `UtiNomComplet` varchar(100) NOT NULL,
  `UtiRole` int NOT NULL,
  `UtiEmail` varchar(100) NOT NULL,
  `UtiMotDePasse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`UtiNomComplet`, `UtiRole`, `UtiEmail`, `UtiMotDePasse`) VALUES
('AntoninL', 0, 'antonin.lemoine@gmail.com', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Assigner`
--
ALTER TABLE `Assigner`
  ADD PRIMARY KEY (`UtiEmail`,`IdTache`),
  ADD KEY `FK_ASSIGNER_TACHE` (`IdTache`);

--
-- Index pour la table `RoleUtilisateur`
--
ALTER TABLE `RoleUtilisateur`
  ADD PRIMARY KEY (`IDRole`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`ID_Tache`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`UtiEmail`),
  ADD KEY `FK_UTILISATEUR_ROLE` (`UtiRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `RoleUtilisateur`
--
ALTER TABLE `RoleUtilisateur`
  MODIFY `IDRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `ID_Tache` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Assigner`
--
ALTER TABLE `Assigner`
  ADD CONSTRAINT `FK_ASSIGNER_TACHE` FOREIGN KEY (`IdTache`) REFERENCES `tache` (`ID_Tache`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ASSIGNER_UTILISATEUR` FOREIGN KEY (`UtiEmail`) REFERENCES `Utilisateur` (`UtiEmail`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `FK_UTILISATEUR_ROLE` FOREIGN KEY (`UtiRole`) REFERENCES `RoleUtilisateur` (`IDRole`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
