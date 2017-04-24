-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for standb
CREATE DATABASE IF NOT EXISTS `standb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `standb`;

-- Dumping structure for table standb.articlemedia
CREATE TABLE IF NOT EXISTS `articlemedia` (
  `article_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.articlemedia: ~0 rows (approximately)
/*!40000 ALTER TABLE `articlemedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `articlemedia` ENABLE KEYS */;

-- Dumping structure for table standb.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TITLE',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `article-author` (`author_id`),
  KEY `article-category` (`category_id`),
  CONSTRAINT `article-author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `article-category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.articles: ~1 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `body`, `author_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Bloempotjes en plantentrays welkom op het containe', '\r\n\r\nWat te doen met lege plastic bloempotjes en plantentrays? U kan ze voortaan kwijt in de containerparken. De inzameling is gratis, zo bespaart u ineens op uw restafval. De ingezamelde potjes worden gerecycleerd tot plastic korrels.\r\n\r\nIn de lente kriebelt het om de tuin of het terras op te fleuren met bloemen en planten. Die worden vaak verkocht in plastic potjes en plantentrays, die bij het restafval horen. Vanaf nu worden ze ook apart ingezameld in de containerparken.\r\nEen tweede leven\r\n\r\nDoordat de plastic bloempotjes apart worden ingezameld in het containerpark is er geen aparte uitsortering meer nodig. Ze worden verwerkt tot korrels. Met deze secundaire grondstof kunnen onder andere nieuwe bloempotjes gemaakt worden.\r\nVeegschoon\r\n\r\nBij het binnenbrengen van de plastic potjes en plantentrays moeten deze veegschoon zijn. De inzameling is gratis.\r\nMeer kleine fracties\r\n\r\nDe stad Antwerpen wil de afvalberg verkleinen door meer kleine fracties uit de witte restafvalzak te halen.\r\n\r\n    Vorig jaar werd ‘De Collectie’ gelanceerd voor het inzamelen textiel.\r\n    U kan intussen ook met kurk terecht op het containerpark.\r\n    Later dit jaar worden de gratis fracties nog uitgebreid naar: harde plastic, piepschuim, vlak glas, kaarsvet en plasticfolie.\r\n\r\n', NULL, 9, '2017-03-27 19:06:01', '2017-03-27 19:09:47');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table standb.campi
CREATE TABLE IF NOT EXISTS `campi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  `field_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `campus-school` (`school_id`),
  KEY `campus-contact` (`contact_id`),
  KEY `campus-field` (`field_id`),
  CONSTRAINT `campus-contact` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `campus-field` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`),
  CONSTRAINT `campus-school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.campi: ~0 rows (approximately)
/*!40000 ALTER TABLE `campi` DISABLE KEYS */;
/*!40000 ALTER TABLE `campi` ENABLE KEYS */;

-- Dumping structure for table standb.campusfields
CREATE TABLE IF NOT EXISTS `campusfields` (
  `campus_id` int(10) unsigned DEFAULT NULL,
  `field_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.campusfields: ~0 rows (approximately)
/*!40000 ALTER TABLE `campusfields` DISABLE KEYS */;
/*!40000 ALTER TABLE `campusfields` ENABLE KEYS */;

-- Dumping structure for table standb.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.categories: ~8 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Politiek'),
	(2, 'Religie'),
	(3, 'Sport'),
	(4, 'Technologie'),
	(5, 'Mobiliteit'),
	(6, 'Weer'),
	(7, 'Cultuur'),
	(8, 'Campus updates'),
	(9, 'Milieu');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table standb.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned DEFAULT NULL,
  `sight_id` int(10) unsigned DEFAULT NULL,
  `campus_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment-user` (`user_id`),
  KEY `comment-article` (`article_id`),
  KEY `comment-sight` (`sight_id`),
  KEY `comment-campus` (`campus_id`),
  CONSTRAINT `comment-article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `comment-campus` FOREIGN KEY (`campus_id`) REFERENCES `campi` (`id`),
  CONSTRAINT `comment-sight` FOREIGN KEY (`sight_id`) REFERENCES `sights` (`id`),
  CONSTRAINT `comment-user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table standb.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.contacts: ~0 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table standb.fields
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.fields: ~0 rows (approximately)
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;

-- Dumping structure for table standb.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.links: ~0 rows (approximately)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

-- Dumping structure for table standb.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.media: ~0 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table standb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.migrations: ~16 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2017_03_27_154014_create_scores_table', 1),
	(2, '2017_03_27_154026_create_users_table', 1),
	(3, '2017_03_27_154033_create_articles_table', 1),
	(4, '2017_03_27_154051_create_categories_table', 1),
	(5, '2017_03_27_154114_create_comments_table', 1),
	(6, '2017_03_27_154122_create_articleMedia_table', 1),
	(7, '2017_03_27_154130_create_media_table', 1),
	(8, '2017_03_27_154138_create_sightMedia_table', 1),
	(9, '2017_03_27_154146_create_sights_table', 1),
	(10, '2017_03_27_154154_create_contacts_table', 1),
	(11, '2017_03_27_154201_create_campi_table', 1),
	(12, '2017_03_27_154209_create_schools_table', 1),
	(13, '2017_03_27_154217_create_links_table', 1),
	(14, '2017_03_27_154228_create_roles_table', 1),
	(15, '2017_03_27_154236_create_fields_table', 1),
	(16, '2017_03_27_154247_create_schoolFields_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table standb.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Guest',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `title`) VALUES
	(1, 'Student'),
	(2, 'Approver'),
	(3, 'Editor'),
	(4, 'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table standb.schools
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.schools: ~0 rows (approximately)
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;

-- Dumping structure for table standb.scores
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pinten` int(10) unsigned NOT NULL DEFAULT '0',
  `uitgaan` int(10) unsigned NOT NULL DEFAULT '0',
  `sport` int(10) unsigned NOT NULL DEFAULT '0',
  `cultuur` int(10) unsigned NOT NULL DEFAULT '0',
  `studie` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.scores: ~0 rows (approximately)
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;

-- Dumping structure for table standb.sightmedia
CREATE TABLE IF NOT EXISTS `sightmedia` (
  `sight_id` int(10) unsigned DEFAULT NULL,
  `media_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.sightmedia: ~0 rows (approximately)
/*!40000 ALTER TABLE `sightmedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `sightmedia` ENABLE KEYS */;

-- Dumping structure for table standb.sights
CREATE TABLE IF NOT EXISTS `sights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `contact_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sight-contact` (`contact_id`),
  KEY `sight-media` (`media_id`),
  CONSTRAINT `sight-contact` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `sight-media` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.sights: ~0 rows (approximately)
/*!40000 ALTER TABLE `sights` DISABLE KEYS */;
/*!40000 ALTER TABLE `sights` ENABLE KEYS */;

-- Dumping structure for table standb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user-score` (`score_id`),
  KEY `user-role` (`role_id`),
  CONSTRAINT `user-role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user-score` FOREIGN KEY (`score_id`) REFERENCES `scores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table standb.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `facebook`, `score_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 'student1', 'Student', '1', 'student1', 'x', NULL, 1, '2017-03-27 19:07:02', '2017-03-27 19:10:58'),
	(2, 'admin', 'Den', 'Admin', 'admin', 'x', NULL, 4, '2017-03-27 19:12:12', '2017-03-27 19:12:51'),
	(3, 'approver', '', '', '', NULL, NULL, 2, '2017-03-27 19:12:52', '2017-03-27 19:12:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
