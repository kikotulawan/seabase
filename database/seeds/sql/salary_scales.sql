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

 Date: 21/02/2021 20:16:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for salary_scales

-- Records of salary_scales
-- ----------------------------
BEGIN;
INSERT INTO `salary_scales` VALUES (1, 'HR Marine Pte. Ltd 2020', 2, 1, 2, NULL, NULL);
INSERT INTO `salary_scales` VALUES (2, 'MF Shipping Group 2020', 3, 1, 2, NULL, NULL);
INSERT INTO `salary_scales` VALUES (3, 'Amasus Crew BV 2020', 4, 1, 2, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
