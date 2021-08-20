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

 Date: 08/12/2020 19:19:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for vessel_types
-- ----------------------------
DROP TABLE IF EXISTS `vessel_types`;
CREATE TABLE `vessel_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vessel_types_user_id_foreign` (`user_id`),
  CONSTRAINT `vessel_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of vessel_types
-- ----------------------------
BEGIN;
INSERT INTO `vessel_types` VALUES (1, 'TANKER', 'Tanker', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (2, 'CARGO', 'Dry Cargo', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (3, 'BULK', 'Bulk', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (4, 'FISHING', 'Fishing', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (5, 'GENERAL CARGO', 'General Cargo', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (6, 'CONTAINER', 'Container', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (7, 'HEAVY LIFT', 'Heavy Lift', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (8, 'REEFER', 'Reefer', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (9, 'SEISMIC', 'Seismic', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (10, 'SURVEY', 'Survey', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (11, 'SUPPLY SHIP', 'Supply Ship', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (12, 'TUG BOAT', 'Tug Boat', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (13, 'YATCH', 'Yacht', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (14, 'FOUR POINT MOORING', 'Four Point Mooring', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (15, 'FLATFORM', 'Flatform', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (16, 'DRILL SHIP / WORKBOAT', 'Drill Ship / Workboat', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (17, 'UTILITY VESSEL', 'Utility Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (18, 'BARGE', 'Barge', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (19, 'DREDGER', 'Dredger', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (20, 'PIPE LAYING', 'Pipe Laying', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (21, 'PASSENGER', 'Passenger', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (22, 'PLATFORM', 'Platform', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (23, 'OIL RIG GUARD', 'Oil Rig Guard', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (24, 'TRAWLER', 'Trawler', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (25, 'AHTS', 'AHTS', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (26, 'CAPE SIZE', 'Cape Size', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (27, 'FAST CRAFT', 'Fast Craft', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (28, 'SINGLE DECKER', 'Single Decker', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (29, 'COASTER', 'Coaster', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (30, 'STANDBY SAFETY VESSEL', 'Standby Safety Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (31, 'OCEAN GOING TUG', 'Ocean Going Tug', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (32, 'OFFSHORE VESSEL', 'Offshore Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (33, 'MULTI PURPOSE VESSEL', 'Multi Purpose Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (34, 'SUPPORT VESSEL', 'Support Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (35, 'SMV', 'Support/Maintenance Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (36, 'SUPPORT/GUARD', 'Support/Guard', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (37, 'SCV', 'Subsea Construction Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (38, 'GMPP', 'Geared Mpp', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (39, 'SY', 'Super Yacht', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (40, 'SPS', 'Single Purse Seine', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (41, 'Cement', 'Cement Carrier', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (42, 'OPCT', 'Oil Product /Chemical Tanker', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (43, 'RV', 'Research Vessel', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (44, 'thun greenwich', 'thun greenwich', 2, NULL, NULL);
INSERT INTO `vessel_types` VALUES (45, 'ComVes', 'Commercial Vessel', 2, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
