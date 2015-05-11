<?php
	session_start();

	$sectionNumber = $_POST["sectionNumber"];
	$courseID = $_POST["courseID"];
	$studentInformation = $_SESSION["student_information"];
	$scwid = $studentInformation["cwid"];

	include "../create_database_link.php";

	$query = "DELETE FROM student_section WHERE fk_scwid = $scwid AND fk_section_number = $sectionNumber AND fk_course_id = '$courseID';";
	$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

	if($result){
		$update_query = "UPDATE section SET seats_available = seats_available + 1 WHERE section_number = '$sectionNumber' AND fk_course_id = '$courseID';";
		$update_result = $link->query($update_query) or die("ERROR: " . mysqli_error($link));

		/*
		include "student_object.php";
		$student = new Student($student_information["username"]);
		$_SESSION["student_information"] = $student->getStudent_information();
		$_SESSION["student_class_list"] = $student->getStudent_class_list();
		*/
	}

	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirm Drop</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<?php
			if($result){
				echo "<h1>Drop Confirmed</h1>";
				echo "<p>You have dropped the course.</p>";
				echo "<p>Do NOT refresh the page. Refreshing the page will result in errors due to duplicate queries.</p>";
				echo "<a href='student_view_class_list.php'>Click here to go back to your class list.</a>";
				echo "<br />";
				echo "<a href='student.php'>Click here to go back to the main page.</a>";
			} else{
				echo "<h1>Error</h1>";
				echo "<p>An error occurred.</p>";
				echo "<a href='student.php'>Click here to go back to the main page.</a>";
			}
		?>
	</body>
</html>