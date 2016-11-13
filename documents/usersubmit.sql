-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for flah
CREATE DATABASE IF NOT EXISTS `flah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `flah`;


-- Dumping structure for table flah.usersubmit
DROP TABLE IF EXISTS `usersubmit`;
CREATE TABLE IF NOT EXISTS `usersubmit` (
  `submitID` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `isUrgent` enum('Yes','No') NOT NULL,
  `deadline` datetime NOT NULL,
  `isFunded` enum('Yes','No') NOT NULL,
  `fundAmt` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `amtRaised` float NOT NULL DEFAULT '0',
  `dateSubmit` datetime NOT NULL,
  PRIMARY KEY (`submitID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table flah.usersubmit: ~2 rows (approximately)
/*!40000 ALTER TABLE `usersubmit` DISABLE KEYS */;
INSERT INTO `usersubmit` (`submitID`, `title`, `fname`, `lname`, `isUrgent`, `deadline`, `isFunded`, `fundAmt`, `description`, `amtRaised`, `dateSubmit`) VALUES
	(1, '0', '', '', 'Yes', '0000-00-00 00:00:00', 'Yes', 0, '', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `usersubmit` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
