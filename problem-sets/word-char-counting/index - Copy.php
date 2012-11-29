<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

function _string_count_words_parse_pieces($piece, $offset, $ignore_left = false) {
	$return = array();
	
	if( !$ignore_left ) {
		$return[] = substr($piece, 0, $offset);
	}
	
	if( ($offset + 1) < strlen($piece) ) {
		$rhs = substr($piece, $offset + 1, strlen($piece));
		$return[] = $rhs;
		
		for( $i = 0; $i < strlen($rhs); ++$i ) {
			if( !_string_count_words_validate_char($rhs[$i]) ) {
				$return = array_merge(_string_count_words_parse_pieces($rhs, $i, true));
			}
		}
	}
	
	return $return;
}

function _string_count_words_validate_char($char) {
	return !(!ctype_alpha($char) && ("'" != $char || '-' != $char));
}

function string_count_words($string) {
	if( !is_string($string) ) {
		throw new Exception('$string parameter must be of type string.');
	}
	
	$pieces = explode(' ', $string);
	// string = "hello wo3rld bye world";
	// pieces = "hello" ... "wo" ... "rld" ... "bye" ... "world"
	$words = array();
	foreach( $pieces as $piece ) {
		$is_valid = true;
		$has_split = false;
		
		for( $i = 0; $i < strlen($piece); ++$i ) {
			// w = 0
			// o = 1
			// 3 = 2
			// r = 3
			// l = 4
			// d = 5
			
			// wo3rld
			// ---> wo && rld
			// ---> wo3rld
			if( !_string_count_words_validate_char($piece[$i]) ) {
				/* $lhs = substr($piece, 0, $i);
				$words[] = $lhs;
				
				if( ($i + 1) < strlen($piece) ) {
					$rhs = substr($piece, $i + 1, strlen($piece));
					$words[] = $rhs;
				} */
				$words = array_merge($words, _string_count_words_parse_pieces($piece, $i));
				
				$has_split = true;
			}
		}
		
		if( $is_valid && !$has_split ) {
			$words[] = $piece;
		}
	}
	
	return count($words);
}




print string_count_words("hello world") . '<br />';

print string_count_words("hello world bye world") . '<br />';

print string_count_words("hello wo3rld") . '<br />';

print string_count_words("hello world, bye wor,ld") . '<br />';


print string_count_words("he3l4lo w1or2ld b6ye w4o!rl4d") . '<br />';
// HOMEWORK: SOLVE THIS USE CASE WITH MULTIPLE
// NON-ALPHA CHARS IN A PIECE
//
// Example words to be counted in last print
// he
// l
// lo
// w
// or
// ld
// b
// ye
// w
// o
// rl
// d
//
// Number of Words that should be counted = 12















