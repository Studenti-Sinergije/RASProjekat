-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Verzija:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ras
DROP DATABASE IF EXISTS `ras`;
CREATE DATABASE IF NOT EXISTS `ras` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ras`;

-- Dumping structure for table ras.ad
DROP TABLE IF EXISTS `ad`;
CREATE TABLE IF NOT EXISTS `ad` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_ID` int(10) unsigned NOT NULL,
  `creator_ID` int(10) unsigned NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `num_of_views` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `price` double NOT NULL,
  `type_of_transaction` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `cat_ID` (`cat_ID`),
  KEY `creator_ID` (`creator_ID`),
  CONSTRAINT `cat_ID` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `creator_ID` FOREIGN KEY (`creator_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table ras.ad: ~11 rows (approximately)
DELETE FROM `ad`;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` (`ID`, `cat_ID`, `creator_ID`, `created_on`, `num_of_views`, `name`, `description`, `price`, `type_of_transaction`, `image`) VALUES
	(5, 1, 1, '2019-11-16 22:15:14', 0, 'Renault Megane', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 1, 'images/1573938914.jpg'),
	(6, 1, 1, '2019-11-17 12:50:01', 6, 'Golf 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941150.jpg'),
	(7, 1, 1, '2019-11-16 22:52:49', 0, 'Golf 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941169.jpg'),
	(8, 1, 1, '2019-11-16 22:53:12', 0, 'Golf 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 10000, 1, 'images/1573941192.jpg'),
	(9, 1, 1, '2019-11-16 22:53:38', 0, 'Golf 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 10000, 0, 'images/1573941218.jpg'),
	(10, 1, 1, '2019-11-16 22:53:55', 0, 'Golf 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941235.jpg'),
	(11, 1, 1, '2019-11-16 22:54:10', 3, 'Golf 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941250.jpg'),
	(13, 1, 1, '2019-11-17 12:50:03', 5, 'Passat 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 10000, 0, 'images/1573941359.jpg'),
	(14, 1, 1, '2019-11-17 13:12:31', 50, 'Passat 8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941396.jpg'),
	(15, 1, 1, '2019-11-17 12:37:12', 1, 'Passat CC', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941431.jpg'),
	(16, 1, 1, '2019-11-17 13:03:11', 90, 'Renault Laguna Coupe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 15000, 0, 'images/1573941481.jpg');
/*!40000 ALTER TABLE `ad` ENABLE KEYS */;

-- Dumping structure for table ras.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table ras.categories: ~10 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`ID`, `name`, `image`) VALUES
	(1, 'Automobili', 'rsz_auto.jpg'),
	(2, 'Nekretnine', 'rsz_1nekretnina.jpg'),
	(3, 'Mobilni uredjaji', 'rsz_phone.jpg'),
	(4, 'Kompjuteri', 'rsz_comp.jpg'),
	(5, 'Tehnika', 'rsz_tehnika.jpg'),
	(6, 'Poslovi', 'rsz_job.jpg'),
	(7, 'Biznis', 'rsz_biznis.jpg'),
	(8, 'Odjeca i obuca', 'rsz_ofinger.jpg'),
	(9, 'Nakit', 'rsz_nakit.jpg'),
	(10, 'Literatura', 'rsz_knjiga.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table ras.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_level` int(11) NOT NULL DEFAULT 1 COMMENT '1=user',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ras.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `email`, `password`, `phone`, `created_on`, `user_level`) VALUES
	(1, 'dusko@dusko.com', '$2y$10$9E9L4VJyeEoihrMmHGHEuurktnTmHtvxILp.HfOg/LS8AVr/ReQja', '065326549', '2019-11-16 20:16:51', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
