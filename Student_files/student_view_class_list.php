<?php 
	session_start(); 
	$student_classes = $_SESSION["student_class_list"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Courses</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<h1>Enrolled Courses</h1>

		<table valign="top" cellpadding="5">
			<caption>Your Class List</caption>
			<th>Class-Section</th>
			<th>Grades</th>
			<th>Drop Class</th>
			<?php

				foreach($student_classes as $value) {
					$courseID = $value["fk_course_id"];
					$sectionNumber = $value["fk_section_number"];
					echo "<tr>";
					echo "<td>" . $courseID . "-" . $sectionNumber . "</td>";
					echo "<td>";
					echo "<form action='view_grades.php' method='POST'>";
					echo "<input type='hidden' name='fk_course_id' value='" . $courseID . "' />";
					echo "<input type='submit' id='submit' value='View Grade' />";
					echo "</form>";
					echo "</td>";
					echo "<td>";
					echo "<form action='drop_class.php' method='POST'>";
					echo "<input type='hidden' name='fk_course_id' value='" . $courseID . "' />";
					echo "<input type='submit' id='submit' value='Drop' />";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>