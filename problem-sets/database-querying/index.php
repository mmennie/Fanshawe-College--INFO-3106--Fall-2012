<?php

define('HEADER_GUARD', true);
define('APP_ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
require_once APP_ROOT_PATH . 'bootstrap.php';

$notes = array();
if( $query = $mysqli->query("SELECT * FROM notes ORDER BY id DESC") )
{
	while( $note_row = $query->fetch_object() ) {
		$notes[$note_row->id] = $note_row;
	}
	$query->close();
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
			<p>You can view a note that is listed below by clicking on the title.</p>
			<?php if( !empty($notes) ) : ?>
			<ul class="notes-list">
				<?php foreach( $notes as $note ) : ?>
				<li class="notes-list-note-id-<?php print $note->id; ?>">
					<h3><a href="viewnote.php?nid=<?php print $note->id; ?>" title="<?php print $note->title; ?>"><?php print $note->title; ?></a></h3>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php else : ?>
			<p>There are currently no notes saved.</p>
			<?php endif; ?>
		</section>
		<footer id="footer">
			&nbsp;
		</footer>
	</div>
</body>
</html>