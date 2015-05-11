<!File uploader code altered from http://www.w3schools.com/php/php_file_upload.asp>
<!DOCTYPE html>
<html>
	<head>
		<title>Upload</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<form action="upload_done.php" method="post" enctype="multipart/form-data">
			<p class="u">Choose the course material to upload: </p>
			<input type="file" name="upload" id="upload"><br><br>
			<input type="submit" value="Upload" name="submit" id="submit">
		</form>
		<br />
		<a href="faculty.php">Click here to go back to main page.</a><br />
	</body>
</html>