<?php
	session_start();

	$courseID = $_POST["courseID"];
	$courseName = $_POST["courseName"];
	$units = $_POST["units"];
	$term = $_POST["term"];
	$department = $_POST["department"];

	if($courseID !== "" && $courseName !== ""){
		include "../create_database_link.php";

		$query = "INSERT INTO course VALUES('$courseID', '$courseName', $units, '$term', $department);";
		$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

	} else{
		$_SESSION["addError"] = "One or more fields are blank.";
		header("Location: admin_view_courses.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin View: Confirm New Course</title>
	</head>
	<body>
		<?php
			if($result){
				echo "<h1>Success</h1>";
				echo "<p>The course was added to the list.</p>";
				echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
			} else{
				echo "<h1>Failure</h1>";
				echo "<p>An error occured...</p>";
				echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
			}
		?>
	</body>
</html>