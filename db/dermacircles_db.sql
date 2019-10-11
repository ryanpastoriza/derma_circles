/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : dermacircles_db

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-10-11 15:05:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for billing
-- ----------------------------
DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`billing_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of billing
-- ----------------------------

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
-- Table structure for patient_diagnosis
-- ----------------------------
DROP TABLE IF EXISTS `patient_diagnosis`;
CREATE TABLE `patient_diagnosis` (
  `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `diagnosis` text CHARACTER SET latin1,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`diagnosis_id`),
  KEY `patient_id_id_fk` (`patient_id`),
  CONSTRAINT `patient_id_id_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_diagnosis
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_diagnosis_treatment
-- ----------------------------
INSERT INTO `patient_diagnosis_treatment` VALUES ('1', '2019-10-02 09:53:01', 'diagnosis', 'treatment', 'disposition', '19');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_information
-- ----------------------------
INSERT INTO `patient_information` VALUES ('16', 'Speedwagon', 'Mario', 'Starks', '', '1969-01-22', 'male', '6\'5\"', '70', 'O', 'married', 'email@gmail.com', 'filipino', '09128777564', 'Sample Address');
INSERT INTO `patient_information` VALUES ('17', 'Cruiser', 'Peter', 'Turner', '', '1984-12-15', 'male', '4\'7\"', '57', 'AB', 'separated', 'email@gmail.com', 'filipino', '09128777564', 'Blk 6 Lot 20, Ideal Homes');
INSERT INTO `patient_information` VALUES ('18', 'Hays', 'Mark', 'Starks', '', '1960-04-17', 'male', '4\'7\"', '57', 'A', 'married', 'email@gmail.com', 'filipino', '09128777564', 'address');
INSERT INTO `patient_information` VALUES ('19', 'rush', 'fred', 'Durst', 'MD', '1987-03-16', 'male', '6\'5\"', '60', 'A', 'married', 'email@gmail.com', 'filipino', '09128777565', '#999 Abc Bldg Xyz Avenue Butuan City');

-- ----------------------------
-- Table structure for patient_laboratory
-- ----------------------------
DROP TABLE IF EXISTS `patient_laboratory`;
CREATE TABLE `patient_laboratory` (
  `laboratory_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `exam_type` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `results` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`laboratory_id`),
  KEY `patient_laboratory_id_fk` (`patient_id`),
  CONSTRAINT `patient_laboratory_id_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_laboratory
-- ----------------------------
INSERT INTO `patient_laboratory` VALUES ('1', '2019-10-02', 'test', 'test', 'test', '16');
INSERT INTO `patient_laboratory` VALUES ('2', '2019-10-02', 'exam', 'result', 'remarks', '19');
INSERT INTO `patient_laboratory` VALUES ('3', '2019-10-09', 'exam', 'results', 'remarks', '19');
INSERT INTO `patient_laboratory` VALUES ('4', '2019-10-09', 'asdasdasasd', 'asdasd', 'asdasd', '18');

-- ----------------------------
-- Table structure for patient_queueing
-- ----------------------------
DROP TABLE IF EXISTS `patient_queueing`;
CREATE TABLE `patient_queueing` (
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`queue_id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_queueing
-- ----------------------------
INSERT INTO `patient_queueing` VALUES ('1', '16', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('3', '18', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('6', '17', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('7', '19', 'queue', '1');

-- ----------------------------
-- Table structure for patient_treatment
-- ----------------------------
DROP TABLE IF EXISTS `patient_treatment`;
CREATE TABLE `patient_treatment` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `treatment` text CHARACTER SET latin1,
  `disposition` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `disposition_date` date DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`treatment_id`),
  KEY `patient_id_idfk` (`patient_id`),
  CONSTRAINT `patient_id_idfk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_treatment
-- ----------------------------

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
