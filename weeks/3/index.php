<?php

define('IN_APPLICATION', true);
require_once 'bootstrap.php';

print 'Hello World from Shapes<br />';

$square = new Square(array(10));

print $square . '<br />';
foreach( $square->getDimensions() as $side_length ) {
  print $side_length . '<br />';
}

// $pentagon = new Pentagon();
// $triangle = new Triangle();
// print $pentagon . '<br />';
// print $triangle . '<br />';