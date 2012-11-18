<?php

define('IN_APPLICATION', true);

$config = include 'config-one.php';

// connect to database ... 

unset($config['db_pass']);

print_r( $config );

