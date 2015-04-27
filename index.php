<!doctype html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<header>
		</header>
		<main>
			<form action="student.php" method="POST">STUDENT LOGIN:
				<p> User: <input type="text" name="scwid"></p>
				<input type="submit">
			</form>
			<form action="faculty.php" method="POST">Faculty LOGIN:
				<p> User: <input type="text" name="fcwid"></p>
				<input type="submit">
			</form>
			<form action="admin.php" method="POST">ADMIN LOGIN:
				<p> User: <input type="text" name="acwid"></p>
				<input type="submit">
			</form>
		</main>
	</body>
</html>
