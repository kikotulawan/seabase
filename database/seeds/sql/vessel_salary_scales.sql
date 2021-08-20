/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : seabasedb

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 21/02/2021 20:17:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for vessel_salary_scales
-- ----------------------------

-- ----------------------------
-- Records of vessel_salary_scales
-- ----------------------------
BEGIN;
INSERT INTO `vessel_salary_scales` VALUES (1, 7, 5, 67, 'Basic Pay', 770, 25.32, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (2, 7, 6, 67, 'Overtime', 573, 18.84, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (3, 7, 9, 67, 'Leave Subsistence', 152, 5, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (4, 7, 10, 67, 'Leave Pay', 205, 6.74, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (8, 10, 5, 67, 'Basic Pay', 770, 25.32, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (9, 10, 6, 67, 'Overtime', 573, 18.84, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (10, 10, 9, 67, 'Leave Subsistence', 152, 5, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (11, 10, 10, 67, 'Leave Pay', 205, 6.74, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (15, 11, 5, 67, 'Basic Pay', 770, 25.32, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (16, 11, 6, 67, 'Overtime', 573, 18.84, NULL, NULL, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (17, 11, 9, 67, 'Leave Subsistence', 152, 5, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (18, 11, 10, 67, 'Leave Pay', 205, 6.74, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (22, 8, 21, 6, 'Basic Pay', 779, 25.62, 0, 30, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (23, 8, 22, 6, 'Overtime', 390, 12.82, 0, 30, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (25, 13, 21, 6, 'Basic Pay', 779, 25.62, 0, 30, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (26, 13, 22, 6, 'Overtime', 390, 12.82, 0, 30, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (28, 9, 29, 69, 'Basic Pay', 1615, 53.11, 0, 365, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (29, 9, 30, 69, 'Overtime', 1006, 33.08, 0, 365, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (30, 9, 35, 69, 'Leave Pay', 431, 14.17, 0, 365, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (31, 9, 36, 69, 'Owners Bonus ', 2948, 96.94, 0, 365, NULL, 1, NULL, NULL);
INSERT INTO `vessel_salary_scales` VALUES (32, 9, 37, 69, 'Christmas Bonus ', 6, 0.2, 0, 365, NULL, 1, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
