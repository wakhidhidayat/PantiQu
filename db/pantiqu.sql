-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 03:38 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantiqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Wakhid');

-- --------------------------------------------------------

--
-- Table structure for table `panti`
--

CREATE TABLE `panti` (
  `id_panti` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama_panti` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `jml_penghuni` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status_panti` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panti`
--

INSERT INTO `panti` (`id_panti`, `id_pemilik`, `nama_panti`, `info`, `jml_penghuni`, `alamat`, `foto`, `status_panti`) VALUES
(1, 8, 'PANTI 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris quis aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus. Quisque molestie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum.', 217, 'San Francisco, CA', 'cause-6.jpg', 'verified'),
(2, 9, 'PANTI 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestib ulum mauris quis aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus. Quisque molestie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum.', 133, 'Los Angeles, CA', '2.jpg', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_panti`
--

CREATE TABLE `pemilik_panti` (
  `id_pemilik` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `no_rekening` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_panti`
--

INSERT INTO `pemilik_panti` (`id_pemilik`, `username`, `password`, `nama_pemilik`, `email`, `no_hp`, `no_rekening`) VALUES
(8, 'user1', 'user1', 'User1', 'user1@gmail.com', 637281299123, 347190001),
(9, 'user2', 'user2', 'User2', 'user2@gmail.com', 628343433718, 55234246);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `panti`
--
ALTER TABLE `panti`
  ADD PRIMARY KEY (`id_panti`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemilik_panti`
--
ALTER TABLE `pemilik_panti`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panti`
--
ALTER TABLE `panti`
  MODIFY `id_panti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemilik_panti`
--
ALTER TABLE `pemilik_panti`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `panti`
--
ALTER TABLE `panti`
  ADD CONSTRAINT `panti_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik_panti` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
