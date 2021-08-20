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

 Date: 21/02/2021 20:16:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for salary_scale_details
-- ----------------------------

-- ----------------------------
-- Records of salary_scale_details
-- ----------------------------
BEGIN;
INSERT INTO `salary_scale_details` VALUES (5, 1, 67, 'Basic Pay', 770, 25.32, NULL, NULL, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (6, 1, 67, 'Overtime', 573, 18.84, NULL, NULL, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (9, 1, 67, 'Leave Subsistence', 152, 5, NULL, NULL, NULL, 0, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (10, 1, 67, 'Leave Pay', 205, 6.74, NULL, NULL, NULL, 0, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (21, 2, 6, 'Basic Pay', 779, 25.62, 0, 30, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (22, 2, 6, 'Overtime', 390, 12.82, 0, 30, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (29, 3, 69, 'Basic Pay', 1615, 53.11, 0, 365, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (30, 3, 69, 'Overtime', 1006, 33.08, 0, 365, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (35, 3, 69, 'Leave Pay', 431, 14.17, 0, 365, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (36, 3, 69, 'Owners Bonus ', 2948, 96.94, 0, 365, NULL, 1, 2, NULL, NULL);
INSERT INTO `salary_scale_details` VALUES (37, 3, 69, 'Christmas Bonus ', 6, 0.2, 0, 365, NULL, 1, 2, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
