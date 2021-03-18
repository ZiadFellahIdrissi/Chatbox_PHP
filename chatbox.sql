-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2021 at 07:12 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(5) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `message_ibfk_1` (`sender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `date`, `sender_id`) VALUES
(1, 'salam', '2021-03-11 02:23:00', 'bl14526'),
(2, 'hey', '2021-03-11 02:40:52', 'bl153548'),
(3, 'how are you zin', '2021-03-11 02:42:00', 'bl14526'),
(4, 'labase labse kooolchi mzyna, ou nty ?', '2021-03-11 02:49:37', 'bl153548'),
(6, 'salam', '2021-03-11 02:52:53', 'bl153548'),
(7, 'hana hana ', '2021-03-11 02:54:00', 'bl14526'),
(8, 'fine kanty', '2021-03-11 03:00:48', 'bl153548'),
(15, 'yo sat', '2021-03-11 14:36:00', 'ko121212'),
(16, 'sat fine hani', '2021-03-11 23:02:17', 'bl153548'),
(19, 'sat', '2021-03-11 23:03:39', 'bl153548'),
(28, 'kante kanlbase bache nji ntla9aw', '2021-03-11 23:11:50', 'bl14526'),
(29, 'ah bn', '2021-03-11 23:11:59', 'bl153548'),
(30, 'oui oui fink daba nta', '2021-03-11 23:12:16', 'bl14526'),
(31, 'ta ana lbaste ou gha n5roje daba ', '2021-03-11 23:12:48', 'bl153548'),
(32, 'sat ', '2021-03-11 23:13:19', 'bl153548'),
(33, 'safi ', '2021-03-11 23:13:46', 'bl14526'),
(34, 'yes', '2021-03-11 23:14:30', 'bl153548'),
(35, 'salam zin', '2021-03-13 12:52:07', 'bl14526'),
(36, 'wache a hyaty', '2021-03-13 12:52:28', 'bl153548');

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

DROP TABLE IF EXISTS `message_list`;
CREATE TABLE IF NOT EXISTS `message_list` (
  `id_message` int(5) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `isread` int(2) NOT NULL,
  UNIQUE KEY `id_message` (`id_message`,`user_id`),
  KEY `message_list_ibfk_1` (`id_message`),
  KEY `message_list_ibfk_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id_message`, `user_id`, `isread`) VALUES
(1, 'bl153548', 1),
(2, 'bl14526', 1),
(3, 'bl153548', 1),
(4, 'bl14526', 1),
(6, 'bl14526', 1),
(7, 'bl153548', 1),
(8, 'bl14526', 0),
(15, 'bl153548', 0),
(16, 'ko121212', 0),
(19, 'ko121212', 0),
(28, 'bl153548', 0),
(29, 'bl14526', 0),
(30, 'bl153548', 0),
(31, 'bl14526', 0),
(32, 'ko121212', 0),
(33, 'bl153548', 0),
(34, 'bl14526', 0),
(35, 'bl153548', 0),
(36, 'bl14526', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `cin` varchar(10) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `date_naissance` date NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telephone` char(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `imagepath` varchar(100) NOT NULL,
  PRIMARY KEY (`cin`),
  UNIQUE KEY `Utilisateur_Idx` (`telephone`,`email`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`cin`, `nom`, `prenom`, `date_naissance`, `password`, `telephone`, `email`, `username`, `imagepath`) VALUES
('bl14526', 'hajar', 'gouchgache', '1999-08-09', '$2y$10$Nth9wkngmpr9OL7ARotPdOfVyYdYoXBdiHJaJH90wK9Ct5GcV8lmu', '0689587450', 'gouchgachehajar@gmail.com', 'hajar', 'avatar.svg'),
('bl153548', 'ziad', 'fellah-idrissi', '1999-03-11', '$2y$10$oZhEw4Y0m69m0kpdRDoHBO/1.p602o8biBH7R3gGfmNEOZthELdUe', '0693986210', 'fellahidrissiziad@gmail.com', 'fellahidrissi', 'avatar.svg'),
('ko121212', 'ahmed', 'reda', '1999-12-15', '$2y$10$FIrzBV1CBftIl8XzUM.qduTl88jamSxbOfCmeRFBzXO63s6c9nWUa', '0708508213', 'ahmed.reda@gmaill.com', 'ahmedreda', 'avatar.svg'),
('mo121212', 'hamza', 'fellah-idrissi', '1994-12-15', '$2y$10$qq1L0wXsvN8eB7Hk.ySrd.FUv9fp/SGSzV/qEeJuKm4K1HkGX0rpK', '0600900210', 'hamza@gmaill.com', 'hamzafellah', 'avatar.svg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `utilisateur` (`cin`);

--
-- Constraints for table `message_list`
--
ALTER TABLE `message_list`
  ADD CONSTRAINT `message_list_ibfk_1` FOREIGN KEY (`id_message`) REFERENCES `messages` (`id_message`),
  ADD CONSTRAINT `message_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`cin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
