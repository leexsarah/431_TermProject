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
			echo "<input type='hidden' name='courseID' value='$courseID' />";
			echo "<input type='submit' id='submit' value='DELETE SECTION' />";
			echo "</form>";
			echo "</td>";

			echo "</tr>";
		}
		echo "</table>";
	?>

	<div id="add-section-form">
		<p>Add a New Section</p>
		<form action="admin_add_section.php" method="POST">
			<label for="inputSectionNumber">Section Number</label>
			<input type="text" name="inputSectionNumber" id="inputSectionNumber" />

			<?php echo "<input type='hidden' name='inputCourseID' id='inputCourseID' value='$courseID' />"; ?>

			<label for="selectInstructor">Instructor</label>
			<select name="selectInstructor" id="selectInstructor">
				<option value="888888888">Professor Knowitall</option>
				<option value="999999999">Doctor Janice</option>
			</select>

			<label for="selectDays">Days</label>
			<select name="selectDays" id="selectDays">
				<option value="MW">Monday/Wednesday</option>
				<option value="TuTh">Tuesday/Thursday</option>
				<option value="MTuW">Monday/Tuesday/Wednesday</option>
				<option value="WF">Wednesday/Friday</option>
				<option value="MF">Monday/Friday</option>
				<option value="FS">Friday/Saturday</option>		
			</select>

			<label for="inputStartTime">Start Time</label>
			<input type="text" name="inputStartTime" id="inputStartTime" value="12:00:00"/>

			<label for="inputEndTime">End Time</label>
			<input type="text" name="inputEndTime" id="inputEndTime" value="13:45:00" />

			<label for="inputRoom">Room</label>
			<input type="text" name="inputRoom" id="inputRoom" />

			<label for="inputAvailableSeats">Available Seats</label>
			<input type="text" name="inputAvailableSeats" id="inputAvailableSeats" value="0"/>

			<label for="inputTotalSeats">Total Seats</label>
			<input type="text" name="inputTotalSeats" id="inputTotalSeats" />

			<input type="submit" id="submit" value="Add Section" />
		</form>

		<?php
			if(isset($_SESSION["addError"])){
				echo $_SESSION["addError"];

				unset($_SESSION["addError"]);
			}
		?>
	</div>
</body>
</html>

