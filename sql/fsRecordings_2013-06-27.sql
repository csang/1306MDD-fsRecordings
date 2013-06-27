# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: fsRecordings
# Generation Time: 2013-06-27 21:01:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table recruits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recruits`;

CREATE TABLE `recruits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `recruited_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `recruited_id` (`recruited_id`),
  CONSTRAINT `recruits_ibfk_2` FOREIGN KEY (`recruited_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recruits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL DEFAULT '',
  `email2` varchar(30) DEFAULT NULL,
  `usercode` int(15) unsigned DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recruits` int(11) DEFAULT NULL,
  `admin` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `usercode` (`usercode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email2`, `usercode`, `updated`, `created`, `recruits`, `admin`)
VALUES
	(24,'dmitrimijailov',NULL,'dimitrimijailov@fullsail.edu',NULL,4294967295,'0000-00-00 00:00:00','2013-06-26 06:08:29',NULL,0),
	(26,'justinmathews',NULL,'justinmathews@fullsail.edu',NULL,4294967294,'2013-06-27 16:42:38','2013-06-27 04:21:56',NULL,0),
	(27,'cras solar lillard',NULL,'melle216@fullsail.edu',NULL,4294967293,'2013-06-27 16:59:59','2013-06-27 04:22:58',NULL,0),
	(28,'Shogun Assason tha1t',NULL,'jimwall@fullsail.edu',NULL,4294967292,'2013-06-27 17:00:03','2013-06-27 04:23:47',NULL,0),
	(29,'Trilogymusic',NULL,'rjumper@fullsail.edu',NULL,4294967291,'2013-06-27 17:00:07','2013-06-27 04:24:40',NULL,0),
	(30,'casteroflans',NULL,'eelancastrr@fullsail.edu',NULL,4294967290,'2013-06-27 17:00:12','2013-06-27 04:25:18',NULL,0),
	(31,'Rashad diamonaire',NULL,'lrbeard@fullsail.edu',NULL,4294967289,'2013-06-27 17:00:16','2013-06-27 04:26:03',NULL,0),
	(32,'MLRProductions',NULL,'mram93@fullsail.edu',NULL,4294967288,'2013-06-27 17:00:21','0000-00-00 00:00:00',NULL,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
