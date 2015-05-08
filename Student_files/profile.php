<!DOCTYPE html>
<html>
	<head>
		<title>Profile Information</title>
	</head>
	<body>
		<?php
			session_start();

			$scwid = $_SESSION["cwid"];

			include "../create_database_link.php";

			$query = "SELECT fname, lname, dob, city, state, zip_code, phone_number, dept_name FROM csuf_member, student, department WHERE scwid = cwid AND cwid = " . $scwid . " AND dept_id = major;";
			$result = $link->query($query) or die("ERROR: query failed.");

			$row = $result->fetch_assoc();

			$fname = $row["fname"];
			$lname = $row["lname"];
			$dob = $row["dob"];
			$city = $row["city"];
			$state = $row["state"];
			$zip = $row["zip_code"];
			$phoneNumber = $row["phone_number"];
			$major = $row["dept_name"];

			$result->free();
			mysqli_close($link);

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
			echo "<td>" . $city . " " . $state . " " . $zip . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Major</td>";
			echo "<td>" . $major . "</td>";
			echo "</table>";
		?>
	</body>
</html>