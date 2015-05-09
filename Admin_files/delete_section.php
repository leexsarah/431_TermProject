<?php
	session_start();

	$sectionNumber = $_POST["sectionNumber"];
	$courseName = $_POST["courseName"];
	$courseID = $_POST["courseID"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin View: Confirmation of Section Deletion</title>
		<link href="../style.css" rel="stylesheet" media="all" />
	</head>
	<body class="delete">
		<h1>WARNING!</h1>
		<p>Do you really want to delete <?php echo "$courseName-$sectionNumber"; ?>?</p>
		<p>You cannot undo this action.</p>

		<?php
			include "../create_database_link.php";

			$query = "SELECT section_number, days, start_time, end_time, room, seats_available, total_seats, fname, lname FROM section, csuf_member WHERE fk_course_id='$courseID' AND section_number = '$sectionNumber' AND cwid = instructor;";
			$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

			$row = $result->fetch_assoc();

			$instructor = $row["fname"] . " " . $row["lname"];
			$days = $row["days"];
			$start = $row["start_time"];
			$end = $row["end_time"];
			$room = $row["room"];
			$availableSeats = $row["seats_available"];
			$totalSeats = $row["total_seats"];

			$result->free();
			mysqli_close($link);
		?>

		<table valign='top' cellpadding='5'>
		 	<tr>
		 		<th>Section Number</th>
		 		<th>Instructor</th>
		 		<th>Days</th>
		 		<th>Start Time</th>
		 		<th>End Time</th>
		 		<th>Room Number</th>
		 		<th>Available Seats</th>
		 		<th>Total Seats</th>
		 		<th>Confirm Deletion</th>
		 	</tr>
		 	<?php
		 		echo "<tr>";
				echo "<td>$sectionNumber</td>";
				echo "<td>$instructor</td>";
				echo "<td>$days</td>";
				echo "<td>$start</td>";
				echo "<td>$end</td>";
				echo "<td>$room</td>";
				echo "<td>$availableSeats</td>";
				echo "<td>$totalSeats</td>";
		 	?>
		 		<td>
				<form action="delete_section_confirmation.php" method="POST">
				 	<?php
				 		echo "<input type='hidden' name='courseID' value='$courseID' />";
				 		echo "<input type='hidden' name='courseName' value='$courseName' />";
				 		echo "<input type='hidden' name='sectionNumber' value='$sectionNumber' />";
				 		echo "<input type='submit' id='submit' value='Confirm Deletion' />";
				 	?>
				</form>
				</td>
			</tr>
		</table>

		<a href="admin_view_courses.php">Click here to go back to the course list.</a>
	</body>
</html>