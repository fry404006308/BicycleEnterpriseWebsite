/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bicycleenterprisewebsite

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-16 07:18:39
*/

DROP database IF EXISTS `bicycleenterprisewebsite`;
create database bicycleenterprisewebsite character set utf8 collate utf8_general_ci;
use bicycleenterprisewebsite;


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bk_admin
-- ----------------------------
DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(255) DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(255) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES ('3', 'admin1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('4', 'admin2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('5', 'admin3', 'aaa');
INSERT INTO `bk_admin` VALUES ('6', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('7', 'admin4', 'admin3');
