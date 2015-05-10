<!doctype html>
<html>
	<head>
		<title>Course List</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<br>
		<table valign='top' cellpadding='5'>
		 	<caption>Course List</caption>
		 	<tr>
		 		<th>Section Number</th>
		 		<th>Course ID</th>
		 		<th>Details</th>
		 	</tr>
			<?php
				include "../create_database_link.php";
				
				//Query the database
				$query = "select section_number, fk_course_id, fname, lname, cwid from csuf_member, faculty, section where instructor=cwid and cwid=fcwid and cwid=888888888;";
				
				$result = $link->query($query) or die("ERROR:" . mysqli_error($link));

				while($row = mysqli_fetch_array($result)){

					$section_number = $row["section_number"];
					$fk_course_id = $row["fk_course_id"];
					
					echo "<tr>";
					echo "<td>". $section_number ."</td>";
					echo "<td>". $fk_course_id ."</td>";
					echo "<td>";
					echo "<form action='view_details.php' method='POST'>";
					echo "<input type='hidden' name='fk_course_id' value='" . $fk_course_id . "' />";
					echo "<input type='hidden' name='section_number' value='" . $section_number . "' />";
					echo "<input type='submit' id='submit' value='View For Details' />";
					echo "</form>";
					echo "</td>";
				}
		
				$result->free();
				mysqli_close($link);
			?>
		</table>
		<br><br>
		<a href="faculty.php">Click here to go back to main page.</a>
	</body>
</html>	

