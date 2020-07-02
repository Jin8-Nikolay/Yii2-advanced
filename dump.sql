DELIMITER //
CREATE TRIGGER `delete_main_category` BEFORE DELETE ON `main_category`
FOR EACH ROW BEGIN
DELETE FROM `main_category_translate` WHERE `main_category_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_category` BEFORE DELETE ON `category`
FOR EACH ROW BEGIN
DELETE FROM `category_translate` WHERE `category_id`=OLD.`id`;
END

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language`(
`id` INT(11) AUTO_INCREMENT,
`code` VARCHAR (255) NOT NULL,
`locale` VARCHAR (255) NOT NULL,
`title` VARCHAR (255) NOT NULL,
`icon` VARCHAR (255) DEFAULT NULL,
`status` INT (1) DEFAULT 0,
`pos` INT (11) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `main_category`;
CREATE TABLE `main_category`(
`id` INT (11) AUTO_INCREMENT,
`status` INT (1) NOT NULL,
`index` INT (1) NOT NULL,
`alias` VARCHAR (255) NOT NULL,
`created_at` INT(11) DEFAULT 0,
`updated_at` INT(11) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `main_category_translate`;
CREATE TABLE `main_category_translate`(
`id` INT (11) AUTO_INCREMENT,
`main_category_id` INT (11) NOT NULL,
`language` VARCHAR (255) NOT NUll,
`title` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`(
`id` INT (11) AUTO_INCREMENT,
`main_category_id` INT (11) NOT NULL,
`status` INT (1) NOT NULL,
`index` INT (1) NOT NULL,
`alias` VARCHAR (255) NOT NULL,
`count_product` INT (11) DEFAULT 0,
`created_at` INT(11) DEFAULT 0,
`updated_at` INT(11) DEFAULT 0,
`images` TEXT,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `category_translate`;
CREATE TABLE `category_translate`(
`id` INT (11) AUTO_INCREMENT,
`category_id` INT(11) NOT NULL,
`language` VARCHAR (255) NOT NUll,
`title` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`(
`id` INT (11) AUTO_INCREMENT,
`category_id` INT (11) NOT NUll,
`alias` VARCHAR (255) NOT NULL,
`price` DECIMAL (15,2) NOT NULL,
`created_at` INT (11) NOT NULL,
`updated_at` INT (11) NOT NULL,
`status` INT (1) NOT NULL,
`image` TEXT,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `product_translate`;
CREATE TABLE `product_translate`(
`id` INT (11) AUTO_INCREMENT,
`product_id` INT (11) NOT NULL,
`language` VARCHAR (255) NOT NULL,
`meta_title` VARCHAR (255) NOT NULL,
`meta_description` TEXT,
`header` VARCHAR (255) NOT NULL,
`content` TEXT,
`short_content` TEXT,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `redirect`;
CREATE TABLE `redirect`(
`id` INT (11) AUTO_INCREMENT,
`from` VARCHAR (255) NOT NULL,
`to` VARCHAR (255) NOT NULL,
`status` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
`id` INT (11) AUTO_INCREMENT,
`username` VARCHAR (255) DEFAULT '',
`name` VARCHAR (255) DEFAULT '',
`surname` VARCHAR (255) DEFAULT '',
`patronymic` VARCHAR (255) DEFAULT '',
`phone` VARCHAR (255) DEFAULT '',
`email` VARCHAR (255) DEFAULT '',
`status` INT (11) DEFAULT 0,
`role` VARCHAR (10) DEFAULT 0,
`auth_key` VARCHAR (32) DEFAULT '',
`password_hash` VARCHAR (255) DEFAULT '',
`password_reset_token` VARCHAR (255) DEFAULT '',
`verification_token` VARCHAR (255) DEFAULT '',
`created_at` INT (11) DEFAULT 0,
`updated_at` INT (11) DEFAULT 0,
`last_visit` INT (11) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`(
`id` INT (11) AUTO_INCREMENT,
`name` VARCHAR (255) NOT NULL,
`key` VARCHAR (255) NOT NULL,
`content` TEXT,
PRIMARY KEY (`id`)
);