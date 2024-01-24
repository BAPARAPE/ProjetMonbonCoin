-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 16 avr. 2023 à 23:50
-- Version du serveur :  10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `Nomm` varchar(300) NOT NULL,
  `Venlo` text NOT NULL,
  `Descrip` varchar(300) NOT NULL,
  `Prix` double NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`fid`, `uid`, `vid`, `date_ajout`, `Nomm`, `Venlo`, `Descrip`, `Prix`, `Ville`, `image`) VALUES
(8, 14, 21, '2023-03-30 12:51:42', 'Volkswagen T-Roc 1.5 TSI ACT Carat', 'En Vente', 'Carburant: Essence; Transmission: Boite de vitesse Manuelle; KilomÃ©trage: 94119km; Puissance: 150 CV/110kW; Classe du VÃ©hicule: SUV Couleur Gris', 35000, 'Saint-MandÃ©(94160)', 'Volkswagen T-Roc 1.5 TSI ACT Carat.jpg'),
(10, 16, 21, '2023-03-30 14:54:07', 'Volkswagen T-Roc 1.5 TSI ACT Carat', 'En Location', 'Carburant: Essence; Transmission: Boite de vitesse Manuelle; KilomÃ©trage: 94119km; Puissance: 150 CV/110kW; Classe du VÃ©hicule: SUV Couleur Gris', 32000, 'Saint-MandÃ©(94160)', 'Volkswagen T-Roc 1.5 TSI ACT Carat.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonce` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `destinataire` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idm`),
  KEY `annonce` (`id_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idm`, `id_annonce`, `nom`, `destinataire`, `message`, `date`) VALUES
(15, 21, 'Jean', 'tous', 'Bonjour', '2023-03-30 14:59:17');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(30) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `criptmdp` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `nom`, `mail`, `tel`, `criptmdp`) VALUES
(12, 'William levy', 'will@gmail.com', '0788965745', '9ad86573facb8948c995e632c5aa0e85'),
(10, 'Mariam FOFANA', 'mariam@gmail.com', '+33950962484', 'b5d3c177f6d0575bcad2f4944a35981d'),
(11, 'Doja', 'doja@gmail.com', '07 00 00 00 00', 'eb57dd828a8fd7426d6b9d88ab7047aa'),
(13, 'Rayane', 'rayanebaparape@gmail.com', '+33 7 53 18 13 12', 'e807f1fcf82d132f9bb018ca6738a19f'),
(14, 'Onel', 'Onel@gmail.com', '+33 7 58 44 05 09', 'e807f1fcf82d132f9bb018ca6738a19f'),
(15, 'Anice', 'anice@gmail.com', '+33 7 58 44 05 07 ', 'e807f1fcf82d132f9bb018ca6738a19f'),
(16, 'Jean', 'jean@gmail.com', '+33 7 58 44 05 07 ', '781e5e245d69b566979b86e28d23f2c7');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `vid` int(200) NOT NULL AUTO_INCREMENT,
  `uid` int(30) NOT NULL,
  `Nomm` varchar(300) NOT NULL,
  `Venlo` varchar(300) NOT NULL,
  `Descrip` text NOT NULL,
  `Prix` varchar(300) NOT NULL,
  `Ville` text NOT NULL,
  `image` varchar(2000) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`vid`, `uid`, `Nomm`, `Venlo`, `Descrip`, `Prix`, `Ville`, `image`) VALUES
(21, 13, 'Volkswagen T-Roc 1.5 TSI ACT Carat', 'En Location', 'Carburant: Essence; Transmission: Boite de vitesse Manuelle; KilomÃ©trage: 94119km; Puissance: 150 CV/110kW; Classe du VÃ©hicule: SUV Couleur Gris', '32000', 'Saint-MandÃ©(94160)', 'Volkswagen T-Roc 1.5 TSI ACT Carat.jpg'),
(23, 14, 'Modele X Propusion', 'En Vente', 'Coloris blanc perle Jantes Aero 18\" IntÃ©rieur Premium partiel noir; Autopilot Essai de Connexion Premium pendant 30 jours', '64000', 'Meudon(77000)', 'Modele X Propusion.jpg'),
(24, 13, 'BMW M3 Serie1', 'En Vente', 'Carburant: Essence; Transmission: Boite Ã  vitesse Manuelle; KilomÃ©trage: 94119km; Puissance: 150 CV/110kW; Classe du VÃ©hicule: SUV Couleur Gris', '48000', 'Paris(75013)', 'BMW M3 Serie1.jpg'),
(25, 16, 'Range rover yeiuerit', 'En Location', 'gyrfiuriuotrutbhjfgrjg', '13000', 'vincennes', 'Range rover yeiuerit.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `voiture` (`vid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
