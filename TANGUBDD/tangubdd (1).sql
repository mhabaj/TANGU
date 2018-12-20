-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 déc. 2018 à 00:52
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tangubdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `arc`
--

DROP TABLE IF EXISTS `arc`;
CREATE TABLE IF NOT EXISTS `arc` (
  `ID_ARC` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `NOMARC` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `POIDSARC` tinyint(4) NOT NULL,
  `TAILLEARC` tinyint(4) NOT NULL,
  `PWRARC` tinyint(4) NOT NULL,
  `TYPEARC` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PHOTOARC` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  `COMMARC` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ARC`),
  KEY `FK_POSSEDE_BLASON2` (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `blason`
--

DROP TABLE IF EXISTS `blason`;
CREATE TABLE IF NOT EXISTS `blason` (
  `ID_BLAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `NOMBLAS` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `TAILLEBLAS` tinyint(4) NOT NULL,
  `PHOTOBLAS` varchar(1024) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_BLAS`),
  KEY `FK_POSSEDE_BLASON` (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `ID_ENT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ENT_USER` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_ARC` int(11) NOT NULL,
  `ID_BLAS` int(11) NOT NULL,
  `NOM_ENT` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `LIEU_ENT` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `DATE_ENT` datetime NOT NULL,
  `DIST_ENT` tinyint(4) NOT NULL,
  `NBR_SERIE` int(11) NOT NULL,
  `NBR_VOLEE` int(11) NOT NULL,
  `NBR_FLECHES` tinyint(4) NOT NULL,
  `PTS_TOTAL` smallint(6) DEFAULT NULL,
  `PCT_DIX` float DEFAULT NULL,
  `PCT_NEUF` float DEFAULT NULL,
  `MOY_ENT` double DEFAULT NULL,
  `STATUT_ENT` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_ENT`,`ID_ENT_USER`),
  KEY `FK_POSSEDE_ENTRAINEMENT` (`ID_USER`),
  KEY `FK_UTILISE` (`ID_ARC`),
  KEY `FK_UTILISE2` (`ID_BLAS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fleche`
--

DROP TABLE IF EXISTS `fleche`;
CREATE TABLE IF NOT EXISTS `fleche` (
  `ID_FLECHE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_VOL` int(11) NOT NULL,
  `NUMFLECHE` int(11) NOT NULL,
  `PTSFLECHE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID_FLECHE`),
  KEY `FK_COMPOSEE4` (`ID_VOL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `ID_SERIE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ENT_USER` int(11) NOT NULL,
  `NUMSERIE` int(11) NOT NULL,
  `PTSSERIE` smallint(6) DEFAULT NULL,
  `NBRVOLSERIE` tinyint(4) NOT NULL,
  `MOYSERIE` double DEFAULT NULL,
  `PCTDIXSERIE` double DEFAULT NULL,
  `PCTHUITSERIE` double DEFAULT NULL,
  `ID_ENT` int(11) NOT NULL,
  PRIMARY KEY (`ID_SERIE`),
  KEY `FK_COMPOSEE` (`ID_ENT`,`ID_ENT_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `PSEUDO` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `PASSWORD` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `NOM` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `PRENOM` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `CLUB` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `volee`
--

DROP TABLE IF EXISTS `volee`;
CREATE TABLE IF NOT EXISTS `volee` (
  `ID_VOL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERIE` int(11) NOT NULL,
  `NUMVOLEE` int(11) DEFAULT NULL,
  `PTSVOL` smallint(6) DEFAULT NULL,
  `NBRFLECHEVOL` tinyint(4) NOT NULL,
  `MOYVOL` double DEFAULT NULL,
  `PCTDIXVOL` double DEFAULT NULL,
  `PCTHUITVOL` double DEFAULT NULL,
  PRIMARY KEY (`ID_VOL`),
  KEY `FK_COMPOSEE3` (`ID_SERIE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
