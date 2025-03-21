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


-- Dumping database structure for tms
CREATE DATABASE IF NOT EXISTS `tms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tms`;

-- Dumping structure for table tms.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'admin@gmail.com', '123456');

-- Dumping structure for table tms.cabs
CREATE TABLE IF NOT EXISTS `cabs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cab_name` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `cab_number` varchar(20) NOT NULL,
  `cab_type` varchar(50) NOT NULL,
  `seating_capacity` int NOT NULL,
  `fare_per_km` decimal(10,2) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.cabs: ~1 rows (approximately)
INSERT INTO `cabs` (`id`, `cab_name`, `driver_name`, `contact`, `cab_number`, `cab_type`, `seating_capacity`, `fare_per_km`, `city`) VALUES
	(1, 'alto', 'raju', '8968552256', 'pb10ab5005', 'hatchback', 3, 7.00, ''),
	(3, 'swift', 'rajveer', '8968555555', 'pb50sc7845', 'sedan', 4, 9.00, 'goa');

-- Dumping structure for table tms.flights
CREATE TABLE IF NOT EXISTS `flights` (
  `id` int NOT NULL AUTO_INCREMENT,
  `airline` varchar(255) NOT NULL,
  `flight_number` varchar(50) NOT NULL,
  `departure_airport` varchar(255) NOT NULL,
  `arrival_airport` varchar(255) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.flights: ~2 rows (approximately)
INSERT INTO `flights` (`id`, `airline`, `flight_number`, `departure_airport`, `arrival_airport`, `departure_time`, `arrival_time`, `price`) VALUES
	(1, 'abc', '123456', 'delhi', 'goa', '2025-02-26 17:26:00', '2025-02-26 20:26:00', 8000.00),
	(2, 'abc', '123458', 'delhi', 'goa', '2025-02-26 17:26:00', '2025-02-26 20:26:00', 8000.00);

-- Dumping structure for table tms.hotels
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `rating` int DEFAULT NULL,
  `rooms_type` varchar(255) NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `rooms` int NOT NULL,
  `min_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `hotels_chk_1` CHECK ((`rating` between 1 and 5))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.hotels: ~2 rows (approximately)
INSERT INTO `hotels` (`id`, `name`, `email`, `password`, `contact`, `manager`, `address`, `state`, `city`, `pincode`, `rating`, `rooms_type`, `check_in_time`, `check_out_time`, `rooms`, `min_price`) VALUES
	(1, 'sample', 'sample@gmail.com', '$2y$10$TK14B0ntHZ8u28Pwxujhs.j9ediXAPRigxlH61Nz/UVvcKPfo1qru', '8968552660', 'Rajveer', '952 maya nagar', 'punjab', 'ludhiana', '141001', 3, '3', '12:00:00', '11:00:00', 10, 1200.00);

-- Dumping structure for table tms.package_images
CREATE TABLE IF NOT EXISTS `package_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_cover` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `package_id` (`package_id`),
  CONSTRAINT `package_images_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.package_images: ~4 rows (approximately)
INSERT INTO `package_images` (`id`, `package_id`, `image_path`, `is_cover`) VALUES
	(1, 2, 'uploads/Screenshot 2024-10-21 153530.png', 1),
	(2, 2, 'uploads/Screenshot 2024-10-21 153530.png', 0),
	(3, 1, 'uploads/Screenshot 2024-10-21 153530.png', 1),
	(4, 1, 'uploads/Screenshot 2024-10-21 153530.png', 0);

-- Dumping structure for table tms.travel_packages
CREATE TABLE IF NOT EXISTS `travel_packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `package_type` enum('Honeymoon','Family Trip','Adventure','Business Trip') NOT NULL,
  `hotel_id` int NOT NULL,
  `cab_id` int NOT NULL,
  `flight_id` int NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `no_of_days` int NOT NULL,
  `total_persons` int NOT NULL,
  `breakfast` tinyint(1) NOT NULL DEFAULT '0',
  `dinner` tinyint(1) NOT NULL DEFAULT '0',
  `tour_guide` tinyint(1) NOT NULL DEFAULT '0',
  `activities` text NOT NULL,
  `transport_type` enum('Private Car','Shared Bus','Rental Vehicle') NOT NULL,
  `cancellation_policy` text NOT NULL,
  `special_requests` text NOT NULL,
  `insurance` tinyint(1) NOT NULL DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `cab_id` (`cab_id`),
  KEY `flight_id` (`flight_id`),
  CONSTRAINT `travel_packages_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  CONSTRAINT `travel_packages_ibfk_2` FOREIGN KEY (`cab_id`) REFERENCES `cabs` (`id`),
  CONSTRAINT `travel_packages_ibfk_3` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.travel_packages: ~2 rows (approximately)
INSERT INTO `travel_packages` (`id`, `package_name`, `package_type`, `hotel_id`, `cab_id`, `flight_id`, `departure_date`, `return_date`, `no_of_days`, `total_persons`, `breakfast`, `dinner`, `tour_guide`, `activities`, `transport_type`, `cancellation_policy`, `special_requests`, `insurance`, `discount`, `total_amount`, `city`) VALUES
	(1, 'ascas', 'Family Trip', 1, 1, 1, '2025-02-26', '2025-03-01', 5, 3, 1, 1, 1, 'ascas', 'Private Car', 'ascas', 'asvdsd', 1, 10.00, 50000.00, ''),
	(2, 'ascas', 'Family Trip', 1, 1, 1, '2025-02-26', '2025-03-01', 5, 3, 1, 1, 1, 'ascas', 'Private Car', 'ascas', 'asvdsd', 1, 10.00, 50000.00, '');

-- Dumping structure for table tms.trips
CREATE TABLE IF NOT EXISTS `trips` (
  `trip_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `trip_name` varchar(255) NOT NULL,
  `start_location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trip_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.trips: ~0 rows (approximately)

-- Dumping structure for table tms.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tms.users: ~0 rows (approximately)
INSERT INTO `users` (`user_id`, `name`, `email`, `contact`, `password`, `address`, `city`) VALUES
	(1, 'naveen', 'naveen@gmail.com', '1234567894', '$2y$10$LR8DF5tfdub6mF/4dWEHwuhxgL79TtGkhxeBYRCEvxOK.lsCT6JrW', '952 maya nagar', 'ludhiana');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
