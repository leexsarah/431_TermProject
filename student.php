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
			echo "Connected Successfully\n";

			//Creating query that will be used to consult wit the database.
			$select = "SELECT *";
			$from = "FROM student";
			$join = "INNER JOIN csuf_member";
			$where = "WHERE csuf_member.cwid =".$cwid." AND csuf_member.cwid = student.scwid;";
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
		    echo "<ul>";
		    echo "<li>".$a."</li>";
		    echo "<li>".$b."</li>";
		    echo "<li>".$c."</li>";
		    echo "<li>".$d."</li>";
		    echo "<li>".$e."</li>";
		    echo "<li>".$f."</li>";
		    echo "<li>".$g."</li>";
		    echo "<li>".$h."</li>";
		    echo "<li>".$i."</li>";
		    echo "<li>".$j."</li>";
		    echo "</ul>";
		    mysqli_close($link);
		?>

		<p> Hello World </p>
	</body>
</html>