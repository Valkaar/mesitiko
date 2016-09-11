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
  `area_zoom` decimal(12,9) DEFAULT NULL,
  `area_radius` decimal(12,9) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.customer_status
DROP TABLE IF EXISTS `customer_status`;
CREATE TABLE IF NOT EXISTS `customer_status` (
  `customer_status_id` int(11) NOT NULL,
  `customer_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.customer_type
DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE IF NOT EXISTS `customer_type` (
  `customer_type_id` int(11) NOT NULL,
  `customer_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.heating
DROP TABLE IF EXISTS `heating`;
CREATE TABLE IF NOT EXISTS `heating` (
  `heating_id` int(11) NOT NULL,
  `heating_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`heating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.municipality
DROP TABLE IF EXISTS `municipality`;
CREATE TABLE IF NOT EXISTS `municipality` (
  `municipality_id` int(11) NOT NULL,
  `municipality_label` varchar(50) DEFAULT NULL,
  `municipality_latitude` decimal(12,9) DEFAULT NULL,
  `municipality_longitude` decimal(12,9) DEFAULT NULL,
  `municipality_zoom` decimal(12,9) DEFAULT NULL,
  `municipality_radius` decimal(12,9) DEFAULT NULL,
  PRIMARY KEY (`municipality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.prefecture
DROP TABLE IF EXISTS `prefecture`;
CREATE TABLE IF NOT EXISTS `prefecture` (
  `prefecture_id` int(11) NOT NULL,
  `prefecture_label` varchar(50) DEFAULT NULL,
  `prefecture_latitude` decimal(12,9) DEFAULT NULL,
  `prefecture_longitude` decimal(12,9) DEFAULT NULL,
  `prefecture_zoom` decimal(12,9) DEFAULT NULL,
  `prefecture_radius` decimal(12,9) DEFAULT NULL,
  PRIMARY KEY (`prefecture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
  `property_label` varchar(50) NOT NULL DEFAULT '0',
  `property_address` varchar(50) NOT NULL DEFAULT '0',
  `property_address_no` int(11) NOT NULL DEFAULT '0',
  `property_furnished` tinyint(1) NOT NULL DEFAULT '0',
  `property_balcony_sqm` int(11) NOT NULL DEFAULT '0',
  `property_garden_sqm` int(11) NOT NULL DEFAULT '0',
  `property_floor` int(11) NOT NULL DEFAULT '0',
  `property_levels` int(11) NOT NULL DEFAULT '0',
  `property_fireplace` int(11) NOT NULL DEFAULT '0',
  `propery_air_condition` int(11) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table real_estate.property_media_type
DROP TABLE IF EXISTS `property_media_type`;
CREATE TABLE IF NOT EXISTS `property_media_type` (
  `property_media_type_id` int(11) NOT NULL,
  `property_media_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_media_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.property_status
DROP TABLE IF EXISTS `property_status`;
CREATE TABLE IF NOT EXISTS `property_status` (
  `property_status_id` int(11) NOT NULL,
  `property_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.property_type
DROP TABLE IF EXISTS `property_type`;
CREATE TABLE IF NOT EXISTS `property_type` (
  `property_type_id` int(11) NOT NULL,
  `property_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.request
DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_created_date_time` datetime DEFAULT NULL,
  `request_updated_date_time` datetime DEFAULT NULL,
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
  `request_fireplace` tinyint(1) DEFAULT NULL,
  `request_air_condition` tinyint(1) DEFAULT NULL,
  `request_pool_sqm_from` decimal(10,2) DEFAULT NULL,
  `request_pool_sqm_to` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `FK_request_user` (`request_user_id`),
  KEY `FK_request_customer` (`request_customer_id`),
  CONSTRAINT `FK_request_customer` FOREIGN KEY (`request_customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_request_user` FOREIGN KEY (`request_user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table real_estate.request_status
DROP TABLE IF EXISTS `request_status`;
CREATE TABLE IF NOT EXISTS `request_status` (
  `request_status_id` int(11) NOT NULL,
  `request_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`request_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table real_estate.room_type
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.transaction_type
DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_label` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table real_estate.user_status
DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
