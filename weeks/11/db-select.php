<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

$mysqli = new mysqli('127.0.0.1', 'root', 'adminroot', 'lamp1_ex');
if( $mysqli->connect_error ) {
	trigger_error('An error has occurred while connecting to the database. Error: [ ' . $mysqli->connect_errno . ' ] ' . $mysqli->connect_error, E_USER_ERROR);
}

$query = $mysqli->query("SELECT * FROM students");

if( $query ) {
// if( $query = $mysqli->query("SELECT * students") ) {
	/*
	$students = array();
	while( $row = $query->fetch_object() ) {
		$students[$row->id] = $row;
	}
	*/
	
	$students = $query->fetch_all(MYSQLI_ASSOC);
	
	print_r( $students );
	
	$query->close();
}


$mysqli->close();






