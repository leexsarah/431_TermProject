<?php
	session_start();

	$scwid = $_POST["scwid"];  //Store the student cwid from the form into a variable.

	//Do some error checking to ensure that cwid is valid.
	if(strlen($scwid) < 9){
		$_SESSION["studentError"] = "Invalid Student CWID";

		header("Location: index.php");

		exit();
	} else{
		//cwid is valid; now let's check if the user exists in the database.

		$link = mysqli_connect('localhost', 'root', '', 'school');

		if(mysqli_connect_errno()){
			echo "Connection failed: " . mysqli_connect_error();
			exit();
		}

		$query = "SELECT C.fname, C.lname, S.scwid FROM csuf_member AS C, student AS S WHERE C.cwid = S.scwid AND S.scwid = " . $scwid . ";";

		$result = $link->query($query) or die("ERROR: " . mysqli_error($link));

		//If there are no rows returned, then student does not exist.
		if($result->num_rows === 0){
			$_SESSION["studentError"] = "Student does not exist";
			header("Location: index.php");
		}else{
			$row = $result->fetch_assoc();

			$fname = $row["fname"];
			$lname = $row["lname"];
			$scwid = $row["scwid"];
		}

		$result->free();
		mysqli_close($link);
	}

	$_SESSION["scwid"] = $scwid;
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
					$link = mysqli_connect('localhost', 'root', '', 'school');

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
		</body>
</html>