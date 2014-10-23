-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 09:18 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_projet_plume`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `sContenuCommentaire` longtext,
  `sDateCommentaire` datetime DEFAULT NULL,
  `idParagraphe` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `FK_Commentaire_idParagraphe` (`idParagraphe`),
  KEY `FK_Commentaire_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `sContenuCommentaire`, `sDateCommentaire`, `idParagraphe`, `idUtilisateur`) VALUES
(1, 'c''est vraiment plate', '2014-09-02 18:59:34', 3, 2),
(2, 'Très bon', '2014-09-03 19:00:03', 1, 5),
(3, 'ça ne me plaît pas beaucoup', '2014-09-26 18:56:43', 4, 1),
(4, 'ça ne me plaît pas ', '2014-09-25 18:57:00', 3, 2),
(5, 'j''ai beaucoup aimé ton paragraphe', '2014-09-01 18:58:34', 6, 1),
(6, 'j''ai aimé ton paragraphe', '2014-09-04 18:58:54', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `sNomGenre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `sNomGenre`) VALUES
(1, 'Science-fiction et fantastique'),
(2, 'Romans policiers'),
(3, 'Romans d''épouvante'),
(4, 'Poésie et théâtre'),
(5, 'Littérature étrangèr'),
(6, 'Littérature Québécoise'),
(7, 'Littérature érotique');

-- --------------------------------------------------------

--
-- Table structure for table `jointuregenremotcle`
--

CREATE TABLE IF NOT EXISTS `jointuregenremotcle` (
  `idMotCle` int(11) NOT NULL AUTO_INCREMENT,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idMotCle`,`idGenre`),
  KEY `FK_JointureGenreMotCle_idGenre` (`idGenre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jointuregenremotcle`
--

INSERT INTO `jointuregenremotcle` (`idMotCle`, `idGenre`) VALUES
(1, 1),
(1, 2),
(3, 2),
(8, 2),
(2, 3),
(10, 3),
(5, 4),
(4, 5),
(7, 6),
(9, 6),
(6, 7),
(9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jointureouvragegenre`
--

CREATE TABLE IF NOT EXISTS `jointureouvragegenre` (
  `idOuvrage` int(11) NOT NULL AUTO_INCREMENT,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idOuvrage`,`idGenre`),
  KEY `FK_JointureOuvrageGenre_idGenre` (`idGenre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jointureouvragegenre`
--

INSERT INTO `jointureouvragegenre` (`idOuvrage`, `idGenre`) VALUES
(1, 1),
(1, 2),
(5, 2),
(2, 3),
(3, 3),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `motcle`
--

CREATE TABLE IF NOT EXISTS `motcle` (
  `idMotCle` int(11) NOT NULL AUTO_INCREMENT,
  `sNomMotCle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMotCle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `motcle`
--

INSERT INTO `motcle` (`idMotCle`, `sNomMotCle`) VALUES
(1, 'enfants'),
(2, 'romance'),
(3, 'drame'),
(4, 'Poème'),
(5, 'mort'),
(6, 'famille'),
(7, 'Mystère'),
(8, 'Histoire'),
(9, 'Fiction'),
(10, 'Amour');

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE IF NOT EXISTS `ouvrage` (
  `idOuvrage` int(11) NOT NULL AUTO_INCREMENT,
  `sTitreOuvrage` varchar(150) DEFAULT NULL,
  `sContenuOuvrage` longtext,
  `sDateOuvrage` datetime DEFAULT NULL,
  `sCouvertureOuvrage` varchar(100) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idOuvrage`),
  KEY `FK_Ouvrage_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`idOuvrage`, `sTitreOuvrage`, `sContenuOuvrage`, `sDateOuvrage`, `sCouvertureOuvrage`, `idUtilisateur`) VALUES
(1, 'Comme un chant d''espérance', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2014-09-26 18:42:38', NULL, 5),
(2, 'Anima', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2014-09-18 18:48:31', NULL, 4),
(3, 'Je suis là', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2014-09-05 18:51:22', NULL, 2),
(4, 'Chocolat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n\r\n\r\ndfdf.\r\n.\r\ndf\r\n.dfdfdf. ', '2014-09-01 18:52:43', NULL, 1),
(5, 'Et rien d''autre', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2014-09-24 18:53:51', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `paragraphe`
--

CREATE TABLE IF NOT EXISTS `paragraphe` (
  `idParagraphe` int(11) NOT NULL AUTO_INCREMENT,
  `idOuvrage` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParagraphe`),
  KEY `FK_Paragraphe_idOuvrage` (`idOuvrage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `paragraphe`
--

INSERT INTO `paragraphe` (`idParagraphe`, `idOuvrage`) VALUES
(1, 1),
(9, 1),
(2, 2),
(10, 2),
(3, 3),
(4, 3),
(5, 4),
(6, 4),
(7, 5),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reglage`
--

CREATE TABLE IF NOT EXISTS `reglage` (
  `idPolice` int(11) NOT NULL AUTO_INCREMENT,
  `sTypePolice` varchar(50) DEFAULT NULL,
  `sTaillePolice` varchar(5) DEFAULT NULL,
  `sCouleurPolice` varchar(10) DEFAULT NULL,
  `sCouleurFond` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idPolice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reglage`
--

INSERT INTO `reglage` (`idPolice`, `sTypePolice`, `sTaillePolice`, `sCouleurPolice`, `sCouleurFond`) VALUES
(1, 'Times', '14', '#003399', '#808080'),
(2, 'Arial', '14', '#000000', '#6699FF');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `sNomUtilisateur` varchar(45) DEFAULT NULL,
  `sCourrielUtilisateur` varchar(45) DEFAULT NULL,
  `sMotPassUtilisateur` varchar(15) DEFAULT NULL,
  `sAvatarUtilisateur` varchar(50) DEFAULT NULL,
  `iStatut` int(2) DEFAULT NULL,
  `sTypeUtilisateur` varchar(20) DEFAULT NULL,
  `idPolice` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `FK_Utilisateur_idPolice` (`idPolice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `sNomUtilisateur`, `sCourrielUtilisateur`, `sMotPassUtilisateur`, `sAvatarUtilisateur`, `iStatut`, `sTypeUtilisateur`, `idPolice`) VALUES
(1, 'Samuel Diaz', 'samuel@gmail.com', '123', NULL, 1, 'utilisateur', 2),
(2, 'Alexandre Mayer', 'alex@gmail.com', '123', NULL, 1, 'utilisateur', 2),
(3, 'Hanaa El Hamoumi', 'hanna@gmail.com', '123', NULL, 1, 'utilisateur', 1),
(4, 'Jalal Khair', 'jalal@gmail.com', '123', NULL, 1, 'admin', 2),
(5, 'Julian Rendon', 'julian@gmail.com', '123', NULL, 1, 'utilisateur', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_Commentaire_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `FK_Commentaire_idParagraphe` FOREIGN KEY (`idParagraphe`) REFERENCES `paragraphe` (`idParagraphe`);

--
-- Constraints for table `jointuregenremotcle`
--
ALTER TABLE `jointuregenremotcle`
  ADD CONSTRAINT `FK_JointureGenreMotCle_idGenre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `FK_JointureGenreMotCle_idMotCle` FOREIGN KEY (`idMotCle`) REFERENCES `motcle` (`idMotCle`);

--
-- Constraints for table `jointureouvragegenre`
--
ALTER TABLE `jointureouvragegenre`
  ADD CONSTRAINT `FK_JointureOuvrageGenre_idGenre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `FK_JointureOuvrageGenre_idOuvrage` FOREIGN KEY (`idOuvrage`) REFERENCES `ouvrage` (`idOuvrage`);

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `FK_Ouvrage_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD CONSTRAINT `FK_Paragraphe_idOuvrage` FOREIGN KEY (`idOuvrage`) REFERENCES `ouvrage` (`idOuvrage`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_idPolice` FOREIGN KEY (`idPolice`) REFERENCES `reglage` (`idPolice`);
