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


DELIMITER //
CREATE TRIGGER `delete_product` BEFORE DELETE ON `product`
FOR EACH ROW BEGIN
DELETE FROM `product_translate` WHERE `product_id`=OLD.`id`;
END


DELIMITER //
CREATE TRIGGER `delete_additional_information` BEFORE DELETE ON `additional_information`
FOR EACH ROW BEGIN
DELETE FROM `additional_information_translate` WHERE `additional_information_id`=OLD.`id`;
END


DELIMITER //
CREATE TRIGGER `delete_delivery` BEFORE DELETE ON `delivery`
FOR EACH ROW BEGIN
DELETE FROM `delivery_translate` WHERE `delivery_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_payment` BEFORE DELETE ON `payment`
FOR EACH ROW BEGIN
DELETE FROM `payment_translate` WHERE `payment_id`=OLD.`id`;
END

DELIMITER //
CREATE TRIGGER `delete_order` BEFORE DELETE ON `order`
FOR EACH ROW BEGIN
DELETE FROM `order_item` WHERE `order_id`=OLD.`id`;
DELETE FROM `user_to_order` WHERE `order_id`=OLD.`id`;
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
ALTER TABLE `main_category` ADD `alias` VARCHAR (255) DEFAULT '';


DROP TABLE IF EXISTS `main_category_translate`;
CREATE TABLE `main_category_translate`(
`id` INT (11) AUTO_INCREMENT,
`main_category_id` INT (11) NOT NULL,
`language` VARCHAR (255) NOT NUll,
`title` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);
ALTER TABLE `main_category_translate` ADD `meta_tag` VARCHAR (255) NOT NULL;

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
ALTER TABLE `category` ADD `alias` VARCHAR (255) DEFAULT '';


DROP TABLE IF EXISTS `category_translate`;
CREATE TABLE `category_translate`(
`id` INT (11) AUTO_INCREMENT,
`category_id` INT(11) NOT NULL,
`language` VARCHAR (255) NOT NUll,
`title` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);
ALTER TABLE `category_translate` ADD `meta_tag` VARCHAR (255) NOT NULL;

DROP TABLE IF EXISTS `product_params`;
CREATE TABLE `product_params`(
`id` INT (11) AUTO_INCREMENT,
`category_id` INT (11) NOT NULL,
`status` INT (11) DEFAULT 0,
`pos` INT (11) DEFAULT 0,
PRIMARY KEY (`id`)
);
ALTER TABLE `product_params` ADD `created_at` INT (11) DEFAULT 0;
ALTER TABLE `product_params` ADD `updated_at` INT (11) DEFAULT 0;

DROP TABLE IF EXISTS `product_params_translate`;
CREATE TABLE `product_params_translate`(
`id` INT (11) AUTO_INCREMENT,
`product_params_id` INT (11) DEFAULT 0,
`language` VARCHAR (255) DEFAULT '',
`name` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `product_params_value`;
CREATE TABLE `product_params_value`(
`id` INT (11) AUTO_INCREMENT,
`product_params_id` INT (11) NOT NULL,
`status` INT (11) NOT NULL,
PRIMARY KEY (`id`)
);
ALTER TABLE `product_params_value` ADD `created_at` INT (11) DEFAULT 0;
ALTER TABLE `product_params_value` ADD `updated_at` INT (11) DEFAULT 0;

DROP TABLE IF EXISTS `product_params_value_translate`;
CREATE TABLE `product_params_value_translate`(
`id` INT (11) AUTO_INCREMENT,
`product_params_value_id` INT (11) DEFAULT 0,
`language` VARCHAR (255) DEFAULT '',
`value` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `product_to_params`;
CREATE TABLE `product_to_params`(
`id` INT (11) AUTO_INCREMENT,
`product_params_value_id` INT (11) NOT NULL,
`product_id` INT (11) NOT NULL,
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
ALTER TABLE `product` ADD `is_recommend` INT (1) DEFAULT 0;
ALTER TABLE `product` ADD `is_new` INT (1) DEFAULT 0;
ALTER TABLE `product` ADD `discount` INT (11) DEFAULT 0;
ALTER TABLE `product` ADD `bestseller` INT (1) DEFAULT 0;
ALTER TABLE `product` ADD `out_of_stock` INT (1) DEFAULT 0;


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

DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount`(
`id` INT (11) AUTO_INCREMENT,
`title` VARCHAR (255) NOT NULL,
`value` decimal (15,2) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `additional_information`;
CREATE TABLE `additional_information`(
`id` INT (11) AUTO_INCREMENT,
`product_id` INT (11) Not NULL,
`status` INT (1) Not NULL,
`created_at` INT (11) NOT NULL,
`updated_at` INT (11) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `additional_information_translate`;
CREATE TABLE `additional_information_translate`(
`id` INT (11) AUTO_INCREMENT,
`language` VARCHAR (255) NOT NUll,
`additional_information_id` INT (11) Not NULL,
`name_information` VARCHAR (255) NOT NULL,
`value_information` VARCHAR (255) NOT NUll,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`(
`id` INT (11) AUTO_INCREMENT,
`product_id` INT (11) NOT NULL,
`status` INT (11) DEFAULT 0,
`pos` INT (11) DEFAULT 0,
`email` VARCHAR (255) NOT NULL,
`name` VARCHAR (255) NOT NULL,
`comment` TEXT,
`star` INT (11) NOT NULL,
`created_at` INT (11) DEFAULT 0,
`updated_at` INT (11) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery`(
`id` INT (11) AUTO_INCREMENT,
`status` INT(11) DEFAULT 0,
`pos` INT(11) DEFAULT 0,
PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `delivery_translate`;
CREATE TABLE `delivery_translate`(
`id` INT (11) AUTO_INCREMENT,
`language` VARCHAR (255) NOT NUll,
`delivery_id` INT(11) DEFAULT 0,
`name` VARCHAR (255) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
);
ALTER TABLE `delivery_translate` ADD `price` INT (11) DEFAULT 0;


DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`(
`id` INT(11) NOT NULL AUTO_INCREMENT,
`status` INT(11) DEFAULT 0,
`pos` INT(11) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `payment_translate`;
CREATE TABLE `payment_translate`(
`id` INT (11) AUTO_INCREMENT,
`language` VARCHAR (255) NOT NUll,
`payment_id` INT(11) DEFAULT 0,
`name` VARCHAR (255) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `user_to_order`;
CREATE TABLE `user_to_order`(
`id` INT (11) AUTO_INCREMENT,
`user_id` INT (11) NOT NULL,
`order_id` INT (11) NOT NULL,
PRIMARY KEY (`id`)
)

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`(
`id` INT (11) AUTO_INCREMENT,
`user_id` INT (11) DEFAULT NULL,
`name` VARCHAR (255) DEFAULT '',
`surname` VARCHAR (255) DEFAULT '',
`patronymic` VARCHAR (255) DEFAULT '',
`phone` VARCHAR (255) DEFAULT '',
`email` VARCHAR (255) DEFAULT '',
`total` decimal (15, 4) DEFAULT 0,
`count` int (11) DEFAULT 0,
`status` int (11) DEFAULT 0,
`content` TEXT,
`delivery_id` int(11) DEFAULT 0,
`payment_id` int(11) DEFAULT 0,
`ip` varchar (255) DEFAULT '',
`system_info` TEXT,
PRIMARY KEY (`id`)
);

ALTER TABLE `order` ADD hash VARCHAR (255) DEFAULT '';
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item`(
`id` INT (11) AUTO_INCREMENT,
`order_id` INT (11) DEFAULT NULL,
`product_id` INT (11) DEFAULT NULL,
`name` varchar (255) DEFAULT '',
`price` decimal (15,4) DEFAULT 0,
`count` INT (11) DEFAULT 0,
`total` decimal (15,4) DEFAULT 0,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `home_banner`;
CREATE TABLE `home_banner`(
`id` INT(11) NOT NULL AUTO_INCREMENT,
`status` INT(11) NOT NULL,
`product_id` INT(11) NOT NULL,
`image` TEXT,
`pos` INT(11) NOT NULL,
PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `home_banner_translate`;
CREATE TABLE `home_banner_translate`(
`id` INT (11) AUTO_INCREMENT,
`language` VARCHAR (255) NOT NUll,
`home_banner_id` INT(11) NOT NULL,
`big_text` VARCHAR (255) NOT NULL,
`excerpt` VARCHAR (255) NOT NULL,
`small_text` VARCHAR (255) NOT NULL,
PRIMARY KEY (`id`)
);