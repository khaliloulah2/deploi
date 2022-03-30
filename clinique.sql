-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 mars 2022 à 19:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `date` date NOT NULL,
  `temperature` int(11) NOT NULL,
  `tension` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  PRIMARY KEY (`date`),
  KEY `idm` (`idm`),
  KEY `idp` (`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`date`, `temperature`, `tension`, `idm`, `idp`) VALUES
('2022-03-08', 37, 14, 1, 7),
('2022-03-09', 37, 14, 1, 9),
('2022-03-16', 37, 14, 1, 1),
('2022-03-23', 37, 12, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `profile`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'download.jpg', 'Nikhil', 'Bhalerao', 'admin@admin.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motPass` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `idrole` int(11) NOT NULL,
  `pres` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idrole` (`idrole`),
  KEY `specialite` (`specialite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `login`, `motPass`, `specialite`, `idrole`, `pres`) VALUES
(1, 'Dr camara', 'ibou1', 'ibou123', 'generaliste', 2, 2),
(2, 'Dr diop', 'diop', 'diop1', 'ophtalpmologie', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

DROP TABLE IF EXISTS `ordonnance`;
CREATE TABLE IF NOT EXISTS `ordonnance` (
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `posologie` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motPass` varchar(255) NOT NULL,
  `idrole` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `idrole` (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`code`, `nom`, `prenom`, `login`, `motPass`, `idrole`) VALUES
(1, 'lo', 'alex', 'patient1', 'pat123', 1),
(6, 'sy', 'wiz', 'wiz', 'pas123', 1),
(7, 'skzz', 'kil', 'gf451', 'jirjhigrzt', 1),
(8, 'SOUMARE', 'Ibrahima', 'patient1', 'passe', 1),
(9, 'ly', 'amadou', 'ly123', 'ly123', 1),
(10, 'S', 'wiz', 'ibou1', 'ibou', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `date` date NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `idp` int(11) NOT NULL,
  PRIMARY KEY (`date`),
  KEY `idp` (`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`date`, `libelle`, `idp`) VALUES
('2022-03-09', 'analyse', 6),
('2022-03-15', 'radio', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'patient'),
(2, 'medecin'),
(3, 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `rp`
--

DROP TABLE IF EXISTS `rp`;
CREATE TABLE IF NOT EXISTS `rp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idrp` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `motPass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`idrp`),
  KEY `idrp` (`idrp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rp`
--

INSERT INTO `rp` (`id`, `idrp`, `login`, `motPass`) VALUES
(1, 1, 'iso', 'iso');

-- --------------------------------------------------------

--
-- Structure de la table `rv`
--

DROP TABLE IF EXISTS `rv`;
CREATE TABLE IF NOT EXISTS `rv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `nommed` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `number` int(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `statut` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medecin` (`nommed`),
  KEY `idm` (`nommed`),
  KEY `idm_2` (`nommed`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rv`
--

INSERT INTO `rv` (`id`, `service`, `nommed`, `date`, `time`, `nom`, `prenom`, `number`, `email`, `statut`) VALUES
(1, 'consultation', 'Dr camara', '2022-03-17', '16:11:00', 'SOUMARE', ' ibrahima', 773453434, 'isco@gmail.com', 0),
(2, 'consultation', 'Dr camara', '2022-03-10', '22:52:00', 'SOUMARE', 'Ibrahima', 778265424, 'isco23@gmail.com', 0),
(3, 'consultation', 'Dr camara', '2022-03-09', '18:47:00', 'skz', 'wiz', 773848383, 'isco@gmail.com', NULL),
(4, 'prestation', 'Dr camara', '2022-03-24', '23:03:00', 'S', 'jbjbj', 773848383, 'isco@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

DROP TABLE IF EXISTS `secretaire`;
CREATE TABLE IF NOT EXISTS `secretaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ids` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `login` varchar(20) NOT NULL,
  `motPass` varchar(20) NOT NULL,
  `idrole` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ids` (`ids`),
  KEY `idrole` (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`id`, `ids`, `statut`, `login`, `motPass`, `idrole`) VALUES
(1, 1, 0, 'isi', 'isikm', 3);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`libelle`) VALUES
('consultation'),
('prestation');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`idm`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `patient` (`code`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `prestation_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `patient` (`code`);

--
-- Contraintes pour la table `rp`
--
ALTER TABLE `rp`
  ADD CONSTRAINT `rp_ibfk_1` FOREIGN KEY (`idrp`) REFERENCES `prestation` (`idp`);

--
-- Contraintes pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD CONSTRAINT `secretaire_ibfk_1` FOREIGN KEY (`ids`) REFERENCES `rv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
