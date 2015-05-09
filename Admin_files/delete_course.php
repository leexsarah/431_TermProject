<?php
	session_start();

	$courseName = $_POST["course"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin View: Confirmation of Deletion</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
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

			echo $courseID . " " . $courseName . " " . $units . " " . $term . " " . $dept;
		?>

		<form action="delete_confirmation.php" method="POST">
			<?php
				echo "<input type='hidden' name='courseID' value='" . $courseID . "' />";
				echo "<input type='hidden' name='courseName' value='" . $courseName . "' />";
			?>
			<input type="submit" value="DELETE" id="submit" />
		</form>
	</body>
</html>