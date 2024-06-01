/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - wisata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wisata` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `wisata`;

/*Table structure for table `admin_wisata` */

DROP TABLE IF EXISTS `admin_wisata`;

CREATE TABLE `admin_wisata` (
  `No_register_admin` varchar(100) NOT NULL,
  `Username_admin` varchar(100) DEFAULT NULL,
  `Nama_admin` varchar(100) DEFAULT NULL,
  `Password_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(100) NOT NULL,
  `NIK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`No_register_admin`),
  UNIQUE KEY `email_admin` (`email_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin_wisata` */

insert  into `admin_wisata`(`No_register_admin`,`Username_admin`,`Nama_admin`,`Password_admin`,`email_admin`,`NIK`) values 
('REG001256','adminuser1','Admin Satu','password123','admin1@example.com','1234567890123456');

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `No_telp` varchar(100) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password_` varchar(100) DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `NIK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`No_telp`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `akun` */

insert  into `akun`(`No_telp`,`Username`,`Password_`,`Nama`,`email`,`NIK`) values 
('123','Joko','Joko123','Joko','joko@gmail.com','2678');

/*Table structure for table `pemesanan_tiket` */

DROP TABLE IF EXISTS `pemesanan_tiket`;

CREATE TABLE `pemesanan_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `dewasa` int(11) NOT NULL,
  `remaja` int(11) NOT NULL,
  `anak_anak` int(11) NOT NULL,
  `balita` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` longblob DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `status_pembayaran` enum('Belum Terbayar','Terbayar') NOT NULL DEFAULT 'Belum Terbayar',
  `status_pemesanan` enum('Belum Selesai','Sudah Selesai') NOT NULL DEFAULT 'Belum Selesai',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pemesanan_tiket` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
