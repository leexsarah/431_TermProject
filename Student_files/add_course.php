<?php
	session_start();

	$sectionNumber = $_POST["section_number"];
	$courseID = $_POST["course_id"];
	$student_information = $_SESSION["student_information"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "Confirm: $course_name-$section_number"?></title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<h1>Are you sure you want to add this class?</h1>
		<form action='confirm_add.php' method='POST'>
		<?php
			echo "<input type='hidden' name='sectionNumber' value='$sectionNumber' />";
			echo "<input type='hidden' name='courseID' value='$courseID' />";
		?>
		<input type='submit' name='submit' value='YES' id='submit'/>
		<br><br>
		<a href="student_course_list.php">No, Go Back to List</a>
	</body>
</htm>