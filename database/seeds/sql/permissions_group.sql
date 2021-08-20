/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : seabasedb

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 06/02/2021 09:47:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Records of permissions_group
-- ----------------------------
BEGIN;
INSERT INTO `permissions_group` VALUES (1, 'Dashboard', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (2, 'Manning', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (3, 'Crew Management', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (4, 'On-Board Management', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (5, 'Human Resource', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (6, 'Principal and Vessel', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (7, 'Reports', 0, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (8, 'Maintenance', 0, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (9, 'Security', 0, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` VALUES (10, 'Setup', 0, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
