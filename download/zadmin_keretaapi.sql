-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 04:59 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_keretaapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `iduser` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`iduser`, `username`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `booking_kursi`
--

CREATE TABLE IF NOT EXISTS `booking_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kursi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `harga_tiket`
--

CREATE TABLE IF NOT EXISTS `harga_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stasiun_asal` varchar(255) DEFAULT NULL,
  `id_stasiun_tujuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE IF NOT EXISTS `kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kursi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id`, `nama_kursi`) VALUES
(2, 'A-1'),
(3, 'B-1'),
(7, 'A-2'),
(8, 'B-2'),
(12, 'A-3'),
(13, 'B-3'),
(15, 'D-3'),
(16, 'E-3'),
(17, 'A-4'),
(18, 'B-4'),
(19, 'C-4'),
(20, 'D-4'),
(21, 'E-4'),
(22, 'A-5'),
(23, 'B-5'),
(24, 'C-5'),
(25, 'D-5'),
(26, 'E-5'),
(27, 'A-6'),
(28, 'B-6'),
(29, 'C-6'),
(30, 'D-6'),
(31, 'E-6'),
(32, 'A-7'),
(33, 'B-7'),
(34, 'C-7'),
(35, 'D-7'),
(36, 'E-7'),
(37, 'A-8'),
(38, 'B-8'),
(39, 'C-8'),
(40, 'D-8'),
(41, 'E-8'),
(42, 'A-9'),
(43, 'B-9'),
(44, 'C-9'),
(45, 'D-9'),
(46, 'E-9'),
(47, 'A-10'),
(48, 'B-10'),
(49, 'C-10'),
(50, 'D-10'),
(51, 'E-10'),
(52, 'A-11'),
(53, 'B-11'),
(54, 'C-11'),
(55, 'D-11'),
(56, 'E-11'),
(57, 'A-12'),
(58, 'B-12'),
(59, 'C-12'),
(60, 'D-12'),
(61, 'E-12'),
(62, 'A-13'),
(63, 'B-13'),
(64, 'C-13'),
(65, 'D-13'),
(66, 'E-13'),
(67, 'A-14'),
(68, 'B-14'),
(69, 'C-14'),
(70, 'D-14'),
(71, 'E-14'),
(72, 'A-15'),
(73, 'B-15'),
(74, 'C-15'),
(75, 'D-15'),
(76, 'E-15'),
(77, 'A-16'),
(78, 'B-16'),
(79, 'C-16'),
(80, 'D-16'),
(81, 'E-16'),
(82, 'A-17'),
(83, 'B-17'),
(84, 'C-17'),
(85, 'D-17'),
(86, 'E-17'),
(87, 'A-18'),
(88, 'B-18'),
(89, 'C-18'),
(90, 'D-18'),
(91, 'E-18'),
(92, 'A-19'),
(93, 'B-19'),
(94, 'C-19'),
(95, 'D-19'),
(96, 'E-19'),
(97, 'A-20'),
(98, 'B-20'),
(99, 'C-20'),
(100, 'D-20'),
(101, 'E-20'),
(102, 'A-21'),
(103, 'B-21'),
(104, 'C-21'),
(105, 'D-21'),
(106, 'E-21'),
(107, 'A-22'),
(108, 'B-22'),
(110, 'D-22'),
(111, 'E-22'),
(115, 'D-23'),
(116, 'E-23'),
(120, 'D-24'),
(121, 'E-24');

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE IF NOT EXISTS `login_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2609469a94a32ca46b6440a379df6ecf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1434257309, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:5:"admin";s:5:"admin";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `log_saldo`
--

CREATE TABLE IF NOT EXISTS `log_saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debit` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `identitas` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rfid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) DEFAULT NULL,
  `nama_penumpang` varchar(255) DEFAULT NULL,
  `identitas` varchar(255) DEFAULT NULL,
  `id_stasiun_asal` varchar(255) DEFAULT NULL,
  `id_stasiun_tujuan` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `tanggal_pesan` timestamp NULL DEFAULT NULL,
  `tanggal_keberangkatan` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `lunas` int(11) DEFAULT NULL,
  `id_kursi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `id_user` varchar(255) DEFAULT NULL,
  `saldo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE IF NOT EXISTS `stasiun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stasiun` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
