<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

$message = null;
if( isset($_POST['submit']) ) {
	$file = isset($_FILES['file']) ? $_FILES['file'] : array();
	
	if( UPLOAD_ERR_OK == $file['error'] ) {
		$message = 'The file has been uploaded successfully.';
	}
	else {
		$message = 'The file upload was not successful. Error: ' . $file['error'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Files - Example 1</title>
	<style type="text/css">
	.array-of-data { background-color: #f2f2f2; padding: 10px 10px; margin: 10px 0px; }
	</style>
</head>
<body>
	<div class="array-of-data">
		<strong>_POST:</strong> <?php print_r( $_POST ); ?>
	</div>
	<div class="array-of-data">
		<strong>_FILES:</strong> <?php print_r( $_FILES ); ?>
	</div>
	
	<h1>Uploading Files - Example 1</h1>
	<?php if( !empty($message) ) : ?>
	<div class="messages">
		<p><?php print $message; ?></p>
	</div>
	<?php endif; ?>
	<form action="ex1.php" method="post" enctype="multipart/form-data">
	<p>
		<label for="file">File</label>
		<input type="file" name="file" id="file" />
	</p>
	<p>
		<input type="submit" name="submit" value="Upload" />
		
	</p>
	</form>
</body>
</html>