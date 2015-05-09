<!doctype html>
<html>
	<head>
		<title>View Grades</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
	<center>
	<?php
		session_start();

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

		echo "<table valign='top' cellpadding='5'>";
		echo "<caption>Grades:</caption>";
		echo "<tr>";
	    echo "<td>Course:</td><td>".$fk_course_id."-".$fk_section_number."</td>";
		echo "</tr>";
		echo "<tr>";
	    echo "<td>Midterm Exam Score:</td><td>".$midterm_score."%</td>";
		echo "</tr>";
		echo "<tr>";
	    echo "<td>Final Exam Score:</td><td>".$final_score."%</td>";
		echo "</tr>";
		echo "<tr>";
	    echo "<td>Term Project Score:</td><td>".$term_project_score."%</td>";
		echo "</tr>";
		echo "</tr>";
	    echo "</table>";
	?>
	<br><br>
	<a href="student.php">Go back</a>
	</center>
	</body>
</html>