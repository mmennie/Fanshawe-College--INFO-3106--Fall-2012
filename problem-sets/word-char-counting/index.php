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

/* print string_count_words("hello world") . '<br />';
print string_count_words("hello world bye world") . '<br />';
print string_count_words("hello wo3rld") . '<br />';
print string_count_words("hello world, bye wor,ld") . '<br />';
print string_count_words("he3l4lo w1or2ld b6ye w4o!rl4d") . '<br />';
print string_count_words("w4o!rl4dasdfasdf") . '<br />'; */

$form = (object) array(
	'has_error' => false,
	'success' => false,
	'messages' => array(),
	
	'fields' => array('op' => 'word', 'data' => '', 'ignore' => '')
);

if( isset($_POST['submit']) ) {
	
	$form->fields['op'] = isset($_POST['op']) ? stripslashes(trim($_POST['op'])) : '';
	$form->fields['data'] = isset($_POST['data']) ? stripslashes(strip_tags(trim($_POST['data']))) : '';
	$form->fields['ignore'] = isset($_POST['ignore']) ? stripslashes(strip_tags(trim($_POST['ignore']))) : '';

	if( 'word' != $form->fields['op'] || 'char' != $form->fields['op'] ) {
		$form->has_error = true;
		$form->messages[] = 'An invalid operation was selected.';
	}
	
	if( !empty($form->fields['data']) ) {
		$form->has_error = true;
		$form->messages[] = 'The data field cannot be empty as it is required.';
	}

	/* do submission processing here ... */
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Word and Character Counting</title>
	<style>
	html { background-color: #f2f2f2; font-family: "Helvetica", Arial, sans-serif; font-size: 13px; color: #333; }
	
	h1 { margin: 0px 0px; }
	label { display: block; font-weight: bold; }
	
	.wrapper { width: 600px; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: 30px; background-color: #fff; border: 1px solid #e2e2e2; padding: 24px 24px; }
	
	</style>
</head>
<body>

<div class="wrapper">

	<header id="header">
		<h1>Counting</h1>
	</header>
	<section id="main">
		
		<form action="index.php" method="post">
		<p>
			<label for="ops">Operation Method: *</label>
			<select name="op" id="ops">
				<option value="words">Word Counting</option>
			</select>
		</p>
		<p>
			<label for="data">String: *</label>
			<textarea id="data" name="data" cols="12" rows="8" style="width: 95%;"></textarea>
		</p>
		<p>
			<label for="ignore">Ignore:</label>
			<input type="text" name="ignore" id="ignored" value="" />
		</p>
		<p>
			<input type="submit" value="Submit" name="submit" />
		</p>
		</form>
		
	</section>
	<footer id="footer">
		<p>Copyright information here.</p>
	</footer>

</div>

</body>
</html>












