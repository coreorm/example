# ************************************************************
# CoreORM/Example
# ************************************************************

CREATE DATABASE coreorm_examples;
USE coreorm_examples;
GRANT ALL ON *.* TO 'coreorm'@localhost IDENTIFIED BY 'example';

# tables for simple to-do list

CREATE TABLE `todo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(500) NOT NULL DEFAULT '',
  `is_done` enum('Y','N') DEFAULT 'N',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;