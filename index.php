<!-- The main index page of our first year group project from tutorial group Z7 -->
<!-- Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["login_button"])) { // if they are logging in
		if (empty(trim($_POST["username_login"]))) {
			$error_message_login = "Please enter a username or email";
		} else {
			$email_regex = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";

			if (preg_match($email_regex, trim($_POST["username_login"]))) {
				$email_login = trim($_POST["username_login"]);
			} else {
				// maybe add additional validation in case the email was not entered correctly
				$username_login = trim($_POST["username_login"]);
			}
		}

		if (empty(trim($_POST["password_login"]))) {
			$error_message_login = "Please enter a password";
 		} else {
 			$password_login = trim($_POST["password_login"]);
 		}

 		if (isset($password_login) && (isset($email_login) || isset($username_login))) {

 			if (isset($email_login)) {
 				// change the SQL statement so it checks email and password
 			} elseif (isset($username_login)) {
 				// change the SQL statement so it checks email and password
 			} else {
 				// error has occured
 			}
 		}

	} elseif (isset($_POST["join_button"])) { // if they are registering
		// Validate username
		if (empty(trim($_POST["username_join"]))) {
			$error_message_join = "Please enter a username.";
		} else {
			$temp_username = trim($_POST["username_join"]);
			$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/";

			if (preg_match($regex, $temp_username)) {
				$error_message_join = "Username must only contain lowercase, uppercase, and digits";
			} else {
				// check if the username is in the database already

				// if not in db
				$join_username = trim("username_join");
			}
		}

		// Validate email
		if (empty(trim($_POST["email_join"]))) {
			$error_message_join = "Please enter an email.";
		} else {
			if (!filter_var(trim($_POST["email_join"]), FILTER_VALIDATE_EMAIL)) {
				$error_message_join = "Invalid email format.";
			} else {
				// check if the email is in the database already

				// if not in db
				$join_email = trim("email_join");
			}
		}

		// Validate password
		if (empty(trim($_POST["password_join"]))) {
			$error_message_join = "Please enter a password.";
		} else {
			if (strlen(trim($_POST["password_join"])) > 8) {
				$error_message_join = "Password must be 8 characters in length";
			} else {
				$temp_password = $_POST["password_join"];
				$regex = "/^(?=.[a-z])(?=.[A-Z])(?=.*\d).*$/";

				if (!preg_match($regex, $temp_password)) {
					$error_message_join = "This password is not secure!";
				} else {
					// PASSWORD IS VALID
					$join_password = trim($_POST["password_join"]);
				}
			}
		}

		// Validate password confirmation
		if (empty(trim($_POST["password_confirm_join"]))) {
			$error_message_join = "Please confirm your password.";
		} elseif (isset($join_password)) {
			$join_password_confirm = trim($_POST["password_confirm_join"]);
			if ($join_password_confirm != $join_password) {
				$error_message_join = "Passwords do not match.";
			} else {
				$passwords_match = 1; // this is used to validate the passwords match before adding to DB
			}
		} else {
			$error_message_join = "Please confirm your password.";
		}

		if (isset($passwords_match) && isset($join_password) && isset($join_email) && isset($join_username)) {
			// add the data to the database
		}
	}
} 

?>

<!-- 
Please can you use snake case, so for two words like 'hello world' make the variable hello_word, cheersss
Also when you're adding images please can you use an alt tag just in case the image doesn't load -
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
	<script type="text/javascript" src="script.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>

	<div id="main">
		<div id="navbar">
			<button id="login_button" onclick="toggle_modal('login');">Login</button>

			<div id="login_modal" class="modal">
				<div class="modal_content modal_animate">
					<form method="post">
						<p onclick="toggle_modal('login');" class="close" title="login_modal_close">&times;</p>

						<h3>Login</h3>
						<label for="username_login">Username / email:</label>
						<input type="text" name="username_login" placeholder="Enter your password:" autocomplete="off">

						<label for="password_login">Password:</label>
						<input type="password" name="password_login" placeholder="Enter your username:" autocomplete="off">
						<a href="forgot_password.php">Forgot your password?</a>

						<input type="submit" value="Login" name="login_button">
					</form>
				</div>
			</div>

			<!-- If logged in change login button to profile button -->
		</div>

		<div id="main_content" align="center">
			<!-- This is the main page so here we can include the explanation of linkuni and then the join button -->

			<!-- Can insert an image here of the logo -->
			<img src="" alt="Logo image">

			<h1>Welcome</h1>

			<div id="main_information">
				<h2> What is linkuni about?</h2>
				<p>Lorem ipsum... </p>
			</div>

			<div id="join_area">
				<h2>Get started</h2>
				<button id="join_button" onclick="toggle_modal('join');">Join</button>
			</div>

			<div id="join_modal" class="modal" align="left">
				<div class="modal_content modal_animate">
					<form method="post">
						<p onclick="toggle_modal('join');" class="close" title="join_modal_close">&times;</p>

						<h3>Join</h3>
						<label for="username_join">Username</label>
						<input type="text" name="username_join" placeholder="Enter your password:" autocomplete="off">

						<label for="email_join">Email</label>
						<input type="text" name="email_join" placeholder="Enter your email:" autocomplete="off">

						<label for="password_join">Password:</label>
						<input type="password" name="password_join" placeholder="Enter your username:" autocomplete="off">

						<label for="password_confirm_join">Confirm your password:</label>
						<input type="password" name="password_confirm_join" placeholder="Confirm your password:" autocomplete="off">

						<input type="submit" name="join_button" value="Join"><br>
					</form>
				</div>
			</div>

		</div>
	</div>

	<div id="footer">

	</div>
</body>
</html>