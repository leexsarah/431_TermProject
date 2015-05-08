<?php
	session_start();

	include "create_database_link.php";

	$scwid = $_SESSION["cwid"];
	$status = $_SESSION["status"];
	
	$query = "SELECT C.fname, C.lname FROM csuf_member AS C, student AS S WHERE C.cwid = S.scwid AND S.scwid = " . $scwid . ";";

	$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

	$row = $result->fetch_assoc();

	$fname = $row["fname"];
	$lname = $row["lname"];

	$result->free();
	mysqli_close($link);
?>
<!doctype html>
<html>
	<head>
		<title>Student Page</title>
		<link href="style.css" rel="stylesheet" type="type/css">
	</head>
	<body>
		<h1>Welcome <?php echo $fname ?></h1>
		<?php
			echo "<table valign='top' cellpadding='5'>";
			echo "<caption>Your Profile:</caption>";
			echo "<tr>";
		    echo "<td>Name:</td><td>".$fname." ".$lname."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>CWID:</td><td>".$scwid."</td>";
			echo "</tr>";
		    echo "</table>";
		 ?>

		 <table valign='top' cellpadding='5'>
		 	<caption>Your Class List</caption>
			<?php
				include "create_database_link.php";

			 	$query = "select fk_course_id, fk_section_number from student_section where fk_scwid = " . $scwid . ";";

				$result = $link->query($query) or die("ERROR:" . mysqli_error($link));

				while($row = mysqli_fetch_array($result)){

					$fk_course_id = $row["fk_course_id"];
					$fk_section_number = $row["fk_section_number"];

					echo "<tr>";
					echo "<td>" . $fk_course_id . "-" . $fk_section_number . "</td>";
					echo "<td>";
					echo "<form action='view_grades.php' method='POST'>";
					echo "<input type='hidden' name='fk_course_id' value='".$fk_course_id."' />";
					echo "<input type='submit' id='submit'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}

				$result->free();
				mysqli_close($link);
			?>
		</table>
		<a href="course_list.php">Add classes</a>
	</body>
</html>
