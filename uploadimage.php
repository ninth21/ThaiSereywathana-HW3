<?php 
define('TITLE', 'UploadImage');
include('header.html');

 // This script takes a file upload and stores it on the server
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_FILES['upload'])) {// Check for an uploaded file:
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 
							'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "storeupload/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}
	} // End of isset($_FILES['upload']) IF.
	if ($_FILES['upload']['error'] > 0) {	// Check for an error:
		echo '<p class="error">The file could not be uploaded because: <strong>';		
		switch ($_FILES['upload']['error']) {
			case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini.';	break;
			case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';	break;
			case 3:	print 'The file was only partially uploaded.';	break;
			case 4:	print 'No file was uploaded.';	break;
			case 6:	print 'No temporary folder was available.';	break;
			case 7:	print 'Unable to write to the disk.';	break;
			case 8:	print 'File upload stopped.';	break;
			default:print 'A system error occurred.';	break;
		} // End of switch.
		print '</strong></p>';
	} // End of error IF.
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);	// Delete the file if it still exists:
	}			
} // End of the submitted conditional.
?>
<br>
<br>
<form enctype="multipart/form-data" action="uploadimage.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <div class="container">
        <p class="text-warning">Select a JPEG or PNG image of 512KB or smaller to be uploaded:</p>
        <div class="row">
            <div class="col-sm-2">UploadImage</div>
            <div class="col-sm-6"><input type="file" name="upload"></div>
            <div class="col-sm-2"><input type="submit" name="submit" class="btn btn-sm btn-oval"></div>
        </div>
    </div>
</form>

<?php
include('footer.html'); // Need the footer.
?>