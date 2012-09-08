<?php
$routes = array();

$routes['__404__'] = 'general/show404';
$routes['__default__'] = 'home/index';

$routes['/docs/(:any)\.html'] = 'docs/index/$1';

$routes['/about'] = 'community/about';

$routes['/blog/(:num)/(:any)'] = 'blog/view/$1';

$routes['/live-chat'] = 'community/livechat';
$routes['/contributors'] = 'community/contributors';
$routes['/contribute'] = 'community/contribute';
