<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

// $mysqli = new mysqli('127.0.0.1', 'root', 'adminroot');
$mysqli = new mysqli('127.0.0.1', 'root', 'adminroot', 'lamp1_example');
if( $mysqli->connect_error ) {
	trigger_error('Database connection error. Error: [ ' . $mysqli->connect_errno . ' ] ' . $mysqli->connect_error, E_USER_ERROR);
}

if( $mysqli->query('DELETE FROM students') ) {
	print $mysqli->affected_rows . ' were deleted.<br />';
}
else {
	print 'Unable to delete all records from table.';
}

$mysqli->close();