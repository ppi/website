<?php

// All relative paths start from the main directory, not from /public/
chdir(dirname(__DIR__));

// Lets include PPI
include('app/init.php');

// Set the environment
$env     = getenv('PPI_ENV') ?: 'dev';
$debug   = getenv('PPI_DEBUG') !== '0'  && $env !== 'prod';
// Create and configure the Application
$app = new PPI\Framework\App(array(
    'environment'   => $env,
    'debug'         => $debug,
    'rootDir'       => realpath(__DIR__.'/../app')
));
$app->loadConfig($app->getEnvironment().'/app.php');

$app->run();