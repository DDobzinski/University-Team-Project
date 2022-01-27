<!-- The main index page of our first year group project from tutorial group Z7 -->
<!-- Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen -->

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "dbhost.cs.man.ac.uk";
$username_db = "m17832wa";
$password = "rootroot";
$db_name = "2021_comp10120_z7";

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

 			$pdo_login = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);

 			$pdo_login->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

 			$sql_login = "SELECT user_id, username, hashed_password, email_address FROM user_info WHERE ";

 			if (isset($email_login)) {
 				$sql_login = $sql_login . "email = :email";

 				$stmt_login = $pdo_login->prepare($sql_login);

				$stmt_login->execute([
				 		'email_address' => $email_login
				]);
 			} elseif (isset($username_login)) {
 				$sql_login = $sql_login . "username = :username";

 				$stmt_login = $pdo_login->prepare($sql_login);

				$stmt_login->execute([
				 		'username' => $username_login
				]);
 			}

 			$stmt_login->setFetchMode(PDO::FETCH_ASSOC);

 			if ($row = $stmt_login->fetch()) {
 				$db_user_id = $row["user_id"];
 				$db_username = $row["username"];
 				$db_email_address = $row["email_address"];
 				$db_hashed_password = $row["hashed_password"];

 				if (password_verify($password_login, $db_hashed_password)) {
 					session_start();

 					$_SESSION["logged_in"] = true;
 					$_SESSION["user_id"] = $db_user_id;
 					$_SESSION["username"] = $db_username;
 					$_SESSION["email_address"] = $db_email_address;

 					header("homepage.php");
				} else {
					// password error
					echo "password error";
				}
 			} else {
 				if (isset($email_login)) {
 					// email error
 					echo "email error";
 				} elseif (isset($username_login)) {
 					// password error
 					echo "username error";
 				} else {
 					// incorrect login credentials - cannot tell if email or username
 					echo "no idea what error";
 				}
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
				$join_username = trim($_POST["username_join"]);
			}
		}

		// Validate email
		if (empty(trim($_POST["email_join"]))) {
			$error_message_join = "Please enter an email.";
		} else {
			if (!filter_var(trim($_POST["email_join"]), FILTER_VALIDATE_EMAIL)) {
				$error_message_join = "Invalid email format.";
			} else {
				$join_email = trim($_POST["email_join"]);
			}
		}

		// Validate password
		if (empty(trim($_POST["password_join"]))) {
			$error_message_join = "Please enter a password.";
		} else {
			if (strlen(trim($_POST["password_join"])) < 8) {
				$error_message_join = "Password must be 8 characters in length";
			} else {
				// $temp_password = $_POST["password_join"];
				// $regex = "/^(?=.[a-z])(?=.[A-Z])(?=.*\d).*$/";

				// if (!preg_match($regex, $temp_password)) {
				// 	$error_message_join = "This password is not secure!";
				// } else {
					// PASSWORD IS VALID
				$join_password = trim($_POST["password_join"]);
				//}
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
			$error_message_join = "Please confirm your password. as";
		}

		// TESTING CODE ----------------------
		if (isset($error_message_join)) {
			echo $error_message_join;
		}
		// --------------------------------

		if (isset($passwords_match) && isset($join_password) && isset($join_email) && isset($join_username)) {
			// add the data to the database
			$hashed_password = password_hash($join_password, PASSWORD_DEFAULT);

			$sql_join = "INSERT INTO user_info (username, hashed_password, email_address) VALUES (:username, :hashed_password, :email_address)";

			$pdo_join = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);

			$pdo_join->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$stmt_join = $pdo_join->prepare($sql_join);
			$stmt_join->execute([
				'username' => $join_username,
				'hashed_password' => $hashed_password,
				'email_address' => $join_email
			]);
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