<?php
	session_start();
	$profile = $_SESSION["student_information"];
	$student = $_SESSION["student_class_list"];
?>

<!doctype html>
<html>
	<head>
		<title>Course List</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<table valign='top' cellpadding='5'>
		 	<caption>Course List</caption>
		 	<tr>
		 		<th>Department Name</th>
		 		<th>Course ID</th>
		 		<th>Course Name</th>
		 		<th>Units</th>
		 		<th>Semester</th>
		 		<th>Sections Available</th>
		 	</tr>
			<?php
				include "../create_database_link.php";
				
				//Query the database
				$query = "select dept_name, course_id, course_name, units, semester from department a join course b, course_schedule c where term_id = 'Sp2015' and term_id = fk_term_id and dept_id = b.fk_dept_id and b.fk_dept_id = c.fk_dept_id;";
				
				$result = $link->query($query) or die("ERROR:" . mysqli_error($link));

				while($row = mysqli_fetch_array($result)){

					$dept_name = $row["dept_name"];
					$course_id = $row["course_id"];
					$course_name = $row["course_name"];
					$units = $row["units"];
					$semester = $row["semester"];

					echo "<tr>";
					echo "<td>". $dept_name ."</td>";
					echo "<td>". $course_id ."</td>";
					echo "<td>". $course_name ."</td>";
					echo "<td>". $units ."</td>";
					echo "<td>". $semester ."</td>";
					echo "<td>";
					echo "<form action='review_sections.php' method='POST'>";
					echo "<input type='hidden' name='course_id' value='" . $course_id . "' />";
					echo "<input type='hidden' name='course_name' value='" . $course_name . "' />";
					echo "<input type='submit' id='submit' value='Information' />";
					echo "</form>";
					echo "</td>";
				}
		
				$result->free();
				mysqli_close($link);
			?>
		</table>
	</body>
</html>	

