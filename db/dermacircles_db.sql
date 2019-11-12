/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : dermacircles_db

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-11-12 17:03:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for billing
-- ----------------------------
DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('1', 'derma circles - robinsons', 'robinsons');
INSERT INTO `branch` VALUES ('2', 'warehouse', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_diagnosis
-- ----------------------------
INSERT INTO `patient_diagnosis` VALUES ('1', '2019-10-09', 'diagnosis', '20');
INSERT INTO `patient_diagnosis` VALUES ('2', '2019-10-16', 'asdasdasdasd', '20');
INSERT INTO `patient_diagnosis` VALUES ('3', '2019-10-17', 'asdasd', '20');
INSERT INTO `patient_diagnosis` VALUES ('4', '2019-10-17', 'asdasdasd', '20');
INSERT INTO `patient_diagnosis` VALUES ('5', '2019-10-17', 'asdasdasdasd', '20');
INSERT INTO `patient_diagnosis` VALUES ('6', '2019-10-17', 'peter', '17');
INSERT INTO `patient_diagnosis` VALUES ('7', '2019-10-02', 'diagnosis', '20');
INSERT INTO `patient_diagnosis` VALUES ('8', '2019-11-11', 'asdasdasd', '17');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_information
-- ----------------------------
INSERT INTO `patient_information` VALUES ('16', 'Speedwagon', 'Mario', 'Starks', '', '1969-01-22', 'male', '6\'5\"', '70', 'O', 'married', 'email@gmail.com', 'filipino', '09128777564', 'Sample Address');
INSERT INTO `patient_information` VALUES ('17', 'Cruiser', 'Peter', 'Turner', '', '1984-12-15', 'male', '4\'7\"', '57', 'AB', 'separated', 'email@gmail.com', 'filipino', '09128777564', 'Blk 6 Lot 20, Ideal Homes');
INSERT INTO `patient_information` VALUES ('18', 'Hays', 'Mark', 'Starks', '', '1960-04-17', 'male', '4\'7\"', '57', 'A', 'married', 'email@gmail.com', 'filipino', '09128777564', 'address');
INSERT INTO `patient_information` VALUES ('19', 'rush', 'fred', 'Durst', 'MD', '1987-03-16', 'male', '6\'5\"', '60', 'A', 'married', 'email@gmail.com', 'filipino', '09128777565', '#999 Abc Bldg Xyz Avenue Butuan City');
INSERT INTO `patient_information` VALUES ('20', 'lucifer', 'chrollo', 'Spider', '', '1987-02-11', 'female', '5\'5\"', '65', 'AB', 'single', 'chrollo@gmail.com', 'filipino', '0978664543', 'Address');
INSERT INTO `patient_information` VALUES ('21', 'durst', 'fred', 'Davis', 'md', '1978-04-18', 'male', '5\'7\"', '65', 'AB', 'separated', 'test@gmail.com', 'filipino', '0978664543', 'Sample Address');
INSERT INTO `patient_information` VALUES ('22', 'pierre', 'thomas', 'salazar', '', '1976-08-22', 'male', '5\'5\"', '57', 'AB', 'separated', 'cpj@gmail.com', 'filipino', '09128777564', 'address line');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_laboratory
-- ----------------------------
INSERT INTO `patient_laboratory` VALUES ('1', '2019-10-02', 'test', 'test', 'test', '16');
INSERT INTO `patient_laboratory` VALUES ('2', '2019-10-02', 'exam', 'result', 'remarks', '19');
INSERT INTO `patient_laboratory` VALUES ('3', '2019-10-09', 'exam', 'results', 'remarks', '19');
INSERT INTO `patient_laboratory` VALUES ('4', '2019-10-09', 'asdasdasasd', 'asdasd', 'asdasd', '18');
INSERT INTO `patient_laboratory` VALUES ('5', '2019-10-14', 'examination', 'asdasdasdasds', 'asdas', '20');
INSERT INTO `patient_laboratory` VALUES ('6', '2019-10-17', 'exam', 'result', '', '20');
INSERT INTO `patient_laboratory` VALUES ('7', '2019-10-15', 'asdasd', 'asdasd', 'asdasd', '20');
INSERT INTO `patient_laboratory` VALUES ('8', '2019-10-13', 'asdasd', 'asdasdasdasdasd', 'remarks', '20');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_queueing
-- ----------------------------
INSERT INTO `patient_queueing` VALUES ('36', '21', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('37', '22', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('38', '17', 'queue', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_treatment
-- ----------------------------
INSERT INTO `patient_treatment` VALUES ('1', '2019-10-21', 'treatment', null, '2019-10-26', '20');
INSERT INTO `patient_treatment` VALUES ('2', '2019-10-22', 'treatments', null, '2019-10-24', '20');
INSERT INTO `patient_treatment` VALUES ('3', '2019-10-22', 'treatment2', null, '2019-10-24', '20');
INSERT INTO `patient_treatment` VALUES ('4', '2019-10-22', 'atrassdasf', null, '2019-10-25', '20');
INSERT INTO `patient_treatment` VALUES ('5', '2019-10-22', 'treatment again', null, '2019-10-12', '20');
INSERT INTO `patient_treatment` VALUES ('6', '2019-10-22', 'treat', null, '2019-10-25', '20');
INSERT INTO `patient_treatment` VALUES ('7', '2019-10-22', '', null, '2019-10-26', '20');
INSERT INTO `patient_treatment` VALUES ('8', '2019-10-28', '', null, '2019-10-29', '21');
INSERT INTO `patient_treatment` VALUES ('9', '2019-10-28', '', null, '2019-10-26', '19');
INSERT INTO `patient_treatment` VALUES ('10', '2019-10-28', '', null, '2019-10-07', '18');
INSERT INTO `patient_treatment` VALUES ('11', '2019-10-28', '', null, '2019-10-14', '22');
INSERT INTO `patient_treatment` VALUES ('12', '2019-10-28', '', null, '2019-10-12', '17');
INSERT INTO `patient_treatment` VALUES ('13', '2019-10-28', '', null, '2019-10-31', '16');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `service_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`services_id`),
  KEY `sp_idfk_p_id` (`package_id`),
  KEY `sc_idfk_c_id` (`category_id`),
  CONSTRAINT `sc_idfk_c_id` FOREIGN KEY (`category_id`) REFERENCES `service_category` (`category_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `sp_idfk_p_id` FOREIGN KEY (`package_id`) REFERENCES `service_package` (`service_package_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', '2', 'Deep Facial', '199', '2');
INSERT INTO `services` VALUES ('2', '2', 'Deep Facial + Diamond Peel', '899', '2');
INSERT INTO `services` VALUES ('3', '2', 'Deep Facial + Mask + Glycolic Peel', '900', '2');
INSERT INTO `services` VALUES ('4', '4', 'Consultation', '300', '1');

-- ----------------------------
-- Table structure for service_category
-- ----------------------------
DROP TABLE IF EXISTS `service_category`;
CREATE TABLE `service_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of service_category
-- ----------------------------
INSERT INTO `service_category` VALUES ('1', 'Consultation');
INSERT INTO `service_category` VALUES ('2', 'facial');
INSERT INTO `service_category` VALUES ('4', 'machine');

-- ----------------------------
-- Table structure for service_package
-- ----------------------------
DROP TABLE IF EXISTS `service_package`;
CREATE TABLE `service_package` (
  `service_package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`service_package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of service_package
-- ----------------------------
INSERT INTO `service_package` VALUES ('2', 'Blow-out packages');
INSERT INTO `service_package` VALUES ('3', 'Hybrid Facial Packages (5+1)');
INSERT INTO `service_package` VALUES ('4', 'consultation');

-- ----------------------------
-- Table structure for service_transaction
-- ----------------------------
DROP TABLE IF EXISTS `service_transaction`;
CREATE TABLE `service_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `therapist_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `therapist_idfk` (`therapist_id`),
  KEY `service_idfk` (`service_id`),
  KEY `patient_idfk` (`patient_id`),
  CONSTRAINT `patient_idfk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `service_idfk` FOREIGN KEY (`service_id`) REFERENCES `services` (`services_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `therapist_idfk` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of service_transaction
-- ----------------------------
INSERT INTO `service_transaction` VALUES ('1', '3', '3', '18', '2019-11-12 12:14:00');
INSERT INTO `service_transaction` VALUES ('2', '1', '1', '19', '2019-11-12 15:07:00');
INSERT INTO `service_transaction` VALUES ('3', '9', '3', '17', '2019-11-12 16:48:00');
INSERT INTO `service_transaction` VALUES ('4', '1', '2', '20', '2019-11-12 16:49:00');

-- ----------------------------
-- Table structure for therapist
-- ----------------------------
DROP TABLE IF EXISTS `therapist`;
CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`therapist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of therapist
-- ----------------------------
INSERT INTO `therapist` VALUES ('1', 'ashley campbell', 'active', '1');
INSERT INTO `therapist` VALUES ('2', 'clarence jaworskie', 'active', '1');
INSERT INTO `therapist` VALUES ('3', 'nancy taylor', 'active', '1');
INSERT INTO `therapist` VALUES ('8', 'sample name', 'active', '1');
INSERT INTO `therapist` VALUES ('9', 'mark', 'active', '1');

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
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_roles_id_fk` (`role_id`),
  KEY `user_branch_id_fk` (`branch_id`),
  CONSTRAINT `user_branch_id_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `user_roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '$2y$10$ifF00avtmPnBsxfS6296CuTrbb9O4ekIo3qksz7QOy4F/codqCEw6', 'active', '1', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', 'administrator');
INSERT INTO `user_roles` VALUES ('2', 'Secretary');
