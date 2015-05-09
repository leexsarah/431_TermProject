<?php
	session_start();
	$courseID = $_POST["courseID"];
	$courseName = $_POST["courseName"];

	include "../create_database_link.php";

	$query = "DELETE FROM course WHERE course_id = '" . $courseID . "' AND course_name = '" . $courseName . "';";
	$result = $link->query($query) or die("ERROR: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin View: Delete Confirmation</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
		<?php
			if($result){
				echo "<h1>Confirmed Deletion</h1>";
				echo "<p>The course has been deleted.</p>";
				echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
			} else{
				echo "<h1>Error</h1>";
				echo "<p>No such class exists.</p>";
				echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
			}

			$result->free();
			mysqli_close($link);
		?>
	</body>
</html>