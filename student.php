<!doctype html>
<html>
	<head>
		<title>Student Page</title>
	</head>
	<body>
		<?php

			$cwid = $_POST["scwid"];

			$link = mysqli_connect('localhost', 'root', 'root', 'school');
				
			//Querying the server
			//echo "Connected Successfully\n";

			//Creating query that will be used to consult wit the database.
			$select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN csuf_member ";
			$where = "WHERE csuf_member.cwid =".$cwid." AND csuf_member.cwid = student.scwid;" ;
			$query = $select.$from.$join.$where;


			//Execute the query. 
			//$query = "select * from student inner join csuf_member where csuf_member.cwid = 777777777 and csuf_member.cwid = student.scwid;";

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
		    echo "<h1>Welcome $a</h1>";
		    echo "<ul>Your Profile: ";
		    echo "<li>Name: ".$a." ".$b."</li>";
		    echo "<li>CWID: ".$c."</li>";
		    echo "<li>SSN: ".$d."</li>";
		    echo "<li>Date of Birth:".$e."</li>";
		    echo "<li>Major: ".$f."</li>";
		    echo "<li>City: ".$g."</li>";
		    echo "<li>State: ".$h."</li>";
		    echo "<li>Zip Code: ".$i."</li>";
		    echo "<li>Phone Number: ".$j."</li>";
		    echo "</ul>";

		    $select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN student_section, section ";
			$where = "WHERE student_section.fk_scwid = ".$cwid." 
			AND student_section.fk_scwid = student.scwid 
			AND student_section.fk_section_number = section.section_number 
			AND student_section.fk_course_id = section.fk_course_id;" ;
			$query = $select.$from.$join.$where;

			$result = $link->query($query);

			echo "<h2> Class schedule: </h2>";
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

			    echo "<ul>";
			    echo "<li>Course: ".$a."-".$b."</li>";
			    echo "<li>Instructor: ".$c."</li>";
			    echo "<li>Days: ".$d."</li>";
			    echo "<li>Start Time:".$e."</li>";
			    echo "<li>End Time: ".$f."</li>";
			    echo "<li>Room: ".$g."</li>";
			    echo "<li>Seats Available: ".$h."</li>";
			    echo "<li>Total Seats: ".$i."</li>";
			    echo "</ul>";
			}

			$select = "SELECT * ";
			$from = "FROM student ";
			$join = "INNER JOIN course_grades ";
			$where = "WHERE student.scwid = ".$cwid." AND student.scwid = course_grades.fk_scwid;";
			$query = $select.$from.$join.$where;

			$result = $link->query($query);

			echo "<h2> Grades: </h2>";
			while($row = mysqli_fetch_assoc($result)) {
			    $a = $row['fk_course_id'];
			    $b = $row['fk_section_number'];
			    $c = $row['midterm_score'];
			    $d = $row['final_score'];
			    $e = $row['term_project_score'];

			    echo "<ul>";
			    echo "<li>Course: ".$a."-".$b."</li>";
			    echo "<li>Midterm Exam Score: ".$c."%</li>";
			    echo "<li>Final Exam Score: ".$d."%</li>";
			    echo "<li>Term Project Score: ".$e."%</li>";
			    echo "</ul>";
			}

		    mysqli_close($link);
		?>
	</body>
</html>