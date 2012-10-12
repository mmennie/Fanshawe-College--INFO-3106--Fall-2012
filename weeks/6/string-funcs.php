<?php
/**
 * Provide examples using various string manip funcs.
 * - strlen
 * - strtoupper
 * - strtolower
 * - ucfirst
 * - lcfirst
 * - strpos
 * - str_replace
 * - substr
 * - substr_replace
 * - substr_count
 * - strtr -> string translate replacements
 * - strstr -> find first occurrence of string in a string
 * - trim/ltrim/rtrim -> covered in previous classes
 * - strrev
 */
 
print 'String Function Examples with PHP<br />';

/* Single quotes means literal */
$str = 'Hello World';

/* Double quotes - gets processed */
$str2 = "{$str}!";

print 'str1 = ' . $str . '<br />';
print 'str2 = ' . $str2 . '<br />';

/* Getting the size or count of a string's characters, we can use
   strlen(). Note that strlen also counts whitespace/spaces. */
print 'Length of $str = ' . strlen($str) . '<br />';

/* To convert entire string to upper or lower case, we can use the
   strtoupper and strtolower functions to do so. */
/* Real world example - many applications that have AJAX calls, for security purposes,
   generally check the $_SERVER['X_REQUESTED_WITH'] value. Commonly, we convert to either all lower or all upper to compare to a literal string */
print 'To uppercase, $str = ' . strtoupper($str) . '<br />';
print 'To lowercase, $str = ' . strtolower($str) . '<br />';

$str = strtolower($str);

/* Using ucfirst or lcfirst, we can convert the first letter of the string
   to either uppercase (ucfirst()) or lowercase (lcfirst) */
$str = ucfirst($str);
print 'First letter uppercase, $str = ' . $str . '<br />';

$str = lcfirst($str);
print 'First letter lowercase, $str = ' . $str . '<br />';

/* Replacing a single part of a string */
$str = str_replace('hello', 'bye', $str);

print 'Replace Hello with Bye in $str = ' . $str . '<br />';

/* Replacing multiple parts of a string */
$str = str_replace(array('bye', 'world'), array('Hi', 'Everyone'), $str);

print 'Replace Bye with Hi, World with Everyone, $str = ' . $str . '<br />';

/* Finding the position of a token/needle (piece of string) in a string. */
$pos_of_everyone = strpos($str, 'Everyone') ;

/* It is important to note that strpos() returns the position - 1. Therefore,
   a string's first character is position 0. */
print 'The position in which "Everyone" begins is = ' . $pos_of_everyone . '<br />';

$pos_doesnt_exist = strpos($str, 'abc123');

if( false === $pos_doesnt_exist ) {
	print 'string abc123 does not exist in $str<br />';
}
else {
	print 'string abc123 does exist in $str<br />';
}

/* Example as to why it is important to check this return
   with === not ==. */
$check_with_identical = strpos($str, 'H');
if( false == $check_with_identical ) {
	print '"H" does not exist... or does it? ' . $str . '<br />';
	print '"H" does exist ... exists at position 0<br />';
}

/* Substrings ... select/retrieve portions of a string based on 
   start position and length values */

print 'First four characters of $str = ' . substr($str, 0, 4) . '<br />';
print 'Last four characters of $str = ' . substr($str, (strlen($str) - 4)) . '<br />';


// Challenge: Can anyone calculate the four most middle characters of $str?
// Thoughts: Check to ensure the strlen is >= 4. Ensure it is even, if not, handle
// 			 this in the way that you want. Perhaps middle - 1 vs. middle - 2.


print 'Replace "Everyone" with "People", $str = ' .
	substr_replace($str, 'People', strpos($str, 'Everyone')) . '<br />';


/* Replacing tokens in the string ... */
print strtr('Hello world, @name', array(
	'@name' => 'Aaron McGowan'
)) . '<br />';

// T! Look into this and resolve.
// print strtr('Hello world, @this_class', '@this_class', 'INFO-3106');

// Using [] (square brackets) with strings ...
print 'Very first character in $str is = ' . $str[0] . '<br />';
