-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for real_estate
DROP DATABASE IF EXISTS `real_estate`;
CREATE DATABASE IF NOT EXISTS `real_estate` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `real_estate`;


-- Dumping structure for table real_estate.area
DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL,
  `area_label` varchar(50) DEFAULT NULL,
  `area_latitude` decimal(12,9) DEFAULT NULL,
  `area_longitude` decimal(12,9) DEFAULT NULL,
  `area_zoom` int(11) DEFAULT NULL,
  `area_radius` int(11) DEFAULT NULL,
  `area_municipality_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`area_id`),
  KEY `municipality_FK` (`area_municipality_id`),
  CONSTRAINT `municipality_FK` FOREIGN KEY (`area_municipality_id`) REFERENCES `municipality` (`municipality_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.area: ~0 rows (approximately)
DELETE FROM `area`;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`area_id`, `area_label`, `area_latitude`, `area_longitude`, `area_zoom`, `area_radius`, `area_municipality_id`) VALUES
	(1, 'test area', 44.444444400, 77.777777000, 14, 1000, 1);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


-- Dumping structure for table real_estate.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_created_date_time` datetime DEFAULT NULL,
  `customer_updated_date_time` datetime DEFAULT NULL,
  `customer_user_id` int(11) NOT NULL DEFAULT '0',
  `customer_customer_status_id` int(11) NOT NULL DEFAULT '0',
  `customer_customer_type_id` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(50) DEFAULT '0',
  `customer_lastname` varchar(50) DEFAULT '0',
  `customer_address` varchar(50) DEFAULT '0',
  `customer_address_no` int(11) NOT NULL DEFAULT '0',
  `customer_telephone` varchar(50) DEFAULT '0',
  `customer_mobile` varchar(50) DEFAULT '0',
  `customer_email` varchar(50) DEFAULT '0',
  `customer_username` varchar(50) NOT NULL DEFAULT '0',
  `customer_password` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`),
  KEY `FK_customer_user` (`customer_user_id`),
  KEY `FK_customer_customer_status` (`customer_customer_status_id`),
  KEY `FK_customer_customer_type` (`customer_customer_type_id`),
  CONSTRAINT `FK_customer_customer_status` FOREIGN KEY (`customer_customer_status_id`) REFERENCES `customer_status` (`customer_status_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_customer_customer_type` FOREIGN KEY (`customer_customer_type_id`) REFERENCES `customer_type` (`customer_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_customer_user` FOREIGN KEY (`customer_user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.customer: ~11 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`customer_id`, `customer_created_date_time`, `customer_updated_date_time`, `customer_user_id`, `customer_customer_status_id`, `customer_customer_type_id`, `customer_name`, `customer_lastname`, `customer_address`, `customer_address_no`, `customer_telephone`, `customer_mobile`, `customer_email`, `customer_username`, `customer_password`) VALUES
	(1, '2016-11-23 00:18:01', NULL, 1, 1, 1, 'Cust_test', 'Cust_tester', 'Siatistis 33', 0, '33991929394', '6966938492e', 'cust.test@test.com', 'test_customer', 'test_customer_pass'),
	(3, '2016-11-16 01:05:52', NULL, 1, 1, 1, 'asdf', 'adsffsr', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(5, '2016-11-16 01:01:26', NULL, 1, 2, 2, 'asdfaaa', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(6, '2016-11-16 01:01:42', NULL, 1, -1, 1, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(7, '2016-11-16 01:04:30', NULL, 1, 2, 1, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(8, '2016-11-16 01:29:41', NULL, 1, -1, 3, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.comγγγ', 'asfdgwqergtεαφαεφ', '123123123'),
	(9, '2016-11-16 01:04:35', NULL, 1, 1, 1, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(10, '2016-11-16 01:04:39', NULL, 1, 3, 1, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(11, '2016-11-17 20:02:37', NULL, 1, 2, 1, 'asdf', 'adsf', 'testadd', 2, '1341435133', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(12, '2016-11-16 01:04:58', NULL, 1, 2, 1, 'asdf', 'adsf', '1', 0, '134143513', '134135135', 'asdf@asdf.com', 'asfdgwqergt', '123123123'),
	(13, '2016-11-16 01:31:49', NULL, 1, 2, 2, ';ςερτυ;ς', '', '', 0, '', '', '', '', '');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Dumping structure for table real_estate.customer_status
DROP TABLE IF EXISTS `customer_status`;
CREATE TABLE IF NOT EXISTS `customer_status` (
  `customer_status_id` int(11) NOT NULL,
  `customer_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.customer_status: ~4 rows (approximately)
DELETE FROM `customer_status`;
/*!40000 ALTER TABLE `customer_status` DISABLE KEYS */;
INSERT INTO `customer_status` (`customer_status_id`, `customer_status_label`) VALUES
	(-1, 'Διαγραμμένος'),
	(1, 'Ενεργός'),
	(2, 'Ενεργός - Περιορισμένη πρόσβαση'),
	(3, 'Ανενεργός');
/*!40000 ALTER TABLE `customer_status` ENABLE KEYS */;


-- Dumping structure for table real_estate.customer_type
DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE IF NOT EXISTS `customer_type` (
  `customer_type_id` int(11) NOT NULL,
  `customer_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.customer_type: ~4 rows (approximately)
DELETE FROM `customer_type`;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` (`customer_type_id`, `customer_type_label`) VALUES
	(1, 'Ιδιοκτήτης προς πώληση'),
	(2, 'Ιδιοκτήτης προς ενοικίαση'),
	(3, 'Αγοραστής'),
	(4, 'Ενοικιαστής');
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.heating
DROP TABLE IF EXISTS `heating`;
CREATE TABLE IF NOT EXISTS `heating` (
  `heating_id` int(11) NOT NULL,
  `heating_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`heating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.heating: ~6 rows (approximately)
DELETE FROM `heating`;
/*!40000 ALTER TABLE `heating` DISABLE KEYS */;
INSERT INTO `heating` (`heating_id`, `heating_label`) VALUES
	(1, 'Χωρίς θέρμανση'),
	(2, 'Κλιματισμός'),
	(3, 'Ηλεκτρικά σώματα'),
	(4, 'Φυσικό αέριο'),
	(5, 'Πετρέλαιο');
/*!40000 ALTER TABLE `heating` ENABLE KEYS */;


-- Dumping structure for table real_estate.municipality
DROP TABLE IF EXISTS `municipality`;
CREATE TABLE IF NOT EXISTS `municipality` (
  `municipality_id` int(11) NOT NULL,
  `municipality_label` varchar(50) DEFAULT NULL,
  `municipality_latitude` decimal(12,9) DEFAULT NULL,
  `municipality_longitude` decimal(12,9) DEFAULT NULL,
  `municipality_zoom` int(11) DEFAULT NULL,
  `municipality_radius` int(11) DEFAULT NULL,
  `municipality_prefecture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`municipality_id`),
  KEY `prefecture_FK` (`municipality_prefecture_id`),
  CONSTRAINT `prefecture_FK` FOREIGN KEY (`municipality_prefecture_id`) REFERENCES `prefecture` (`prefecture_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.municipality: ~0 rows (approximately)
DELETE FROM `municipality`;
/*!40000 ALTER TABLE `municipality` DISABLE KEYS */;
INSERT INTO `municipality` (`municipality_id`, `municipality_label`, `municipality_latitude`, `municipality_longitude`, `municipality_zoom`, `municipality_radius`, `municipality_prefecture_id`) VALUES
	(1, 'test municipality', 33.333333300, 88.888888888, 10, 5000, 1);
/*!40000 ALTER TABLE `municipality` ENABLE KEYS */;


-- Dumping structure for table real_estate.prefecture
DROP TABLE IF EXISTS `prefecture`;
CREATE TABLE IF NOT EXISTS `prefecture` (
  `prefecture_id` int(11) NOT NULL,
  `prefecture_label` varchar(50) DEFAULT NULL,
  `prefecture_latitude` decimal(12,9) DEFAULT NULL,
  `prefecture_longitude` decimal(12,9) DEFAULT NULL,
  `prefecture_zoom` int(11) DEFAULT NULL,
  `prefecture_radius` int(11) DEFAULT NULL,
  PRIMARY KEY (`prefecture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.prefecture: ~0 rows (approximately)
DELETE FROM `prefecture`;
/*!40000 ALTER TABLE `prefecture` DISABLE KEYS */;
INSERT INTO `prefecture` (`prefecture_id`, `prefecture_label`, `prefecture_latitude`, `prefecture_longitude`, `prefecture_zoom`, `prefecture_radius`) VALUES
	(1, 'test prefecture', 22.222222200, 99.999999000, 8, 10000);
/*!40000 ALTER TABLE `prefecture` ENABLE KEYS */;


-- Dumping structure for table real_estate.property
DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_created_date_time` datetime DEFAULT NULL,
  `property_updated_date_time` datetime DEFAULT NULL,
  `property_user_id` int(11) NOT NULL DEFAULT '0',
  `property_property_status_id` int(11) DEFAULT '0',
  `property_property_type_id` int(11) DEFAULT '0',
  `property_transaction_type_id` int(11) NOT NULL DEFAULT '0',
  `property_heating_id` int(11) NOT NULL DEFAULT '0',
  `property_prefecture_id` int(11) NOT NULL DEFAULT '0',
  `property_municipality_id` int(11) NOT NULL DEFAULT '0',
  `property_area_id` int(11) NOT NULL DEFAULT '0',
  `property_sqm` decimal(10,2) NOT NULL DEFAULT '0.00',
  `property_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `property_description` varchar(1000) NOT NULL DEFAULT '0',
  `property_description_en` varchar(1000) DEFAULT NULL,
  `property_label` varchar(50) NOT NULL DEFAULT '0',
  `property_address` varchar(50) NOT NULL DEFAULT '0',
  `property_address_no` int(11) NOT NULL DEFAULT '0',
  `property_furnished` tinyint(1) NOT NULL DEFAULT '0',
  `property_balcony_sqm` int(11) NOT NULL DEFAULT '0',
  `property_garden_sqm` int(11) NOT NULL DEFAULT '0',
  `property_floor` int(11) NOT NULL DEFAULT '0',
  `property_levels` int(11) NOT NULL DEFAULT '0',
  `property_fireplace` int(11) NOT NULL DEFAULT '0',
  `property_air_condition` int(11) NOT NULL DEFAULT '0',
  `property_pool_sqm` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`property_id`),
  KEY `FK_property_user` (`property_user_id`),
  KEY `FK_property_property_status` (`property_property_status_id`),
  KEY `FK_property_property_type` (`property_property_type_id`),
  KEY `FK_property_transaction_type` (`property_transaction_type_id`),
  KEY `FK_property_heating` (`property_heating_id`),
  KEY `FK_property_prefecture` (`property_prefecture_id`),
  KEY `FK_property_municipality` (`property_municipality_id`),
  KEY `FK_property_area` (`property_area_id`),
  CONSTRAINT `FK_property_area` FOREIGN KEY (`property_area_id`) REFERENCES `area` (`area_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_heating` FOREIGN KEY (`property_heating_id`) REFERENCES `heating` (`heating_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_municipality` FOREIGN KEY (`property_municipality_id`) REFERENCES `municipality` (`municipality_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_prefecture` FOREIGN KEY (`property_prefecture_id`) REFERENCES `prefecture` (`prefecture_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_property_status` FOREIGN KEY (`property_property_status_id`) REFERENCES `property_status` (`property_status_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_property_type` FOREIGN KEY (`property_property_type_id`) REFERENCES `property_type` (`property_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_transaction_type` FOREIGN KEY (`property_transaction_type_id`) REFERENCES `transaction_type` (`transaction_type_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_property_user` FOREIGN KEY (`property_user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property: ~42 rows (approximately)
DELETE FROM `property`;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` (`property_id`, `property_created_date_time`, `property_updated_date_time`, `property_user_id`, `property_property_status_id`, `property_property_type_id`, `property_transaction_type_id`, `property_heating_id`, `property_prefecture_id`, `property_municipality_id`, `property_area_id`, `property_sqm`, `property_price`, `property_description`, `property_description_en`, `property_label`, `property_address`, `property_address_no`, `property_furnished`, `property_balcony_sqm`, `property_garden_sqm`, `property_floor`, `property_levels`, `property_fireplace`, `property_air_condition`, `property_pool_sqm`) VALUES
	(2, '2016-11-15 00:09:32', '2016-11-22 22:44:30', 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', '', 'spiti testaki', 'Siatistis', 33, 0, 25, 434, 43, 1, 34, 4, 0),
	(4, '2016-11-15 00:30:31', NULL, 1, 1, 4, 2, 5, 1, 1, 1, 65.00, 450.00, 'rent description for the rental property', NULL, 'rental test', 'Ag. Vasileiou', 3, 0, 8, 0, 2, 1, 0, 0, 0),
	(6, '2016-11-15 21:51:52', '2016-11-23 00:30:05', 1, 2, 3, 1, 2, 1, 1, 1, 123.00, 500000.00, 'perigrafh akinhtou edw pera', '', 'test etiketa', 'tetete', 23, 0, 20, 20, 1, 2, 3, 2, 0),
	(7, '2016-11-15 21:52:04', '2016-11-16 01:29:51', 1, 2, 3, 1, 2, 1, 1, 1, 123.00, 503400.00, 'perigrafh akinhtou edw pera', NULL, 'test etiketa', 'tetete', 23, 0, 20, 20, 1, 2, 3, 2, 0),
	(8, '2016-11-15 21:54:36', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(9, '2016-11-15 21:54:45', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(10, '2016-11-15 21:54:45', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(11, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(12, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(13, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(14, '2016-11-15 21:54:46', '2016-11-21 03:20:22', 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', '', 'test etiketoula', 'testtest', 12, 0, 11, 12, 123, 12, 13, 13, 0),
	(15, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(16, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(17, '2016-11-15 21:54:46', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(18, '2016-11-15 21:54:47', NULL, 1, 1, 3, 2, 2, 1, 1, 1, 123.00, 123123.00, 'test perigrafh epipleon testaki', NULL, 'test etiketoula', 'testtest', 12, 1, 11, 12, 123, 12, 13, 13, 0),
	(19, '2016-11-15 21:56:59', NULL, 1, 1, 1, 2, 1, 1, 1, 1, 1212.00, 123123.00, 'aaaaaaaaaaaaaaaaaaaaaa', NULL, '123', 'aaaa', 12, 1, 123, 123, 31, 12, 1, 1, 0),
	(20, '2016-11-15 21:58:28', '2016-11-17 20:06:08', 1, 1, 1, 1, 1, 1, 1, 1, 1.00, 123.00, '123123adfadfadf', 'asdgfargawrg', 'asdf', 'asd', 1, 0, 123, 123, 123, 123, 2, 2, 0),
	(21, '2016-11-15 22:00:25', NULL, 1, 2, 2, 1, 1, 1, 1, 1, 1.00, 1.00, '1', NULL, 'qf', '1', 1, 1, 1, 1, 1, 1, 1, 1, 0),
	(22, '2016-11-15 22:09:56', '2016-11-22 23:25:24', 1, 2, 2, 1, 1, 1, 1, 1, 1.00, 1.00, '1', '', 'qf', '1', 1, 0, 1, 1, 1, 1, 1, 1, 0),
	(25, '2016-11-15 22:11:02', NULL, 1, 3, 1, 2, 2, 1, 1, 1, 1.00, 123123.00, 'testargaregag', NULL, '123', 'asdf', 1, 0, 2323, 1231, 111, 12312, 12, 23, 0),
	(26, '2016-11-15 22:11:16', NULL, 1, 3, 1, 2, 2, 1, 1, 1, 1.00, 123123.00, 'testargaregag', NULL, '123', 'asdf', 1, 0, 2323, 1231, 111, 12312, 12, 23, 0),
	(27, '2016-11-15 22:11:18', NULL, 1, 3, 1, 2, 2, 1, 1, 1, 1.00, 123123.00, 'testargaregag', NULL, '123', 'asdf', 1, 0, 2323, 1231, 111, 12312, 12, 23, 0),
	(28, '2016-11-15 22:11:38', NULL, 1, 3, 1, 2, 2, 1, 1, 1, 1.00, 123123.00, 'testargaregag', NULL, '123', 'asdf', 1, 0, 2323, 1231, 111, 12312, 12, 23, 0),
	(29, '2016-11-15 22:11:41', NULL, 1, 3, 1, 2, 2, 1, 1, 1, 1.00, 123123.00, 'testargaregag', NULL, '123', 'asdf', 1, 0, 2323, 1231, 111, 12312, 12, 23, 0),
	(30, '2016-11-15 22:16:34', NULL, 1, 1, 3, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 3, 3, 0),
	(31, '2016-11-15 22:16:46', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(32, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(33, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(34, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(35, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(36, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(37, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(38, '2016-11-15 22:16:47', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(39, '2016-11-15 22:16:48', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(40, '2016-11-15 22:16:48', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(41, '2016-11-15 22:16:48', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(42, '2016-11-15 22:16:48', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(43, '2016-11-15 22:16:56', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 44, 1, 0, 0, 0),
	(44, '2016-11-15 22:17:27', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 4, 1, 0, 0, 0),
	(45, '2016-11-15 22:18:19', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 4, 1, 0, 0, 0),
	(46, '2016-11-15 22:18:20', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 4, 1, 0, 0, 0),
	(47, '2016-11-15 22:18:31', NULL, 1, 1, 1, 1, 4, 1, 1, 1, 12400.00, 250300.00, 'test description for property', NULL, 'spiti test', 'Siatistis', 33, 0, 25, 0, 4, 1, 0, 0, 0);
/*!40000 ALTER TABLE `property` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_customer
DROP TABLE IF EXISTS `property_customer`;
CREATE TABLE IF NOT EXISTS `property_customer` (
  `property_customer_property_id` int(11) NOT NULL DEFAULT '0',
  `property_customer_customer_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`property_customer_property_id`,`property_customer_customer_id`),
  KEY `FK_property_customer_customer` (`property_customer_customer_id`),
  CONSTRAINT `FK_property_customer_customer` FOREIGN KEY (`property_customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_property_customer_property` FOREIGN KEY (`property_customer_property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_customer: ~0 rows (approximately)
DELETE FROM `property_customer`;
/*!40000 ALTER TABLE `property_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_customer` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_level
DROP TABLE IF EXISTS `property_level`;
CREATE TABLE IF NOT EXISTS `property_level` (
  `property_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_level_property_id` int(11) NOT NULL DEFAULT '0',
  `property_level_level` int(11) NOT NULL DEFAULT '0',
  `property_level_room_type_id` int(11) NOT NULL DEFAULT '0',
  `property_level_room_sqm` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`property_level_id`),
  KEY `FK_property_level_property` (`property_level_property_id`),
  KEY `FK_property_level_room_type` (`property_level_room_type_id`),
  CONSTRAINT `FK_property_level_property` FOREIGN KEY (`property_level_property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_property_level_room_type` FOREIGN KEY (`property_level_room_type_id`) REFERENCES `room_type` (`room_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_level: ~0 rows (approximately)
DELETE FROM `property_level`;
/*!40000 ALTER TABLE `property_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_level` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_media
DROP TABLE IF EXISTS `property_media`;
CREATE TABLE IF NOT EXISTS `property_media` (
  `property_media_property_media_type_id` int(11) NOT NULL DEFAULT '0',
  `property_media_property_id` int(11) NOT NULL,
  `property_media_filename` varchar(50) NOT NULL DEFAULT '0',
  `property_media_path` varchar(100) NOT NULL DEFAULT '0',
  `property_media_extension` varchar(50) NOT NULL DEFAULT '0',
  `property_media_md5` varchar(150) NOT NULL,
  PRIMARY KEY (`property_media_property_id`,`property_media_md5`),
  KEY `FK_property_media_property_media_type` (`property_media_property_media_type_id`),
  CONSTRAINT `FK_property_media_property` FOREIGN KEY (`property_media_property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_property_media_property_media_type` FOREIGN KEY (`property_media_property_media_type_id`) REFERENCES `property_media_type` (`property_media_type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_media: ~0 rows (approximately)
DELETE FROM `property_media`;
/*!40000 ALTER TABLE `property_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_media` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_media_type
DROP TABLE IF EXISTS `property_media_type`;
CREATE TABLE IF NOT EXISTS `property_media_type` (
  `property_media_type_id` int(11) NOT NULL,
  `property_media_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_media_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_media_type: ~2 rows (approximately)
DELETE FROM `property_media_type`;
/*!40000 ALTER TABLE `property_media_type` DISABLE KEYS */;
INSERT INTO `property_media_type` (`property_media_type_id`, `property_media_type_label`) VALUES
	(1, 'Φωτογραφία'),
	(2, 'Βίντεο'),
	(3, 'Άλλο');
/*!40000 ALTER TABLE `property_media_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_status
DROP TABLE IF EXISTS `property_status`;
CREATE TABLE IF NOT EXISTS `property_status` (
  `property_status_id` int(11) NOT NULL,
  `property_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_status: ~5 rows (approximately)
DELETE FROM `property_status`;
/*!40000 ALTER TABLE `property_status` DISABLE KEYS */;
INSERT INTO `property_status` (`property_status_id`, `property_status_label`) VALUES
	(-1, 'Διαγραμμένο'),
	(1, 'Διαθέσιμο'),
	(2, 'Πωλήθηκε'),
	(3, 'Ενοικιάστηκε'),
	(4, 'Μη διαθέσιμο');
/*!40000 ALTER TABLE `property_status` ENABLE KEYS */;


-- Dumping structure for table real_estate.property_type
DROP TABLE IF EXISTS `property_type`;
CREATE TABLE IF NOT EXISTS `property_type` (
  `property_type_id` int(11) NOT NULL,
  `property_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.property_type: ~7 rows (approximately)
DELETE FROM `property_type`;
/*!40000 ALTER TABLE `property_type` DISABLE KEYS */;
INSERT INTO `property_type` (`property_type_id`, `property_type_label`) VALUES
	(1, 'Βίλα'),
	(2, 'Μεζονέτα'),
	(3, 'Μονοκατοικία'),
	(4, 'Διαμέρισμα'),
	(5, 'Αγροτική κατοικία'),
	(6, 'Οικόπεδο'),
	(7, 'Αγροτεμάχιο');
/*!40000 ALTER TABLE `property_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.request
DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_created_date_time` datetime DEFAULT NULL,
  `request_updated_date_time` datetime DEFAULT NULL,
  `request_transaction_type_id` int(11) DEFAULT NULL,
  `request_user_id` int(11) DEFAULT NULL,
  `request_customer_id` int(11) DEFAULT NULL,
  `request_sqm_from` decimal(10,2) DEFAULT NULL,
  `request_sqm_to` decimal(10,2) DEFAULT NULL,
  `request_price_from` decimal(10,2) DEFAULT NULL,
  `request_price_to` decimal(10,2) DEFAULT NULL,
  `request_furnished` tinyint(1) DEFAULT NULL,
  `request_balcony_sqm_from` decimal(10,2) DEFAULT NULL,
  `request_balcony_sqm_to` decimal(10,2) DEFAULT NULL,
  `request_garden_sqm_from` decimal(10,2) DEFAULT NULL,
  `request_garden_sqm_to` decimal(10,2) DEFAULT NULL,
  `request_floor` int(11) DEFAULT NULL,
  `request_levels` int(11) DEFAULT NULL,
  `request_fireplace` int(11) DEFAULT NULL,
  `request_air_condition` int(11) DEFAULT NULL,
  `request_pool_sqm_from` decimal(10,2) DEFAULT NULL,
  `request_pool_sqm_to` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `FK_request_user` (`request_user_id`),
  KEY `FK_request_customer` (`request_customer_id`),
  CONSTRAINT `FK_request_customer` FOREIGN KEY (`request_customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_request_user` FOREIGN KEY (`request_user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request: ~18 rows (approximately)
DELETE FROM `request`;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` (`request_id`, `request_created_date_time`, `request_updated_date_time`, `request_transaction_type_id`, `request_user_id`, `request_customer_id`, `request_sqm_from`, `request_sqm_to`, `request_price_from`, `request_price_to`, `request_furnished`, `request_balcony_sqm_from`, `request_balcony_sqm_to`, `request_garden_sqm_from`, `request_garden_sqm_to`, `request_floor`, `request_levels`, `request_fireplace`, `request_air_condition`, `request_pool_sqm_from`, `request_pool_sqm_to`) VALUES
	(1, '2016-11-18 00:20:14', NULL, NULL, 1, 1, 1.00, 4.00, 3.00, 6.00, 1, 2.00, 5.00, 5.00, 8.00, 4, 2, 11, 23, 4.00, 7.00),
	(2, '2016-11-18 00:20:16', NULL, NULL, 1, 1, 1.00, 4.00, 3.00, 6.00, 1, 2.00, 5.00, 5.00, 8.00, 4, 2, 11, 23, 4.00, 7.00),
	(3, '2016-11-18 00:20:16', NULL, NULL, 1, 1, 1.00, 4.00, 3.00, 6.00, 1, 2.00, 5.00, 5.00, 8.00, 4, 2, 11, 23, 4.00, 7.00),
	(4, '2016-11-18 00:30:45', NULL, NULL, 1, 1, 1.00, 4.00, 3.00, 6.00, 1, 2.00, 5.00, 5.00, 8.00, 4, 2, 11, 23, 4.00, 7.00),
	(5, '2016-11-18 00:31:51', NULL, NULL, 1, 1, 1.00, 4.00, 3.00, 6.00, 1, 2.00, 5.00, 5.00, 8.00, 4, 2, 11, 23, 4.00, 7.00),
	(6, '2016-11-18 00:34:45', '2016-11-23 01:12:43', 1, 1, 1, 1.00, 0.00, 3.00, 10.00, 1, 2.00, 6.00, 5.00, 9.00, 1, 6, 23, 4, 4.00, 8.00),
	(7, '2016-11-18 01:00:38', NULL, 1, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 1, 6, 2, 4, 4.00, 8.00),
	(8, '2016-11-18 01:01:26', NULL, 1, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 1, 6, 2, 4, 4.00, 8.00),
	(9, '2016-11-18 01:01:27', '2016-11-19 01:24:40', 1, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 1, 6, 2, 44, 4.00, 8.00),
	(10, '2016-11-19 00:21:44', NULL, 1, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 11, 10, 11, 99, 4.00, 8.00),
	(11, '2016-11-19 00:21:56', '2016-11-23 00:41:04', 1, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 11, 10, 11, 99, 4.00, 8.00),
	(12, '2016-11-19 00:25:02', '2016-11-19 00:31:18', 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 443, 4.00, 8.00),
	(13, '2016-11-19 00:25:06', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 44, 4.00, 8.00),
	(14, '2016-11-19 00:25:12', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 443, 4.00, 8.00),
	(15, '2016-11-19 00:25:15', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 442, 4.00, 8.00),
	(16, '2016-11-19 00:28:23', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 224, 11, 33, 44, 4.00, 8.00),
	(17, '2016-11-19 00:28:40', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 44, 4.00, 8.00),
	(18, '2016-11-19 00:28:44', NULL, 4, 1, 1, 1.00, 5.00, 3.00, 7.00, 1, 2.00, 6.00, 5.00, 9.00, 22, 11, 33, 44, 4.00, 8.00);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_area
DROP TABLE IF EXISTS `request_area`;
CREATE TABLE IF NOT EXISTS `request_area` (
  `request_area_request_id` int(11) NOT NULL,
  `request_area_area_id` int(11) NOT NULL,
  PRIMARY KEY (`request_area_request_id`,`request_area_area_id`),
  KEY `FK_request_area_area` (`request_area_area_id`),
  CONSTRAINT `FK_request_area_area` FOREIGN KEY (`request_area_area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_area_request` FOREIGN KEY (`request_area_request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_area: ~12 rows (approximately)
DELETE FROM `request_area`;
/*!40000 ALTER TABLE `request_area` DISABLE KEYS */;
INSERT INTO `request_area` (`request_area_request_id`, `request_area_area_id`) VALUES
	(6, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1);
/*!40000 ALTER TABLE `request_area` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_heating
DROP TABLE IF EXISTS `request_heating`;
CREATE TABLE IF NOT EXISTS `request_heating` (
  `request_heating_request_id` int(11) NOT NULL,
  `request_heating_heating_id` int(11) NOT NULL,
  PRIMARY KEY (`request_heating_request_id`,`request_heating_heating_id`),
  KEY `FK_request_heating_heating` (`request_heating_heating_id`),
  CONSTRAINT `FK_request_heating_heating` FOREIGN KEY (`request_heating_heating_id`) REFERENCES `heating` (`heating_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_heating_request` FOREIGN KEY (`request_heating_request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_heating: ~25 rows (approximately)
DELETE FROM `request_heating`;
/*!40000 ALTER TABLE `request_heating` DISABLE KEYS */;
INSERT INTO `request_heating` (`request_heating_request_id`, `request_heating_heating_id`) VALUES
	(6, 2),
	(6, 3),
	(8, 2),
	(8, 3),
	(9, 2),
	(9, 3),
	(10, 1),
	(10, 2),
	(11, 1),
	(11, 2),
	(12, 2),
	(12, 3),
	(12, 4),
	(13, 3),
	(13, 4),
	(14, 3),
	(14, 4),
	(15, 3),
	(15, 4),
	(16, 3),
	(16, 4),
	(17, 3),
	(17, 4),
	(18, 3),
	(18, 4);
/*!40000 ALTER TABLE `request_heating` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_municipality
DROP TABLE IF EXISTS `request_municipality`;
CREATE TABLE IF NOT EXISTS `request_municipality` (
  `request_municipality_request_id` int(11) NOT NULL,
  `request_municipality_municipality_id` int(11) NOT NULL,
  PRIMARY KEY (`request_municipality_request_id`,`request_municipality_municipality_id`),
  KEY `FK_request_municipality_municipality` (`request_municipality_municipality_id`),
  CONSTRAINT `FK_request_municipality_municipality` FOREIGN KEY (`request_municipality_municipality_id`) REFERENCES `municipality` (`municipality_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_municipality_request` FOREIGN KEY (`request_municipality_request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_municipality: ~12 rows (approximately)
DELETE FROM `request_municipality`;
/*!40000 ALTER TABLE `request_municipality` DISABLE KEYS */;
INSERT INTO `request_municipality` (`request_municipality_request_id`, `request_municipality_municipality_id`) VALUES
	(6, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1);
/*!40000 ALTER TABLE `request_municipality` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_prefecture
DROP TABLE IF EXISTS `request_prefecture`;
CREATE TABLE IF NOT EXISTS `request_prefecture` (
  `request_prefecture_request_id` int(11) NOT NULL,
  `request_prefecture_prefecture_id` int(11) NOT NULL,
  PRIMARY KEY (`request_prefecture_request_id`,`request_prefecture_prefecture_id`),
  KEY `FK_request_prefecture_prefecture` (`request_prefecture_prefecture_id`),
  CONSTRAINT `FK_request_prefecture_prefecture` FOREIGN KEY (`request_prefecture_prefecture_id`) REFERENCES `prefecture` (`prefecture_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_prefecture_request` FOREIGN KEY (`request_prefecture_request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_prefecture: ~12 rows (approximately)
DELETE FROM `request_prefecture`;
/*!40000 ALTER TABLE `request_prefecture` DISABLE KEYS */;
INSERT INTO `request_prefecture` (`request_prefecture_request_id`, `request_prefecture_prefecture_id`) VALUES
	(6, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1);
/*!40000 ALTER TABLE `request_prefecture` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_property
DROP TABLE IF EXISTS `request_property`;
CREATE TABLE IF NOT EXISTS `request_property` (
  `request_property_request_id` int(11) NOT NULL,
  `request_property_property_id` int(11) NOT NULL,
  `request_property_sent_date_time` datetime NOT NULL,
  PRIMARY KEY (`request_property_request_id`,`request_property_property_id`,`request_property_sent_date_time`),
  KEY `FK_request_property_property` (`request_property_property_id`),
  CONSTRAINT `FK_request_property_property` FOREIGN KEY (`request_property_property_id`) REFERENCES `property` (`property_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_request_property_request` FOREIGN KEY (`request_property_request_id`) REFERENCES `request` (`request_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_property: ~0 rows (approximately)
DELETE FROM `request_property`;
/*!40000 ALTER TABLE `request_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_property` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_status
DROP TABLE IF EXISTS `request_status`;
CREATE TABLE IF NOT EXISTS `request_status` (
  `request_status_request_id` int(11) NOT NULL,
  `request_status_status_id` int(11) NOT NULL,
  PRIMARY KEY (`request_status_request_id`,`request_status_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_status: ~20 rows (approximately)
DELETE FROM `request_status`;
/*!40000 ALTER TABLE `request_status` DISABLE KEYS */;
INSERT INTO `request_status` (`request_status_request_id`, `request_status_status_id`) VALUES
	(-1, 0),
	(1, 0),
	(2, 0),
	(6, 1),
	(8, 1),
	(8, 2),
	(9, 1),
	(9, 2),
	(10, 1),
	(10, 2),
	(11, 1),
	(11, 2),
	(12, 1),
	(12, 3),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1);
/*!40000 ALTER TABLE `request_status` ENABLE KEYS */;


-- Dumping structure for table real_estate.request_type
DROP TABLE IF EXISTS `request_type`;
CREATE TABLE IF NOT EXISTS `request_type` (
  `request_type_request_id` int(11) NOT NULL,
  `request_type_property_type_id` int(11) NOT NULL,
  PRIMARY KEY (`request_type_request_id`,`request_type_property_type_id`),
  KEY `FK_request_type_property_type` (`request_type_property_type_id`),
  CONSTRAINT `FK_request_type_property_type` FOREIGN KEY (`request_type_property_type_id`) REFERENCES `property_type` (`property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_type_request` FOREIGN KEY (`request_type_request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.request_type: ~26 rows (approximately)
DELETE FROM `request_type`;
/*!40000 ALTER TABLE `request_type` DISABLE KEYS */;
INSERT INTO `request_type` (`request_type_request_id`, `request_type_property_type_id`) VALUES
	(6, 3),
	(6, 4),
	(8, 1),
	(8, 2),
	(8, 3),
	(9, 1),
	(9, 2),
	(9, 3),
	(10, 3),
	(10, 4),
	(11, 3),
	(11, 4),
	(12, 1),
	(12, 3),
	(13, 1),
	(13, 3),
	(14, 1),
	(14, 3),
	(15, 1),
	(15, 3),
	(16, 1),
	(16, 3),
	(17, 1),
	(17, 3),
	(18, 1),
	(18, 3);
/*!40000 ALTER TABLE `request_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.room_type
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.room_type: ~0 rows (approximately)
DELETE FROM `room_type`;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.transaction_type
DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.transaction_type: ~5 rows (approximately)
DELETE FROM `transaction_type`;
/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
INSERT INTO `transaction_type` (`transaction_type_id`, `transaction_type_label`) VALUES
	(1, 'Πώληση'),
	(2, 'Ενοικίαση'),
	(3, 'Αντιπαροχή'),
	(4, 'Ανταλλαγή'),
	(5, 'Χαρίζεται');
/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;


-- Dumping structure for table real_estate.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(150) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_isadmin` tinyint(1) DEFAULT NULL,
  `user_user_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_user_user_status` (`user_user_status_id`),
  CONSTRAINT `FK_user_user_status` FOREIGN KEY (`user_user_status_id`) REFERENCES `user_status` (`user_status_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.user: ~22 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_name`, `user_lastname`, `user_username`, `user_password`, `user_email`, `user_isadmin`, `user_user_status_id`) VALUES
	(1, 'Test', 'Tester', 'test_user', 'test_pass', 'test@test.com', 1, 1),
	(2, '123', '456', 'teste', 'asdfasdf', 'asdf@asdf.com', NULL, NULL),
	(3, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(4, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(5, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(6, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(7, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(8, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(9, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(10, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(11, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', NULL, NULL),
	(12, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, NULL),
	(13, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, NULL),
	(14, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, -1),
	(15, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, -1),
	(16, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, -1),
	(17, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, -1),
	(18, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, 1),
	(19, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, 1),
	(20, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 0, 1),
	(25, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 1, 2),
	(26, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 1, 2),
	(27, 'asdf', 'asdf', 'test', 'asdf', 'asdf@adf', 1, 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table real_estate.user_status
DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table real_estate.user_status: ~4 rows (approximately)
DELETE FROM `user_status`;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`user_status_id`, `user_status_label`) VALUES
	(-1, 'Διαγραμμένος'),
	(1, 'Ενεργός'),
	(2, 'Ενεργός - Μόνο εγγραφή'),
	(3, 'Ενεργός - Μόνο ανάγνωση'),
	(4, 'Ανενεργός');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
