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
	<link href="../style.css" rel="stylesheet" media="all">
</head>
<body>
		<?php include "../logout.php"; ?>
		<br>
		<div id="class-schedule">
		<table valign='top' cellpadding='5'>
		 	<caption>Course List (Spring 2015)</caption>
		 	<tr>
		 		<th>Department Name</th>
		 		<th>Course ID</th>
		 		<th>Course Name</th>
		 		<th>Units</th>
		 		<th>Semester</th>
		 		<th>View Details</th>
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
					echo "<td>$course_name</td>";
					echo "<td>". $units ."</td>";
					echo "<td>". $semester ."</td>";

					echo "<td>";
					echo "<form action='course_detail.php' method='POST'>";
					echo "<input type='hidden' name='courseID' value='$course_id' />";
					echo "<input type='hidden' name='courseName' value='$course_name' />";
					echo "<input type='submit' id='submit' value='View Details' />";
					echo "</form>";
					echo "</td>";

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
	<div id="add-class-form">
		<p>Add a Class</p>
		<form action="admin_add_class.php" method="POST">
			<label for="courseID">Course ID</label>
			<input type="text" name="courseID" id="courseID" />

			<label for="courseName">Course Name</label>
			<input type="text" name="courseName" id="courseName" />

			<label for="units">Units</label>
			<select name="units" id="units">
				<option value="1">1 unit</option>
				<option value="2">2 units</option>
				<option value="3">3 units</option>
			</select>

			<label for="term">Term</label>
			<select name="term" id="term">
				<option value="Fa2014">Fall 2014</option>
				<option value="Sp2015">Spring 2015</option>
			</select>

			<label for="department">Department</label>
			<select name="department" id="department">
				<option value="1111">Computer Science</option>
				<option value="1234">Physics</option>
				<option value="2222">Math</option>
				<option value="3333">Engineering</option>
				<option value="4321">Chemistry</option>
				<option value="4444">Business</option>
				<option value="5555">Kinesiology</option>
				<option value="7777">Art</option>
				<option value="8888">Humanities</option>
				<option value="9999">Music</option>
			</select>

			<input type="submit" id="submit" value="Create Course" />
		</form>
		<div id="errorOutput">
			<div class="error">
				<?php
					if(isset($_SESSION["addError"])){
						echo "<p>" . $_SESSION["addError"] . "</p>";
					}
	
					unset($_SESSION["addError"]);
				?>
			</div>
		</div>
	</div>
</body>
</html>