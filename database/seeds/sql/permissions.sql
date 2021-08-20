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

 Date: 06/02/2021 10:03:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES (1, 'dashboard-menu', 'dashboard-menu', 1, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (2, 'manning-menu', 'manning-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (3, 'post-job-opening-menu', 'post-job-opening-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (4, 'post-job-opening-can-create', 'post-job-opening-can-create', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (5, 'post-job-opening-can-edit', 'post-job-opening-can-edit', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (6, 'post-job-opening-can-delete', 'post-job-opening-can-delete', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (7, 'applicant-menu', 'applicant-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (8, 'applicant-can-create', 'applicant-can-create', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (9, 'applicant-can-edit', 'applicant-can-edit', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (10, 'applicant-can-delete', 'applicant-can-delete', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (11, 'applicant-can-view', 'applicant-can-view', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (12, 'crew-management-menu', 'crew-management-menu', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (13, 'crew-management-create', 'crew-management-create', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (14, 'crew-management-edit', 'crew-management-edit', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (15, 'crew-management-delete', 'crew-management-delete', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (16, 'crew-management-view', 'crew-management-view', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (17, 'on-board-management-menu', 'on-board-management-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (18, 'embarkation-menu', 'embarkation-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (19, 'embarkation-view', 'embarkation-view', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (20, 'embarkation-create', 'embarkation-create', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (21, 'embarkation-edit', 'embarkation-edit', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (22, 'embarkation-delete', 'embarkation-delete', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (23, 'disembarkation-menu', 'disembarkation-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (24, 'disembarkation-view', 'disembarkation-view', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (25, 'human-resource-menu', 'human-resource-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (26, 'crew-payslip-menu', 'crew-payslip-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (27, 'payroll-menu', 'payroll-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (28, 'payroll-create', 'payroll-create', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (29, 'payroll-view', 'payroll-view', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (30, 'payroll-edit', 'payroll-edit', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (31, 'payroll-delete', 'payroll-delete', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (32, 'payroll-summary-menu', 'payroll-summary-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (33, 'vessel-principal-menu', 'vessel-principal-menu', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (34, 'principal-management-menu', 'principal-management-menu', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (35, 'principal-management-view', 'principal-management-view', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (36, 'principal-management-create', 'principal-management-create', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (37, 'principal-management-edit', 'principal-management-edit', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (38, 'principal-management-delete', 'principal-management-delete', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (39, 'principal-salary-scale-menu', 'principal-salary-scale-menu', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (40, 'principal-salary-scale-view', 'principal-salary-scale-view', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (41, 'principal-salary-scale-create', 'principal-salary-scale-create', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (42, 'principal-salary-scale-edit', 'principal-salary-scale-edit', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (43, 'principal-salary-scale-delete', 'principal-salary-scale-delete', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (44, 'principal-salary-scale-set-default', 'principal-salary-scale-set-default', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (45, 'vessel-menu', 'vessel-menu', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (46, 'vessel-view', 'vessel-view', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (47, 'vessel-create', 'vessel-create', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (48, 'vessel-edit', 'vessel-edit', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (49, 'vessel-delete', 'vessel-delete', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (50, 'vessel-salary-scale-menu', 'vessel-salary-scale-menu', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (51, 'vessel-salary-scale-edit', 'vessel-salary-scale-edit', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (52, 'vessel-salary-scale-create', 'vessel-salary-scale-create', 6, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (53, 'reports-menu', 'reports-menu', 7, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (54, 'maintenance-menu', 'maintenance-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (55, 'announcement-menu', 'announcement-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (56, 'announcement-create', 'announcement-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (57, 'announcement-edit', 'announcement-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (58, 'announcement-delete', 'announcement-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (59, 'agents-menu', 'agents-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (60, 'agents-create', 'agents-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (61, 'agents-edit', 'agents-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (62, 'agents-delete', 'agents-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (63, 'airlines-menu', 'airlines-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (64, 'airlines-create', 'airlines-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (65, 'airlines-edit', 'airlines-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (66, 'airlines-delete', 'airlines-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (67, 'airports-menu', 'airports-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (68, 'airports-create', 'airports-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (69, 'airports-edit', 'airports-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (70, 'airports-delete', 'airports-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (71, 'banks-menu', 'banks-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (72, 'banks-create', 'banks-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (73, 'banks-edit', 'banks-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (74, 'banks-delete', 'banks-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (75, 'branches-menu', 'branches-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (76, 'branches-create', 'branches-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (77, 'branches-edit', 'branches-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (78, 'branches-delete', 'branches-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (79, 'medical-clinics-menu', 'medical-clinics-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (80, 'medical-clinics-create', 'medical-clinics-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (81, 'medical-clinics-edit', 'medical-clinics-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (82, 'medical-clinics-delete', 'medical-clinics-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (83, 'departments-menu', 'departments-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (84, 'departments-create', 'departments-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (85, 'departments-edit', 'departments-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (86, 'departments-delete', 'departments-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (87, 'documents-menu', 'documents-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (88, 'documents-create', 'documents-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (89, 'documents-edit', 'documents-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (90, 'documents-delete', 'documents-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (91, 'flag-state-documents-menu', 'flag-state-documents-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (92, 'flag-state-documents-create', 'flag-state-documents-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (93, 'flag-state-documents-edit', 'flag-state-documents-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (94, 'flag-state-documents-delete', 'flag-state-documents-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (95, 'licenses-menu', 'licenses-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (96, 'licenses-create', 'licenses-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (97, 'licenses-edit', 'licenses-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (98, 'licenses-delete', 'licenses-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (99, 'manning-agency-menu', 'manning-agency-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (100, 'manning-agency-create', 'manning-agency-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (101, 'manning-agency-edit', 'manning-agency-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (102, 'manning-agency-delete', 'manning-agency-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (103, 'medical-certificates-menu', 'medical-certificates-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (104, 'medical-certificates-create', 'medical-certificates-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (105, 'medical-certificates-edit', 'medical-certificates-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (106, 'medical-certificates-delete', 'medical-certificates-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (107, 'ranks-menu', 'ranks-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (108, 'ranks-create', 'ranks-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (109, 'ranks-edit', 'ranks-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (110, 'ranks-delete', 'ranks-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (111, 'seaport-menu', 'seaport-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (112, 'seaport-create', 'seaport-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (113, 'seaport-edit', 'seaport-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (114, 'seaport-delete', 'seaport-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (115, 'trading-route-menu', 'trading-route-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (116, 'trading-route-create', 'trading-route-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (117, 'trading-route-edit', 'trading-route-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (118, 'trading-route-delete', 'trading-route-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (119, 'training-course-menu', 'training-course-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (120, 'training-course-create', 'training-course-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (121, 'training-course-edit', 'training-course-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (122, 'training-course-delete', 'training-course-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (123, 'training-center-menu', 'training-center-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (124, 'training-center-create', 'training-center-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (125, 'training-center-edit', 'training-center-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (126, 'training-center-delete', 'training-center-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (127, 'vaccines-menu', 'vaccines-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (128, 'vaccines-create', 'vaccines-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (129, 'vaccines-edit', 'vaccines-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (130, 'vaccines-delete', 'vaccines-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (131, 'vessel-type-menu', 'vessel-type-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (132, 'vessel-type-create', 'vessel-type-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (133, 'vessel-type-edit', 'vessel-type-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (134, 'vessel-type-delete', 'vessel-type-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (135, 'working-gear-menu', 'working-gear-menu', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (136, 'working-gear-create', 'working-gear-create', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (137, 'working-gear-edit', 'working-gear-edit', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (138, 'working-gear-delete', 'working-gear-delete', 8, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (139, 'security-menu', 'security-menu', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (140, 'user-accounts-menu', 'user-accounts-menu', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (141, 'user-accounts-create', 'user-accounts-create', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (142, 'user-accounts-edit', 'user-accounts-edit', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (143, 'user-accounts-delete', 'user-accounts-delete', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (144, 'roles-menu', 'roles-menu', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (145, 'roles-create', 'roles-create', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (146, 'roles-edit', 'roles-edit', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (147, 'roles-delete', 'roles-delete', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (148, 'activity-logs-menu', 'activity-logs-menu', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (149, 'activity-logs-print', 'activitiy-logs-print', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (150, 'activity-logs-export', 'activity-logs-export', 9, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` VALUES (151, 'setup-menu', 'setup-menu', 10, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
