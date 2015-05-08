<?php

	//Reference for single connection file: http://php.about.com/od/phpwithmysql/qt/mysql_connect.htm
	
	$host = "localhost";
	$user = "root";
	$password = "root";
	$db = "school";

	$link = mysqli_connect($host, $user, $password, $db);

	if(mysqli_connect_errno()){
		echo "Connection failed: " . mysqli_connect_error();
		exit();
	}
?>