<?php
	session_start();

	include "create_database_link.php";
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
	//Query the database
	$query = "SELECT * FROM department a join course b, course_schedule c where term_id = "Sp2015" and term_id = fk_term_id and dept_id = b.fk_dept_id and b.fk_dept_id = c.fk_dept_id;";

