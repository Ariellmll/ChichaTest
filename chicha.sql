/*
 Navicat Premium Data Transfer

 Source Server         : mysql-test
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3301
 Source Schema         : chicha

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 11/06/2021 01:21:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile_carries` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, 'Ariel Cornejo Otero', '+51998411813', 'Movistar');
INSERT INTO `contact` VALUES (2, 'Robert Plant', '+51998478845', 'Claro');
INSERT INTO `contact` VALUES (3, 'Eddie Vedder', '+51986574872', 'Movistar');
INSERT INTO `contact` VALUES (4, 'Julian Casablancas', '+51958785487', 'Claro');
INSERT INTO `contact` VALUES (5, 'Serj Tankian', '+51963285748', 'Movistar');
INSERT INTO `contact` VALUES (6, 'Chester Benington', '+51965875421', 'Claro');
INSERT INTO `contact` VALUES (7, 'Chris Cornell', '+51963875485', 'Movistar');
INSERT INTO `contact` VALUES (8, 'Benjamin Burnley', '+51937845785', 'Claro');
INSERT INTO `contact` VALUES (9, 'Jonathan Davis', '+51937878547', 'Movistar');
INSERT INTO `contact` VALUES (10, 'Jim Morrison', '+51963787875', 'Claro');

SET FOREIGN_KEY_CHECKS = 1;
