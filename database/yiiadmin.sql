/*
Navicat MySQL Data Transfer

Source Server         : vir
Source Server Version : 50720
Source Host           : 192.168.114.100:3306
Source Database       : yii2admin

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-01-26 22:43:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `menu_pid` int(11) DEFAULT NULL COMMENT '父级ID',
  `menu_name` varchar(20) DEFAULT NULL COMMENT '菜单名',
  `menu_icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `menu_sort` tinyint(1) DEFAULT NULL COMMENT '排序',
  `menu_url` varchar(255) DEFAULT NULL COMMENT '菜单链接',
  `menu_level` tinyint(1) DEFAULT NULL COMMENT '菜单等级',
  `menu_status` tinyint(1) DEFAULT '1' COMMENT '状态：1启用，0禁用',
  `menu_system` varchar(20) DEFAULT NULL COMMENT '所属系统',
  `node_id` int(11) DEFAULT NULL COMMENT '关联节点',
  `menu_shortcuts` tinyint(1) DEFAULT '0' COMMENT '加入快捷操作，0否1是',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', '系统1', 'fa fa-files-o', '1', 'site/home', '1', '1', 'bbb', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('2', '1', '一级菜单1-1', 'fa fa-files-o', '2', 'site/home', '2', '1', 'bbb', null, '1', null, null, '2018-01-26 07:18:55', null, '1');
INSERT INTO `menu` VALUES ('3', '1', '一级菜单1-2', 'fa fa-files-o', '3', 'site/home', '2', '1', 'bbb', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('4', '0', '系统2', 'fa fa-files-o', '4', 'site/home', '1', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('5', '4', '一级菜单2-1', 'fa fa-files-o', '5', 'site/home', '2', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('6', '4', '一级菜单2-2', 'fa fa-files-o', '6', 'site/home', '2', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('7', '6', '二级菜单2-2-1', 'fa fa-files-o', '7', 'site/home', '3', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('8', '6', '二级菜单2-2-2', 'fa fa-files-o', '8', 'site/home', '3', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('9', '0', '系统3', 'fa fa-files-o', '9', 'site/home', '1', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('10', '9', '一级菜单3-1', 'fa fa-files-o', '10', 'site/home', '2', '1', 'system', null, '1', null, null, '2018-01-26 07:16:42', null, '1');
INSERT INTO `menu` VALUES ('11', '10', '二级菜单3-1-1', 'fa fa-files-o', '11', 'site/home', '3', '1', 'system', null, '1', null, null, '2018-01-26 07:16:42', null, '1');
INSERT INTO `menu` VALUES ('12', '10', '二级菜单3-1-2', 'fa fa-files-o', '12', 'site/home', '3', '1', 'system', null, '1', null, null, '2018-01-26 07:16:42', null, '1');
INSERT INTO `menu` VALUES ('13', '10', '二级菜单3-1-3', 'fa fa-files-o', '13', 'site/home', '3', '1', 'system', null, '1', null, null, '2018-01-26 07:16:42', null, '1');
INSERT INTO `menu` VALUES ('14', '9', '一级菜单3-2', 'fa fa-files-o', '14', 'site/home', '2', '1', 'system', null, '1', null, null, '2018-01-26 07:16:42', null, '1');
INSERT INTO `menu` VALUES ('15', '14', '二级菜单3-2-1', 'fa fa-files-o', '15', 'site/home', '3', '1', 'system', null, '1', null, null, '2018-01-26 07:19:37', null, '1');
INSERT INTO `menu` VALUES ('16', '14', '二级菜单3-2-2', 'fa fa-files-o', '16', 'site/home', '3', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('17', '16', '三级菜单3-2-2-1', 'fa fa-files-o', '17', 'site/home', '4', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('18', '16', '三级菜单3-2-2-2', 'fa fa-files-o', '18', 'site/home', '4', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('19', '14', '二级菜单3-2-3', 'fa fa-files-o', '19', 'site/home', '3', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('20', '19', '三级菜单3-2-3-1', 'fa fa-files-o', '20', 'site/home', '4', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('21', '20', '四级菜单3-2-3-1-1', 'fa fa-files-o', '21', 'site/home', '5', '1', 'system', null, '0', null, null, '2018-01-26 02:53:21', null, '1');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of migration
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `u_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_status` smallint(6) NOT NULL DEFAULT '10',
  `u_created_at` int(11) NOT NULL,
  `u_updated_at` int(11) NOT NULL,
  `u_tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系电话',
  `u_sex` enum('男','女') COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_birthday` date DEFAULT NULL,
  `u_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名/昵称',
  `u_face` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `username` (`u_username`) USING BTREE,
  UNIQUE KEY `email` (`u_email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`u_password_reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'DQO5RgixU6dFkkHim7JJ4SPqvrSheXnF', '$2y$13$zVf.hmfUSTujlEh.RuRfvuN28cflRJUxjmg2A5E/lNd4OVGMpdzXO', '', 'admin@a.com', '10', '1512477453', '1512477453', null, null, null, null, null);
INSERT INTO `user` VALUES ('5', 'test', 'DQO5RgixU6dFkkHim7JJ4SPqvrSheXnF', '$2y$13$zVf.hmfUSTujlEh.RuRfvuN28cflRJUxjmg2A5E/lNd4OVGMpdzXO', null, 'test@a.com', '10', '1512477453', '1512477453', null, null, null, null, null);
