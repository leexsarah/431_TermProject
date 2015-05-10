<?php
	session_start();

	$section_number = $_POST["sectionNumber"];
	$course_id = $_POST["courseID"];
	$student_information = $_SESSION["student_information"];

	include "../create_database_link.php";

	//Query to insert Student into section.
	
	$query = "insert into student_section(fk_scwid, fk_section_number, fk_course_id) VALUES ('".$student_information["cwid"]."', '$section_number', '$course_id');";
	$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

	if($result){
		$update_query = "update section set seats_available = seats_available - 1 where section_number = '$section_number' and fk_course_id = '$course_id';";
		$update_result = $link->query($update_query) or die("ERROR: " . mysqli_error($link));

		//Update session variable.
		include "student_object.php";
		$student = new Student($student_information["username"]);
		$_SESSION["student_information"] = $student->getStudent_information();
		$_SESSION["student_class_list"] = $student->getStudent_class_list();
	}
	//mysqli_close($link);
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Confirm Add</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<?php
			if($result){
				echo "<h1>Congratulations</h1>";
				echo "<p>You have been added to the course.</p>";
				echo "<a href='student_course_list.php'>Click here to go back to the course list.</a>";
				echo "<p> or here: ";
				echo "<a href='student.php'>To go back to the main page</a>";
			} else{
				echo "<h1>Error</h1>";
				echo "<p>We goofed up somehow.</p>";
				echo "<a href='student.php'>Click here to get out of here.</a>";
			}
		?>
	</body>
</html>