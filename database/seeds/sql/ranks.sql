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

 Date: 21/02/2021 20:15:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ranks
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rank` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `rank_id` bigint unsigned NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ranks_department_id_foreign` (`department_id`),
  KEY `ranks_user_id_foreign` (`user_id`),
  CONSTRAINT `ranks_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ranks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ranks
-- ----------------------------
BEGIN;
INSERT INTO `ranks` VALUES (1, 'Master', 'MSTR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (2, 'Utility', 'UTY', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (3, 'Motorman', 'MTRMN', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (4, 'AB / Motorman', 'AB/MTRMN', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (5, 'Oiler', 'OILER', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (6, 'Bosun', 'BSN', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (7, 'GP Senior', 'GPSR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (8, 'GP1 Ex Crew', 'GPEX', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (9, 'GP1 New Crew', 'GPNEW', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (10, 'GP Ja', 'GPJA', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (11, 'GP Jr', 'GPJR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (12, 'AB / Cook Senior', 'AB/CKSR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (13, 'AB / Cook New', 'AB/CKNEW', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (14, 'Assistant Cook', 'ASSTCK', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (15, 'Cadet', 'CDT', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (16, 'Deck Trainee', 'DTR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (17, 'Engine Trainee', 'ENT', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (18, 'AB / QM', 'ABQM', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (19, '2nd Cook', '2CK', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (20, 'Bosun Mate', 'BMATE', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (21, 'Quarter Master', 'QM', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (22, 'Trainee Mate', 'TMATE', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (23, 'Chief Mate', 'CMATE', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (24, '3rd Mate', '3MATE', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (25, '2nd Mate', '2MATE', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (26, 'Chief Engineer', 'CENGINE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (27, '2nd Engineer', '2ENGINE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (28, '3rd Engineer', '3ENGINE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (29, '4th Engineer', '4ENGINE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (30, 'Messman', 'MSMN', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (31, 'Cook', 'CK', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (32, '2nd Officer DPO', '2ODPO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (33, 'Chief Officer DPO', 'CODPO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (34, 'AB ', 'AB', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (35, 'AB / Cook', 'ABCK', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (36, 'Ordinary Seaman/GP Jr.', 'OSGPJ', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (37, 'Deckboss', 'DB', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (38, 'Deck Cadet', 'DC', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (39, 'Chief Cook', 'C/Cook', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (40, 'Skiffman', 'SKI', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (41, 'Engine Cadet', 'EC', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (42, 'Motorman/Fitter', 'MMF', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (43, '2nd Officer', '2 Off', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (44, 'AB/Excavator', 'ABEx', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (45, 'Galley Man', 'GLYMAN', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (46, 'General Purpose', 'GP', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (47, 'GP II', 'GP II', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (48, 'Jr. 3rd Officer', 'Jr3rd Officer', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (49, 'Fitter', 'Fitter', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (50, 'Deck Officer', 'D/OFF', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (51, 'Jr. DPO', 'JDPO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (52, 'Engine Boy', 'EBOY', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (53, 'Stewardess', 'STWDS', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (54, 'Junior Officer', 'JROFF', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (55, 'Electrician', 'Electrician', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (56, 'Captain Fisherman', 'CAPT', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (57, 'Deck Boss', 'Deck Boss', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (58, 'Fisherman', 'Fisherman', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (59, 'OIC Navigational Watch', 'OIC', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (60, '3rd Officer', '3/0', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (61, 'AB/Crane Driver', 'ABCD', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (62, 'OIC-Engineering Watch', 'OIC-EW', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (63, 'Fitter Mechanic', 'FM', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (64, 'Chief Steward / Camp Boss', 'CSCB', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (65, 'Bosun/Crane Operator', 'BCRO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (66, '2nd Officer / Jr. DPO', 'JRDPO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (67, 'Able Seaman', 'Able Seaman', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (68, 'Steward', 'SWD', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (69, 'Chief Officer', 'CO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (70, 'Crane Operator', 'Crane Operator', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (71, 'AB/Crane Operator', 'ABCO', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (72, 'Campboss', 'CTO', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (73, 'DP Jr.', 'DP Jr.', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (74, 'Wiper', 'WPR', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (75, 'Electrical Engineer', 'EE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (76, 'FMS Engineer', 'FMS', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (77, 'AB Cook.', 'AB/CK (>3k grt )', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (78, 'AB Cook', 'Ab Cook (< 3k grt)', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (79, 'GP SR/MM', 'GPM', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (80, 'Trainee Engineer', 'TE', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (81, 'GP Sr..', 'GPSR.', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (82, 'AB/Cook.', 'ABCK.', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (83, 'GP Sr. (AB/Olr)', 'GPSRABOLR', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (84, 'GP Sr', 'GP Sr', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (85, 'Deck Boy', 'DB...', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (86, 'AB/Cook', 'AB/Cook Sr.', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (87, 'AB/QM', 'GP1 Ex', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (88, 'AB/QM.', 'GP Sr.', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (89, 'AB/QM..', 'GP Sr./MM', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (90, 'Bosun Mate/QM', 'new', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (91, 'Welder', 'WELDER', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (92, 'Mastman', 'MSTMAN', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (93, 'Ordinary Seaman/GP Ja', 'OSGP', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (94, 'Ordinary Seaman/GP New', 'OSGPN', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (95, 'Trainee 2nd Cook', 'T2C', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (96, '2nd Cook.', 'AB/Cook New', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (97, 'OS/Wiper', 'OS/Wiper', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (98, 'Chief Int\'l Cook', 'ChIC', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (99, 'Ordinary Seaman', 'OS', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (100, '2nd Cook..', '2CK.', 4, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (101, 'Apprentice Engineer', 'APPRE ENG', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (102, 'Pumpman', 'PMAN', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (103, 'AB/QM*', 'AQ', 1, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (104, 'Motorman*', 'MMP', 2, 0, 2, NULL, NULL);
INSERT INTO `ranks` VALUES (105, 'Captain', 'CAPT', 1, 0, 2, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
