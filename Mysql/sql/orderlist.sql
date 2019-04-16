/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : order

 Target Server Type    : MariaDB
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 14/03/2019 19:15:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for list
-- ----------------------------
DROP TABLE IF EXISTS `list`;
CREATE TABLE `list`  (
  `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sku` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'SKU',
  `number` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '商品编码',
  `purchase_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '采购单价',
  `sell_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '销售单价',
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '货源链接',
  `kg` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '重量',
  `remark` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sku_num`(`sku`, `number`) USING BTREE COMMENT 'SKU索引，可能为空，商品编码不能为空'
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of list
-- ----------------------------
INSERT INTO `list` VALUES (4, '博世机油', 'bosch999', 300.00, 130.00, 'www.tmall.com/order', '3', '淘宝的货');
INSERT INTO `list` VALUES (6, 'okoppp', '0', 363.89, 123.66, 'www.jd.com/my', '2', 'jingd');
INSERT INTO `list` VALUES (7, '和汽雨刷', 'list9090', 36.00, 9.00, 'news.163.com', '3', '和汽产品线');
INSERT INTO `list` VALUES (8, 'qwk666', '12300123', 36.99, 12.68, 'news.baidu.com', '2', '沙发大方');
INSERT INTO `list` VALUES (9, '好顺化氢气', 'order999', 300.00, 169.00, 'www.baidu.com/baidjia', '30', '好顺');
INSERT INTO `list` VALUES (10, '博世电瓶', 'fromjd-333', 300.00, 169.00, 'www.baidu.com/baidjia', '30', '京东货源');
INSERT INTO `list` VALUES (11, '和汽玻璃水', 'hq009', 26.00, 15.00, 'www.heqi.com', '3.6', '玻璃水');
INSERT INTO `list` VALUES (12, 'werokok', 'list2323', 300.00, 120.00, 'www.baidu.com/list', '', '百度看到的');
INSERT INTO `list` VALUES (13, '和汽雨刷', 'hq998', 63.00, 20.00, 'www.aleqipei.com', '2', '和汽');

SET FOREIGN_KEY_CHECKS = 1;
