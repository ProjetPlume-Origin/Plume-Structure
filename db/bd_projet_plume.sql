-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 08:03 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `sContenuCommentaire`, `sDateCommentaire`, `idParagraphe`, `idUtilisateur`) VALUES
(2, 'c''est vraiment plate', '2014-10-23 13:57:34', 11, 5),
(3, 'Très bon', '2014-10-24 13:57:56', 12, 2),
(4, 'ça ne me plaît pas beaucoup', '2014-10-22 13:58:25', 13, 2),
(5, 'ça ne me plaît pas', '2014-10-08 13:58:43', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE IF NOT EXISTS `ouvrage` (
  `idOuvrage` int(11) NOT NULL AUTO_INCREMENT,
  `sTitreOuvrage` varchar(150) DEFAULT NULL,
  `sDateOuvrage` datetime DEFAULT NULL,
  `sCouvertureOuvrage` varchar(100) DEFAULT NULL,
  `sGenre` varchar(45) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idOuvrage`),
  KEY `FK_Ouvrage_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`idOuvrage`, `sTitreOuvrage`, `sDateOuvrage`, `sCouvertureOuvrage`, `sGenre`, `idUtilisateur`) VALUES
(1, 'Comme un chant d''espérance', '2014-09-26 18:42:38', NULL, 'Romans policiers', 5),
(2, 'Anima', '2014-09-18 18:48:31', NULL, 'Science-fiction et fantastique', 4),
(3, 'Je suis là', '2014-09-05 18:51:22', NULL, 'Poésie et théâtre', 2),
(4, 'Chocolat', '2014-09-24 18:53:51', NULL, 'Littérature étrangèr', 3);

-- --------------------------------------------------------

--
-- Table structure for table `paragraphe`
--

CREATE TABLE IF NOT EXISTS `paragraphe` (
  `idParagraphe` int(11) NOT NULL AUTO_INCREMENT,
  `sContenuParagraphe` longtext,
  `sDateParagraphe` datetime DEFAULT NULL,
  `idOuvrage` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParagraphe`),
  KEY `FK_Paragraphe_idOuvrage` (`idOuvrage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `paragraphe`
--

INSERT INTO `paragraphe` (`idParagraphe`, `sContenuParagraphe`, `sDateParagraphe`, `idOuvrage`) VALUES
(11, '''Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\n''', '2014-10-01 13:52:27', 1),
(12, '''Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\n''', '2014-10-02 13:52:38', 2),
(13, '''Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\n''', '2014-10-09 13:53:03', 3),
(14, '''Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repudiandae natus sed laboriosam, ea, alias eveniet quisquam cupiditate porro magni sunt soluta asperiores fugiat quia iste, consequatur? Iusto, ex, minima.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\n''', '2014-10-13 13:53:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reglage`
--

CREATE TABLE IF NOT EXISTS `reglage` (
  `sTypePolice` varchar(50) NOT NULL,
  `sTaillePolice` varchar(5) DEFAULT NULL,
  `sCouleurPolice` varchar(10) DEFAULT NULL,
  `sCouleurFond` varchar(10) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`sTypePolice`),
  KEY `FK_Reglage_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reglage`
--

INSERT INTO `reglage` (`sTypePolice`, `sTaillePolice`, `sCouleurPolice`, `sCouleurFond`, `idUtilisateur`) VALUES
('Arial', '14', '#000000', '#6699FF', 1),
('Times', '14', '#003399', '#808080', 2);

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
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `sNomUtilisateur`, `sCourrielUtilisateur`, `sMotPassUtilisateur`, `sAvatarUtilisateur`, `iStatut`, `sTypeUtilisateur`) VALUES
(1, 'Samuel Diaz', 'samuel@gmail.com', '123', NULL, 1, 'utilisateur'),
(2, 'Alexandre Mayer', 'alex@gmail.com', '123', NULL, 1, 'utilisateur'),
(3, 'Hanaa El Hamoumi', 'hanna@gmail.com', '123', NULL, 1, 'utilisateur'),
(4, 'Jalal Khair', 'jalal@gmail.com', '123', NULL, 1, 'admin'),
(5, 'Julian Rendon', 'julian@gmail.com', '123', NULL, 1, 'utilisateur');

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
-- Constraints for table `reglage`
--
ALTER TABLE `reglage`
  ADD CONSTRAINT `FK_Reglage_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);
