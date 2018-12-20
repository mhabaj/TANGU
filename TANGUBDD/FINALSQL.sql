-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 déc. 2018 à 00:23
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `arc`
--

INSERT INTO `arc` (`ID_ARC`, `ID_USER`, `NOMARC`, `POIDSARC`, `TAILLEARC`, `PWRARC`, `TYPEARC`, `PHOTOARC`, `COMMARC`) VALUES
(1, 1, 'arc1', 12, 15, 5, 'long', NULL, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `blason`
--

INSERT INTO `blason` (`ID_BLAS`, `ID_USER`, `NOMBLAS`, `TAILLEBLAS`, `PHOTOBLAS`) VALUES
(1, 1, 'blason1', 40, 'rgfghrgbr'),
(2, 1, 'blason2', 60, '4hjht2fjgb5jjbg');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`ID_ENT`, `ID_ENT_USER`, `ID_USER`, `ID_ARC`, `ID_BLAS`, `NOM_ENT`, `LIEU_ENT`, `DATE_ENT`, `DIST_ENT`, `NBR_SERIE`, `NBR_VOLEE`, `NBR_FLECHES`, `PTS_TOTAL`, `PCT_DIX`, `PCT_NEUF`, `MOY_ENT`, `STATUT_ENT`) VALUES
(1, 1001, 1, 1, 1, 'ALED', 'Tours', '2018-11-29 01:01:00', 3, 4, 7, 9, NULL, NULL, NULL, NULL, 1),
(2, 1002, 1, 1, 1, 'Training n1', 'Tours', '2018-12-18 19:50:00', 30, 3, 4, 3, NULL, NULL, NULL, NULL, 1),
(3, 1003, 1, 1, 1, 'uuiuiuhu', 'uujij', '2018-12-13 20:06:00', 12, 2, 3, 2, NULL, NULL, NULL, NULL, 1),
(4, 1004, 1, 1, 1, 'blabla', 'azeaze', '2018-12-12 20:21:00', 20, 2, 2, 3, NULL, NULL, NULL, NULL, 1),
(5, 1005, 1, 1, 1, 'train1', 'tpoursaz', '2019-01-31 22:36:00', 15, 1, 1, 1, NULL, NULL, NULL, NULL, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=314 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `fleche`
--

INSERT INTO `fleche` (`ID_FLECHE`, `ID_VOL`, `NUMFLECHE`, `PTSFLECHE`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 1, 4, NULL),
(5, 1, 5, NULL),
(6, 1, 6, NULL),
(7, 1, 7, NULL),
(8, 1, 8, NULL),
(9, 1, 9, NULL),
(10, 2, 1, NULL),
(11, 2, 2, NULL),
(12, 2, 3, NULL),
(13, 2, 4, NULL),
(14, 2, 5, NULL),
(15, 2, 6, NULL),
(16, 2, 7, NULL),
(17, 2, 8, NULL),
(18, 2, 9, NULL),
(19, 3, 1, NULL),
(20, 3, 2, NULL),
(21, 3, 3, NULL),
(22, 3, 4, NULL),
(23, 3, 5, NULL),
(24, 3, 6, NULL),
(25, 3, 7, NULL),
(26, 3, 8, NULL),
(27, 3, 9, NULL),
(28, 4, 1, NULL),
(29, 4, 2, NULL),
(30, 4, 3, NULL),
(31, 4, 4, NULL),
(32, 4, 5, NULL),
(33, 4, 6, NULL),
(34, 4, 7, NULL),
(35, 4, 8, NULL),
(36, 4, 9, NULL),
(37, 5, 1, NULL),
(38, 5, 2, NULL),
(39, 5, 3, NULL),
(40, 5, 4, NULL),
(41, 5, 5, NULL),
(42, 5, 6, NULL),
(43, 5, 7, NULL),
(44, 5, 8, NULL),
(45, 5, 9, NULL),
(46, 6, 1, NULL),
(47, 6, 2, NULL),
(48, 6, 3, NULL),
(49, 6, 4, NULL),
(50, 6, 5, NULL),
(51, 6, 6, NULL),
(52, 6, 7, NULL),
(53, 6, 8, NULL),
(54, 6, 9, NULL),
(55, 7, 1, NULL),
(56, 7, 2, NULL),
(57, 7, 3, NULL),
(58, 7, 4, NULL),
(59, 7, 5, NULL),
(60, 7, 6, NULL),
(61, 7, 7, NULL),
(62, 7, 8, NULL),
(63, 7, 9, NULL),
(64, 8, 1, NULL),
(65, 8, 2, NULL),
(66, 8, 3, NULL),
(67, 8, 4, NULL),
(68, 8, 5, NULL),
(69, 8, 6, NULL),
(70, 8, 7, NULL),
(71, 8, 8, NULL),
(72, 8, 9, NULL),
(73, 9, 1, NULL),
(74, 9, 2, NULL),
(75, 9, 3, NULL),
(76, 9, 4, NULL),
(77, 9, 5, NULL),
(78, 9, 6, NULL),
(79, 9, 7, NULL),
(80, 9, 8, NULL),
(81, 9, 9, NULL),
(82, 10, 1, NULL),
(83, 10, 2, NULL),
(84, 10, 3, NULL),
(85, 10, 4, NULL),
(86, 10, 5, NULL),
(87, 10, 6, NULL),
(88, 10, 7, NULL),
(89, 10, 8, NULL),
(90, 10, 9, NULL),
(91, 11, 1, NULL),
(92, 11, 2, NULL),
(93, 11, 3, NULL),
(94, 11, 4, NULL),
(95, 11, 5, NULL),
(96, 11, 6, NULL),
(97, 11, 7, NULL),
(98, 11, 8, NULL),
(99, 11, 9, NULL),
(100, 12, 1, NULL),
(101, 12, 2, NULL),
(102, 12, 3, NULL),
(103, 12, 4, NULL),
(104, 12, 5, NULL),
(105, 12, 6, NULL),
(106, 12, 7, NULL),
(107, 12, 8, NULL),
(108, 12, 9, NULL),
(109, 13, 1, NULL),
(110, 13, 2, NULL),
(111, 13, 3, NULL),
(112, 13, 4, NULL),
(113, 13, 5, NULL),
(114, 13, 6, NULL),
(115, 13, 7, NULL),
(116, 13, 8, NULL),
(117, 13, 9, NULL),
(118, 14, 1, NULL),
(119, 14, 2, NULL),
(120, 14, 3, NULL),
(121, 14, 4, NULL),
(122, 14, 5, NULL),
(123, 14, 6, NULL),
(124, 14, 7, NULL),
(125, 14, 8, NULL),
(126, 14, 9, NULL),
(127, 15, 1, NULL),
(128, 15, 2, NULL),
(129, 15, 3, NULL),
(130, 15, 4, NULL),
(131, 15, 5, NULL),
(132, 15, 6, NULL),
(133, 15, 7, NULL),
(134, 15, 8, NULL),
(135, 15, 9, NULL),
(136, 16, 1, NULL),
(137, 16, 2, NULL),
(138, 16, 3, NULL),
(139, 16, 4, NULL),
(140, 16, 5, NULL),
(141, 16, 6, NULL),
(142, 16, 7, NULL),
(143, 16, 8, NULL),
(144, 16, 9, NULL),
(145, 17, 1, NULL),
(146, 17, 2, NULL),
(147, 17, 3, NULL),
(148, 17, 4, NULL),
(149, 17, 5, NULL),
(150, 17, 6, NULL),
(151, 17, 7, NULL),
(152, 17, 8, NULL),
(153, 17, 9, NULL),
(154, 18, 1, NULL),
(155, 18, 2, NULL),
(156, 18, 3, NULL),
(157, 18, 4, NULL),
(158, 18, 5, NULL),
(159, 18, 6, NULL),
(160, 18, 7, NULL),
(161, 18, 8, NULL),
(162, 18, 9, NULL),
(163, 19, 1, NULL),
(164, 19, 2, NULL),
(165, 19, 3, NULL),
(166, 19, 4, NULL),
(167, 19, 5, NULL),
(168, 19, 6, NULL),
(169, 19, 7, NULL),
(170, 19, 8, NULL),
(171, 19, 9, NULL),
(172, 20, 1, NULL),
(173, 20, 2, NULL),
(174, 20, 3, NULL),
(175, 20, 4, NULL),
(176, 20, 5, NULL),
(177, 20, 6, NULL),
(178, 20, 7, NULL),
(179, 20, 8, NULL),
(180, 20, 9, NULL),
(181, 21, 1, NULL),
(182, 21, 2, NULL),
(183, 21, 3, NULL),
(184, 21, 4, NULL),
(185, 21, 5, NULL),
(186, 21, 6, NULL),
(187, 21, 7, NULL),
(188, 21, 8, NULL),
(189, 21, 9, NULL),
(190, 22, 1, NULL),
(191, 22, 2, NULL),
(192, 22, 3, NULL),
(193, 22, 4, NULL),
(194, 22, 5, NULL),
(195, 22, 6, NULL),
(196, 22, 7, NULL),
(197, 22, 8, NULL),
(198, 22, 9, NULL),
(199, 23, 1, NULL),
(200, 23, 2, NULL),
(201, 23, 3, NULL),
(202, 23, 4, NULL),
(203, 23, 5, NULL),
(204, 23, 6, NULL),
(205, 23, 7, NULL),
(206, 23, 8, NULL),
(207, 23, 9, NULL),
(208, 24, 1, NULL),
(209, 24, 2, NULL),
(210, 24, 3, NULL),
(211, 24, 4, NULL),
(212, 24, 5, NULL),
(213, 24, 6, NULL),
(214, 24, 7, NULL),
(215, 24, 8, NULL),
(216, 24, 9, NULL),
(217, 25, 1, NULL),
(218, 25, 2, NULL),
(219, 25, 3, NULL),
(220, 25, 4, NULL),
(221, 25, 5, NULL),
(222, 25, 6, NULL),
(223, 25, 7, NULL),
(224, 25, 8, NULL),
(225, 25, 9, NULL),
(226, 26, 1, NULL),
(227, 26, 2, NULL),
(228, 26, 3, NULL),
(229, 26, 4, NULL),
(230, 26, 5, NULL),
(231, 26, 6, NULL),
(232, 26, 7, NULL),
(233, 26, 8, NULL),
(234, 26, 9, NULL),
(235, 27, 1, NULL),
(236, 27, 2, NULL),
(237, 27, 3, NULL),
(238, 27, 4, NULL),
(239, 27, 5, NULL),
(240, 27, 6, NULL),
(241, 27, 7, NULL),
(242, 27, 8, NULL),
(243, 27, 9, NULL),
(244, 28, 1, NULL),
(245, 28, 2, NULL),
(246, 28, 3, NULL),
(247, 28, 4, NULL),
(248, 28, 5, NULL),
(249, 28, 6, NULL),
(250, 28, 7, NULL),
(251, 28, 8, NULL),
(252, 28, 9, NULL),
(253, 29, 1, NULL),
(254, 29, 2, NULL),
(255, 29, 3, NULL),
(256, 30, 1, NULL),
(257, 30, 2, NULL),
(258, 30, 3, NULL),
(259, 31, 1, NULL),
(260, 31, 2, NULL),
(261, 31, 3, NULL),
(262, 32, 1, NULL),
(263, 32, 2, NULL),
(264, 32, 3, NULL),
(265, 33, 1, NULL),
(266, 33, 2, NULL),
(267, 33, 3, NULL),
(268, 34, 1, NULL),
(269, 34, 2, NULL),
(270, 34, 3, NULL),
(271, 35, 1, NULL),
(272, 35, 2, NULL),
(273, 35, 3, NULL),
(274, 36, 1, NULL),
(275, 36, 2, NULL),
(276, 36, 3, NULL),
(277, 37, 1, NULL),
(278, 37, 2, NULL),
(279, 37, 3, NULL),
(280, 38, 1, NULL),
(281, 38, 2, NULL),
(282, 38, 3, NULL),
(283, 39, 1, NULL),
(284, 39, 2, NULL),
(285, 39, 3, NULL),
(286, 40, 1, NULL),
(287, 40, 2, NULL),
(288, 40, 3, NULL),
(289, 41, 1, NULL),
(290, 41, 2, NULL),
(291, 42, 1, NULL),
(292, 42, 2, NULL),
(293, 43, 1, NULL),
(294, 43, 2, NULL),
(295, 44, 1, NULL),
(296, 44, 2, NULL),
(297, 45, 1, NULL),
(298, 45, 2, NULL),
(299, 46, 1, NULL),
(300, 46, 2, NULL),
(301, 47, 1, NULL),
(302, 47, 2, NULL),
(303, 47, 3, NULL),
(304, 48, 1, NULL),
(305, 48, 2, NULL),
(306, 48, 3, NULL),
(307, 49, 1, NULL),
(308, 49, 2, NULL),
(309, 49, 3, NULL),
(310, 50, 1, NULL),
(311, 50, 2, NULL),
(312, 50, 3, NULL),
(313, 51, 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`ID_SERIE`, `ID_ENT_USER`, `NUMSERIE`, `PTSSERIE`, `NBRVOLSERIE`, `MOYSERIE`, `PCTDIXSERIE`, `PCTHUITSERIE`, `ID_ENT`) VALUES
(1, 1001, 1, NULL, 7, NULL, NULL, NULL, 1),
(2, 1001, 2, NULL, 7, NULL, NULL, NULL, 1),
(3, 1001, 3, NULL, 7, NULL, NULL, NULL, 1),
(4, 1001, 4, NULL, 7, NULL, NULL, NULL, 1),
(5, 1002, 1, NULL, 4, NULL, NULL, NULL, 2),
(6, 1002, 2, NULL, 4, NULL, NULL, NULL, 2),
(7, 1002, 3, NULL, 4, NULL, NULL, NULL, 2),
(8, 1003, 1, NULL, 3, NULL, NULL, NULL, 3),
(9, 1003, 2, NULL, 3, NULL, NULL, NULL, 3),
(10, 1004, 1, NULL, 2, NULL, NULL, NULL, 4),
(11, 1004, 2, NULL, 2, NULL, NULL, NULL, 4),
(12, 1005, 1, NULL, 1, NULL, NULL, NULL, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_USER`, `PSEUDO`, `PASSWORD`, `NOM`, `PRENOM`, `CLUB`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `volee`
--

INSERT INTO `volee` (`ID_VOL`, `ID_SERIE`, `NUMVOLEE`, `PTSVOL`, `NBRFLECHEVOL`, `MOYVOL`, `PCTDIXVOL`, `PCTHUITVOL`) VALUES
(1, 1, 1, NULL, 9, NULL, NULL, NULL),
(2, 1, 2, NULL, 9, NULL, NULL, NULL),
(3, 1, 3, NULL, 9, NULL, NULL, NULL),
(4, 1, 4, NULL, 9, NULL, NULL, NULL),
(5, 1, 5, NULL, 9, NULL, NULL, NULL),
(6, 1, 6, NULL, 9, NULL, NULL, NULL),
(7, 1, 7, NULL, 9, NULL, NULL, NULL),
(8, 2, 1, NULL, 9, NULL, NULL, NULL),
(9, 2, 2, NULL, 9, NULL, NULL, NULL),
(10, 2, 3, NULL, 9, NULL, NULL, NULL),
(11, 2, 4, NULL, 9, NULL, NULL, NULL),
(12, 2, 5, NULL, 9, NULL, NULL, NULL),
(13, 2, 6, NULL, 9, NULL, NULL, NULL),
(14, 2, 7, NULL, 9, NULL, NULL, NULL),
(15, 3, 1, NULL, 9, NULL, NULL, NULL),
(16, 3, 2, NULL, 9, NULL, NULL, NULL),
(17, 3, 3, NULL, 9, NULL, NULL, NULL),
(18, 3, 4, NULL, 9, NULL, NULL, NULL),
(19, 3, 5, NULL, 9, NULL, NULL, NULL),
(20, 3, 6, NULL, 9, NULL, NULL, NULL),
(21, 3, 7, NULL, 9, NULL, NULL, NULL),
(22, 4, 1, NULL, 9, NULL, NULL, NULL),
(23, 4, 2, NULL, 9, NULL, NULL, NULL),
(24, 4, 3, NULL, 9, NULL, NULL, NULL),
(25, 4, 4, NULL, 9, NULL, NULL, NULL),
(26, 4, 5, NULL, 9, NULL, NULL, NULL),
(27, 4, 6, NULL, 9, NULL, NULL, NULL),
(28, 4, 7, NULL, 9, NULL, NULL, NULL),
(29, 5, 1, NULL, 3, NULL, NULL, NULL),
(30, 5, 2, NULL, 3, NULL, NULL, NULL),
(31, 5, 3, NULL, 3, NULL, NULL, NULL),
(32, 5, 4, NULL, 3, NULL, NULL, NULL),
(33, 6, 1, NULL, 3, NULL, NULL, NULL),
(34, 6, 2, NULL, 3, NULL, NULL, NULL),
(35, 6, 3, NULL, 3, NULL, NULL, NULL),
(36, 6, 4, NULL, 3, NULL, NULL, NULL),
(37, 7, 1, NULL, 3, NULL, NULL, NULL),
(38, 7, 2, NULL, 3, NULL, NULL, NULL),
(39, 7, 3, NULL, 3, NULL, NULL, NULL),
(40, 7, 4, NULL, 3, NULL, NULL, NULL),
(41, 8, 1, NULL, 2, NULL, NULL, NULL),
(42, 8, 2, NULL, 2, NULL, NULL, NULL),
(43, 8, 3, NULL, 2, NULL, NULL, NULL),
(44, 9, 1, NULL, 2, NULL, NULL, NULL),
(45, 9, 2, NULL, 2, NULL, NULL, NULL),
(46, 9, 3, NULL, 2, NULL, NULL, NULL),
(47, 10, 1, NULL, 3, NULL, NULL, NULL),
(48, 10, 2, NULL, 3, NULL, NULL, NULL),
(49, 11, 1, NULL, 3, NULL, NULL, NULL),
(50, 11, 2, NULL, 3, NULL, NULL, NULL),
(51, 12, 1, NULL, 1, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
