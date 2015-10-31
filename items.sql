-- --------------------------------------------------------
-- Host:                         192.168.10.10
-- Server version:               5.6.27-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table draggable.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table draggable.items: ~7 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(1, 'Test 1', 4, '0000-00-00 00:00:00', '2015-10-31 20:49:28');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(124, 'Testing', 5, '2015-10-30 10:20:42', '2015-10-31 20:49:28');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(127, 'Ohhhhhh', 7, '2015-10-30 10:40:27', '2015-10-31 20:49:26');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(131, 'Another item', 3, '2015-10-30 10:54:12', '2015-10-31 20:49:28');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(141, 'yet another item', 1, '2015-10-30 11:53:44', '2015-10-31 20:49:28');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(143, 'new', 6, '2015-10-30 12:34:29', '2015-10-31 20:49:26');
INSERT INTO `items` (`id`, `title`, `item_order`, `created_at`, `updated_at`) VALUES
	(145, '12345', 2, '2015-10-30 14:31:37', '2015-10-31 20:49:28');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
