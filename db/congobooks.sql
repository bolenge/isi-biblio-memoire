-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour congobook
CREATE DATABASE IF NOT EXISTS `congobook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `congobook`;

-- Listage de la structure de la table congobook. admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_admins_countries` (`id_country`),
  CONSTRAINT `FK_admins_countries` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.admins : ~4 rows (environ)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `firstName`, `lastName`, `email`, `phone`, `town`, `id_country`, `adress`, `avatar`, `about`, `username`, `password`, `state`, `flag`, `createdAt`, `updatedAt`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$o/u2MuE9F78il.7rQcCVeuBHiudlcWpb1v6jtdOxXEIfKtcbx7KBq', 'true', 'true', '2021-10-20 13:03:09', '2021-10-20 13:03:09'),
	(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8l30/I2urkS0XE9M3A50me581xD4KVXO6OidqYTZgDtYnkb2Mo7dq', 'true', 'true', '2021-10-20 13:03:58', '2021-10-20 13:03:58'),
	(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$9txYPXZOWOc4PDOHcNmCm.JLdqozGxvdStTLckJHkmHUczETkfNF2', 'true', 'true', '2021-10-20 13:04:33', '2021-10-20 13:04:33'),
	(4, NULL, NULL, NULL, 'dondedieubolenge@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'bolenge', '$2y$10$c.L13pB6OKJco9TS0P.E5OFcz9pWMC3kWs2Yfpi8tX.YYIQuWKP8a', 'true', 'true', '2021-10-20 13:08:02', '2021-10-20 13:08:57');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Listage de la structure de la table congobook. books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) DEFAULT NULL,
  `idUserOwner` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `fileDoc` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `fileAudio` varchar(255) DEFAULT NULL,
  `statePub` enum('true','false') DEFAULT 'true',
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `dateOfficial` datetime DEFAULT NULL,
  `datePub` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.books : ~4 rows (environ)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `idCategory`, `idUserOwner`, `title`, `description`, `other`, `fileDoc`, `cover`, `fileAudio`, `statePub`, `state`, `flag`, `dateOfficial`, `datePub`, `createdAt`, `updatedAt`) VALUES
	(1, 1, 1, 'A la découverte de l\'aléatoire et des probabilités', 'Quasi ut ut rem simi Quasi ut ut rem simi Quasi ut ut rem simi Quasi ut ut rem simi', 'Sebsheep', 'public/medias/pdfs/21-10-2021-04-15-50-31.pdf', 'public/medias/pngs/21-10-2021-04-17-58-31.png', '', 'true', 'true', 'true', '2021-10-22 00:00:00', NULL, '2021-10-21 17:18:43', '2021-10-21 17:18:43'),
	(2, 3, 1, '2 Poèmes d’amour  pour elle et lui', 'Quand on n’a que l’amour à s’offrir en partage \r\nAvec toi Nadine, j’ai bien plus... \r\nJ’ai ton cœur, j’ai ta joie, j’ai ton corps, \r\nJe t’ai toi et ton amour pour moi... ', 'Manel Baali', 'public/medias/pdfs/21-10-2021-04-32-55-31.pdf', 'public/medias/pngs/21-10-2021-04-33-00-31.png', '', 'true', 'true', 'true', '2021-10-22 00:00:00', NULL, '2021-10-21 17:33:22', '2021-10-21 17:33:22'),
	(3, 1, 1, 'Vuejs - Applications web complexes et réactives', 'Vue.js est un framework JavaScript orienté front-end qui mérite considération à plusieurs égards. Il est réactif, performant, versatile, facilement\r\ntestable, maintenable et sa courbe d’apprentissage est réellement rapide', 'Brice Chaponneau', 'public/medias/pdfs/22-10-2021-04-19-39-31.pdf', 'public/medias/pngs/22-10-2021-04-19-14-31.png', '', 'true', 'true', 'true', '2021-10-30 00:00:00', NULL, '2021-10-22 17:20:01', '2021-10-22 17:20:01'),
	(4, 1, 1, 'Programmation Python Conception et optimisation', 'Ce livre traite de Python, un langage de programmation de haut niveau, orienté objet,\r\ntotalement libre et terriblement efficace, conçu pour produire du code de qualité, portable et facile à intégrer', 'Tarek Ziadé', 'public/medias/pdfs/22-10-2021-04-20-42-31.pdf', 'public/medias/pngs/22-10-2021-04-20-48-31.png', '', 'true', 'true', 'true', '2021-10-20 00:00:00', NULL, '2021-10-22 17:21:30', '2021-10-22 17:21:30'),
	(5, 1, 1, 'React.js', 'Reactjs', 'javascript et son ´ecosyst`eme', 'public/medias/pdfs/22-10-2021-04-36-55-31.pdf', 'public/medias/pngs/22-10-2021-04-37-00-31.png', '', 'true', 'true', 'true', '2021-10-19 00:00:00', NULL, '2021-10-22 17:37:45', '2021-10-22 17:37:45');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Listage de la structure de la table congobook. books_read
CREATE TABLE IF NOT EXISTS `books_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `nbrChapter` int(11) DEFAULT NULL,
  `nbrChapterRead` int(11) DEFAULT NULL,
  `flag` enum('true','false') DEFAULT 'true',
  `state` enum('true','false') DEFAULT 'true',
  `dateEndRead` datetime DEFAULT NULL,
  `dateRead` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.books_read : ~0 rows (environ)
/*!40000 ALTER TABLE `books_read` DISABLE KEYS */;
/*!40000 ALTER TABLE `books_read` ENABLE KEYS */;

-- Listage de la structure de la table congobook. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) DEFAULT NULL,
  `intituled` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.categories : ~2 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `idType`, `intituled`, `description`, `state`, `flag`, `createdAt`, `updatedAt`) VALUES
	(1, 2, 'Programmation et Développement', 'Programmation et Développement', 'true', 'true', NULL, NULL),
	(2, 2, 'Réseaux Informatiques', 'Réseaux Informatiques', 'true', 'true', NULL, NULL),
	(3, 3, 'Poèmes', 'Poèmes', 'true', 'true', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table congobook. countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `insigner` varchar(255) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.countries : ~0 rows (environ)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Listage de la structure de la table congobook. medias
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `path` text,
  `type` varchar(50) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.medias : ~11 rows (environ)
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
INSERT INTO `medias` (`id`, `filename`, `size`, `path`, `type`, `state`, `flag`, `createdAt`, `updatedAt`) VALUES
	(1, '21-10-2021-04-15-50-31.pdf', 1275621, 'public/medias/pdfs/21-10-2021-04-15-50-31.pdf', 'pdf', 'true', 'true', '2021-10-21 17:15:50', '2021-10-21 17:15:50'),
	(2, '21-10-2021-04-17-58-31.png', 42578, 'public/medias/pngs/21-10-2021-04-17-58-31.png', 'png', 'true', 'true', '2021-10-21 17:17:58', '2021-10-21 17:17:58'),
	(3, '21-10-2021-04-32-55-31.pdf', 99952, 'public/medias/pdfs/21-10-2021-04-32-55-31.pdf', 'pdf', 'true', 'true', '2021-10-21 17:32:55', '2021-10-21 17:32:55'),
	(4, '21-10-2021-04-33-00-31.png', 21480, 'public/medias/pngs/21-10-2021-04-33-00-31.png', 'png', 'true', 'true', '2021-10-21 17:33:00', '2021-10-21 17:33:00'),
	(5, '22-10-2021-04-19-04-31.png', 38531, 'public/medias/pngs/22-10-2021-04-19-04-31.png', 'png', 'true', 'true', '2021-10-22 17:19:04', '2021-10-22 17:19:04'),
	(6, '22-10-2021-04-19-14-31.png', 38531, 'public/medias/pngs/22-10-2021-04-19-14-31.png', 'png', 'true', 'true', '2021-10-22 17:19:14', '2021-10-22 17:19:14'),
	(7, '22-10-2021-04-19-39-31.pdf', 4088659, 'public/medias/pdfs/22-10-2021-04-19-39-31.pdf', 'pdf', 'true', 'true', '2021-10-22 17:19:39', '2021-10-22 17:19:39'),
	(8, '22-10-2021-04-20-42-31.pdf', 2917272, 'public/medias/pdfs/22-10-2021-04-20-42-31.pdf', 'pdf', 'true', 'true', '2021-10-22 17:20:42', '2021-10-22 17:20:42'),
	(9, '22-10-2021-04-20-48-31.png', 63917, 'public/medias/pngs/22-10-2021-04-20-48-31.png', 'png', 'true', 'true', '2021-10-22 17:20:48', '2021-10-22 17:20:48'),
	(10, '22-10-2021-04-36-55-31.pdf', 929442, 'public/medias/pdfs/22-10-2021-04-36-55-31.pdf', 'pdf', 'true', 'true', '2021-10-22 17:36:55', '2021-10-22 17:36:55'),
	(11, '22-10-2021-04-37-00-31.png', 70073, 'public/medias/pngs/22-10-2021-04-37-00-31.png', 'png', 'true', 'true', '2021-10-22 17:37:00', '2021-10-22 17:37:00');
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;

-- Listage de la structure de la table congobook. session_admins
CREATE TABLE IF NOT EXISTS `session_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `dateLogout` datetime DEFAULT NULL,
  `kit` varchar(255) DEFAULT NULL,
  `system` varchar(255) DEFAULT NULL,
  `flag` enum('true','false') DEFAULT 'true',
  `state` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.session_admins : ~2 rows (environ)
/*!40000 ALTER TABLE `session_admins` DISABLE KEYS */;
INSERT INTO `session_admins` (`id`, `id_admin`, `dateLogout`, `kit`, `system`, `flag`, `state`, `createdAt`, `updatedAt`) VALUES
	(1, 4, '2021-10-20 12:55:27', NULL, '', 'true', 'true', '2021-10-20 13:09:01', '2021-10-20 13:55:27'),
	(2, 4, '2021-10-20 12:55:27', NULL, '', 'true', 'true', '2021-10-20 13:55:07', '2021-10-20 13:55:27'),
	(3, 4, NULL, NULL, '', 'true', 'true', '2021-10-20 13:56:30', '2021-10-20 13:56:30'),
	(4, 4, NULL, NULL, '', 'true', 'true', '2021-10-21 17:01:25', '2021-10-21 17:01:25'),
	(5, 4, NULL, NULL, '', 'true', 'true', '2021-10-22 17:39:44', '2021-10-22 17:39:44'),
	(6, 4, NULL, NULL, '', 'true', 'true', '2021-10-24 18:44:01', '2021-10-24 18:44:01'),
	(7, 4, NULL, NULL, '', 'true', 'true', '2021-10-27 11:39:15', '2021-10-27 11:39:15');
/*!40000 ALTER TABLE `session_admins` ENABLE KEYS */;

-- Listage de la structure de la table congobook. session_user
CREATE TABLE IF NOT EXISTS `session_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `dateLogout` datetime DEFAULT NULL,
  `kit` varchar(255) DEFAULT NULL,
  `system` varchar(255) DEFAULT NULL,
  `flag` enum('true','false') DEFAULT 'true',
  `state` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.session_user : ~9 rows (environ)
/*!40000 ALTER TABLE `session_user` DISABLE KEYS */;
INSERT INTO `session_user` (`id`, `idUser`, `dateLogout`, `kit`, `system`, `flag`, `state`, `createdAt`, `updatedAt`) VALUES
	(1, 2, '2021-10-20 12:14:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-20 09:19:03', '2021-10-20 13:14:59'),
	(2, 2, '2021-10-20 12:14:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-20 09:19:48', '2021-10-20 13:14:59'),
	(3, 2, '2021-10-20 12:14:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-20 09:21:18', '2021-10-20 13:14:59'),
	(4, 2, '2021-10-20 12:14:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-20 12:44:30', '2021-10-20 13:14:59'),
	(5, 2, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-20 13:21:36', '2021-10-20 13:21:36'),
	(6, 1, '2021-10-22 04:06:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-21 04:13:01', '2021-10-22 17:06:27'),
	(7, 1, '2021-10-22 04:06:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', '(Windows NT 10.0; Win64; x64; rv:94.0)', 'true', 'true', '2021-10-21 04:13:38', '2021-10-22 17:06:27'),
	(8, 1, '2021-10-22 04:06:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-21 16:58:08', '2021-10-22 17:06:27'),
	(9, 1, '2021-10-22 04:06:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-21 17:12:47', '2021-10-22 17:06:27'),
	(10, 1, '2021-10-22 04:06:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-22 17:06:22', '2021-10-22 17:06:27'),
	(11, 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', '(Windows NT 10.0; Win64; x64; rv:94.0)', 'true', 'true', '2021-10-22 17:06:44', '2021-10-22 17:06:44'),
	(12, 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', '(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)', 'true', 'true', '2021-10-27 11:38:52', '2021-10-27 11:38:52');
/*!40000 ALTER TABLE `session_user` ENABLE KEYS */;

-- Listage de la structure de la table congobook. types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intituled` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.types : ~2 rows (environ)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `intituled`, `description`, `state`, `flag`, `createdAt`, `updatedAt`) VALUES
	(1, 'Communication', 'Pour la communication', 'true', 'true', '2021-10-20 13:57:18', '2021-10-20 13:57:18'),
	(2, 'Informatique et Technologie', 'Informatique et Technologie', 'true', 'true', '2021-10-20 13:57:31', '2021-10-21 17:09:08'),
	(3, 'Romans et Littératures', 'Romans et Littératures', 'true', 'true', '2021-10-21 17:21:20', '2021-10-21 17:21:20');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Listage de la structure de la table congobook. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `state` enum('true','false') DEFAULT 'true',
  `flag` enum('true','false') DEFAULT 'true',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_users_countries` (`id_country`),
  CONSTRAINT `FK_users_countries` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `firstName`, `lastName`, `email`, `phone`, `town`, `id_country`, `adress`, `avatar`, `about`, `username`, `password`, `state`, `flag`, `createdAt`, `updatedAt`) VALUES
	(1, 'Don de Dieu Bolenge', NULL, NULL, 'dondedieubolenge@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$z0IhoxFnWoDZdviPuWpLgu74FWjGYMuqWhOg8xgqTUk8hNgUygez6', 'true', 'true', '2021-10-20 09:03:01', '2021-10-20 09:03:01'),
	(2, 'Don de Dieu', NULL, NULL, 'molisobolenge@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$VOZoftvG7yt1P7nQLqXTouMOvB2Tu056gI82NkPtNsoQBjtvAHT3W', 'true', 'true', '2021-10-20 09:09:16', '2021-10-20 09:09:16'),
	(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$EQn3HFAAwYr3kqNGmhJli.dddbTxtpMZ35wO6NT85ogkMakVJ1ItC', 'true', 'true', '2021-10-20 13:07:00', '2021-10-20 13:07:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table congobook. user_library
CREATE TABLE IF NOT EXISTS `user_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `flag` enum('true','false') DEFAULT 'true',
  `state` enum('true','false') DEFAULT 'true',
  `dateEndRead` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table congobook.user_library : ~0 rows (environ)
/*!40000 ALTER TABLE `user_library` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_library` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
