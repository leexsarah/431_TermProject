<?php 
	session_start(); 
	$scwid = $_SESSION["cwid"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Courses</title>
		<link href="../style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Enrolled Courses</h1>

		<table valign="top" cellpadding="5">
			<caption>Your Class List</caption>
			<?php
				include "../create_database_link.php";

				$query = "SELECT fk_course_id, fk_section_number FROM student_section WHERE fk_scwid = " . $scwid . ";";
				$result = $link->query($query) or die("ERROR: Failed query.");

				while($row = mysqli_fetch_array($result)){
					$courseID = $row["fk_course_id"];
					$sectionNumber = $row["fk_section_number"];

					echo "<tr>";
					echo "<td>" . $courseID . "-" . $sectionNumber . "</td>";
					echo "<td>";
					echo "<form action='view_grades.php' method='POST'>";
					echo "<input type='hidden' name='fk_course_id' value='" . $courseID . "' />";
					echo "<input type='submit' id='submit' />";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}

				$result->free();
				mysqli_close($link);
			?>
	</body>
</html>