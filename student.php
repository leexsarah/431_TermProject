<!doctype html>
<html>
	<head>
		<title>Student Page</title>
		<link href="style.css" rel="stylesheet" type="type/css">
	</head>
	<body>
		<center>
		<?php
			$cwid = $_POST["scwid"];
			$link = mysqli_connect('localhost', 'root', 'root', 'school') or 
			mysqli_connect('localhost', 'root', '', 'school');
				
			$select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN csuf_member ";
			$where = "WHERE csuf_member.cwid =".$cwid." AND csuf_member.cwid = student.scwid;" ;
			$query = $select.$from.$join.$where;
			$result = $link->query($query);
			while($row = mysqli_fetch_assoc($result)) {
			    $a = $row['fname'];
			    $b = $row['lname'];
			    $c = $row['cwid'];
			    $d = $row['ssn'];
			    $e = $row['dob'];
			    $f = $row['major'];
			    $g = $row['city'];
			    $h = $row['state'];
			    $i = $row['zip_code'];
			    $j = $row['phone_number'];
		    }
		    echo "<h1 class='header'>Welcome $a</h1>";
			echo "<table valign='top' cellpadding='5'>";
			echo "<caption>Your Profile:</caption>";
			echo "<tr>";
		    echo "<td>Name:</td><td>".$a." ".$b."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>CWID:</td><td>".$c."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>SSN:</td><td>".$d."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Date of Birth:</td><td>".$e."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Major:</td><td>".$f."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>City:</td><td>".$g."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>State:</td><td>".$h."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Zip Code:</td><td>".$i."</td>";
			echo "</tr>";
			echo "<tr>";
		    echo "<td>Phone Number:</td><td>".$j."</td>";
			echo "</tr>";
			echo "</tr>";
		    echo "</table>";
		    $select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN student_section, section ";
			$where = "WHERE student_section.fk_scwid = ".$cwid." 
			AND student_section.fk_scwid = student.scwid 
			AND student_section.fk_section_number = section.section_number 
			AND student_section.fk_course_id = section.fk_course_id;" ;
			$query = $select.$from.$join.$where;
			$result = $link->query($query);
			while($row = mysqli_fetch_assoc($result)) {
			    $a = $row['fk_course_id'];
			    $b = $row['section_number'];
			    $c = $row['instructor'];
			    $d = $row['days'];
			    $e = $row['start_time'];
			    $f = $row['end_time'];
			    $g = $row['room'];
			    $h = $row['seats_available'];
			    $i = $row['total_seats'];
			    echo "<table valign='top' cellpadding='5'>";
				echo "<caption>Class Schedule:</caption>";
				echo "<tr>";
			    echo "<td>Course:</td><td>".$a."-".$b."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Instructor:</td><td>".$c."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Days:</td><td>".$d."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Start Time:</td><td>".$e."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>End Time:</td><td>".$f."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Room:</td><td>".$g."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Seats Available:</td><td>".$h."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Total Seats:</td><td>".$i."</td>";
				echo "</tr>";
			    echo "</table>";
			}
			$select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN course_grades ";
			$where = "WHERE student.scwid = ".$cwid." AND student.scwid = course_grades.fk_scwid;";
			$query = $select.$from.$join.$where;
			$result = $link->query($query);
			while($row = mysqli_fetch_assoc($result)) {
			    $a = $row['fk_course_id'];
			    $b = $row['fk_section_number'];
			    $c = $row['midterm_score'];
			    $d = $row['final_score'];
			    $e = $row['term_project_score'];
			    echo "<table valign='top' cellpadding='5'>";
				echo "<caption>Grades:</caption>";
				echo "<tr>";
			    echo "<td>Course:</td><td>".$a."-".$b."</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Midterm Exam Score:</td><td>".$c."%</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Final Exam Score:</td><td>".$d."%</td>";
				echo "</tr>";
				echo "<tr>";
			    echo "<td>Term Project Score:</td><td>".$e."%</td>";
				echo "</tr>";
				echo "</tr>";
			    echo "</table>";
			}
		    mysqli_close($link);
		?>
		</center>
	</body>
</html>