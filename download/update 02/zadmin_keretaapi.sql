/*
Navicat MySQL Data Transfer

Source Server         : TRAVELOBA
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : zadmin_keretaapi

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2015-06-26 01:45:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `administrator`
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `iduser` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of administrator
-- ----------------------------
INSERT INTO `administrator` VALUES ('4', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `booking_kursi`
-- ----------------------------
DROP TABLE IF EXISTS `booking_kursi`;
CREATE TABLE `booking_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kursi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking_kursi
-- ----------------------------

-- ----------------------------
-- Table structure for `harga_tiket`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of harga_tiket
-- ----------------------------

-- ----------------------------
-- Table structure for `kursi`
-- ----------------------------
DROP TABLE IF EXISTS `kursi`;
CREATE TABLE `kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kursi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kursi
-- ----------------------------
INSERT INTO `kursi` VALUES ('2', 'A-1');
INSERT INTO `kursi` VALUES ('3', 'B-1');
INSERT INTO `kursi` VALUES ('7', 'A-2');
INSERT INTO `kursi` VALUES ('8', 'B-2');
INSERT INTO `kursi` VALUES ('12', 'A-3');
INSERT INTO `kursi` VALUES ('13', 'B-3');
INSERT INTO `kursi` VALUES ('15', 'D-3');
INSERT INTO `kursi` VALUES ('16', 'E-3');
INSERT INTO `kursi` VALUES ('17', 'A-4');
INSERT INTO `kursi` VALUES ('18', 'B-4');
INSERT INTO `kursi` VALUES ('19', 'C-4');
INSERT INTO `kursi` VALUES ('20', 'D-4');
INSERT INTO `kursi` VALUES ('21', 'E-4');
INSERT INTO `kursi` VALUES ('22', 'A-5');
INSERT INTO `kursi` VALUES ('23', 'B-5');
INSERT INTO `kursi` VALUES ('24', 'C-5');
INSERT INTO `kursi` VALUES ('25', 'D-5');
INSERT INTO `kursi` VALUES ('26', 'E-5');
INSERT INTO `kursi` VALUES ('27', 'A-6');
INSERT INTO `kursi` VALUES ('28', 'B-6');
INSERT INTO `kursi` VALUES ('29', 'C-6');
INSERT INTO `kursi` VALUES ('30', 'D-6');
INSERT INTO `kursi` VALUES ('31', 'E-6');
INSERT INTO `kursi` VALUES ('32', 'A-7');
INSERT INTO `kursi` VALUES ('33', 'B-7');
INSERT INTO `kursi` VALUES ('34', 'C-7');
INSERT INTO `kursi` VALUES ('35', 'D-7');
INSERT INTO `kursi` VALUES ('36', 'E-7');
INSERT INTO `kursi` VALUES ('37', 'A-8');
INSERT INTO `kursi` VALUES ('38', 'B-8');
INSERT INTO `kursi` VALUES ('39', 'C-8');
INSERT INTO `kursi` VALUES ('40', 'D-8');
INSERT INTO `kursi` VALUES ('41', 'E-8');
INSERT INTO `kursi` VALUES ('42', 'A-9');
INSERT INTO `kursi` VALUES ('43', 'B-9');
INSERT INTO `kursi` VALUES ('44', 'C-9');
INSERT INTO `kursi` VALUES ('45', 'D-9');
INSERT INTO `kursi` VALUES ('46', 'E-9');
INSERT INTO `kursi` VALUES ('47', 'A-10');
INSERT INTO `kursi` VALUES ('48', 'B-10');
INSERT INTO `kursi` VALUES ('49', 'C-10');
INSERT INTO `kursi` VALUES ('50', 'D-10');
INSERT INTO `kursi` VALUES ('51', 'E-10');
INSERT INTO `kursi` VALUES ('52', 'A-11');
INSERT INTO `kursi` VALUES ('53', 'B-11');
INSERT INTO `kursi` VALUES ('54', 'C-11');
INSERT INTO `kursi` VALUES ('55', 'D-11');
INSERT INTO `kursi` VALUES ('56', 'E-11');
INSERT INTO `kursi` VALUES ('57', 'A-12');
INSERT INTO `kursi` VALUES ('58', 'B-12');
INSERT INTO `kursi` VALUES ('59', 'C-12');
INSERT INTO `kursi` VALUES ('60', 'D-12');
INSERT INTO `kursi` VALUES ('61', 'E-12');
INSERT INTO `kursi` VALUES ('62', 'A-13');
INSERT INTO `kursi` VALUES ('63', 'B-13');
INSERT INTO `kursi` VALUES ('64', 'C-13');
INSERT INTO `kursi` VALUES ('65', 'D-13');
INSERT INTO `kursi` VALUES ('66', 'E-13');
INSERT INTO `kursi` VALUES ('67', 'A-14');
INSERT INTO `kursi` VALUES ('68', 'B-14');
INSERT INTO `kursi` VALUES ('69', 'C-14');
INSERT INTO `kursi` VALUES ('70', 'D-14');
INSERT INTO `kursi` VALUES ('71', 'E-14');
INSERT INTO `kursi` VALUES ('72', 'A-15');
INSERT INTO `kursi` VALUES ('73', 'B-15');
INSERT INTO `kursi` VALUES ('74', 'C-15');
INSERT INTO `kursi` VALUES ('75', 'D-15');
INSERT INTO `kursi` VALUES ('76', 'E-15');
INSERT INTO `kursi` VALUES ('77', 'A-16');
INSERT INTO `kursi` VALUES ('78', 'B-16');
INSERT INTO `kursi` VALUES ('79', 'C-16');
INSERT INTO `kursi` VALUES ('80', 'D-16');
INSERT INTO `kursi` VALUES ('81', 'E-16');
INSERT INTO `kursi` VALUES ('82', 'A-17');
INSERT INTO `kursi` VALUES ('83', 'B-17');
INSERT INTO `kursi` VALUES ('84', 'C-17');
INSERT INTO `kursi` VALUES ('85', 'D-17');
INSERT INTO `kursi` VALUES ('86', 'E-17');
INSERT INTO `kursi` VALUES ('87', 'A-18');
INSERT INTO `kursi` VALUES ('88', 'B-18');
INSERT INTO `kursi` VALUES ('89', 'C-18');
INSERT INTO `kursi` VALUES ('90', 'D-18');
INSERT INTO `kursi` VALUES ('91', 'E-18');
INSERT INTO `kursi` VALUES ('92', 'A-19');
INSERT INTO `kursi` VALUES ('93', 'B-19');
INSERT INTO `kursi` VALUES ('94', 'C-19');
INSERT INTO `kursi` VALUES ('95', 'D-19');
INSERT INTO `kursi` VALUES ('96', 'E-19');
INSERT INTO `kursi` VALUES ('97', 'A-20');
INSERT INTO `kursi` VALUES ('98', 'B-20');
INSERT INTO `kursi` VALUES ('99', 'C-20');
INSERT INTO `kursi` VALUES ('100', 'D-20');
INSERT INTO `kursi` VALUES ('101', 'E-20');
INSERT INTO `kursi` VALUES ('102', 'A-21');
INSERT INTO `kursi` VALUES ('103', 'B-21');
INSERT INTO `kursi` VALUES ('104', 'C-21');
INSERT INTO `kursi` VALUES ('105', 'D-21');
INSERT INTO `kursi` VALUES ('106', 'E-21');
INSERT INTO `kursi` VALUES ('107', 'A-22');
INSERT INTO `kursi` VALUES ('108', 'B-22');
INSERT INTO `kursi` VALUES ('110', 'D-22');
INSERT INTO `kursi` VALUES ('111', 'E-22');
INSERT INTO `kursi` VALUES ('115', 'D-23');
INSERT INTO `kursi` VALUES ('116', 'E-23');
INSERT INTO `kursi` VALUES ('120', 'D-24');
INSERT INTO `kursi` VALUES ('121', 'E-24');

-- ----------------------------
-- Table structure for `login_session`
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
-- Records of login_session
-- ----------------------------
INSERT INTO `login_session` VALUES ('9cd3a5a9e34177fd141ab8eb5daa5244', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '1435257320', '');

-- ----------------------------
-- Table structure for `log_saldo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_saldo
-- ----------------------------

-- ----------------------------
-- Table structure for `members`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of members
-- ----------------------------

-- ----------------------------
-- Table structure for `pemesanan`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------

-- ----------------------------
-- Table structure for `saldo`
-- ----------------------------
DROP TABLE IF EXISTS `saldo`;
CREATE TABLE `saldo` (
  `id_user` varchar(255) DEFAULT NULL,
  `saldo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of saldo
-- ----------------------------

-- ----------------------------
-- Table structure for `stasiun`
-- ----------------------------
DROP TABLE IF EXISTS `stasiun`;
CREATE TABLE `stasiun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stasiun` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stasiun
-- ----------------------------
INSERT INTO `stasiun` VALUES ('1', 'Malang');
