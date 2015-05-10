<!DOCTYPE html>
<html>
	<head>
		<title>Profile Information</title>
		<link href="../style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<?php include "../logout.php"; ?>
		<br><br>
		<?php
			session_start();
			$student = $_SESSION["student_information"];

			$fname = $student["fname"];
			$lname = $student["lname"];
			$dob = $student["dob"];
			$city = $student["city"];
			$state = $student["state"];
			$zip = $student["zip_code"];
			$phoneNumber = $student["phone_number"];
			$major = $student["dept_name"];

			echo "<table>";
			echo "<caption>Your Profile Information</caption>";
			echo "<tr>";
			echo "<td>Name</td>";
			echo "<td>" . $fname . " " . $lname . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Date of Birth</td>";
			echo "<td>" . $dob . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Address</td>";
			echo "<td>" . $city . ", " . $state . " " . $zip . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Major</td>";
			echo "<td>" . $major . "</td>";
			echo "</table>";
		?>
		<a href="student.php">Click here to go back to main page.</a>
	</body>
</html>