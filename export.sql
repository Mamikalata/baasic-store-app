CREATE TABLE `products` (
	`product_id` INT(11) NOT NULL AUTO_INCREMENT,
	`product_name` VARCHAR(50) NOT NULL DEFAULT '0',
	`product_price` VARCHAR(7) NOT NULL DEFAULT '0',
	`category_id` INT(50) NOT NULL DEFAULT '0',
	PRIMARY KEY (`product_id`),
	INDEX `FK_products_categories` (`category_id`),
	CONSTRAINT `FK_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6
;

CREATE TABLE `categories` (
	`category_id` INT(11) NOT NULL AUTO_INCREMENT,
	`category_name` VARCHAR(50) NOT NULL DEFAULT '0',
	PRIMARY KEY (`category_id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;