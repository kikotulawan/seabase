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

 Date: 21/02/2021 20:21:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crews
-- ----------------------------
DROP TABLE IF EXISTS `crews`;
CREATE TABLE `crews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crew_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  `application_date` date NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bldg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eye_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_language` text COLLATE utf8mb4_unicode_ci,
  `race` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kin_fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kin_birth_date` date DEFAULT NULL,
  `kin_relationship` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kin_address` text COLLATE utf8mb4_unicode_ci,
  `kin_telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kin_hp_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_all` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `safety_shoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `white_polo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `black_pants` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winter_jacket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winter_pants` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rain_coat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sss_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philhealth_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagibigid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psu_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psu_issuance_date` date DEFAULT NULL,
  `nbi_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbi_validity` date DEFAULT NULL,
  `member_type` int DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommended_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_address` text COLLATE utf8mb4_unicode_ci,
  `mothers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_address` text COLLATE utf8mb4_unicode_ci,
  `spouse_first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_middle_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_married_date` date DEFAULT NULL,
  `spouse_birth_date` date DEFAULT NULL,
  `spouse_birth_place` text COLLATE utf8mb4_unicode_ci,
  `spouse_occupation` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `crews_email_unique` (`email`),
  KEY `crews_user_id_foreign` (`user_id`),
  CONSTRAINT `crews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of crews
-- ----------------------------
BEGIN;
INSERT INTO `crews` VALUES (4, NULL, '20201023-Photo_Realco, Edwin.jpg', '2020-10-08', 'Edwin', 'Abala', 'Realco', '545 Zone 4, Santiago, Iriga City, Camarines Sur, Philippines', 'realcoedwin1962.cmi@gmail.com', '(054) 299-1345', NULL, NULL, '545 Zone 4, Santiago,', ' Iriga City, ', 'Camarines Sur', '4431', '+63 961-1569223', 173, '1962-12-01', 'Nabua , Camarines Sur', 'Male', 'Married', '162 cm', '76 kg', NULL, 'Black', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Ma. Gracia Bolina Realco', '1967-04-19', 'Wife', '545 Zone 4, Santiago, Iriga City, Camarines Sur', '(054) 299-1345', '(054) 299-1345', 'Large', 'Size 9', 'Large', 'Size 32', 'Size 32', 'Large', 'Large', '33-0435182-1', '1905-0695-7366', '1050-0084-0241', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (5, NULL, '20201023-pix.jpg', '2020-10-23', 'Cornelio Jr.', 'Barrientos', 'Peralta ', 'Block 1, Lot 12 Belen St, San Carlos , Binangonan, Rizal 1940', 'jhunelperalta2018@gmail.com', '09391010026', 'Px4orYac', NULL, 'Belen St. ', 'Binangonan', 'Rizal ', '1940', '+63 939 1010026', 173, '1973-12-30', 'Libungan, North Cotabato , Mindanao', 'Male', 'Married', '165 cm', '69 kg', NULL, 'Brown', 'Catholic ', 'Filipino', 'English', 'Asian ', 'Cecille Peralta', '1965-04-01', NULL, 'Block 1, Lot 12 Belen St, San Carlos , Binangonan, Rizal 1940', '72134212', '72134212', 'xxxl', '8', 'xxxl', '32', 'xxxk', '32', 'xxxl', '33-2236316-3', '020502169409', '104000382286', '18204', '1998-12-10', '15631098', '2020-11-18', NULL, 'Existing Crew ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (6, NULL, '20201023-photo.jpg', '2020-10-23', 'Mark Anthony', 'Pineda', 'Moraga', '179 Northern Hills, Malhacan, Meycauayan, Bulacan, Philippines', 'markmoraga007@gmail.com', 'None', 'XDw28NQx', '179', ' Northern Hills Malhacan, ', 'Meycauayan, ', 'Bulacan, Philippines', '3020', '+63 977-3177258 ', 173, '1985-07-07', 'Meycuayan, Bulacan', 'Male', 'Single', '5\'2 ft', '72 kg', NULL, 'Black', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Elineta P. Tapang', '1964-08-04', 'Mother', '179 Northern Hills, Malhacan, Meycauayan, Bulacan, Philippines', 'None', 'None', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '33-8849939-8', '2102-5346-9832', '1211-7083-1240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (7, NULL, NULL, '2020-10-23', 'Christopher', 'Fran', 'Madero', 'Brgy. 6 Purok 1, Daet, Camarines Norte', 'maderochristopher@yahoo.com', '09214476478', '6r3VqPGh', NULL, 'Brgy 6, Purok 1', 'Daet', 'Camarines, Norte', '4600', '+63 9214476478', 173, '1977-05-02', 'Paranaque', 'Male', 'Married', '166', '70', NULL, 'Brown', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Adora C. Madero', '1976-01-12', 'Wife', 'Brgy. 6, Purok 1 Daet, Camarines Norte', NULL, NULL, 'Large', '45', 'Large', '34', 'Large', '34', 'Large', '33-2509396-4', '0205-0187-0219', NULL, '02216-E', '2003-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (8, NULL, '20201026-Photo.jpg', '2020-10-26', 'Ricarte', 'Edquila', 'Rivera', 'Palañas-Mabini St., Poblacion Mambajao, Camiguin Province, Philippines', 'riveraricarte2020@gmail.com', 'None', 'DksBzCRh', NULL, 'Palañas-Mabini St., Poblacion ', 'Mambajao, ', 'Camiguin Province', '9100', '+63 965 559 0693', 173, '1974-02-07', 'Damulog, Bukidnon', 'Male', 'Married', '165 cm', '60 kg', NULL, 'Black', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Farah Tagotongan Rivera', '1980-02-02', 'Wife', 'Palañas-Mabini St., Poblacion Mambajao, Camiguin Province, Philippines', '+63 935-5166973', 'None', 'X-Large', 'Size 8', 'Large', 'Size 32', 'Free size', 'Free size', 'X-Large', '08-1234174-0', '02-050445255-8', '1040-0037-9253', '00428-E', '2001-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (9, NULL, '20201026-Photo.jpg', '2020-10-26', 'Jade', 'Gidayawan', 'Tangile', 'Zamora St. Poblacion Madridejos, Cebu, Philippines', 'tangilejade.cmi@gmail.com', '(032) 439-7265', 'KDPiar38', NULL, 'Zamora St. Poblacion ', 'Madridejos,', ' Cebu', '6300', '+63 943-0752992 ', 173, '1969-12-10', 'Cadiz City', 'Male', 'Married', '153 cm', '55 kg', NULL, 'Black', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Editha N. Tangile', '1966-12-09', 'Wife', 'Zamora St. Poblacion Madridejos, Cebu, Philippines', '+63 933-5556632 ', '(032) 439-7265', 'Large', 'Size 7', 'Large', 'Size 30', 'Free size', 'Size 30', 'Large', '33-1958108-4', '01-051338555-8', '1210-2409-0161', '002266', '2017-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (10, NULL, '20201026-Photo.jpg', '2020-10-26', 'Reynaldo', 'Elloren', 'Soler', '4763 5th St cor Datiles Drive Southcom Village, Upper Calarian Zamboanga City, Philippines', 'reynaldo.soler@yahoo.com', '(062) 955-7297 - home', 'VcwcEpXc', '4763 ', '5th St cor Datiles Drive Southcom Village, ', 'Upper Calarian ', 'Zamboanga City,', '7000', '+63 905-3015600 - new', 173, '1961-04-09', 'Isabela, Basilan', 'Male', 'Married', '170 cm', '74 kg', NULL, 'Black', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Arlene Francisco Soler', '1963-02-21', 'Wife', '4763 5th St cor Datiles Drive , Southcom Village Upper Calarian, Zamboanga City, Philippines', '(062) 955-7297 ', '+63 926-8079677-wife', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '10-0322751-7', '19-051350273-0', '1210-5628-8659', 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `crews` VALUES (11, NULL, '20201027-picture.jpg', '2020-01-18', 'Jomon', 'Alis ', 'Adornado', 'Blk 6 Lot 11, St. Andrew St., SP57 San Bartolome, Novaliches, Quezon City', 'jomonbogsadornado78@gmail.com', '+63 9195962926', 'B8nvGW6C', 'Blk 6', 'Lot 11, St. Andrew St., SP57, San Bartolome', 'Novaliches, Quezon City', 'NCR', NULL, '+63 9195962926', 173, '1978-04-01', 'Sta. Mesa, Manila', 'Male', 'Married', '169', '63', NULL, 'Brown', 'Roman Catholic', 'Filipino', 'English', 'Asian', 'Marie Ann S. Adornado', '1982-09-19', 'Wife', 'Blk 6 Lot 11, St. Andrew St., SP57, San Bartolome, Novaliches, Quezon City', NULL, NULL, 'Large', '45', 'Large', '34', 'Large', '34', 'Large', '33-5115308-5', '1210 0222 8001 5', '1905 0990 2198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
