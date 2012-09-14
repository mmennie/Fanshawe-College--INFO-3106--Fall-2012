<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

/**
 * print_ln
 * 
 * Prints the desired string.
 *
 * @access public
 * @param string Contains the string to print
 * @param bool Determines whether a new line is to be used. Default value of true.
 * @return void
 */
function print_ln($line, $ln_break = true)
{
  print my_trim($line);
  if( $ln_break )
  {
    print '<br />';
  }
}

/**
 * my_trim
 * 
 * Trims the specified string of whitespace using the trim function.
 *
 * @access public
 * @param string Contains the string to be trimmed.
 * @return string Returns the trimmed string.
 */
function my_trim($str)
{
  return trim($str);
}


print_ln('First and foremost');

print_ln('Hello World', true);

print_ln(' Hello World from Foo Bar ... ');