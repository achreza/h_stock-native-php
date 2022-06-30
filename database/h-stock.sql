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


-- Dumping database structure for h-stock
CREATE DATABASE IF NOT EXISTS `h-stock` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `h-stock`;

-- Dumping structure for table h-stock.foto
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nama_foto` varchar(50) NOT NULL DEFAULT '0',
  `tanggal_upload` date NOT NULL,
  `harga_foto` int(11) NOT NULL DEFAULT '0',
  `keyword` varchar(250) NOT NULL DEFAULT '0',
  `deskripsi` varchar(250) NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table h-stock.foto: ~5 rows (approximately)
DELETE FROM `foto`;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` (`id_foto`, `nama_foto`, `tanggal_upload`, `harga_foto`, `keyword`, `deskripsi`, `id_user`) VALUES
	(1, 'isola.jpg', '2022-06-06', 2000, 'ASDASDAS', 'ASDASDas', 1),
	(4, 'upi.png', '2022-06-06', 20000, 'rgb', 'HAHAHAHAH', 1),
	(5, 'Muhammad Haris Ibrahim.jpg', '2022-06-06', 20000, 'rgb', 'Baju Koko Kualitas Super', 1),
	(7, 'IMG_20220512_030220_169.jpg', '2022-06-06', 20000000, 'rozaq', 'HAHAHAHAH', 1),
	(8, '25977-3-vacation-image (1).png', '2022-06-06', 2000000, 'stand', 'HAHAHAHAH', 3);
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;

-- Dumping structure for table h-stock.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(200) DEFAULT NULL,
  `country` varchar(250) NOT NULL DEFAULT '0',
  `foto` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table h-stock.profil: ~2 rows (approximately)
DELETE FROM `profil`;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`id_profil`, `id_user`, `nama`, `country`, `foto`) VALUES
	(1, 3, 'Haris Ibrahim', 'Indonesia', 'Muhammad Haris Ibrahim.jpg'),
	(2, 0, 'Pengguna', 'No Country', 'unknown.png'),
	(3, 4, 'ROZAQ', 'Indonesia', 'IMG_20220521_075113_439.webp');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Dumping structure for table h-stock.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table h-stock.role: ~2 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'Contributor'),
	(2, 'Buyer');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table h-stock.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table h-stock.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_role`) VALUES
	(1, 'reza', 'reza', 'achmad@gmail.com', 1),
	(2, 'buyer', 'buyer', 'buyer@gmail.com', 2),
	(3, 'haris', 'haris', 'haris@gmail.com', 1),
	(4, 'uyt', 'uyt', 'iyt@gmail.com', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for trigger h-stock.auto_profil
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `auto_profil` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	INSERT INTO `h-stock`.`profil` (`nama`, `country`, `foto`, `id_user`) VALUES ('Pengguna', 'No Country', 'unknown.png', NEW.id_user);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
