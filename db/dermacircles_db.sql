/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : dermacircles_db

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-11-27 16:11:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for billing
-- ----------------------------
DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_date` date DEFAULT NULL,
  `payment` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`billing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of billing
-- ----------------------------
INSERT INTO `billing` VALUES ('7', '1926.11', '2019-11-26', '2000', 'paid');
INSERT INTO `billing` VALUES ('8', '1200', '2019-11-26', '1200', 'paid');
INSERT INTO `billing` VALUES ('9', '0', '2019-11-27', '0', 'paid');
INSERT INTO `billing` VALUES ('10', '0', '2019-11-27', '0', 'paid');
INSERT INTO `billing` VALUES ('11', '890.01', '2019-11-27', '1000', 'paid');
INSERT INTO `billing` VALUES ('12', '0', '2019-11-27', '0', 'paid');
INSERT INTO `billing` VALUES ('13', '0', '2019-11-27', '0', 'paid');
INSERT INTO `billing` VALUES ('14', '1754.01', '2019-11-27', '2000', 'paid');
INSERT INTO `billing` VALUES ('15', '900', '2019-11-27', '1000', 'paid');
INSERT INTO `billing` VALUES ('16', '0', '2019-11-27', '0', 'paid');

-- ----------------------------
-- Table structure for billing_service_transaction
-- ----------------------------
DROP TABLE IF EXISTS `billing_service_transaction`;
CREATE TABLE `billing_service_transaction` (
  `billing_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `discount` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `billing_idfk` (`billing_id`),
  KEY `transaction_idfk` (`transaction_id`),
  CONSTRAINT `billing_idfk` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`billing_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_idfk` FOREIGN KEY (`transaction_id`) REFERENCES `service_transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of billing_service_transaction
-- ----------------------------
INSERT INTO `billing_service_transaction` VALUES ('7', '48', 'np', '0.00');
INSERT INTO `billing_service_transaction` VALUES ('7', '49', '2', '881.02');
INSERT INTO `billing_service_transaction` VALUES ('7', '50', '4', '191.04');
INSERT INTO `billing_service_transaction` VALUES ('7', '51', '5', '854.05');
INSERT INTO `billing_service_transaction` VALUES ('8', '52', '', '300.00');
INSERT INTO `billing_service_transaction` VALUES ('8', '53', '', '900.00');
INSERT INTO `billing_service_transaction` VALUES ('14', '56', '1', '890.01');
INSERT INTO `billing_service_transaction` VALUES ('14', '57', '4', '864.00');
INSERT INTO `billing_service_transaction` VALUES ('14', '58', 'np', '0.00');
INSERT INTO `billing_service_transaction` VALUES ('15', '59', '', '900.00');
INSERT INTO `billing_service_transaction` VALUES ('16', '60', 'np', '0.00');

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `location` text CHARACTER SET latin1,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('1', 'derma circles - robinsons', 'robinsons');
INSERT INTO `branch` VALUES ('2', 'main', null);
INSERT INTO `branch` VALUES ('3', 'Smm', 'Address');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `patient_diagnosis` VALUES ('9', '2019-11-27', 'diagnosis', '21');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patient_queueing
-- ----------------------------
INSERT INTO `patient_queueing` VALUES ('52', '18', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('53', '19', 'queue', '1');
INSERT INTO `patient_queueing` VALUES ('54', '16', 'queue', '1');

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
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `product_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_idfk` (`category`),
  CONSTRAINT `category_idfk` FOREIGN KEY (`category`) REFERENCES `product_category` (`category_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', null, 'Glycerin', '', '205', '2');
INSERT INTO `product` VALUES ('2', null, 'hycort', '', '397', '3');
INSERT INTO `product` VALUES ('3', null, 'dermosalic', '', '397', '3');
INSERT INTO `product` VALUES ('4', null, '02 soap', '', '205', '2');

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('1', 'medicine');
INSERT INTO `product_category` VALUES ('2', 'soap');
INSERT INTO `product_category` VALUES ('3', 'cream/ointment');

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
  `branch_id` int(11) DEFAULT NULL,
  `discount` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `therapist_idfk` (`therapist_id`),
  KEY `service_idfk` (`service_id`),
  KEY `patient_idfk` (`patient_id`),
  KEY `branch_idfk` (`branch_id`),
  CONSTRAINT `branch_idfk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `patient_idfk` FOREIGN KEY (`patient_id`) REFERENCES `patient_information` (`patient_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `service_idfk` FOREIGN KEY (`service_id`) REFERENCES `services` (`services_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `therapist_idfk` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of service_transaction
-- ----------------------------
INSERT INTO `service_transaction` VALUES ('46', '8', '4', '16', '2019-11-25 08:35:00', '1', null);
INSERT INTO `service_transaction` VALUES ('47', '8', '3', '16', '2019-11-25 08:36:00', '1', null);
INSERT INTO `service_transaction` VALUES ('48', '8', '4', '17', '2019-11-26 09:34:00', '1', null);
INSERT INTO `service_transaction` VALUES ('49', '8', '2', '17', '2019-11-26 09:34:00', '1', null);
INSERT INTO `service_transaction` VALUES ('50', '3', '1', '17', '2019-11-26 09:53:00', '1', null);
INSERT INTO `service_transaction` VALUES ('51', '9', '2', '17', '2019-11-26 10:17:00', '1', null);
INSERT INTO `service_transaction` VALUES ('52', '8', '4', '20', '2019-11-26 10:21:00', '1', null);
INSERT INTO `service_transaction` VALUES ('53', '9', '3', '20', '2019-11-26 10:21:00', '1', null);
INSERT INTO `service_transaction` VALUES ('54', '3', '3', '17', '2019-11-25 10:57:00', '1', null);
INSERT INTO `service_transaction` VALUES ('55', '9', '3', '16', '2019-11-26 11:25:00', '1', null);
INSERT INTO `service_transaction` VALUES ('56', '9', '2', '16', '2019-11-27 11:27:00', '1', null);
INSERT INTO `service_transaction` VALUES ('57', '2', '3', '16', '2019-11-27 15:54:00', '1', null);
INSERT INTO `service_transaction` VALUES ('58', '3', '2', '16', '2019-11-27 15:54:00', '1', null);
INSERT INTO `service_transaction` VALUES ('59', '9', '3', '19', '2019-11-27 15:54:00', '1', null);
INSERT INTO `service_transaction` VALUES ('60', '13', '1', '20', '2019-11-27 15:54:00', '1', null);

-- ----------------------------
-- Table structure for therapist
-- ----------------------------
DROP TABLE IF EXISTS `therapist`;
CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`therapist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of therapist
-- ----------------------------
INSERT INTO `therapist` VALUES ('2', 'clarence jaworskie', 'facialist', 'active', '1');
INSERT INTO `therapist` VALUES ('3', 'nancy taylor', 'facialist', 'active', '1');
INSERT INTO `therapist` VALUES ('8', 'doctor', 'doctor', 'active', '1');
INSERT INTO `therapist` VALUES ('9', 'mark twain', 'facialist', 'active', '1');
INSERT INTO `therapist` VALUES ('13', 'Ashley Campbell', 'facialist', 'active', '1');

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
