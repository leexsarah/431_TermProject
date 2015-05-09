<?php
	session_start();

	$student = $_SESSION["student_information"];
	$fname = $student["fname"];
?>
<!doctype html>
<html>
	<head>
		<title>Student Page</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<h1>Welcome <?php echo $fname ?></h1>
		<?php include "header.php"; ?>
	</body>
</html>