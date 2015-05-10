<?php
	session_start();

	$courseName = $_POST["course"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin View: Confirmation of Deletion</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body class="delete">
		<?php include "../logout.php"; ?>
		<h1>WARNING!</h1>
		<p>Do you really want to delete <?php echo $courseName; ?>?</p>
		<p>You cannot undo this action.</p>

		<?php
			include "../create_database_link.php";

			$query = "SELECT * FROM course WHERE course_name = '" . $courseName . "';";
			$result = $link->query($query) or die("ERROR: Failed query");

			$row = $result->fetch_assoc();

			$courseID = $row["course_id"];
			$units = $row["units"];
			$term = $row["fk_term_id"];
			$dept = $row["fk_dept_id"];


			$result->free();
			mysqli_close($link);

			echo "<table valign='top' cellpadding='5'>";
			echo "<tr>";
			echo "<th>Course ID</th>";
			echo "<th>Course Name</th>";
			echo "<th>Units</th>";
			echo "<th>Term</th>";
			echo "<th>Department</th>";
			echo "<th>Confirm Deletion</th>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>$courseID</td>";
			echo "<td>$courseName</td>";
			echo "<td>$units</td>";
			echo "<td>$term</td>";
			echo "<td>$dept</td>";

			echo "<td>";
			echo "<form action='delete_confirmation.php' method='POST'>";
			echo "<input type='hidden' name='courseID' value='" . $courseID . "' />";
			echo "<input type='hidden' name='courseName' value='" . $courseName . "' />";
			echo "<input type='submit' value='CONFIRM DELETION' id='submit' />";
			echo "</form>";
			echo "</td>";

			echo "</tr>";
			echo "</table>";
		?>
		<br><br>
		<a href="admin_view_courses.php">Click here to go back to the course list.</a>
	</body>
</html>