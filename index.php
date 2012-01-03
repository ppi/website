<?php
error_reporting(-1);
date_default_timezone_set('Europe/London');
require_once 'PPI/PPI/init.php';
$app = new PPI\App();
$app->ds = true;
$app->boot();
error_reporting(-1);
ini_set('display_errors', 'on');
$app->dispatch();