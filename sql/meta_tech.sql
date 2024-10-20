/*
 Navicat Premium Dump SQL

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : meta_tech

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 20/10/2024 23:14:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_shopping
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shopping`;
CREATE TABLE `tbl_shopping`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `before_price` decimal(10, 2) NULL DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_shopping
-- ----------------------------
INSERT INTO `tbl_shopping` VALUES (1, 38.00, NULL, 'product1.png', '1', 0, 'Festive Looks Rust Red Ribbed Velvet Long Sleeve Bodysuit\r\n', 'Test-0001', 'S', 'Red', 'DON\'T MISS OUT! Added to bag 23 times in the last 48 hrs');
INSERT INTO `tbl_shopping` VALUES (2, 5.77, 7.34, 'product2.png', '1', 0, 'Chevron Flap Crossbody Bag\r\n', 'Test-0002', 'M', 'Black', 'IN DEMAND! Sold 55 times in the last 48 hrs');
INSERT INTO `tbl_shopping` VALUES (3, 29.00, 39.00, 'product3.png', '1', 0, 'Manila Tan Multi Plaid Oversized Fringe Scarf', 'Test-0003', 'L', 'Brown', 'DON\'T MISS OUT! Added to bag 23 times in the last 48 hrs');
INSERT INTO `tbl_shopping` VALUES (4, 45.99, NULL, 'product4.png', '1', 0, 'Diamante Puff Sleeve Dress-Black', 'Test-0004', 'XL', 'Yellow', 'IN DEMAND! Sold 55 times in the last 48 hrs');
INSERT INTO `tbl_shopping` VALUES (5, 69.00, 99.95, 'product5.png', '1', 0, 'Banneth Open Front Formal Dress In Black', 'Test-0005', 'S', 'Blue', 'IN DEMAND! Sold 55 times in the last 48 hrs');

SET FOREIGN_KEY_CHECKS = 1;
