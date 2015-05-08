<?php
	session_start();

	include "../create_database_link.php";

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
		<link href="../style.css" rel="stylesheet" type="type/css">
	</head>
	<body>
		<h1>Welcome <?php echo $fname ?></h1>
		<?php include "header.php"; ?>
	</body>
</html>