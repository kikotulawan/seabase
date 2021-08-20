/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1_3306
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : 127.0.0.1:3306
 Source Schema         : seabasedb

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 08/12/2020 19:10:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for vaccines
-- ----------------------------
DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE `vaccines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vaccine` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifydays` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaccines_user_id_foreign` (`user_id`),
  CONSTRAINT `vaccines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of vaccines
-- ----------------------------
BEGIN;
INSERT INTO `vaccines` VALUES (1, 'Yellow Fever', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (2, 'Cholera 1st Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (3, 'Typhoid', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (4, 'Hepatitis \"A\" 1st of 2 doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (5, 'Diphtheria Tetanus Polio', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (6, 'Injectable Polio', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (7, 'Diptheria Tetanus', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (8, 'Cholera 2nd Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (9, 'Cholera booster', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (10, 'Cholera 3rd Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (11, 'Diphtheria, Pertusis, Tetanus', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (12, 'Polio', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (13, 'Hepa \"B\"', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (14, 'Influenza', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (15, 'Varicella (Chicken Pox) 1st Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (16, 'Varicella (Chicken Pox) 2nd Doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (17, 'Tetanus 1st Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (18, 'Tetanus 2nd Doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (19, 'Tetanus 3rd Doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (20, 'Cholera', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (21, 'Hepatitis \"A\" 2nd of 2 doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (22, 'Cholera 1st & 2nd Dose', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (23, 'Hepatitis A', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (24, 'Hepa B 1st of 3 doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (25, 'Hepa B 2nd of 3 doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (26, 'Hepa B 3rd of 3 doses', 60, 2, NULL, NULL);
INSERT INTO `vaccines` VALUES (27, 'Tetanus, Diphtheria, Pertusis', 60, 2, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
