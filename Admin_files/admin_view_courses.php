<?php
	session_start();

	if(isset($_GET["course"])){
		unset($_GET["course"]);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin View: Course List</title>
	<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
		<div id="class-schedule">
		<table valign='top' cellpadding='5'>
		 	<caption>Course List</caption>
		 	<tr>
		 		<th>Department Name</th>
		 		<th>Course ID</th>
		 		<th>Course Name</th>
		 		<th>Units</th>
		 		<th>Semester</th>
		 		<th>Delete Course</th>
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
					echo "<td><a href='course_detail.php?course=" . $course_name . "'>" . $course_name . "</a></td>";
					echo "<td>". $units ."</td>";
					echo "<td>". $semester ."</td>";
					echo "<td>";
					echo "<form action='delete_course.php' method='POST'>";
					echo "<input type='hidden' name='course' value='" . $course_name . "' />";
					echo "<input type='submit' id='submit' value='DELETE COURSE' />";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
		
				$result->free();
				mysqli_close($link);
			?>
		</table>
	</div>
</body>
</html>