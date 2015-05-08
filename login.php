<?php
	session_start();

	$username = $_POST["username"];
	$password = $_POST["password"];

	include "create_database_link.php";  //mysql connection.

	//Find the user in the database.
	$query = 'SELECT M.status, A.fk_cwid FROM csuf_member AS M, account AS A WHERE A.username = "' . $username . '" AND A.password = "' . $password . '" AND A.fk_cwid = M.cwid;';
	$result = $link->query($query) or die("ERROR");

	if($result->num_rows === 0){  //No users were found in the database.
		//Set the error message.
		$_SESSION["loginError"] = "Username or password error. Please try again.";
		//Send the user back to the login page.
		//NOTE: If header is not working, the problem seems to be that there is output called before header is called.
		//		Reference: http://stackoverflow.com/questions/12817846/header-is-not-redirecting-php
		header("Location: index.php");
	} else if($result->num_rows === 1){  //User exists in the database.
		$row = $result->fetch_assoc();

		$cwid = $row["fk_cwid"];
		$status = $row["status"];

		$_SESSION["cwid"] = $cwid;
		$_SESSION["status"] = $status;

		//Close SQL data before page changes happen.
		$result->free();
		mysqli_close($link);

		switch($status){
			case 1:
				header("Location: student.php");
				break;
			case 2:
				header("Location: faculty.php");
				break;
			case 3:
				header("Location: admin.php");
				break;
		}

		echo "Username: " . $username . "<br />";
		echo "Password: " . $password . "<br />";
		echo "CWID: " . $cwid . "<br />";
		echo "Status: " . $status . "<br />";
	}
?>
