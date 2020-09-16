/*
Navicat MySQL Data Transfer

Source Server         : LocalMachine
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : students

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-08-19 16:51:37
*/
SET FORREIGN_KEY_CHECKS=0;

-- BẢNG DỮ LIỆU CỦA students

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `age` INT(11) DEFAULT NULL,
    `university` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
)   ENGINE=MySQL AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4_unicode_ci COLLATE=utf8mb4_unicode_ci;

-- RECOEDS OF students

INSERT INTO `students` VALUES (`1`, `Nguyễn Hoàng Long`, `22`, `University of Science`);;
INSERT INTO `students` VALUES (`2`, `Nguyeenx Sơn Tungf`, `23`, `National Econemic University`);
INSERT INTO `students` VALUES (`3`, `Đỗ Nam Khanhs`, `21`, `University of Technolory`);