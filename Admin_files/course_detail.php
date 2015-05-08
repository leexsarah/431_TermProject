<?php
	session_start();

	$courseName = $_GET["course"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Course Details</title>
	<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
	<h1>Details for <?php echo $courseName; ?></h1>
</body>
</html>

