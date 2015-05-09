<?php
	session_start();

	$courseID = $_POST["courseID"];
	$courseName = $_POST["courseName"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Course Details</title>
	<link href="../style.css" rel="stylesheet" media="all">
</head>
<body>
	<h1>Details for <?php echo $courseID . "-" . $courseName; ?></h1>

	<?php
		include "../create_database_link.php";

		$query = "SELECT section_number, days, start_time, end_time, room, seats_available, total_seats, fname, lname FROM section, csuf_member WHERE fk_course_id='$courseID' AND cwid = instructor;";
		$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

		echo "<table>";
		echo "<tr>";
		echo "<th>Section #</th>";
		echo "<th>Instructor</th>";
		echo "<th>Days</th>";
		echo "<th>Start Time</th>";
		echo "<th>End Time</th>";
		echo "<th>Room Number</th>";
		echo "<th>Available Seats</th>";
		echo "<th>Total Seats</th>";
		echo "<th>Delete Section</th>";
		echo "</tr>";

		while($row = mysqli_fetch_array($result)){
			$sectionNumber = $row["section_number"];
			$instructor = $row["fname"] . " " . $row["lname"];
			$days = $row["days"];
			$start = $row["start_time"];
			$end = $row["end_time"];
			$room = $row["room"];
			$availableSeats = $row["seats_available"];
			$totalSeats = $row["total_seats"];

			echo "<tr>";
			echo "<td>$sectionNumber</td>";
			echo "<td>$instructor</td>";
			echo "<td>$days</td>";
			echo "<td>$start</td>";
			echo "<td>$end</td>";
			echo "<td>$room</td>";
			echo "<td>$availableSeats</td>";
			echo "<td>$totalSeats</td>";

			echo "<td>";
			echo "<form action='delete_section.php' method='POST'>";
			echo "<input type='hidden' name='sectionNumber' value='$sectionNumber' />";
			echo "<input type='hidden' name='courseName' value='$courseName' />";
			echo "<input type='submit' id='submit' value='DELETE SECTION' />";
			echo "</form>";
			echo "</td>";

			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>

