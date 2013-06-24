<?php

$opts = getopt('i:f:v:');
if(!isset($opts['i'], $opts['f'], $opts['v'])) {
    die('Missing Params' . "\n");
}

$downloadID = $opts['i'];
$filesize = $opts['f'];
$vendorFilesize = $opts['v'];

include '../../www.ppi.io/app/datasource.config.php';
$conf = $connections['main'];
$link = mysql_connect($conf['host'], $conf['user'], $conf['pass']);
if(!$link) {
    die("Invalid mysql connection\n");
}
mysql_select_db($conf['dbname'], $link);

$sql = 'UPDATE download_item SET filesize=' .
    mysql_real_escape_string($filesize)
    . ', vendor_filesize=' .
    mysql_real_escape_string($vendorFilesize)
    . ' WHERE id = ' . mysql_real_escape_string($downloadID);

mysql_query($sql);

mysql_close($link);