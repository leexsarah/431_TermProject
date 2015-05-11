<?php
	session_start();
	$fk_course_id = $_POST["fk_course_id"];
	$section_number = $_POST["section_number"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Course Detail</title>
	<link href="../style.css" rel="stylesheet" media="all">
</head>
<body>
	<?php include "../logout.php"; ?>
	<h1>Details for <?php echo (string)$fk_course_id." - $section_number"; ?></h1>

	<?php
		include "../create_database_link.php";

		$query = "SELECT section_number, days, start_time, end_time, room, seats_available, total_seats FROM section WHERE fk_course_id='$fk_course_id' AND section_number='$section_number';";
		$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

		echo "<table>";
		echo "<tr>";
		echo "<th>Days</th>";
		echo "<th>Start Time</th>";
		echo "<th>End Time</th>";
		echo "<th>Room Number</th>";
		echo "<th>Available Seats</th>";
		echo "<th>Total Seats</th>";
		echo "</tr>";

		while($row = mysqli_fetch_array($result)){
			$days = $row["days"];
			$start = $row["start_time"];
			$end = $row["end_time"];
			$room = $row["room"];
			$availableSeats = $row["seats_available"];
			$totalSeats = $row["total_seats"];

			echo "<tr>";
			echo "<td>$days</td>";
			echo "<td>$start</td>";
			echo "<td>$end</td>";
			echo "<td>$room</td>";
			echo "<td>$availableSeats</td>";
			echo "<td>$totalSeats</td>";

			/*
			$enrolled = false;
			foreach($student as $value){
				if(in_array($course_id, $value)){
					$enrolled = true;
					break;
				}
			}
			*/

			echo "</tr>";
		}
		echo "</table>";
	?>
	<br><br>
	<a href="faculty.php">Click here to go back to main page.</a>
</body>
</html>