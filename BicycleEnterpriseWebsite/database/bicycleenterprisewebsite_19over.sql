/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : bicycleenterprisewebsite

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 17/04/2018 05:50:46
*/


DROP database IF EXISTS `bicycleenterprisewebsite`;
create database bicycleenterprisewebsite character set utf8 collate utf8_general_ci;
use bicycleenterprisewebsite;


SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bk_admin
-- ----------------------------
DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES (3, 'admin1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES (4, 'admin2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES (5, 'admin3', 'aaa');
INSERT INTO `bk_admin` VALUES (6, 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES (7, 'admin4', 'admin3');

-- ----------------------------
-- Table structure for bk_cate
-- ----------------------------
DROP TABLE IF EXISTS `bk_cate`;
CREATE TABLE `bk_cate`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '栏目名称',
  `type` int(10) DEFAULT 1 COMMENT '栏目分类：1、代表列表栏目 2、单页栏目',
  `pid` int(10) DEFAULT 0 COMMENT '上级栏目的id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bk_cate
-- ----------------------------
INSERT INTO `bk_cate` VALUES (1, '中国', 1, 0);
INSERT INTO `bk_cate` VALUES (12, '上海', 1, 1);
INSERT INTO `bk_cate` VALUES (3, '美国', 2, 0);
INSERT INTO `bk_cate` VALUES (5, '重庆', 1, 1);
INSERT INTO `bk_cate` VALUES (14, '华东师范大学', 1, 13);
INSERT INTO `bk_cate` VALUES (7, '北碚', 1, 5);
INSERT INTO `bk_cate` VALUES (8, '西南大学', 2, 7);
INSERT INTO `bk_cate` VALUES (13, '普陀', 1, 12);

SET FOREIGN_KEY_CHECKS = 1;
