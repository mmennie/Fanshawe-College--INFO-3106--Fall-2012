<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

// $mysqli = new mysqli('127.0.0.1', 'root', 'adminroot');
$mysqli = new mysqli('127.0.0.1', 'root', 'adminroot', 'lamp1_ex'); // method 1 for selecting the database to perform operations on during the mysqli lifetime.
if( $mysqli->connect_error ) {
	trigger_error('An error has occurred while connecting to the database. Error: [ ' . $mysqli->connect_errno . ' ] ' . $mysqli->connect_error, E_USER_ERROR);
}

/*
if( !$mysqli->select_db('lamp1_ex') ) {
	trigger_error('Unable to select database on MySQL server.', E_USER_ERROR);
}
*/

print 'Successful connection!';

$mysqli->close();






