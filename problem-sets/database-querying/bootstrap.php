<?php

/**
 * @ignore
 */
defined('HEADER_GUARD') or exit;

/**
 * Callback function that handles the shutdown
 * of our mini-application. Function will include
 * any application garbage collection such as destroying
 * the database connection.
 *
 * @access public
 * @params void
 * @return void
 */
function shutdown() {
	global $mysqli;
	
	if( $mysqli instanceof mysqli ) {
		$mysqli->close();
	}
	
	$mysqli = null;
}
 
/* Register shutdown callback function */
register_shutdown_function('shutdown');

/* Load the configuration array details */
$config = require_once APP_ROOT_PATH . 'config.php';
$config = is_array($config) ? $config : null;

if( empty($config) ) {
	trigger_error('Application configuration details appear to be invalid.', E_USER_ERROR);
}

/* Initialize out database connection */
$mysqli = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

/* Check and ensure we have connected, no connection errors */
if( $mysqli->connect_error ) {
	trigger_error('Could not connect to application database. Please check configuration settings.', E_USER_ERROR);
}

/* Delete database password from $config */
unset($config['db_pass']);
