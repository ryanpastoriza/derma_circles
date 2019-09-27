/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : dermacircles_db

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-09-27 09:31:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `location` text CHARACTER SET latin1,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('1', 'derma circles - robinsons', 'robinsons');

-- ----------------------------
-- Table structure for patient_diagnosis_treatment
-- ----------------------------
DROP TABLE IF EXISTS `patient_diagnosis_treatment`;
CREATE TABLE `patient_diagnosis_treatment` (
  `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` datetime DEFAULT NULL,
  `diagnosis` text CHARACTER SET latin1,
  `treatment` text CHARACTER SET latin1,
  `disposition` text CHARACTER SET latin1,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`diagnosis_id`),
  KEY `patient_diagnosis_treatment_id_fk` (`patient_id`),
  CONSTRAINT `patient_diagnosis_treatment_id_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_diagnosis_treatment
-- ----------------------------

-- ----------------------------
-- Table structure for patient_information
-- ----------------------------
DROP TABLE IF EXISTS `patient_information`;
CREATE TABLE `patient_information` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_information
-- ----------------------------
INSERT INTO `patient_information` VALUES ('14', 'pastoriza', 'Ryan', 'horcajo', 'md', '1987-02-11', 'male', '5\'7\"', '60', 'o', 'married', 'ryan@gmail.com', 'filipino', '09128777564', 'emily homes');

-- ----------------------------
-- Table structure for patient_laboratory
-- ----------------------------
DROP TABLE IF EXISTS `patient_laboratory`;
CREATE TABLE `patient_laboratory` (
  `laboratory_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` datetime DEFAULT NULL,
  `exam_type` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `results` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`laboratory_id`),
  KEY `patient_laboratory_id_fk` (`patient_id`),
  CONSTRAINT `patient_laboratory_id_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_laboratory
-- ----------------------------
INSERT INTO `patient_laboratory` VALUES ('1', '2019-09-23 22:00:22', 'exam', 'result', 'remark', '14');
INSERT INTO `patient_laboratory` VALUES ('2', '2019-09-23 22:05:03', 'sda', 'asd', 'asdas', '14');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_roles_id_fk` (`role_id`),
  CONSTRAINT `user_roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$ifF00avtmPnBsxfS6296CuTrbb9O4ekIo3qksz7QOy4F/codqCEw6', 'active', '1');

-- ----------------------------
-- Table structure for user_branch
-- ----------------------------
DROP TABLE IF EXISTS `user_branch`;
CREATE TABLE `user_branch` (
  `user_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  KEY `user_id_fk` (`user_id`),
  KEY `branch_id_fk` (`branch_id`),
  CONSTRAINT `branch_id_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_branch
-- ----------------------------

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', 'administrator');
