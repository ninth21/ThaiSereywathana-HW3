<?php 
define('TITLE', 'Upload file');
include('header.html');

 // This script takes a file upload and stores it on the server
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
	// Try to move the uploaded file:
	if (move_uploaded_file ($_FILES['the_file']['tmp_name'], "storeupload/{$_FILES['the_file']['name']}")) {
		print '<p>Your file has been uploaded.</p>'; 	} 
	// if (move_uploaded_file ($_FILES['the_file1']['tmp_name'], "uploadme/{$_FILES['the_file1']['name']}")) {
	// 		print '<p>Your file has been uploaded.</p>';	}
	else { print '<p style="color: red;">Your file could not be uploaded because: ';// Problem!
		switch ($_FILES['the_file']['error']) {// Print a message based upon the error:
			case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini';break;
			case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';break;
			case 3:	print 'The file was only partially uploaded';break;
			case 4:	print 'No file was uploaded';break;
			case 6: print 'The temporary folder does not exist.';break;
			default:print 'Something unforeseen happened.';break;
		}
		print '.</p>'; // Complete the paragraph.
	} // End of move_uploaded_file() IF.
} // End of submission IF.
?>
<br>
<br>
<form enctype="multipart/form-data" action="uploadfile.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000000">
    <div class="container">
        <p class="text-warning">Upload a file using this form:</p>
        <div class="row">
            <div class="col-sm-2">UploadImage</div>
            <div class="col-sm-2"><input type="file" name="the_file" id="file"></div>
            <div class="col-sm-2"><input type="submit" name="submit" class="btn btn-outline-secondary mt-3" value="Upload This File"></div>
        </div>
    </div>
</form>
<div class="container">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-2">
        <button onclick="create_file_input(this)" class="btn btn-outline-secondary mt-3"> More File Input </button>
    </div>
    <div class="col-sm-2"></div>
</div>
</div>
<script>
        var size = 0;

    function create_file_input(ele) {
        let btn_remove = document.createElement('BUTTON');
        btn_remove.className = 'close col-1';
        btn_remove.name = "file-" + size;
        btn_remove.innerHTML = ' <span aria-hidden = "true">&times;</span>';
        btn_remove.onclick = function() {
            remove_input_file(this);
        };

        let input = document.createElement("INPUT");
        input.className = "col-11";
        input.type = "file";
        input.name = "file-" + size;

        let div = document.createElement("DIV");
        div.className = 'row p-2';
        div.id = "file-" + size;
        div.append(btn_remove);
        div.append(input);

        document.getElementById('file').hasPointerCapture(div);
        ++size;
    }

    function remove_input_file(els) {
        let els_removed = document.getElementById(ele.name);

        ele_removed.remove();
        size--;

    }
</script>
<?php
    include('footer.html'); // Need the footer.
?>