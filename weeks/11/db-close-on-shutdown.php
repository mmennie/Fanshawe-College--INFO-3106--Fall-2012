<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

class my_mysqli extends mysqli {
	public function __construct() {
		parent::__construct('127.0.0.1', 'root', 'adminroot');
		
		// throw new Exception('Throwing an exception');
	}
}

function shutdown_func() {
	global $mysqli;
	
	// if( $mysqli ) {
	if( $mysqli instanceof mysqli ) {
		$mysqli->close();
		print 'MySQLi is now closed.<br />';
	}
}
register_shutdown_function('shutdown_func');

try {
	$mysqli = new my_mysqli(); // new mysqli('127.0.0.1', 'root', 'adminroot');
	if( $mysqli->connect_error ) {
		trigger_error('MySQLi Error: ' . $mysqli->connect_error, E_USER_ERROR);
		print $mysqli->connect_error;
	}
}
catch( Exception $exception ) {
	print $exception->getMessage() . '<br />';
}

print 'Continuing the execution of this script...';

/* Used as an example of what happens when an Exception is thrown from
   a constructor. The variable is NOT set and is NULL ... */ /*
if( isset($mysqli) ) {
	print '$mysqli\'s data type: ' . gettype($mysqli) . '<br />';
	print 'Is null? ' . (null === $mysqli ? ' yes ' : ' no ') . '<br />';
}
else {
	print 'The $mysqli is not set.<br />';
}
*/ 
// $mysqli->close();