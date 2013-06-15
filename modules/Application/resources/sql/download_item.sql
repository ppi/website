CREATE TABLE `download_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filesize` double DEFAULT NULL,
  `vendor_filesize` double DEFAULT NULL,
  `archive_type` varchar(255) DEFAULT NULL,
  `num_downloads` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `download_item` (`id`,`name`,`filename`,`filesize`,`vendor_filesize`,`archive_type`,`num_downloads`,`created`,`description`)
VALUES
	(1, 'PPI Skeleton 2.1', 'ppi-v2.1.zip', 100000, 342342, 'zip', 0, '2013-06-15 17:07:34', NULL),
	(2, 'PPI Skeleton 2.0', 'ppi-v2.0.zip', 10000, 324324, 'zip', 0, '2013-06-15 17:07:34', NULL),
	(3, 'PPI Website', 'ppi-website.zip', 10000, 24234, 'zip', 0, '2013-06-15 17:07:34', NULL),
	(4, 'PPI Docs 2.1', 'ppi-docs-v2.1.zip', 100000, 4342342, 'zip', 0, '2013-06-15 17:07:34', NULL),
	(5, 'PPI Docs 2.0', 'ppi-docs-v2.0.zip', 100000, 454523, 'zip', NULL, NULL, NULL);

