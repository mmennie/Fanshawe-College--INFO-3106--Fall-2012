<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('FILES_PATH', ROOT_PATH . 'files' . DIRECTORY_SEPARATOR);

$has_error = null;
$message = null;
if( isset($_POST['submit']) ) {
	$has_error = false;
	$file = isset($_FILES['file']) ? $_FILES['file'] : array();
	
	if( UPLOAD_ERR_OK != $file['error'] ) {
		$message = 'The file upload was not successful. Error: ' . $file['error'];
		$has_error = true;
	}
	
	if( !$has_error )
	{
		if( file_exists($file['tmp_name']) )
		{
			chmod($file['tmp_name'], 755);
			chmod(FILES_PATH, 777);
			
			$destination = FILES_PATH . basename($file['name']);
			if( !move_uploaded_file($file['tmp_name'], $destination) ) {
				$message = 'Unable to move file to destination.';
				$has_error = true;
			}
		}
	}
	
	if( !$has_error )
	{
		$message = 'The file has been uploaded successfully.';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Files - Example 2</title>
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
	
	<h1>Uploading Files - Example 2</h1>
	<?php if( !empty($message) ) : ?>
	<div class="messages">
		<p><?php print $message; ?></p>
	</div>
	<?php endif; ?>
	<form action="ex2.php" method="post" enctype="multipart/form-data">
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