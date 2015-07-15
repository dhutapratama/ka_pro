/*
Navicat MySQL Data Transfer

Source Server         : SERVER
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : zadmin_ka

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2015-07-15 18:34:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrator
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `iduser` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for booking_kursi
-- ----------------------------
DROP TABLE IF EXISTS `booking_kursi`;
CREATE TABLE `booking_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kursi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for harga_tiket
-- ----------------------------
DROP TABLE IF EXISTS `harga_tiket`;
CREATE TABLE `harga_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stasiun_asal` varchar(255) DEFAULT NULL,
  `id_stasiun_tujuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  `jam_berangkat` varchar(5) DEFAULT NULL,
  `jam_sampai` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for kursi
-- ----------------------------
DROP TABLE IF EXISTS `kursi`;
CREATE TABLE `kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kursi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for login_session
-- ----------------------------
DROP TABLE IF EXISTS `login_session`;
CREATE TABLE `login_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for log_saldo
-- ----------------------------
DROP TABLE IF EXISTS `log_saldo`;
CREATE TABLE `log_saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debit` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `identitas` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rfid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan` (
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
  `jam_berangkat` varchar(5) DEFAULT NULL,
  `jam_sampai` varchar(5) DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `id_rekening_tujuan` varchar(255) DEFAULT NULL,
  `jumlah_bayar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for rekening
-- ----------------------------
DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for saldo
-- ----------------------------
DROP TABLE IF EXISTS `saldo`;
CREATE TABLE `saldo` (
  `id_user` varchar(255) DEFAULT NULL,
  `saldo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stasiun
-- ----------------------------
DROP TABLE IF EXISTS `stasiun`;
CREATE TABLE `stasiun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stasiun` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `rekening` (`nama_bank`, `no_rekening`, `atas_nama`) VALUES ('BNI', '11232864', 'PT.KAI');
INSERT INTO `administrator` (`username`, `pass`) VALUES ('admin', MD5('admin'));