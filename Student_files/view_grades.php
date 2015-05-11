<!doctype html>
<html>
	<head>
		<title>View Grades</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
	<?php include "../logout.php"; ?>
	<center>
	<?php
		session_start();

		$studentInformation = $_SESSION["student_information"];

		$scwid = $studentInformation["cwid"];
		$fname = $studentInformation["fname"];
		$lname = $studentInformation["lname"];
		$courseID = $_POST["fk_course_id"];
		$sectionNumber = $_POST["fk_section_number"];

		include "../create_database_link.php";

		$query = "SELECT * FROM course_grades WHERE fk_scwid = $scwid AND fk_section_number = $sectionNumber AND fk_course_id = '$courseID';";
		$result = $link->query($query) or die ("ERROR: " . mysqli_error($link));

		$row = $result->fetch_assoc();

		if($result->num_rows === 1){
			$midterm = $row["midterm_score"];
			$final = $row["final_score"];
			$termProject = $row["term_project_score"];

			echo "<table valign='top' cellpadding='5'>";
			echo "<caption>Grades:</caption>";
			echo "<tr>";
		    echo "<td>Course:</td><td>".$courseID."-".$sectionNumber."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Midterm Exam Score:</td><td>".$midterm."%</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Final Exam Score:</td><td>".$final."%</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Term Project Score:</td><td>".$termProject."%</td>";
			echo "</tr>";
			echo "</tr>";
		    echo "</table>";
		} else{
			echo "<p>Student $scwid ($fname $lname) has no course grades for course $courseID-$sectionNumber";
		}



		/*
		$course = $_POST["fk_course_id"];
		$student = $_SESSION["student_class_list"];

		$output;
		foreach($student as $value){
			if ($value["fk_course_id"] === $course){
				$output = $value;
			}
		}

		$fk_course_id = $output['fk_course_id'];
	    $fk_section_number = $output['fk_section_number'];
	    $midterm_score = $output['midterm_score'];
	    $final_score = $output['final_score'];
	    $term_project_score = $output['term_project_score'];
		*/
	?>
	<br><br>
	<a href="student_view_class_list.php">Click here to go back to your class list.</a>
	</center>
	</body>
</html>