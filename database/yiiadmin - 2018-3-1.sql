/*
Navicat MySQL Data Transfer

Source Server         : vir
Source Server Version : 50720
Source Host           : 192.168.114.100:3306
Source Database       : yii2admin

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-03-01 21:33:20
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
  `menu_sort` int(4) DEFAULT NULL COMMENT '排序',
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', '系统1', 'fa fa-files-o', '1', 'site/home', '1', '1', 'bbb', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('2', '5', '一级菜单1-1', 'fa fa-bluetooth', '2', 'site/home222', '3', '1', 'aaa', '41', '0', null, null, '2018-02-27 14:03:37', '1', '0');
INSERT INTO `menu` VALUES ('3', '1', '一级菜单1-2', 'fa fa-files-o', '3', 'site/home', '2', '1', 'bbb', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('4', '0', '系统2', 'fa fa-files-o', '4', 'site/home', '1', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('5', '4', '一级菜单2-1', 'fa fa-files-o', '5', 'site/home', '2', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('6', '4', '一级菜单2-2', 'fa fa-files-o', '6', 'site/home', '2', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('7', '6', '二级菜单2-2-1', 'fa fa-files-o', '7', 'site/home', '3', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('8', '6', '二级菜单2-2-2', 'fa fa-files-o', '8', 'site/home', '3', '1', 'aaa', null, '0', null, null, '2018-01-26 02:53:21', null, '1');
INSERT INTO `menu` VALUES ('9', '0', 'backend 后台', 'fa fa-files-o', '9', 'site/home', '1', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:25', null, '1');
INSERT INTO `menu` VALUES ('10', '9', '权限管理', 'fa fa-files-o', '10', '', '2', '1', 'backend', null, '0', null, null, '2018-02-27 14:03:37', null, '1');
INSERT INTO `menu` VALUES ('11', '10', '节点管理', 'fa fa-files-o', '11', 'auth/node/index', '3', '1', 'backend', null, '1', null, null, '2018-02-27 14:03:44', null, '1');
INSERT INTO `menu` VALUES ('12', '10', '菜单管理', 'fa fa-files-o', '12', 'auth/menu/index', '3', '1', 'backend', null, '1', null, null, '2018-02-27 14:03:49', null, '1');
INSERT INTO `menu` VALUES ('13', '10', '二级菜单3-1-3', 'fa fa-files-o', '13', 'site/home3', '3', '1', 'backend', null, '0', null, null, '2018-02-27 14:03:37', null, '1');
INSERT INTO `menu` VALUES ('14', '9', '一级菜单3-2', 'fa fa-files-o', '14', 'site/home', '2', '1', 'backend', null, '0', null, null, '2018-02-27 14:03:37', null, '1');
INSERT INTO `menu` VALUES ('15', '14', '二级菜单3-2-1', 'fa fa-files-o', '15', 'site/home5', '3', '1', 'backend', null, '0', null, null, '2018-02-27 14:03:37', null, '1');
INSERT INTO `menu` VALUES ('16', '14', '二级菜单3-2-2', 'fa fa-files-o', '16', 'site/home', '3', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:16', null, '1');
INSERT INTO `menu` VALUES ('17', '1', 'sadsadsa', 'fa fa-address-card-o', '17', 'site/home', '2', '0', 'bbb', '38', '0', null, null, '2018-02-26 14:03:35', '1', '1');
INSERT INTO `menu` VALUES ('18', '16', '三级菜单3-2-2-2', 'fa fa-files-o', '18', 'site/home', '4', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:16', null, '1');
INSERT INTO `menu` VALUES ('19', '14', '二级菜单3-2-3', 'fa fa-files-o', '19', 'site/home', '3', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:16', null, '1');
INSERT INTO `menu` VALUES ('20', '19', '三级菜单3-2-3-1', 'fa fa-files-o', '20', 'site/home', '4', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:16', null, '1');
INSERT INTO `menu` VALUES ('21', '20', '四级菜单3-2-3-1-1', 'fa fa-files-o', '21', 'site/home', '5', '1', 'backend', null, '0', null, null, '2018-02-26 13:44:16', null, '1');
INSERT INTO `menu` VALUES ('24', '10', '角色管理', 'fa fa-files-o', '14', 'auth/role/index', '3', '1', 'backend', null, '1', '2018-02-26 12:38:07', '1', '2018-02-27 14:03:51', null, '1');
INSERT INTO `menu` VALUES ('25', '2', 'asdsadsas2', 'fa fa-files-o', '1', '', '3', '1', 'bbb', null, '0', '2018-02-26 13:12:55', '1', '2018-02-27 04:55:56', '1', '0');
INSERT INTO `menu` VALUES ('34', '9', '用户管理', 'fa fa-users', '15', '', '2', '1', 'backend', null, '0', '2018-02-26 13:45:10', '1', null, null, '1');
INSERT INTO `menu` VALUES ('35', '34', '用户列表', 'fa fa-users', '1', 'user/user/index', '3', '1', 'backend', '24', '0', '2018-02-26 13:46:14', '1', '2018-02-27 14:03:37', null, '1');
INSERT INTO `menu` VALUES ('37', '9', 'GII', 'fa fa-gears', '16', 'gii', '2', '1', 'backend', '43', '0', '2018-02-27 09:20:36', '1', '2018-02-27 09:22:19', '1', '1');

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
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_pid` int(11) DEFAULT NULL COMMENT '父节点',
  `node_name` varchar(20) DEFAULT NULL COMMENT '节点名称',
  `node_path` varchar(20) DEFAULT NULL COMMENT '节点路径（系统名，模块名）',
  `node_level` tinyint(1) DEFAULT NULL COMMENT '节点层级',
  `node_status` tinyint(1) DEFAULT NULL COMMENT '节点状态：1正常0禁用',
  `node_system` varchar(20) DEFAULT NULL COMMENT '节点所属系统',
  `node_sort` int(4) DEFAULT NULL COMMENT '节点排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('1', '0', 'Admin系统', 'backend', '1', '1', 'backend', '1', '2018-02-23 09:08:26', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('2', '1', 'auth 模块', 'auth', '2', '1', 'backend', '10', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('3', '2', 'node 控制器', 'node', '3', '1', 'backend', '100', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('4', '3', 'index', 'index', '4', '1', 'backend', '1000', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('5', '3', 'get-list', 'get-list', '4', '1', 'backend', '1001', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('6', '3', 'add', 'add', '4', '1', 'backend', '1002', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('7', '3', 'edit', 'edit', '4', '1', 'backend', '1003', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('8', '3', 'del', 'del', '4', '1', 'backend', '1004', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('9', '2', 'menu 控制器', 'menu', '3', '1', 'backend', '200', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('10', '9', 'index', 'index', '4', '1', 'backend', '2000', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('11', '9', 'get-list', 'get-list', '4', '1', 'backend', '2001', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('12', '9', 'add', 'add', '4', '1', 'backend', '2002', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('13', '9', 'edit', 'edit', '4', '1', 'backend', '2003', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('14', '9', 'del', 'del', '4', '0', 'backend', '2004', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('15', '2', 'role 控制器', 'role', '3', '1', 'backend', '300', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('16', '15', 'index', 'index', '4', '1', 'backend', '3000', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('17', '15', 'get-list', 'get-list', '4', '1', 'backend', '3001', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('18', '15', 'add', 'add', '4', '1', 'backend', '3002', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('19', '15', 'edit', 'edit', '4', '1', 'backend', '3003', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('20', '15', 'del', 'del', '4', '1', 'backend', '3004', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('21', '15', 'allot', 'allot', '4', '1', 'backend', '3005', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('22', '1', 'user 模块', 'user', '2', '1', 'backend', '20', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('23', '22', 'user 控制器', 'user', '3', '1', 'backend', '100', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('24', '23', 'index', 'index', '4', '1', 'backend', '1000', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('25', '23', 'get-list', 'get-list', '4', '1', 'backend', '1001', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('26', '23', 'add', 'add', '4', '1', 'backend', '1002', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('27', '23', 'edit', 'edit', '4', '1', 'backend', '1003', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('28', '23', 'del', 'del', '4', '1', 'backend', '1004', '2018-02-11 12:45:03', '1', '2018-02-26 13:44:09', '1', '1');
INSERT INTO `node` VALUES ('29', '0', 'sad', 'asd', '1', '1', 'asd', '2', '2018-02-22 15:55:55', null, '2018-02-27 05:17:21', '1', '0');
INSERT INTO `node` VALUES ('30', '29', 'asd', 'asd', '2', '1', 'asd', '1', '2018-02-22 15:56:19', null, '2018-02-27 05:17:21', '1', '0');
INSERT INTO `node` VALUES ('31', '0', 'dsad', 'asdsa', '1', '1', 'asdsa', '3', '2018-02-22 15:59:33', null, null, null, '1');
INSERT INTO `node` VALUES ('32', '29', 'asdasd22', 'asd', '2', '1', 'asd', '2', '2018-02-22 16:50:48', '1', '2018-02-27 05:17:17', '1', '0');
INSERT INTO `node` VALUES ('33', '32', 'sadasd', 'sad', '3', '1', 'asd', '1', '2018-02-22 16:50:59', '1', '2018-02-27 05:17:17', '1', '0');
INSERT INTO `node` VALUES ('34', '1', 'site', 'site', '2', '1', 'backend', '100', '2018-02-26 14:02:31', null, null, null, '1');
INSERT INTO `node` VALUES ('35', '34', 'home', 'home', '3', '1', 'backend', '100', '2018-02-26 14:02:31', null, null, null, '1');
INSERT INTO `node` VALUES ('36', '0', 'bbb', 'bbb', '1', '1', 'bbb', '100', '2018-02-26 14:03:35', null, null, null, '1');
INSERT INTO `node` VALUES ('37', '36', 'site', 'site', '2', '1', 'bbb', '100', '2018-02-26 14:03:35', null, null, null, '1');
INSERT INTO `node` VALUES ('38', '37', 'home', 'home', '3', '1', 'bbb', '100', '2018-02-26 14:03:35', null, null, null, '1');
INSERT INTO `node` VALUES ('39', '0', 'aaa', 'aaa', '1', '1', 'aaa', '100', '2018-02-27 02:08:03', null, null, null, '1');
INSERT INTO `node` VALUES ('40', '39', 'site', 'site', '2', '1', 'aaa', '100', '2018-02-27 02:08:03', null, null, null, '1');
INSERT INTO `node` VALUES ('41', '40', 'home222', 'home222', '3', '1', 'aaa', '100', '2018-02-27 02:08:03', null, null, null, '1');
INSERT INTO `node` VALUES ('42', '32', 'sad', 'sa', '3', '1', 'asd', '2', '2018-02-27 02:13:43', '1', '2018-02-27 05:17:17', '1', '0');
INSERT INTO `node` VALUES ('43', '1', 'gii', 'gii', '2', '1', 'backend', '100', '2018-02-27 09:20:36', '1', null, null, '1');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT NULL,
  `role_sort` int(4) DEFAULT '100',
  `role_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'asd23', null, '0', '2018-02-28 12:38:29', '1', '2018-02-28 12:38:29', '1', '0');
INSERT INTO `role` VALUES ('100', '234sd', '4', '1', '2018-02-28 10:13:44', '1', '2018-02-28 10:13:44', '1', '0');
INSERT INTO `role` VALUES ('101', 'sdasas', null, '1', '2018-02-28 10:12:29', '1', '2018-02-28 10:12:29', '1', '0');
INSERT INTO `role` VALUES ('102', '3232', null, '1', '2018-02-28 10:12:29', '1', '2018-02-28 10:12:29', '1', '0');
INSERT INTO `role` VALUES ('103', '232323', null, '1', '2018-02-28 10:12:21', '1', '2018-03-01 12:50:46', '1', '0');
INSERT INTO `role` VALUES ('104', 'asdas', null, '1', '2018-02-28 10:24:53', '1', null, null, '1');

-- ----------------------------
-- Table structure for role_node
-- ----------------------------
DROP TABLE IF EXISTS `role_node`;
CREATE TABLE `role_node` (
  `role_id` int(11) DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_node
-- ----------------------------
INSERT INTO `role_node` VALUES ('104', '1');
INSERT INTO `role_node` VALUES ('104', '2');
INSERT INTO `role_node` VALUES ('104', '3');
INSERT INTO `role_node` VALUES ('104', '4');
INSERT INTO `role_node` VALUES ('104', '5');
INSERT INTO `role_node` VALUES ('104', '6');
INSERT INTO `role_node` VALUES ('104', '7');
INSERT INTO `role_node` VALUES ('104', '8');
INSERT INTO `role_node` VALUES ('104', '9');
INSERT INTO `role_node` VALUES ('104', '10');
INSERT INTO `role_node` VALUES ('104', '11');
INSERT INTO `role_node` VALUES ('104', '12');
INSERT INTO `role_node` VALUES ('104', '13');
INSERT INTO `role_node` VALUES ('104', '14');
INSERT INTO `role_node` VALUES ('104', '15');
INSERT INTO `role_node` VALUES ('104', '16');
INSERT INTO `role_node` VALUES ('104', '17');
INSERT INTO `role_node` VALUES ('104', '18');
INSERT INTO `role_node` VALUES ('104', '19');
INSERT INTO `role_node` VALUES ('104', '20');
INSERT INTO `role_node` VALUES ('104', '21');
INSERT INTO `role_node` VALUES ('104', '22');
INSERT INTO `role_node` VALUES ('104', '23');
INSERT INTO `role_node` VALUES ('104', '24');
INSERT INTO `role_node` VALUES ('104', '25');
INSERT INTO `role_node` VALUES ('104', '26');
INSERT INTO `role_node` VALUES ('104', '27');
INSERT INTO `role_node` VALUES ('104', '28');

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
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `username` (`u_username`) USING BTREE,
  UNIQUE KEY `email` (`u_email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`u_password_reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'DQO5RgixU6dFkkHim7JJ4SPqvrSheXnF', '$2y$13$zVf.hmfUSTujlEh.RuRfvuN28cflRJUxjmg2A5E/lNd4OVGMpdzXO', '', 'admin@a.com', '10', '1512477453', '1512477453', null, null, '2018-02-28', null, null, null, null, null, '2018-03-01 12:51:32', null);
INSERT INTO `user` VALUES ('5', 'test', 'DQO5RgixU6dFkkHim7JJ4SPqvrSheXnF', '$2y$13$zVf.hmfUSTujlEh.RuRfvuN28cflRJUxjmg2A5E/lNd4OVGMpdzXO', null, 'test@a.com', '10', '1512477453', '1512477453', null, null, null, null, null, null, null, null, null, null);
