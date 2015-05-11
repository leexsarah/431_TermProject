<?php
	session_start();

	$fk_course_id = $_POST["fk_course_id"];
	$section_number = $_POST["section_number"];
	$fcwid = $_SESSION["cwid"];

?>

<!doctype html>
<html>
	<head>
		<title>Class Roster</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<table valign='top' cellpadding='5'>
		 	<caption>Class Roster</caption>
		 	<tr>
		 		<th>CWID</th>
		 		<th>Name</th>
		 		<th>Midterm Score</th>
		 		<th>Final Score</th>
		 		<th>Term Project Score</th>
		 		<th>Update</th>
		 	</tr>
			<?php
				include "../create_database_link.php";

				$roster_query = 
				"select scwid, fname, lname, midterm_score, final_score, term_project_score
				from student a 
				inner join student_section b, section c, csuf_member d, course_grades e 
				where cwid = scwid 
				and b.fk_course_id = '$fk_course_id'
				and b.fk_course_id = c.fk_course_id 
				and c.instructor = $fcwid 
				and b.fk_section_number = $section_number 
				and b.fk_section_number = c.section_number 
				and cwid = scwid 
				and scwid = b.fk_scwid
				and b.fk_scwid = e.fk_scwid;";

				$result = $link->query($roster_query) or die("ERROR: ". mysqli_error($link));

				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<form action='update_grades.php' method='POST'>";
					echo "<td>".$row['scwid']."</td>";
					echo "<td>".$row['fname']." ".$row['lname']."</td>";
					echo "<td><input type='text' name='midterm_score' value='".$row['midterm_score']."' disabled/></td>";
					echo "<td><input type='text' name='final_score' value='".$row['final_score']."' disabled/></td>";
					echo "<td><input type='text' name='term_project_score' value='".$row['term_project_score']."' disabled/></td>";
					echo "<td><input type='submit' id='submit' value='Update Grade' /></td>";
					echo "</form>";
					echo "</tr>";
				}

				$result->free();
				mysqli_close($link);

			?>
		</table>
		<br><br>
		<a href="faculty.php">Click here to go back to main page.</a><br />
		<a href="faculty_course_list.php">Click here to go back to your course list.</a>
	</body>
</html>	
