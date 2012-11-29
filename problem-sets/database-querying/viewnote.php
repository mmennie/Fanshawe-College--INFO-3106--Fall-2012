<?php

define('HEADER_GUARD', true);
define('APP_ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
require_once APP_ROOT_PATH . 'bootstrap.php';

$note_id = isset($_GET['nid']) ? intval($_GET['nid']) : 0;

$note = null;

if( $query = $mysqli->query("SELECT * FROM notes WHERE id = " . $note_id) )
{
	$note = $query->fetch_object();
	$query->close();
	
	$message = explode("\n", $note->message);
	
	$note->message = array();
	foreach( $message as $msg ) {
		$msg = trim($msg);
		if( !empty($msg) ) {
			$note->message[] = $msg;
		}
	}
	
	$note->message = '<p>' . implode('</p><p>', $note->message) . '</p>';
}
else
{
	trigger_error('The requested note does not exist.', E_USER_ERROR);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Notes List</title>
</head>
<body>
	<div class="wrapper">
		<header id="header">
			<h1 class="site-name">My Notes</h1>
		</header>
		<section id="main">
			<?php // print_r( $note ); ?>
			<?php print $note->message; ?>
		</section>
		<footer id="footer">
			&nbsp;
		</footer>
	</div>
</body>
</html>