<?php
error_reporting(-1);
date_default_timezone_set('Europe/London');
require_once '../ppi-framework-namespaces/PPI/init.php';
$app = new PPI\App();
$app->boot();
$app->dispatch();