<?php
	session_start();

	$sectionNumber = $_POST["inputSectionNumber"];
	$courseID = $_POST["inputCourseID"];
	$instructor = $_POST["selectInstructor"];
	$days = $_POST["selectDays"];
	$start = $_POST["inputStartTime"];
	$end = $_POST["inputEndTime"];
	$room = $_POST["inputRoom"];
	$available = $_POST["inputAvailableSeats"];
	$total = $_POST["inputTotalSeats"];

	if($sectionNumber > 0 && $courseID !== "" && $start !== "" && $end !== "" && $room !== "" && $available >= 0 && $total > 0){
		include "../create_database_link.php";

		$query = "INSERT INTO section VALUES ($sectionNumber, '$courseID', '$instructor', '$days', '$start', '$end', '$room', $available, $total);";
		$result = $link->query($query) or die("ERROR: " . mysqli_error($link) . "<a href='admin_view_courses.php> Go back to course list </a>");
		
	} else{
		$_SESSION["addError"] = "ERROR: Cannot add section. One or more fields is empty or invalid.";
		header("Location: admin_view_courses.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin View: Confirm New Section Added</title>
</head>
<body>
	<?php
		if($result){
			echo "<h1>Success</h1>";
			echo "The section was added to the course and is now viewable.</p>";
		} else{
			echo "<h1>Failure</h1>";
			echo "<p>An error occured...</p>";
		}
	?>
	<a href="admin_view_courses.php">Click here to go back to the course list.</a>
</body>
</html>