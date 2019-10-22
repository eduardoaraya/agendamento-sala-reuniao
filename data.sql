/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : librdb

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 22/10/2019 17:04:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_10_22_172455_schedule', 1);

-- ----------------------------
-- Table structure for schedule
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime(0) NOT NULL,
  `end_time` datetime(0) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES (1, 5, 'eduardojezine@gmail.com', '2019-11-22 09:00:00', '2019-11-22 10:00:00', 'canceled', 'teste', '2019-10-22 15:17:17', '2019-10-22 16:12:39');
INSERT INTO `schedule` VALUES (2, 5, 'eduardojezine@gmail.com', '2019-11-22 04:00:00', '2019-11-22 06:00:00', 'active', 'teste', '2019-10-22 15:34:26', '2019-10-22 15:34:26');
INSERT INTO `schedule` VALUES (3, 3, 'eduardojezine@gmail.com', '2019-11-22 04:00:00', '2019-11-22 06:00:00', 'canceled', 'teste', '2019-10-22 15:34:44', '2019-10-22 16:12:50');
INSERT INTO `schedule` VALUES (4, 2, 'eduardojezine@gmail.com', '2019-11-22 04:00:00', '2019-11-22 06:00:00', 'active', 'teste', '2019-10-22 15:50:05', '2019-10-22 15:50:05');
INSERT INTO `schedule` VALUES (5, 2, 'eduardojezine@gmail.com', '2019-11-22 10:00:00', '2019-11-22 10:30:00', 'active', 'teste', '2019-10-22 15:57:50', '2019-10-22 15:57:50');
INSERT INTO `schedule` VALUES (6, 2, 'eduardojezine@gmail.com', '2019-11-22 10:40:00', '2019-11-22 11:30:00', 'canceled', 'teste', '2019-10-22 16:11:12', '2019-10-22 16:12:59');

SET FOREIGN_KEY_CHECKS = 1;
