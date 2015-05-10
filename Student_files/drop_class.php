<?php
	session_start();

	$sectionNumber = $_POST["fk_section_number"];
	$courseID = $_POST["fk_course_id"];
	$student_information = $_SESSION["student_information"];
	$scwid = $student_information["cwid"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student View: Confirm Drop Course</title>
		<link href="../style.css" rel="stylesheet" media="all" />
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<h1>Are you sure you want to drop this class?</h1>
		<form action='confirm_drop.php' method ='POST'>
			<?php
				echo "<input type='hidden' name='sectionNumber' value='$sectionNumber' />";
				echo "<input type='hidden' name='courseID' value='$courseID' />";
			?>
			<input type="submit" name="submit" value="Confirm Drop" id="submit" />
		</form>
		<br>
		<a href="student_view_class_list.php">No, Go Back to List</a>
	</body>
</html>