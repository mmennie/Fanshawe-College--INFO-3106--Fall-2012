<?php
/**
 * Provide examples using various array funcs.
 * - count / sizeof alias
 * - isset
 * - unset
 * - in_array
 * - array_search
 * - array_keys
 * - array_values
 *
 * - explode (related to strings as well)
 * - implode (related to strings as well)
 *
 * - list (related to extracting into variables)
 *
 * - array_flip
 * - array_pop
 * - array_push
 * - array_unshift
 * - array_shift
 * - array_walk
 * - sort
 * - asort
 * - ksort
 * - usort
 * - uasort
 *
 * - cast an array to an object and vise versa. what type of object is it?
 */
 
 $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
 
 /* Getting the length/count/size of an array */
 print 'The size of an array can be determined using count. Example, $array = ' . count($array) . '<br />';
 print 'The size of an array can be determined using sizeof. Example, $array = ' . sizeof($array) . '<br />';
 
 /* Does an element with a specific key exist? */
 if( isset($array[0]) ) {
	print 'Index 0 does exist in $array' . '<br />';
 }
 
 if( !isset($array['string-key']) ) {
	print 'Index string-key does not exist in $array<br />';
 }
 
 /* Remove/delete an element at a specified offset/index */
 unset( $array[9] );
 
 print_r( $array );
 print '<br />';
 
 unset( $array[4] );
 
 print_r( $array );
 print '<br />';
 
 /* Check if a value exists ... */
 if( in_array(4, $array) ) {
	print 'The value 4 does exist within our array.<br />';
 }
 else {
	print 'The value 4 does not exist within our array.<br/ >';
 }
 
 if( in_array(5, $array) ) {
	print 'The value 5 does exist within our array.<br />';
 }
 else {
	print 'The value 5 does not exist within our array.<br/ >';
 }
 
 $pos = array_search(4, $array);
 print 'Index/position of value 4 is = ' . $pos . '<br />';
 
 $pos = array_search(5, $array);
 if( false === $pos ) { // it is false, not found
 // if( false !== $pos ) { // $pos is not false, therefore value was found
 
 }
 
 $ary_string = array('a' => 1, 'b' => 2, 'c' => 3);
 
 print_r( array_keys($ary_string) );
 print '<br />';
 
 print_r( array_values($ary_string) );
 print '<br />';
 
 /* To string, from string ... */
 $exploded = explode(',', "here,is,my,comma,sep,string");
 
 print_r( $exploded );
 print '<br />';
 
 print implode(', ', $exploded) . '<br />';
 
 
 /* List example */
 $ary_string = array(1, 2, 3);
 
 list($a, $b, $c) = $ary_string;
 
 print '$a = ' . $a . '<br />';
 print '$b = ' . $b . '<br />';
 print '$c = ' . $c . '<br />';
 
 /* As an example only */
 /*
 $array[0]['key-here'][1]['value']['array'] = array(1, 2, 3);
 $ref = &$array[0]['key-here'][1]['value']['array'];
 
 $ref[0] $ref[1] $ref[2]
 */
 
 $obj_from_array = (object) array('a' => 1, 'b' => 2, 'c' => 3);
 print_r( $obj_from_array );
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 