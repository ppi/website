<?php
$config =  array();

$config['modules'] = array(
    'Framework',
    'Application',
    'BlogModule'
);

$config['module_listener_options'] = array(
    'cache_dir'                => '%app.cache_dir%',
    'config_cache_enabled'     => false,
    'config_cache_key'         => '%app.name%',
    'module_map_cache_enabled' => false,
    'module_map_cache_key'     => '%app.name%',
    'module_paths'      => array(
        './modules',
        './vendor'
    )
);

$config['active_modules'] = $config['modules'];

$config['framework'] = array(
    'templating' => array(
        'engines'     => array('php'),
    ),
    'skeleton_module' => array(
        'path' => './utils/skeleton_module'
    )
);

$config['datasource'] = array(
    'connections' => require __DIR__ . '/datasource.php'
);

return $config;
