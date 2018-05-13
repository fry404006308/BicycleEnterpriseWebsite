/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bicycleenterprisewebsite

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-13 23:51:45
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES ('3', 'admin1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('4', 'admin2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('5', 'admin3', 'aaa');
INSERT INTO `bk_admin` VALUES ('6', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `bk_admin` VALUES ('7', 'admin4', 'admin3');

-- ----------------------------
-- Table structure for bk_article
-- ----------------------------
DROP TABLE IF EXISTS `bk_article`;
CREATE TABLE `bk_article` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `atitle` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `akeywords` varchar(255) DEFAULT NULL,
  `adesc` varchar(255) DEFAULT NULL,
  `athumb` varchar(255) DEFAULT NULL COMMENT '文章缩略图',
  `aauthor` varchar(255) DEFAULT NULL,
  `acontent` varchar(255) DEFAULT NULL,
  `aclick` int(11) NOT NULL DEFAULT '0' COMMENT '文章点击数',
  `azan` int(11) NOT NULL DEFAULT '0' COMMENT '文章点赞数',
  `time` int(11) DEFAULT NULL COMMENT '发布时间',
  `acateid` int(11) DEFAULT NULL COMMENT '所属栏目',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_article
-- ----------------------------
INSERT INTO `bk_article` VALUES ('1', '1', '1', '1', '', '1', '<p>1<br/></p>', '0', '0', null, '1');
INSERT INTO `bk_article` VALUES ('2', '12', '1', '1', '/static/uploads/admin/20180512\\7c400240ccf473292a441bad525bc607.png', '1', '<p>1</p>', '0', '0', null, '12');
INSERT INTO `bk_article` VALUES ('3', '文章标题 ', '文章标题 ', '文章标题 ', '/static/uploads/admin/20180512\\4579ac96ee27a45ede7224515fdd14af.jpg', '文章标题 ', '<p>文章标题&nbsp;文章标题&nbsp;<img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=116.351539,39.732241&zoom=15&width=530&height=340&markers=116.404,39.915\"/>&lt;img src=&quot;/ueditor/php/upload/image/20180512/1526137830495037.png&quot', '0', '0', '1526128751', '12');
INSERT INTO `bk_article` VALUES ('4', '很长的文章标题很长的文章标题很长的文章标题很长的文章标题', '很长的文章标题', '很长的文章标题', '/static/uploads/admin/20180512\\e1cb60a48b611de7b2ee84880ef299e6.jpg', '很长的文章标题', '<p>很长的文章标题</p>', '0', '0', '1526130399', '7');
INSERT INTO `bk_article` VALUES ('5', '作者', '作者', '作者', '/static/uploads/admin/20180512\\53b3d02d525a9575a77c84a85b0f6bfc.png', '作者', '<p><span style=\"color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, &quot;Segoe UI&quot;; font-size: 13px; text-align: right; background-color: rgb(251, 251, 251);\">作者</span></p>', '0', '0', '1526139480', '13');
INSERT INTO `bk_article` VALUES ('6', '关键词关键词', '关键词', '关键词', '/static/uploads/admin/20180513\\d2bc7c3c2a71da711952ce1392b97813.png', '关键词', '<p><span style=\"color: rgb(68, 68, 68); font-family: \">关键词</span></p>', '0', '0', '1526141551', '7');

-- ----------------------------
-- Table structure for bk_cate
-- ----------------------------
DROP TABLE IF EXISTS `bk_cate`;
CREATE TABLE `bk_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `type` int(10) DEFAULT '1' COMMENT '栏目分类：1、代表列表栏目 2、单页栏目',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级栏目的id',
  `sort` int(10) DEFAULT '50' COMMENT '栏目排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bk_cate
-- ----------------------------
INSERT INTO `bk_cate` VALUES ('1', '中国', '1', '0', '50');
INSERT INTO `bk_cate` VALUES ('12', '上海', '1', '1', '50');
INSERT INTO `bk_cate` VALUES ('3', '美国', '2', '0', '50');
INSERT INTO `bk_cate` VALUES ('18', '西南大学', '1', '7', '50');
INSERT INTO `bk_cate` VALUES ('5', '重庆', '1', '1', '50');
INSERT INTO `bk_cate` VALUES ('14', '华东师范大学', '1', '13', '50');
INSERT INTO `bk_cate` VALUES ('7', '北碚', '1', '5', '50');
INSERT INTO `bk_cate` VALUES ('8', '西南大学', '2', '8', '50');
INSERT INTO `bk_cate` VALUES ('13', '普陀', '1', '12', '50');
