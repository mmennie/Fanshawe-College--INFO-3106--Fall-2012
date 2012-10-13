<?php
/**
 * Provide example of foreach, look indepth of how it works.
 * Demonstrate value by ref with foreach and its quirk
 */
 
 $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

 /* For each element in array, represent $key as the value of the key for this
    element, and $value is to contain the value of the element */ 
 foreach( $array as $key => $value )
 {
	/* Construct for when the key of each element is needed. */
	/* Example - through the iteration, you wanted to edit the value 
	   for each element and re-assign it to $array */
 }
 
 foreach( $array as $value )
 {
    /* Construct for when only the value is needed */
 }
 
 
 print_r( $array );
 print '<br /><Br />';
 
 foreach( $array as $key => &$value )
 {
	/* When dealing with "large" amounts of data, pass the value by reference */
	/* Therefore it is not copied */
	
	$value += 1;
 }
 
  // print_r( $array );
  
  $object = (object) array(
	'a' => 1,
	'b' => 2,
	'c' => 3
  );
  
  foreach( $object as $var => $val ) {
  
	print '$object->' . $var . ' = ' . $val . '<br />';
	print $object->{$var} . '<br /><br />';
	
  }
  
  /*
  var array = [];
  var object = { a : 1, b : 2, c : 3 };
  
  for( var k in object ) {
  
  }
  */
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
 print $value; /* Bug - this should not exist out of scope, but it does ... */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 