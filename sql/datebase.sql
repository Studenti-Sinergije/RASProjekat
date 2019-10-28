/*
Navicat MySQL Data Transfer

Source Server         : ads
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ras

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-10-28 19:58:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Automobili', 'rsz_auto.jpg');
INSERT INTO `categories` VALUES ('2', 'Nekretnine', 'rsz_1nekretnina.jpg');
INSERT INTO `categories` VALUES ('3', 'Mobilni uredjaji', 'rsz_phone.jpg');
INSERT INTO `categories` VALUES ('4', 'Kompjuteri', 'rsz_comp.jpg');
INSERT INTO `categories` VALUES ('5', 'Tehnika', 'rsz_tehnika.jpg');
INSERT INTO `categories` VALUES ('6', 'Poslovi', 'rsz_job.jpg');
INSERT INTO `categories` VALUES ('7', 'Biznis', 'rsz_biznis.jpg');
INSERT INTO `categories` VALUES ('8', 'Odjeca i obuca', 'rsz_ofinger.jpg');
INSERT INTO `categories` VALUES ('9', 'Nakit', 'rsz_nakit.jpg');
INSERT INTO `categories` VALUES ('10', 'Literatura', 'rsz_knjiga.jpg');

-- ----------------------------
-- Table structure for oglas
-- ----------------------------
DROP TABLE IF EXISTS `oglas`;
CREATE TABLE `oglas` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_ID` int(10) unsigned NOT NULL,
  `creator_ID` int(10) unsigned NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_of_views` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `type_of_transactions` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `cat_ID` (`cat_ID`),
  KEY `creator_ID` (`creator_ID`),
  CONSTRAINT `cat_ID` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `creator_ID` FOREIGN KEY (`creator_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oglas
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_level` int(11) NOT NULL DEFAULT '1' COMMENT '1=user',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
