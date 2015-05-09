<?php
	session_start();
	$course_id = $_POST["course_id"];
	$course_name = $_POST["course_name"];
	$student =$_SESSION["student_class_list"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Course Details</title>
	<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
	<?php include "../logout.php"; ?>
	<h1>Details for <?php echo (string)$course_id." - $course_name"; ?></h1>

	<?php
		include "../create_database_link.php";

		$query = "SELECT section_number, days, start_time, end_time, room, seats_available, total_seats, fname, lname FROM section, csuf_member WHERE fk_course_id='$course_id' AND cwid = instructor;";
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
		echo "<th>Add Section</th>";
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
			echo "<form action='add_course.php' method='POST'>";
			echo "<input type='hidden' name='section_number' value='$sectionNumber' />";
			echo "<input type='hidden' name='course_name' value='$course_name' />";

			$enrolled = false;
			foreach($student as $value){
				if(in_array($course_id, $value)){
					$enrolled = true;
					break;
				}
			}
			
			if ($enrolled === true){
				echo "<input type='submit' id='submit' value='Enrolled' disabled />";
			}else if($availableSeats > 0) {
				echo "<input type='submit' id='submit' value='Add' />";
			} else{
				echo "<input type='submit' id='submit' value='Full' disabled />";
			}
			echo "</form>";
			echo "</td>";

			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>