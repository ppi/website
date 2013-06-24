CREATE TABLE `download_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `created` int(15) DEFAULT NULL,
  `download_item_id` int(11) DEFAULT NULL,
  `with_vendor` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_dl_item` (`download_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;