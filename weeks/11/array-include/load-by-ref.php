<?php

define('IN_APPLICATION', true);

$config = array();
include 'config-two.php';

// normalize / check the array that
// it is an array for "extra" measures here ...

// connect to database here ...

unset($config['db_pass']);

print_r( $config );