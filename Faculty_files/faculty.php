<?php
	session_start();

	include "../create_database_link.php";

	$fcwid = $_SESSION["cwid"];
	$status = $_SESSION["status"];
	
	$query = "SELECT C.fname, C.lname FROM csuf_member AS C, faculty AS S WHERE C.cwid = S.fcwid AND S.fcwid = " . $fcwid . ";";

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
		<title>Faculty Page</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<h1>Welcome <?php echo $fname ?></h1>
		<?php include "header.php"; ?>
	</body>
</html>