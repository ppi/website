<?php
$routes = array();

$routes['__404__'] = 'general/show404';
$routes['__default__'] = 'home/index';

// About Match
$routes['/live-chat'] = 'community/livechat';
$routes['/contributors'] = 'community/contributors';
