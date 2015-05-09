<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Login Page</title>
		<link href="style.css" rel="stylesheet" media="all">
	</head>
	<body>
		<main>
			<center>
			<div class="login">
				<p>Login</p>

				<div class="login-form">
					<form action="login.php" method="POST">
						<p>Username: <input type="text" id="username-text" name="username" /></p>
						<p>Password: <input type="text" id="password-text" name="password" /></p>
						<input type="submit" id="submitButton" value = "Login" />
					</form>
				</div>
			</div>

			<div class="account-list">
				<p>This is a list of all the accounts on the site.
					This is listed here for convenience purposes.</p>
				<table>
					<tr>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>CWID</th>
					</tr>
					<?php
						include "create_database_link.php";
						$query = "SELECT * FROM account;";
						$result = $link->query($query) or die("ERROR: Query did not complete");
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>" . $row["username"] . "</td><td> " . $row["password"] . "</td><td> " . $row["fk_cwid"] . "</td>";
							echo "</tr>";
						}
						$result->free();
						mysqli_close($link);
					?>
				</ul>
			</div>

			<p class="error"><?php
				//Output login error.
				if(isset($_SESSION["loginError"])){
					echo $_SESSION["loginError"];
				}

				unset($_SESSION["loginError"]);
			?><p>
			</div>
			</center>
		</main>
	</body>
</html>
