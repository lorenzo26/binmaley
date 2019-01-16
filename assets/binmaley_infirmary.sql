/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 100125
Source Host           : localhost:3306
Source Database       : binmaley_infirmary

Target Server Type    : MYSQL
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-12-10 21:35:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for inf_patient_profile
-- ----------------------------
DROP TABLE IF EXISTS `inf_patient_profile`;
CREATE TABLE `inf_patient_profile` (
  `patientid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `birthdate` date NOT NULL DEFAULT '0000-00-00',
  `birthplace` varchar(255) NOT NULL,
  `blood_type` char(2) NOT NULL,
  `contact_number` char(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mother_maidenname` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`patientid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inf_patient_profile
-- ----------------------------
INSERT INTO `inf_patient_profile` VALUES ('1', 'Juan', 'Alonzo', 'Protacio', 'Male', 'Single', '1989-12-10', 'Makati City', 'AB', '09105788747', 'T. Alonzo, Baguio City', 'Teodora Alonzo', 'Jose Protacio', '2017-12-10 20:47:07');
INSERT INTO `inf_patient_profile` VALUES ('2', 'Pedro', 'Dimaculangan', 'Cruz', 'Male', 'Married', '1992-12-12', 'Cebu City', 'O', '09123442345', 'San Juan, La Union', 'Teresa Dimaculangan', 'Cipriano Cruz', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for inf_patient_vitals
-- ----------------------------
DROP TABLE IF EXISTS `inf_patient_vitals`;
CREATE TABLE `inf_patient_vitals` (
  `patientid` int(11) NOT NULL AUTO_INCREMENT,
  `bp` varchar(25) NOT NULL,
  `hr` varchar(25) NOT NULL,
  `rr` varchar(25) NOT NULL,
  `temp` varchar(25) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `height` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patientid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inf_patient_vitals
-- ----------------------------
INSERT INTO `inf_patient_vitals` VALUES ('1', '120/80', '10', '20', '36', '56 kgs', '5\' 7\"', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for inf_user_login
-- ----------------------------
DROP TABLE IF EXISTS `inf_user_login`;
CREATE TABLE `inf_user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto-increment user id',
  `email` varchar(255) NOT NULL COMMENT 'user_email_address',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'user last login time',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=true 0=false 2=pending',
  `userlevel` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1= admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inf_user_login
-- ----------------------------
INSERT INTO `inf_user_login` VALUES ('1', 'test@email.com', 'admin', 'admin123', '2017-12-07 21:41:16', '1', '1');
INSERT INTO `inf_user_login` VALUES ('2', 'ad@das', 'adsd', 'aaaaaa', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `inf_user_login` VALUES ('4', 'sample@mail.com', 'test', 'aaaaaa', '2017-12-08 20:58:31', '0', '1');
INSERT INTO `inf_user_login` VALUES ('5', 'dsa@das.com', 'dsa', 'ssssss', '0000-00-00 00:00:00', '2', '1');
INSERT INTO `inf_user_login` VALUES ('6', 'raymundreyes@gmail.com', 'raymund.reyes', '123456', '0000-00-00 00:00:00', '2', '1');
INSERT INTO `inf_user_login` VALUES ('7', 'sample@email.com', 'sample lang', 'password', '0000-00-00 00:00:00', '2', '1');

-- ----------------------------
-- Table structure for inf_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `inf_user_profile`;
CREATE TABLE `inf_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inf_user_profile
-- ----------------------------
INSERT INTO `inf_user_profile` VALUES ('1', '1', 'Sample', 'User', 'Only', 'admin');
