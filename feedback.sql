-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dress
DROP DATABASE IF EXISTS `dress`;
CREATE DATABASE IF NOT EXISTS `dress` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dress`;

-- Dumping structure for table dress.cart_order
DROP TABLE IF EXISTS `cart_order`;
CREATE TABLE IF NOT EXISTS `cart_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL,
  `prd_image` varchar(255) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `qty` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dress.cart_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `cart_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_order` ENABLE KEYS */;

-- Dumping structure for table dress.order
DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_date` varchar(50) DEFAULT NULL,
  `size` varchar(1000) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `prd_design` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Dumping data for table dress.order: ~22 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `user_id`, `order_date`, `size`, `price`, `product_id`, `color`, `prd_design`, `qty`, `status`) VALUES
	(56, 5, '2023-12-31 09:02:06', 's', '25', 4, 'Black', '52551.jpg', '1', 'Settle'),
	(57, 5, '2023-12-31 09:02:06', 'm', '25', 4, 'Black', '54071.jpg', '1', 'Reject'),
	(58, 5, '2023-12-31 13:04:58', 'l', '45', 1, 'Black', '5948360_F_597940292_dmaVD664ccNHMDJqi0Wv0SCSexklLyhO.jpg', '1', 'Pending'),
	(59, 5, '2023-12-31 13:04:59', 's', '15', 5, 'White', '5638360_F_597940292_dmaVD664ccNHMDJqi0Wv0SCSexklLyhO.jpg', '1', 'Pending');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table dress.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prd_name` varchar(255) DEFAULT NULL,
  `prd_quantity` int(100) unsigned NOT NULL DEFAULT '0',
  `prd_price` varchar(50) DEFAULT NULL,
  `img` varchar(225) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `size` varchar(1000) DEFAULT 's',
  `material` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dress.product: ~3 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `prd_name`, `prd_quantity`, `prd_price`, `img`, `category`, `brand`, `size`, `material`, `description`) VALUES
	(1, 'Men Long Sleeve T-Shirt with Collar', 22, '45', '1.jpg', 'best-selling', 'Nike', '["s","m","l","xl","2xl"]', 'Cotton', '-soft organic cotton\r\n-flax linen\r\n- hemp linen\r\n-silk'),
	(4, 'Men Short Sleeve with Collar', 18, '25', '113e09581e09c47c2ddd07503c465dd5.jpg_960x960q80.jpg_.webp', 'best-selling', 'Polo', '["s","m","l","xl","2xl"]', 'Nylon', '-Dry clean\r\n-Topwear Fabric Length: 3.6 m\r\n-Acrylic\r\n-Bottomwear Fabric Length: 3 m'),
	(5, 'Men Short Sleeve Relax shirt with round neck', 96, '15', '489114282_max.jpg', 'hot-sales', 'Adidas', '["s","m","l","xl","2xl"]', 'Fibre', '-Dry clean\r\n- fabric length: 3 m\r\n-Wool\r\n-Bottomwear fabric length: 3 m');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table dress.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(225) NOT NULL DEFAULT '',
  `password` varchar(225) NOT NULL DEFAULT '',
  `role` int(10) NOT NULL DEFAULT '0',
  `contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dress.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `contact`) VALUES
	(2, 'Sathiah', 'user@yahoo.com.my', '$2y$10$jv/OddDsjTqtXpY3kpg/X.ZY0TmMPJcYLIdhahNuO4UMgIctEahhm', 0, '018-2414655'),
	(3, 'Admin', 'admin@yahoo.com.my', '$2y$10$F0elw2Wflx/6N0wB6p4aoeAI14h5.6EXtkku9ryb16xBOSIodoh.a', 1, '018-2414655'),
	(4, 'Gaajendran', 'gaajendren@yahoo.com', '$2y$10$Jrbitd68aAqfqc/xXoeJEu3jKKxicaMDLYIFJaCm1wqr9.sBQgD9.', 1, '018-2414655'),
	(5, 'Gaajendren a/l Vivegananthen', 'gaajendren@yahoo.com.my', '$2y$10$SElgv6GIgWfh8N4Fbj11NuUw0Es4FVSZH3tlf8FasBmSFJPRXvaI2', 0, '018-2414655'),
	(6, 'Gaajendren a/l Vivegananthan', 'gaajendren@yahoo.com.edu', '$2y$10$l/f6jZDmiHCAjEm5i9em3OVLChCZU4owgU0HtWQLQXCcy3ASQgIqK', 1, '018-241465');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
