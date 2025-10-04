CREATE TABLE `propertyfellows`.`tblSubElements` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `details` TEXT NOT NULL ,
`addedAt` DATETIME NOT NULL , `updatedAt` DATETIME NOT NULL , `isDeleted` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1 is for deleted ' , P
RIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `subscriptions` ADD `subElements` TEXT NOT NULL AFTER `subscription_type`;


CREATE TABLE `propertyfellows`.`coupons` (`id` INT(255) NOT NULL AUTO_INCREMENT , `coupon` VARCHAR(255) NOT NULL , `discount` INT(255) NOT NULL , 
`status` TINYINT(1) NOT NULL , `is_deleted` TINYINT(1) NOT NULL , `createdAt` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


ALTER TABLE `subscriptions` ADD `oldPrice` INT(255) NOT NULL AFTER `listings`;
