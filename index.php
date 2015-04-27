<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Login Page</title>
		<link href="style.css" rel="stylesheet" type="type/css">
	</head>
	<body>
		<main>
			<center>
			<div class="login">
				<p>Login</p>
			</div>
			<div class="form">
				<form action="student.php" method="POST">Student:
					<input type="text" name="scwid">
					<input type="submit" id="submit">
				</form>

				<?php
					if(isset($_SESSION["studentError"])){
						echo $_SESSION["studentError"];
					}

					unset($_SESSION["studentError"]);
				?>
				<br>
				<form action="faculty.php" method="POST">Faculty:
					<input type="text" name="fcwid">
					<input type="submit" id="submit">
				</form>
				<br>
				<form action="admin.php" method="POST">Admin:
					<input type="text" name="acwid">
					<input type="submit" id="submit">
				</form>
			</div>
			</center>
		</main>
	</body>
</html>
