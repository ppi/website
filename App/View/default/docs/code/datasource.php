<?php
$code = array();

$code[] = <<<OUTPUT
&lt;?php
\$connections['my_connection_key'] = array(
    'type'   => 'pdo_mysql',
    'host'   => 'localhost',
    'dbname' => 'my_db_name',
    'user'   => 'my_db_user',
    'pass'   => 'my_db_pass'
);

\$connections['sessions'] = array(
	'type'       => 'pdo_pgsql',
	'hostname'   => 'localhost',
	'database'   => 'my_db_name',
	'username'   => 'my_db_user',
	'password'   => 'my_db_pass'
);
OUTPUT;
