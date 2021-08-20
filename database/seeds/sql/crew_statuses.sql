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

 Date: 21/02/2021 20:20:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crew_statuses
-- ----------------------------
DROP TABLE IF EXISTS `crew_statuses`;
CREATE TABLE `crew_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crew_id` bigint unsigned NOT NULL,
  `status_id` bigint unsigned NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crew_statuses_crew_id_foreign` (`crew_id`),
  KEY `crew_statuses_status_id_foreign` (`status_id`),
  CONSTRAINT `crew_statuses_crew_id_foreign` FOREIGN KEY (`crew_id`) REFERENCES `crews` (`id`) ON DELETE CASCADE,
  CONSTRAINT `crew_statuses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of crew_statuses
-- ----------------------------
BEGIN;
INSERT INTO `crew_statuses` VALUES (1, 4, 6, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (2, 5, 3, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (3, 6, 1, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (4, 7, 6, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (5, 8, 1, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (6, 9, 1, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (7, 10, 1, NULL, NULL, NULL);
INSERT INTO `crew_statuses` VALUES (8, 11, 1, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
