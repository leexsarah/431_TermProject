<?php
	session_start();

	$section_number = $_POST["sectionNumber"];
	$course_name = $_POST["course_name"];
	$student_information = $_SESSION["student_information"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "Confirm: $course_name-$section_number"?></title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
		<h1>Are you sure you want to add this class?</h1>
		<form action='confirm_add.php' method='POST'>
		<input type='hidden' name='section_number' value='$sectionNumber' />
		<input type='hidden' name='course_name' value='$course_name' />
		<input type='submit' name='submit' value='YES' />"

		<a href="student_course_list.php">No, Go Back to List</a>
	</body>
</htm>