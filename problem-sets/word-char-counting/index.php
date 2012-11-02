<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

/**
 * _string_count_words_parse_split
 * 
 * @access private
 * @param string Contains the word or piece of a word to split
 * @param int Contains the position of the character to split on
 * @return array Returns an array of the initial word split into pieces
 */
function _string_count_words_parse_pieces($piece, $offset) {
	$return = array();
	$return[] = substr($piece, 0, $offset);

	if( ($offset + 1) <= strlen($piece) ) {
		$rhs = substr($piece, $offset + 1, strlen($piece));
		
		$has_split = false;
		for( $i = 0; $i < strlen($rhs) && !$has_split; ++$i ) {
			if( !_string_count_words_validate_char($rhs[$i]) ) {
				if( ($i + 1) < strlen($rhs) ) {
					$return = array_merge(
						$return,
						_string_count_words_parse_pieces($rhs, $i)
					);
				}
				
				$has_split = true;
			}
		}
		
		if( !$has_split ) {
			$return[] = $rhs;
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
		
		for( $i = 0; $i < strlen($piece) && !$has_split; ++$i ) {
			if( !_string_count_words_validate_char($piece[$i]) ) {
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


/*

print string_count_words("hello world") . '<br />';

print string_count_words("hello world bye world") . '<br />';

print string_count_words("hello wo3rld") . '<br />';

print string_count_words("hello world, bye wor,ld") . '<br />';


print string_count_words("he3l4lo w1or2ld b6ye w4o!rl4d") . '<br />'; */
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




print string_count_words("w4o!rl4dasdfasdf") . '<br />';









