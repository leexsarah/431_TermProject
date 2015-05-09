<?php
	session_start();

	$student = $_SESSION["student_information"];	
	print_r($student);

	$fname = $student["fname"];
?>
<!doctype html>
<html>
	<head>
		<title>Student Page</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<h1>Welcome <?php echo $fname ?></h1>
		<?php include "header.php"; ?>
	</body>
</html>