/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : gongzi

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-11-09 10:49:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zw_gz_base
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_base`;
CREATE TABLE `zw_gz_base` (
  `base_id` int(11) NOT NULL AUTO_INCREMENT,
  `base_name` varchar(100) DEFAULT NULL,
  `base_gong` float(10,2) DEFAULT NULL,
  `base_yang` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`base_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_base
-- ----------------------------
INSERT INTO `zw_gz_base` VALUES ('1', '张三', '500.00', '500.00');
INSERT INTO `zw_gz_base` VALUES ('2', '李四', '1000.00', '1000.00');

-- ----------------------------
-- Table structure for zw_gz_bu
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_bu`;
CREATE TABLE `zw_gz_bu` (
  `bu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bu_name` varchar(50) DEFAULT NULL,
  `bu_if` int(11) DEFAULT NULL,
  `bu_limit` int(11) DEFAULT NULL,
  `bu_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_bu
-- ----------------------------
INSERT INTO `zw_gz_bu` VALUES ('1', '李四', '1', '800', '1');
INSERT INTO `zw_gz_bu` VALUES ('2', '李四', '1', '800', '2');
INSERT INTO `zw_gz_bu` VALUES ('3', '张三', '2', '530', '1');
INSERT INTO `zw_gz_bu` VALUES ('4', '张三', '2', '530', '2');

-- ----------------------------
-- Table structure for zw_gz_bukou
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_bukou`;
CREATE TABLE `zw_gz_bukou` (
  `bk_id` int(11) NOT NULL AUTO_INCREMENT,
  `bk_name` varchar(50) DEFAULT NULL,
  `bk_type` int(11) DEFAULT NULL,
  `bk_hour` int(11) DEFAULT NULL,
  `bk_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_bukou
-- ----------------------------

-- ----------------------------
-- Table structure for zw_gz_employee
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_employee`;
CREATE TABLE `zw_gz_employee` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(100) DEFAULT NULL,
  `e_credit` varchar(30) DEFAULT NULL,
  `e_zhao` varchar(50) DEFAULT NULL,
  `e_zhong` varchar(50) DEFAULT NULL,
  `e_type` int(11) DEFAULT '1',
  `e_dorm` int(11) DEFAULT '2',
  `e_mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_employee
-- ----------------------------
INSERT INTO `zw_gz_employee` VALUES ('1', '张三', '330825198808088888', '330825198808088888', '330825198808088888', '2', '1', '1193297950@qq.com');
INSERT INTO `zw_gz_employee` VALUES ('2', '李四', '330825198808099999', '330825198808099999', '330825198808099999', '1', '2', '1193297950@qq.com');

-- ----------------------------
-- Table structure for zw_gz_jia
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_jia`;
CREATE TABLE `zw_gz_jia` (
  `jia_id` int(11) NOT NULL AUTO_INCREMENT,
  `jia_name` varchar(50) DEFAULT NULL,
  `jia_record` int(50) DEFAULT NULL,
  `jia_hour` int(50) DEFAULT NULL,
  PRIMARY KEY (`jia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_jia
-- ----------------------------
INSERT INTO `zw_gz_jia` VALUES ('1', '李四', null, '20');

-- ----------------------------
-- Table structure for zw_gz_job
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_job`;
CREATE TABLE `zw_gz_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) DEFAULT NULL,
  `job_bumen1` int(11) DEFAULT NULL,
  `job_bumen2` int(11) DEFAULT NULL,
  `job_date_enter` varchar(100) DEFAULT NULL,
  `job_salary_enter` float(10,2) DEFAULT NULL,
  `job_date_change` varchar(100) DEFAULT NULL,
  `job_salary_change` float(10,2) DEFAULT '1.00',
  `job_real` int(11) DEFAULT '1',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_job
-- ----------------------------
INSERT INTO `zw_gz_job` VALUES ('1', '李四', '1', '1', '1262275200', '5000.00', '-28800', '1.00', '1');
INSERT INTO `zw_gz_job` VALUES ('2', '张三', '3', '3', '1446566400', '5000.00', '-28800', '1.00', '1');

-- ----------------------------
-- Table structure for zw_gz_jx
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_jx`;
CREATE TABLE `zw_gz_jx` (
  `jx_id` int(11) NOT NULL AUTO_INCREMENT,
  `jx_name` varchar(50) DEFAULT NULL,
  `jx_real` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jx_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_jx
-- ----------------------------
INSERT INTO `zw_gz_jx` VALUES ('1', '张三', '1000');
INSERT INTO `zw_gz_jx` VALUES ('2', '李四', '2000');

-- ----------------------------
-- Table structure for zw_gz_jx2
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_jx2`;
CREATE TABLE `zw_gz_jx2` (
  `jx2_id` int(11) NOT NULL AUTO_INCREMENT,
  `jx2_name` varchar(50) DEFAULT NULL,
  `jx2_base` varchar(50) DEFAULT NULL,
  `jx2_float` varchar(50) DEFAULT NULL,
  `jx2_random` varchar(50) DEFAULT NULL,
  `jx2_yue` varchar(50) DEFAULT NULL,
  `jx2_shi` varchar(50) DEFAULT NULL,
  `jx2_if` int(11) DEFAULT NULL,
  PRIMARY KEY (`jx2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_jx2
-- ----------------------------
INSERT INTO `zw_gz_jx2` VALUES ('1', '张三', '1000', '1.2', '0', '/', '2200', '0');
INSERT INTO `zw_gz_jx2` VALUES ('2', '李四', '0', '0', '0', '未交', '0', null);

-- ----------------------------
-- Table structure for zw_gz_kao
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_kao`;
CREATE TABLE `zw_gz_kao` (
  `kao_id` int(11) NOT NULL AUTO_INCREMENT,
  `kao_name` varchar(50) DEFAULT NULL,
  `kao_if` int(11) DEFAULT NULL,
  PRIMARY KEY (`kao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_kao
-- ----------------------------
INSERT INTO `zw_gz_kao` VALUES ('1', '张三', '1');
INSERT INTO `zw_gz_kao` VALUES ('2', '李四', '2');

-- ----------------------------
-- Table structure for zw_gz_koubu
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_koubu`;
CREATE TABLE `zw_gz_koubu` (
  `kb_id` int(11) NOT NULL AUTO_INCREMENT,
  `kb_name` varchar(50) DEFAULT NULL,
  `kb_type` int(11) DEFAULT NULL,
  `kb_date_begin` varchar(59) CHARACTER SET sjis DEFAULT NULL,
  `kb_date_end` varchar(50) CHARACTER SET sjis DEFAULT NULL,
  `kb_date_sum` int(11) DEFAULT NULL,
  PRIMARY KEY (`kb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_koubu
-- ----------------------------

-- ----------------------------
-- Table structure for zw_gz_manager
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_manager`;
CREATE TABLE `zw_gz_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_manager
-- ----------------------------
INSERT INTO `zw_gz_manager` VALUES ('1', 'admin', 'eyJpdiI6IlpRZEJ3aW9kc1RNa3N4dTdGQW9wbkE9PSIsInZhbHVlIjoiajFRUHo3ZVFzWnJtdWZEUnBUa1wvTlVFQXc5Nml1TTZMc3k4MlRKTDRVT2s9IiwibWFjIjoiNTYzNDk3OThjZjhiNGI5ZWNhYTcxNjhmNGIxODdlYjYyNzE4ZDA0NTY2ZThjNWFjMTc4Y2E2MzM1YzE2OTMwOCJ9');

-- ----------------------------
-- Table structure for zw_gz_mx
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_mx`;
CREATE TABLE `zw_gz_mx` (
  `mx_id` int(11) NOT NULL AUTO_INCREMENT,
  `mx_name` varchar(50) DEFAULT NULL,
  `mx_salary` varchar(50) DEFAULT NULL,
  `mx_bu` int(50) DEFAULT NULL,
  `mx_jia` float(50,0) DEFAULT NULL,
  `mx_kou` varchar(50) DEFAULT NULL,
  `mx_lin` varchar(50) DEFAULT NULL,
  `mx_ying` float(50,0) DEFAULT NULL,
  `mx_gh` varchar(50) DEFAULT NULL,
  `mx_gong` varchar(50) DEFAULT NULL,
  `mx_yang` varchar(50) DEFAULT NULL,
  `mx_shi` float(50,2) DEFAULT NULL,
  `mx_yi` float(50,2) DEFAULT NULL,
  `mx_bujiao` float(50,2) DEFAULT NULL,
  `mx_bugong` float(50,2) DEFAULT NULL,
  `mx_shui` float(50,2) DEFAULT NULL,
  `mx_fang` varchar(50) DEFAULT NULL,
  `mx_shifa` float(50,2) DEFAULT NULL,
  PRIMARY KEY (`mx_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_mx
-- ----------------------------
INSERT INTO `zw_gz_mx` VALUES ('1', '李四', '4000', '600', '1724', '0', '0', '6324', '10', '100', '80', '5.00', '20.00', '0.00', '0.00', '569.83', '0', '5539.31');
INSERT INTO `zw_gz_mx` VALUES ('2', '张三', '4000', '1100', '0', '0', '0', '5100', '10', '50', '40', '2.50', '10.00', '0.00', '0.00', '155.00', '100', '4732.50');

-- ----------------------------
-- Table structure for zw_gz_reward
-- ----------------------------
DROP TABLE IF EXISTS `zw_gz_reward`;
CREATE TABLE `zw_gz_reward` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_name` varchar(50) DEFAULT NULL,
  `re_reward` varchar(50) DEFAULT NULL,
  `re_float` float(10,2) DEFAULT NULL,
  `re_date_start` varchar(50) DEFAULT NULL,
  `re_date_end` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zw_gz_reward
-- ----------------------------
INSERT INTO `zw_gz_reward` VALUES ('1', '张三', '1', '1.20', '1446566400', '1510070400');
SET FOREIGN_KEY_CHECKS=1;
