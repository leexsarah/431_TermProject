<!DOCTYPE html>
<html>
	<head>
		<title>Upload</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php
			$file = basename($_FILES["upload"]["name"]);
			if(isset($_POST["submit"])) {
				if (move_uploaded_file($_FILES["upload"]["tmp_name"], $file)) {
					echo "<p>Thank you! Your file has been uploaded.</p>";
					echo "<a href='faculty.php'>Go back</a>";
				}
				else {
					echo "<p>There was an error...</p>";
					echo "<a href='upload.php'>Go back</a>";
				}
			}
		?>
	</body>
</html>