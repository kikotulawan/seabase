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

 Date: 21/02/2021 20:21:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crew_ranks
-- ----------------------------
DROP TABLE IF EXISTS `crew_ranks`;
CREATE TABLE `crew_ranks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crew_id` bigint unsigned NOT NULL,
  `rank_id` bigint unsigned NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crew_ranks_crew_id_foreign` (`crew_id`),
  KEY `crew_ranks_rank_id_foreign` (`rank_id`),
  CONSTRAINT `crew_ranks_crew_id_foreign` FOREIGN KEY (`crew_id`) REFERENCES `crews` (`id`) ON DELETE CASCADE,
  CONSTRAINT `crew_ranks_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of crew_ranks
-- ----------------------------
BEGIN;
INSERT INTO `crew_ranks` VALUES (1, 4, 67, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (2, 5, 69, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (3, 6, 67, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (4, 7, 6, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (5, 8, 87, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (6, 9, 86, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (7, 10, 1, NULL, NULL, NULL);
INSERT INTO `crew_ranks` VALUES (8, 11, 67, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
