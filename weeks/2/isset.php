<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

// build an array of data, mixed key types
$array = array(2, 5, 10, 'hello' => 'world');

print_r( $array );
print '<br />';

$array['bye'] = 'world';

if( isset($array['bye']) )
{
  print 'Bye exists<br />';
}
else
{
  print 'Bye does not exist.<br />';
}

print $array['foo']; // demo of why isset() is used

print '<br /><br />';

unset($array['hello']); // 'delete' the element whose key is hello, if it exists

print_r( $array );

unset($array); // delete the entire array

if( isset($array) ) {
  print 'Array variable exists<br />';
}
else
{
  print 'Array var does not exist<br />';
}