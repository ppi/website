<?php
$routes = array();

$routes['__404__'] = 'general/show404';
$routes['__default__'] = 'home/index';

$routes['/docs/(:any)\.html'] = 'docs/index/$1';

// About Match
$routes['/live-chat'] = 'community/livechat';
$routes['/contributors'] = 'community/contributors';
$routes['/contribute'] = 'community/contribute';
