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
			<div class="login">
				<p>Login</p>

				<div class="login-form">
					<form action="login.php" method="POST">
						<input type="text" id="username-text" name="username" />
						<input type="text" id="password-text" name="password" />
						<input type="submit" id="submitButton" />
					</form>
				</div>
			</div>
			<?php
				//Output login error.
				if(isset($_SESSION["loginError"])){
					echo $_SESSION["loginError"];
				}

				unset($_SESSION["loginError"]);
			?>
			</div>
		</main>
	</body>
</html>
