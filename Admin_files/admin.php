<?php
	session_start();

	$acwid = $_SESSION["cwid"];
	$status = $_SESSION["status"];

	include "../create_database_link.php";

	$query = "SELECT C.fname, C.lname FROM csuf_member AS C, admin AS A WHERE C.cwid = A.acwid AND A.acwid = " . $acwid . ";";
	$result = $link->query($query) or die("ERROR: Query failed.");

	$row = $result->fetch_assoc();

	$fname = $row["fname"];
	$lname = $row["lname"];

	$result->free();
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator Page</title>
	<link href="../style.css" rel="stylesheet" media="all">
</head>
<body>
	<?php include "../logout.php"; ?>
	<h1>Administrator Mode</h1>
	<h2>Welcome <?php echo $fname . " " . $lname ?></h2>
	<?php include "admin_header.php"; ?>
</body>
</html>