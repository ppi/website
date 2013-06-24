#!/bin/sh


# file and dir setup
rm -rf downloads_tmp/2.1;
rm -f downloads_tmp/ppi-v2.1.zip;
rm -f downloads_tmp/ppi-v2.1-with-vendor.zip
mkdir downloads_tmp/2.1 && cd downloads_tmp/2.1;

# pull skeletonapp 2.1 from github
git clone https://github.com/ppi/skeletonapp.git . && git checkout 2.1 && cd ..

# create archive
zip -r ppi-v2.1.zip 2.1

# get size of the archive
size=$(du -b ppi-v2.1.zip | sed 's/\([0-9]*\)\(.*\)/\1/')

# run composer
cd 2.1
curl -sS https://getcomposer.org/installer | php
php composer.phar install && cd ..
zip -r ppi-v2.1-with-vendor.zip 2.1

# get size of the archive
vendorsize=$(du -b ppi-v2.1-with-vendor.zip | sed 's/\([0-9]*\)\(.*\)/\1/')

# update database with filesizes
php ./update_filesize.php -i 1 -f size -v vendorsize


# move files into production DIR once completed
cp ppi-v2.1.zip ../../downloads/ppi-v2.1.zip
cp ppi-v2.1-with-vendor.zip ../../downloads/ppi-v2.1-with-vendor.zip