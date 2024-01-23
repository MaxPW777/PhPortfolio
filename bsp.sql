-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portfolio
CREATE DATABASE IF NOT EXISTS `portfolio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `portfolio`;

-- Dumping structure for table portfolio.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.admin: ~1 rows (approximately)
INSERT INTO `admin` (`AdminID`, `Username`, `Password`, `Email`) VALUES
	(1, 'admin', 'admin', 'mpinderwhite@gmail.com');

-- Dumping structure for table portfolio.blogposts
CREATE TABLE IF NOT EXISTS `blogposts` (
  `PostID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `PublishedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PostID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.blogposts: ~9 rows (approximately)
INSERT INTO `blogposts` (`PostID`, `Title`, `Content`, `PublishedDate`) VALUES
	(1, 'First Post', 'This is the content of the first blog post.', '2023-12-11 13:52:59'),
	(2, 'Second Post', 'This is the content of the second blog post.', '2023-12-11 13:52:59'),
	(3, 'Third Post', 'This is the content of the third blog post.', '2023-12-12 08:30:00'),
	(4, 'Fourth Post', 'This is the content of the fourth blog post.', '2023-12-12 13:45:00'),
	(5, 'Fifth Post', 'This is the content of the fifth blog post.', '2023-12-13 10:20:00'),
	(6, 'Sixth Post', 'This is the content of the sixth blog post.', '2023-12-14 15:10:00'),
	(7, 'Seventh Post', 'This is the content of the seventh blog post.', '2023-12-15 07:55:00'),
	(8, 'test', 'test', '2024-01-09 16:18:23'),
	(9, 'test ', 'test2', '2024-01-16 16:26:31');

-- Dumping structure for table portfolio.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryID`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.categories: ~3 rows (approximately)
INSERT INTO `categories` (`CategoryID`, `Name`) VALUES
	(3, 'Food'),
	(1, 'Technology'),
	(2, 'Travel');

-- Dumping structure for table portfolio.contactrequests
CREATE TABLE IF NOT EXISTS `contactrequests` (
  `RequestID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `SubmissionDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.contactrequests: ~2 rows (approximately)
INSERT INTO `contactrequests` (`RequestID`, `Name`, `Email`, `Message`, `SubmissionDate`) VALUES
	(1, 'John Doe', 'johndoe@example.com', 'This is a sample message from John Doe.', '2023-12-11 13:52:59'),
	(2, 'Jane Smith', 'janesmith@example.com', 'This is a sample message from Jane Smith.', '2023-12-11 13:52:59');

-- Dumping structure for table portfolio.postcategories
CREATE TABLE IF NOT EXISTS `postcategories` (
  `PostID` int NOT NULL,
  `CategoryID` int NOT NULL,
  PRIMARY KEY (`PostID`,`CategoryID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `postcategories_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `blogposts` (`PostID`) ON DELETE CASCADE,
  CONSTRAINT `postcategories_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.postcategories: ~4 rows (approximately)
INSERT INTO `postcategories` (`PostID`, `CategoryID`) VALUES
	(1, 1),
	(2, 2),
	(1, 3),
	(2, 3);

-- Dumping structure for table portfolio.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.projects: ~6 rows (approximately)
INSERT INTO `projects` (`ProjectID`, `Title`, `Description`, `CreationDate`, `Image`) VALUES
	(3, 'Lunitra Dashboard', 'Une tableau de bord pour jeux de roles en nextJs', '2023-09-18 08:00:00', 'lunitra.png'),
	(4, 'Black Death', 'Un rogue like horror survival en UE5', '2022-09-18 08:00:00', 'black_death.png'),
	(5, 'La place publique', 'Forum en go avec Gin', '2022-11-16 09:00:00', 'place_publique.png'),
	(6, 'Rust-passworder', 'systeme de cryptage de mot de passe en rust', '2024-01-09 18:00:00', 'rust-passworder.png'),
	(7, 'Thales CTF', 'Projet Capture the flag utilisant vite et react', '2023-10-10 07:00:00', NULL),
	(8, 'Portfolio PHP', 'Ce Portfolio', '2023-12-15 17:01:57', 'portfolio.png');

-- Dumping structure for table portfolio.projectskills
CREATE TABLE IF NOT EXISTS `projectskills` (
  `ProjectID` int NOT NULL,
  `SkillID` int NOT NULL,
  PRIMARY KEY (`ProjectID`,`SkillID`),
  KEY `SkillID` (`SkillID`),
  CONSTRAINT `projectskills_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`ProjectID`) ON DELETE CASCADE,
  CONSTRAINT `projectskills_ibfk_2` FOREIGN KEY (`SkillID`) REFERENCES `skills` (`SkillID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.projectskills: ~6 rows (approximately)
INSERT INTO `projectskills` (`ProjectID`, `SkillID`) VALUES
	(3, 1),
	(7, 1),
	(5, 2),
	(8, 3),
	(4, 4),
	(6, 5);

-- Dumping structure for table portfolio.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `SkillID` int NOT NULL AUTO_INCREMENT,
  `SkillName` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SkillID`),
  UNIQUE KEY `SkillName` (`SkillName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table portfolio.skills: ~5 rows (approximately)
INSERT INTO `skills` (`SkillID`, `SkillName`, `image`) VALUES
	(1, 'Web Developement', 'web.png'),
	(2, 'Golang', 'go.png'),
	(3, 'PHP', 'php.png'),
	(4, 'Game Development', 'unity.png'),
	(5, 'Rust', 'rust.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
