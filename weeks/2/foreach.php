<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

$array = array();
for( $i = 0; $i < 10; ++$i ) {
  $array[] = $i;
}

print_r( $array ); // dump to screen for visual.
print '<br />';

// Print the array's keys and values
foreach( $array as $key => $value )
{
  print $key . ' -> ' . $value . '<br />';
}
print '<br />';

$array['my-key'] = 'my-value';

print_r( $array ); // dump to screen
print '<br />';


// Print the array's keys and values
foreach( $array as $key => $value )
{
  print $key . ' -> ' . $value . '<br />';
}
print '<br />';



for( $i = 0; $i < count($array); ++$i )
{
  print $array[$i] . '<br />';

}

$array_keys = array_keys($array);
for( $i = 0; $i < count($array_keys); ++$i )
{
  print $array[$array_keys[$i]] . '<br />';
}










