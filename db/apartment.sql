/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3307
 Source Server Type    : MySQL
 Source Server Version : 50743 (5.7.43-log)
 Source Host           : localhost:3307
 Source Schema         : apartment

 Target Server Type    : MySQL
 Target Server Version : 50743 (5.7.43-log)
 File Encoding         : 65001

 Date: 20/11/2024 22:02:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `Idadmin` int(11) NOT NULL,
  `Adminname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Adminpswd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Idadmin`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for contract
-- ----------------------------
DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract`  (
  `Idcontract` int(11) NOT NULL AUTO_INCREMENT,
  `Signdate` datetime NOT NULL,
  `Startdate` datetime NOT NULL,
  `Enddate` datetime NOT NULL,
  `Iduser` int(11) NOT NULL,
  PRIMARY KEY (`Idcontract`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contract
-- ----------------------------

-- ----------------------------
-- Table structure for pma__bookmark
-- ----------------------------
DROP TABLE IF EXISTS `pma__bookmark`;
CREATE TABLE `pma__bookmark`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Bookmarks' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__bookmark
-- ----------------------------

-- ----------------------------
-- Table structure for pma__central_columns
-- ----------------------------
DROP TABLE IF EXISTS `pma__central_columns`;
CREATE TABLE `pma__central_columns`  (
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `col_length` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `col_collation` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `col_default` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`db_name`, `col_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Central list of columns' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__central_columns
-- ----------------------------

-- ----------------------------
-- Table structure for pma__column_info
-- ----------------------------
DROP TABLE IF EXISTS `pma__column_info`;
CREATE TABLE `pma__column_info`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `db_name`(`db_name`, `table_name`, `column_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Column information for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__column_info
-- ----------------------------

-- ----------------------------
-- Table structure for pma__designer_settings
-- ----------------------------
DROP TABLE IF EXISTS `pma__designer_settings`;
CREATE TABLE `pma__designer_settings`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `settings_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Settings related to Designer' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__designer_settings
-- ----------------------------

-- ----------------------------
-- Table structure for pma__export_templates
-- ----------------------------
DROP TABLE IF EXISTS `pma__export_templates`;
CREATE TABLE `pma__export_templates`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `template_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `u_user_type_template`(`username`, `export_type`, `template_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Saved export templates' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__export_templates
-- ----------------------------

-- ----------------------------
-- Table structure for pma__favorite
-- ----------------------------
DROP TABLE IF EXISTS `pma__favorite`;
CREATE TABLE `pma__favorite`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tables` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Favorite tables' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__favorite
-- ----------------------------

-- ----------------------------
-- Table structure for pma__history
-- ----------------------------
DROP TABLE IF EXISTS `pma__history`;
CREATE TABLE `pma__history`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `username`(`username`, `db`, `table`, `timevalue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'SQL history for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__history
-- ----------------------------

-- ----------------------------
-- Table structure for pma__navigationhiding
-- ----------------------------
DROP TABLE IF EXISTS `pma__navigationhiding`;
CREATE TABLE `pma__navigationhiding`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`, `item_name`, `item_type`, `db_name`, `table_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Hidden items of navigation tree' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__navigationhiding
-- ----------------------------

-- ----------------------------
-- Table structure for pma__pdf_pages
-- ----------------------------
DROP TABLE IF EXISTS `pma__pdf_pages`;
CREATE TABLE `pma__pdf_pages`  (
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`) USING BTREE,
  INDEX `db_name`(`db_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'PDF relation pages for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__pdf_pages
-- ----------------------------

-- ----------------------------
-- Table structure for pma__recent
-- ----------------------------
DROP TABLE IF EXISTS `pma__recent`;
CREATE TABLE `pma__recent`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tables` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Recently accessed tables' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__recent
-- ----------------------------

-- ----------------------------
-- Table structure for pma__relation
-- ----------------------------
DROP TABLE IF EXISTS `pma__relation`;
CREATE TABLE `pma__relation`  (
  `master_db` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`, `master_table`, `master_field`) USING BTREE,
  INDEX `foreign_field`(`foreign_db`, `foreign_table`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Relation table' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__relation
-- ----------------------------

-- ----------------------------
-- Table structure for pma__savedsearches
-- ----------------------------
DROP TABLE IF EXISTS `pma__savedsearches`;
CREATE TABLE `pma__savedsearches`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `u_savedsearches_username_dbname`(`username`, `db_name`, `search_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Saved searches' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__savedsearches
-- ----------------------------

-- ----------------------------
-- Table structure for pma__table_coords
-- ----------------------------
DROP TABLE IF EXISTS `pma__table_coords`;
CREATE TABLE `pma__table_coords`  (
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`db_name`, `table_name`, `pdf_page_number`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Table coordinates for phpMyAdmin PDF output' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__table_coords
-- ----------------------------

-- ----------------------------
-- Table structure for pma__table_info
-- ----------------------------
DROP TABLE IF EXISTS `pma__table_info`;
CREATE TABLE `pma__table_info`  (
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`, `table_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Table information for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__table_info
-- ----------------------------

-- ----------------------------
-- Table structure for pma__table_uiprefs
-- ----------------------------
DROP TABLE IF EXISTS `pma__table_uiprefs`;
CREATE TABLE `pma__table_uiprefs`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prefs` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`, `db_name`, `table_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Tables\' UI preferences' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__table_uiprefs
-- ----------------------------

-- ----------------------------
-- Table structure for pma__tracking
-- ----------------------------
DROP TABLE IF EXISTS `pma__tracking`;
CREATE TABLE `pma__tracking`  (
  `db_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `schema_sql` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `data_sql` longtext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`db_name`, `table_name`, `version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Database changes tracking for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__tracking
-- ----------------------------

-- ----------------------------
-- Table structure for pma__userconfig
-- ----------------------------
DROP TABLE IF EXISTS `pma__userconfig`;
CREATE TABLE `pma__userconfig`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'User preferences storage for phpMyAdmin' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__userconfig
-- ----------------------------

-- ----------------------------
-- Table structure for pma__usergroups
-- ----------------------------
DROP TABLE IF EXISTS `pma__usergroups`;
CREATE TABLE `pma__usergroups`  (
  `usergroup` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'N',
  PRIMARY KEY (`usergroup`, `tab`, `allowed`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'User groups with configured menu items' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__usergroups
-- ----------------------------

-- ----------------------------
-- Table structure for pma__users
-- ----------------------------
DROP TABLE IF EXISTS `pma__users`;
CREATE TABLE `pma__users`  (
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`, `usergroup`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Users and their assignments to user groups' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pma__users
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `Idprofile` int(11) NOT NULL AUTO_INCREMENT,
  `phonenum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rib` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Idprofile`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `Idroom` int(11) NOT NULL AUTO_INCREMENT,
  `Capacity` int(11) NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Isavailable` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Iduser` int(11) NOT NULL,
  PRIMARY KEY (`Idroom`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `Iduser` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Iduser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'ZDS', '1234', '1476475770@qq.com');

SET FOREIGN_KEY_CHECKS = 1;
