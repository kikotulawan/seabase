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

 Date: 21/02/2021 20:17:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -----------------
-- Records of vessels
-- ----------------------------
BEGIN;
INSERT INTO `vessels` VALUES (7, 2, NULL, '0005', 'Rova', 'V2HE4', 5, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-02-21 19:46:43', '2021-02-21 19:46:43');
INSERT INTO `vessels` VALUES (8, 3, NULL, 'LUN', 'Thun Lundy', 'LUN', 42, 9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-02-21 19:48:29', '2021-02-21 19:48:29');
INSERT INTO `vessels` VALUES (9, 4, NULL, 'PHJC', 'Rimini', 'PHJC', 5, 9, 4, 'Amasus Crew BV', 'Mr Henk v.d. Veen', '+31-596-649800', NULL, 'The Netherlands', '2008', NULL, 'Amasus Crew BV', NULL, NULL, '9421635', 'ABC', 0, 0, '1862', NULL, 'Bureau Veritas', '920', NULL, 1, NULL, NULL, '2021-02-21 19:51:54', '2021-02-21 19:51:54');
INSERT INTO `vessels` VALUES (10, 2, NULL, 'OJQV', 'Marilie', 'OJQV', 5, 13, 4, NULL, NULL, NULL, NULL, 'Finland', '1995', NULL, 'Rederi Ab Nathalie', NULL, '9086605', '9086605', NULL, 0, 0, '2561', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-02-21 19:53:41', '2021-02-21 19:53:41');
INSERT INTO `vessels` VALUES (11, 2, NULL, 'PDRZ', 'Hendrika Margaretha', 'PDRZ', 2, 9, 4, NULL, NULL, NULL, NULL, 'Europe', '1993', NULL, 'de Koning Gans C.V.', NULL, '9057238', '9057238', 'Caterpillar', 0, 0, '1999', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-02-21 19:55:39', '2021-02-21 19:55:39');
INSERT INTO `vessels` VALUES (12, 5, NULL, 'H4AL', 'Solomon Opal', 'H4AL', 4, 27, 4, NULL, NULL, NULL, NULL, 'Solomon Islands', '2001', NULL, 'National Fisheries Development Limited', NULL, '4557702313', '4557702313', NULL, 0, 0, '718', NULL, 'SPS', NULL, NULL, 1, NULL, NULL, '2021-02-21 19:57:16', '2021-02-21 19:57:16');
INSERT INTO `vessels` VALUES (13, 3, NULL, 'LIV', 'Thun Liverpool', 'LIV', 42, 9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-02-21 19:58:15', '2021-02-21 19:58:15');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
