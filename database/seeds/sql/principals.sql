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

 Date: 21/02/2021 20:16:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for principals
-- ----------------------------
-- ----------------------------
-- Records of principals
-- ----------------------------
BEGIN;
INSERT INTO `principals` VALUES (2, NULL, '0004', 'HR Marine Pte. Ltd', '190 Middle Road, #14-10 Fortune Centre ', 196, NULL, '+63 2 8567 2120', 'crew@amasus.nl', '1', '2024-01-01', '2024-01-01', '2024-01-01', 'None', 2, NULL, NULL, NULL, NULL);
INSERT INTO `principals` VALUES (3, NULL, '0007', 'MF Shipping Group', 'Hogelandsterweg 14, 9936 BH Farmsum', 154, NULL, NULL, 'MMarree@mfgroup.nl', '2', '2024-01-01', '2024-01-01', '2024-01-01', NULL, 2, NULL, NULL, NULL, NULL);
INSERT INTO `principals` VALUES (4, NULL, '0009', 'Amasus Crew BV', 'Abel Tasmanplein 4 9934 GD Delfzijl', 154, NULL, '+31 596 649801', 'crew2@amasus.nl', '3', '2024-01-01', '2024-01-01', '2024-01-01', 'Dutch PSU', 2, NULL, NULL, NULL, NULL);
INSERT INTO `principals` VALUES (5, NULL, '0011', 'National Fisheries Development Limited', 'P.O. Box 717, Honiara', 199, NULL, '+677 61104', 'lpitanoe@trimarinegroup.com', '4', '2024-01-01', '2024-01-01', '2024-01-01', 'None', 2, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
