<?php
	session_start();

	$courseID = $_POST["courseID"];
	$courseName = $_POST["courseName"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Course Details</title>
	<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
	<h1>Details for <?php echo $courseID . "-" . $courseName; ?></h1>


</body>
</html>

