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

 Date: 06/02/2021 10:02:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for roles

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (1, 'Web Developer', 'web', 1, '2021-02-06 09:53:45', '2021-02-06 09:53:45');
INSERT INTO `roles` VALUES (2, 'System Administrator', 'web', 0, '2021-02-06 09:53:45', '2021-02-06 09:53:45');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
