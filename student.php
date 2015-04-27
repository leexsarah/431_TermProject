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

		$link = mysqli_connect('localhost', 'root', 'root', 'school') or 
				mysqli_connect('localhost', 'root', '', 'school');

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

	echo "IT WORKS";

	$_SESSION["scwid"] = $scwid;

	echo $fname . " " . $lname . " " . $scwid;
?>
	<!doctype html>
	<html>
		<head>
			<title>Student Page</title>
			<link href="style.css" rel="stylesheet" type="type/css">
		</head>
		<body>
		</body>
</html>