<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

$mysqli = new mysqli('127.0.0.1', 'root', 'adminroot', 'lamp1_example');
if( $mysqli->connect_error ) {
	trigger_error('Database connection error. Error: [ ' . $mysqli->connect_errno . ' ] ' . $mysqli->connect_error, E_USER_ERROR);
}

if( $results = $mysqli->query('SELECT * FROM students') ) {
	while( $result = $results->fetch_object() ) {
		print print_r($result, true) . '<br /><br />';
	}

	$results->close();
}
else {
	print 'Unable to query for students.';
}

$mysqli->close();