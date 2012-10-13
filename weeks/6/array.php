<?php
/**
 * Demonstrate the types of arrays in PHP.
 *
 * In PHP, Array's are actually ordered maps. Meaning that each key is mapped to a value. In PHP,
 * array types are optimized for several difference uses and can be treated as a vector/list (numeric key => value),
 * hash table/map (string key => value). There are more specialized uses, but the list and map types are most common.
 * 
 * It is common to hear the term "associated arrays" in the PHP world.
 * This means that generally the key for an element is a string, vs. an integer, providing 
 * some form of a significant identifier that should be used to identify and be associated with the value.
 *
 * Additionally, we have the capability to create multi-dimensional arrays. A two dimensional array as an example
 * can be thought of as a database table, where there are one or more rows and one or more columns.
 * 2D arrays are structured like so...
 *
 * array(
	  // ROW       // COLUMN
 *	  'row-key' => array('column-key' => 'column-val')
 * );
 *
 * $array['row']['column']
 *
 * When working with database, record sets that are structured as a 2D array generally have the 'row-key'
 * as the primary key for the record. This allows for quick and easy identification and searching
 * when matching or pulling data from a related table.
 */
 
 /* Most basic initializing */
 $ary = array();
 
 /* In PHP 5.4 ... */
 /* $ary = []; */
 
 /* Construction with values */
 $ary = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
 
 /* Simple append a new value onto the end, index gets calc'ed for us */
 $ary[] = 11;
 
 /* Specify the index to assign the new value to */
 $ary[count($ary)] = 12;
 
 /* dump to the screen the entire array */
 print_r( $ary );
 
 print '<br /><br />';
 
 $map = array(
	'my-key' => 'my value here'
 );
 
 // $map[0] = 'value with key of zero';
 // $map[] = 'another value';
 
 $map['here-we-go'] = 'again';
 
 /* dump the associative array to the screen */
 print_r( $map );
 
 print '<br /><br />';
 