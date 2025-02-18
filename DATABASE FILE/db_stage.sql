-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 fév. 2025 à 14:09
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
-- Base de données : `db_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploi_du_temps`
--

CREATE TABLE `emploi_du_temps` (
  `id` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `periode` int(11) NOT NULL,
  `matiere` varchar(100) NOT NULL,
  `classArmId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emploi_du_temps`
--

INSERT INTO `emploi_du_temps` (`id`, `classId`, `jour`, `periode`, `matiere`, `classArmId`) VALUES
(8, 4, 'JEUDI', 2, 'cccccc', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `firstName`, `lastName`, `emailAddress`, `password`) VALUES
(1, 'Admin', '', 'admin@mail.com', '32250170a0dca92d53ec9624f336ca24');

-- --------------------------------------------------------

--
-- Structure de la table `tblattendance`
--

CREATE TABLE `tblattendance` (
  `Id` int(10) NOT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `sessionTermId` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateTimeTaken` varchar(20) NOT NULL,
  `status1` int(11) DEFAULT 0,
  `status2` int(11) DEFAULT 0,
  `status3` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblattendance`
--

INSERT INTO `tblattendance` (`Id`, `emailAddress`, `classId`, `classArmId`, `sessionTermId`, `status`, `dateTimeTaken`, `status1`, `status2`, `status3`) VALUES
(162, 'ASDFLKJ', '1', '2', '1', '1', '2020-11-01', 0, 0, 0),
(163, 'HSKSDD', '1', '2', '1', '1', '2020-11-01', 0, 0, 0),
(164, 'JSLDKJ', '1', '2', '1', '1', '2020-11-01', 0, 0, 0),
(172, 'HSKDS9EE', '1', '4', '1', '1', '2020-11-01', 0, 0, 0),
(171, 'JKADA', '1', '4', '1', '0', '2020-11-01', 0, 0, 0),
(170, 'JSFSKDJ', '1', '4', '1', '1', '2020-11-01', 0, 0, 0),
(173, 'ASDFLKJ', '1', '2', '1', '1', '2020-11-19', 0, 0, 0),
(174, 'HSKSDD', '1', '2', '1', '1', '2020-11-19', 0, 0, 0),
(175, 'JSLDKJ', '1', '2', '1', '1', '2020-11-19', 0, 0, 0),
(176, 'JSFSKDJ', '1', '4', '1', '0', '2021-07-15', 0, 0, 0),
(177, 'JKADA', '1', '4', '1', '0', '2021-07-15', 0, 0, 0),
(178, 'HSKDS9EE', '1', '4', '1', '0', '2021-07-15', 0, 0, 0),
(179, 'ASDFLKJ', '1', '2', '1', '0', '2021-09-27', 0, 0, 0),
(180, 'HSKSDD', '1', '2', '1', '1', '2021-09-27', 0, 0, 0),
(181, 'JSLDKJ', '1', '2', '1', '1', '2021-09-27', 0, 0, 0),
(182, 'ASDFLKJ', '1', '2', '1', '0', '2021-10-06', 0, 0, 0),
(183, 'HSKSDD', '1', '2', '1', '0', '2021-10-06', 0, 0, 0),
(184, 'JSLDKJ', '1', '2', '1', '1', '2021-10-06', 0, 0, 0),
(185, 'ASDFLKJ', '1', '2', '1', '0', '2021-10-07', 0, 0, 0),
(186, 'HSKSDD', '1', '2', '1', '0', '2021-10-07', 0, 0, 0),
(187, 'JSLDKJ', '1', '2', '1', '0', '2021-10-07', 0, 0, 0),
(188, 'AMS110', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(189, 'AMS133', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(190, 'AMS135', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(191, 'AMS144', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(192, 'AMS148', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(193, 'AMS151', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(194, 'AMS159', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(195, 'AMS161', '4', '6', '1', '1', '2021-10-07', 0, 0, 0),
(196, 'AMS110', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(197, 'AMS133', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(198, 'AMS135', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(199, 'AMS144', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(200, 'AMS148', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(201, 'AMS151', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(202, 'AMS159', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(203, 'AMS161', '4', '6', '1', '1', '2022-06-06', 0, 0, 0),
(204, 'AMS110', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(205, 'AMS133', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(206, 'AMS135', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(207, 'AMS144', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(208, 'AMS148', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(209, 'AMS151', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(210, 'AMS159', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(211, 'AMS161', '4', '6', '1', '1', '2025-02-04', 0, 0, 0),
(212, 'AMS110', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(213, 'AMS133', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(214, 'AMS135', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(215, 'AMS148', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(216, 'AMS151', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(217, 'AMS159', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(218, 'AMS161', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(219, 'AMS163', '4', '6', '1', '1', '2025-02-05', 0, 0, 0),
(220, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(221, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(222, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(223, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(224, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(225, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(226, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(227, '', '4', '6', '1', '0', '2025-02-06', 0, 0, 0),
(228, 'teacher2@mail.com', '', '', '1', '1', '2025-02-07', 0, 0, 0),
(229, 'teacher3@gmail.com', '', '', '1', '1', '2025-02-07', 0, 0, 0),
(230, 'teacher4@mail.com', '', '', '1', '1', '2025-02-07', 0, 0, 0),
(231, 'teacher@mail.com', '', '', '1', '1', '2025-02-07', 0, 0, 0),
(232, 'AMS110', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(233, 'AMS133', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(234, 'AMS135', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(235, 'AMS148', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(236, 'AMS151', '4', '6', '1', '0', '2025-02-07', 0, 0, 0),
(237, 'AMS159', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(238, 'AMS161', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(239, 'AMS163', '4', '6', '1', '1', '2025-02-07', 0, 0, 0),
(240, 'AMS110', '4', '6', '1', '0', '2025-02-12', 0, 0, 0),
(241, 'AMS133', '4', '6', '1', '0', '2025-02-12', 0, 0, 0),
(242, 'AMS135', '4', '6', '1', '0', '2025-02-12', 0, 0, 0),
(243, 'AMS148', '4', '6', '1', '0', '2025-02-12', 0, 0, 0),
(244, 'AMS151', '4', '6', '1', '0', '2025-02-12', 0, 0, 0),
(245, 'AMS159', '4', '6', '1', '1', '2025-02-12', 0, 0, 0),
(246, 'AMS161', '4', '6', '1', '1', '2025-02-12', 0, 0, 0),
(247, 'AMS163', '4', '6', '1', '1', '2025-02-12', 0, 0, 0),
(248, 'test1@test.com', '1', '2', '1', '0', '2025-02-12', 1, 1, 0),
(249, 'test@test.com', '1', '2', '1', '0', '2025-02-12', 0, 1, 0),
(250, 'AMS011', '1', '2', '1', '0', '2025-02-12', 0, 0, 1),
(251, 'AMS164', '1', '2', '1', '0', '2025-02-12', 1, 1, 1),
(252, 'AMS012', '1', '4', '1', '0', '2025-02-12', 1, 1, 0),
(253, 'AMS015', '1', '4', '1', '0', '2025-02-12', 1, 0, 0),
(254, 'AMS017', '1', '4', '1', '0', '2025-02-12', 1, 1, 1),
(255, 'AMS110', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(256, 'AMS133', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(257, 'AMS135', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(258, 'AMS148', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(259, 'AMS151', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(260, 'AMS159', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(261, 'AMS161', '4', '6', '1', '0', '2025-02-13', 0, 1, 0),
(262, 'AMS163', '4', '6', '1', '0', '2025-02-13', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tblclass`
--

CREATE TABLE `tblclass` (
  `Id` int(10) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblclass`
--

INSERT INTO `tblclass` (`Id`, `className`) VALUES
(1, 'Seven'),
(3, 'Eight'),
(4, 'Nine');

-- --------------------------------------------------------

--
-- Structure de la table `tblclassarms`
--

CREATE TABLE `tblclassarms` (
  `Id` int(10) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmName` varchar(255) NOT NULL,
  `isAssigned` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblclassarms`
--

INSERT INTO `tblclassarms` (`Id`, `classId`, `classArmName`, `isAssigned`) VALUES
(2, '1', 'S1', '1'),
(4, '1', 'S2', '1'),
(5, '3', 'E1', '1'),
(6, '4', 'N1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tblclassteacher`
--

CREATE TABLE `tblclassteacher` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblclassteacher`
--

INSERT INTO `tblclassteacher` (`Id`, `firstName`, `lastName`, `emailAddress`, `password`, `phoneNo`, `classId`, `classArmId`, `dateCreated`) VALUES
(1, 'Will', 'Kibagendi', 'teacher2@mail.com', '32250170a0dca92d53ec9624f336ca24', '09089898999', '1', '2', '2022-10-31'),
(4, 'Demola', 'Ade', 'teacher3@gmail.com', '32250170a0dca92d53ec9624f336ca24', '09672002882', '1', '4', '2022-11-01'),
(5, 'Ryan', 'Mbeche', 'teacher4@mail.com', '32250170a0dca92d53ec9624f336ca24', '7014560000', '3', '5', '2022-10-07'),
(6, 'John', 'Keroche', 'teacher@mail.com', '32250170a0dca92d53ec9624f336ca24', '0100000030', '4', '6', '2022-10-07');

-- --------------------------------------------------------

--
-- Structure de la table `tblsessionterm`
--

CREATE TABLE `tblsessionterm` (
  `Id` int(10) NOT NULL,
  `sessionName` varchar(50) NOT NULL,
  `termId` varchar(50) NOT NULL,
  `isActive` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblsessionterm`
--

INSERT INTO `tblsessionterm` (`Id`, `sessionName`, `termId`, `isActive`, `dateCreated`) VALUES
(1, '2021/2022', '1', '1', '2022-10-31'),
(3, '2021/2022', '2', '0', '2022-10-31');

-- --------------------------------------------------------

--
-- Structure de la table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `classId` varchar(10) NOT NULL,
  `classArmId` varchar(10) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblstudents`
--

INSERT INTO `tblstudents` (`Id`, `firstName`, `lastName`, `otherName`, `emailAddress`, `password`, `classId`, `classArmId`, `dateCreated`) VALUES
(1, 'Thomas', 'Omari', 'none', 'test1@test.com', '32250170a0dca92d53ec9624f336ca24', '1', '2', '2022-10-31'),
(3, 'Samuel', 'Ondieki', 'none', 'test@test.com', '32250170a0dca92d53ec9624f336ca24', '1', '2', '2022-10-31'),
(4, 'Milagros', 'Oloo', 'none', 'AMS011', '1f32aa4c9a1d2ea010adcf2348166a04', '1', '2', '2022-10-31'),
(5, 'Luis', 'Ayo', 'none', 'AMS012', '1f32aa4c9a1d2ea010adcf2348166a04', '1', '4', '2022-10-31'),
(6, 'Sandra', 'Sagero', 'none', 'AMS015', '1f32aa4c9a1d2ea010adcf2348166a04', '1', '4', '2022-10-31'),
(7, 'Smith', 'Makori', 'Mack', 'AMS017', '1f32aa4c9a1d2ea010adcf2348166a04', '1', '4', '2022-10-31'),
(8, 'Juliana', 'Kerubo', 'none', 'AMS019', '1f32aa4c9a1d2ea010adcf2348166a04', '3', '5', '2022-10-31'),
(9, 'Richard', 'Semo', 'none', 'AMS021', '1f32aa4c9a1d2ea010adcf2348166a04', '3', '5', '2022-10-31'),
(10, 'Jon', 'Mbeeka', 'none', 'AMS110', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(11, 'Aida', 'Moraa', 'none', 'AMS133', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(12, 'Miguel', 'Bush', 'none', 'AMS135', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(14, 'Lyn', 'Rogers', 'none', 'AMS148', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(15, 'James', 'Dominick', 'none', 'AMS151', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(16, 'Ethel', 'Quin', 'none', 'AMS159', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(17, 'Roland', 'Estrada', 'none', 'AMS161', '1f32aa4c9a1d2ea010adcf2348166a04', '4', '6', '2022-10-07'),
(18, 'zaki', 'belo', '', 'AMS162', '827ccb0eea8a706c4c34a16891f84e7b', '3', '5', '2025-02-05'),
(19, 'Zakariya', 'Belouafi', '', 'AMS163', '12345', '4', '6', '2025-02-05'),
(20, 'asmae', 'lqmach', 'none', 'AMS164', '12345', '1', '2', '2025-02-05'),
(23, 'AMINE', 'AJALA', 'none', 'AMS167', '$2y$10$n8cV7WT8VTAxEWXTsEhgt.g8Qy01vEUz6CRxUU4iYOy', '3', '5', '2025-02-05');

-- --------------------------------------------------------

--
-- Structure de la table `tblteacherattendance`
--

CREATE TABLE `tblteacherattendance` (
  `Id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `dateTimeTaken1` varchar(50) DEFAULT NULL,
  `status1` int(11) DEFAULT NULL,
  `status2` int(11) DEFAULT NULL,
  `status3` int(11) DEFAULT NULL,
  `sessionTermId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tblteacherattendance`
--

INSERT INTO `tblteacherattendance` (`Id`, `firstName`, `lastName`, `emailAddress`, `dateTimeTaken1`, `status1`, `status2`, `status3`, `sessionTermId`) VALUES
(1, '', '', 'teacher2@mail.com', '2025-02-18 14:01:51', 1, 1, 1, '1'),
(2, '', '', 'teacher3@gmail.com', '2025-02-18 14:01:51', 0, 1, 0, '1'),
(3, '', '', 'teacher4@mail.com', '2025-02-18 14:01:51', 0, 1, 0, '1'),
(4, '', '', 'teacher@mail.com', '2025-02-18 14:01:51', 0, 1, 0, '1');

-- --------------------------------------------------------

--
-- Structure de la table `tblterm`
--

CREATE TABLE `tblterm` (
  `Id` int(10) NOT NULL,
  `termName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tblterm`
--

INSERT INTO `tblterm` (`Id`, `termName`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblattendance`
--
ALTER TABLE `tblattendance`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblclassarms`
--
ALTER TABLE `tblclassarms`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblclassteacher`
--
ALTER TABLE `tblclassteacher`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblsessionterm`
--
ALTER TABLE `tblsessionterm`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_classId` (`classId`),
  ADD KEY `fk_classArmId` (`classArmId`);

--
-- Index pour la table `tblteacherattendance`
--
ALTER TABLE `tblteacherattendance`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Index pour la table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tblattendance`
--
ALTER TABLE `tblattendance`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT pour la table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tblclassarms`
--
ALTER TABLE `tblclassarms`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tblclassteacher`
--
ALTER TABLE `tblclassteacher`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tblsessionterm`
--
ALTER TABLE `tblsessionterm`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `tblteacherattendance`
--
ALTER TABLE `tblteacherattendance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
