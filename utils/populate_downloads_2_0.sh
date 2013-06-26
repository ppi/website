#!/bin/sh

# file and dir setup
rm -rf downloads_tmp/2.0;
rm -f downloads_tmp/ppi-v2.0.zip;
rm -f downloads_tmp/ppi-v2.0-with-vendor.zip
mkdir downloads_tmp/2.0 && cd downloads_tmp/2.0;

# pull skeletonapp 2.0 from github, wipe out the .git folder
git clone https://github.com/ppi/skeletonapp.git . && git checkout 2.0 && rm -rf .git && cd ..

# create archive
zip -r ppi-v2.0.zip 2.0

# get size of the archive
size=$(du -b ppi-v2.0.zip | sed 's/\([0-9]*\)\(.*\)/\1/')

# run composer
cd 2.0
curl -sS https://getcomposer.org/installer | php
php composer.phar install && rm -f composer.phar && cd ..
zip -r ppi-v2.0-with-vendor.zip 2.0

# get size of the archive
vendorsize=$(du -b ppi-v2.0-with-vendor.zip | sed 's/\([0-9]*\)\(.*\)/\1/')

# update database with filesizes
cd ..
php update_filesize.php -i 1 -f "$size" -v "$vendorsize"
cd downloads_tmp

# move files into production DIR once completed
cp ppi-v2.0.zip ../../downloads/ppi-v2.0.zip
cp ppi-v2.0-with-vendor.zip ../../downloads/ppi-v2.0-with-vendor.zip