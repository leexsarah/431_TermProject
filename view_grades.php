<?php
	session_start();
	$course = $_POST["fk_course_id"];
	$student = $_SESSION["scwid"];

	$link = mysqli_connect('localhost', 'root', 'root', 'school') or 
			mysqli_connect('localhost', 'root', '', 'school');
				
	$select = "SELECT * ";
	$from = "FROM student ";
	$join = "INNER JOIN course_grades ";
	$where = "WHERE student.scwid = ".$cwid." AND student.scwid = course_grades.fk_scwid AND fk_course_id = ".$course.";";
	$query = $select.$from.$join.$where;
	$result = $link->query($query);

	$fk_course_id = $row['fk_course_id'];
    $fk_section_number = $row['fk_section_number'];
    $midterm_score = $row['midterm_score'];
    $final_score = $row['final_score'];
    $term_projcet_score = $row['term_project_score'];

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