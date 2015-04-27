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
		    echo "<ul>Your iProfile: ";
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
		    mysqli_close($link);
		?>
	</body>
</html>