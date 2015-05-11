<?php
	session_start();

	$sectionNumber = $_POST["sectionNumber"];
	$courseName = $_POST["courseName"];
	$courseID = $_POST["courseID"];

	include "../create_database_link.php";

	$query = "DELETE FROM section WHERE section_number = '$sectionNumber' AND fk_course_id = '$courseID';";
	$result = $link->query($query) or die("ERROR: " . mysqli_error($link));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin View: Section Deleted</title>
	<link href="../style.css" rel="stylesheet" media="all" />
</head>
<body>
	<?php include "../logout.php"; ?>
	<?php
		if($result){
			echo "<h1>Confirmed Deletion</h1>";
			echo "<p>The section has been deleted.</p>";
			echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
		} else{
			echo "<h1>Error</h1>";
			echo "<p>There was an error during the deletion process.</p>";
			echo "<a href='admin_view_courses.php'>Click here to go back to the course list.</a>";
		}

		$result->free();
		mysqli_close($link);
	?>
</body>
</html>
