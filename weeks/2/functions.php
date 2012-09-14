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
 * @param bool Determines whether a new line is to be used.
 * @return void
 */
function print_ln($line, $ln_break)
{
  print $line;
  if( $ln_break )
  {
    print '<br />';
  }
}


print_ln('Hello World', true);