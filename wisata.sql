-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2024 pada 12.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `No_telp` VARCHAR(100) NOT NULL,
  `Username` VARCHAR(100) DEFAULT NULL,
  `Password_` VARCHAR(100) DEFAULT NULL,
  `Nama` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `NIK` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`No_telp`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE pemesanan_tiket (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  telepon VARCHAR(20) NOT NULL,
  tanggal DATE NOT NULL,
  dewasa INT NOT NULL,
  remaja INT NOT NULL,
  anak_anak INT NOT NULL,
  balita INT NOT NULL,
  total_harga INT NOT NULL
);
ALTER TABLE `pemesanan_tiket` ADD COLUMN `bukti_pembayaran` VARCHAR(255);

CREATE TABLE admin_wisata (
  No_register_admin VARCHAR(100) PRIMARY KEY,
  Username_admin VARCHAR (100),
  Nama_admin VARCHAR (100),
  Password_admin VARCHAR(100),
  email_admin VARCHAR(100) UNIQUE NOT NULL,
  NIK VARCHAR(100)
  );
    
INSERT INTO admin_wisata (No_register_admin, Username_admin, Nama_admin, Password_admin, email_admin, NIK)
VALUES ('REG001256', 'adminuser1', 'Admin Satu', 'password123', 'admin1@example.com', '1234567890123456');