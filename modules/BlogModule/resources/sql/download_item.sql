BEGIN;
DROP TABLE IF EXISTS `download_item`;
CREATE TABLE `download_item` (
  `id`            INT(11)      NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(255) NOT NULL,
  `filename`      VARCHAR(255) NOT NULL,
  `filesize`      INT          NOT NULL,
  `archive_type`  VARCHAR(16)  NOT NULL,
  `num_downloads` INT          NOT NULL DEFAULT 0,
  `created`       INT(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO ppi.download_item (id, name, filename, filesize, archive_type, num_downloads, created) VALUES (1, ' Skeleton App (without vendors)', 'ppi-skeletonapp-without-vendors.tar.gz', 66666, 'tgz', 0, 1363654916);
INSERT INTO ppi.download_item (id, name, filename, filesize, archive_type, num_downloads, created) VALUES (2, 'Skeleton App (with vendors)', 'ppi-skeletonapp-with-vendors.tar.gz', 666663, 'tgz', 0, 1363654916);
COMMIT;