<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require("config.php");

require("php/login.php");
require("php/join.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/index.css">
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body onload="check_modals();">

	<div id="main">
		<div id="navbar">
			<ul>
				<li id="navbar_logo" style="float:left"><a href="index_page_v2.php"><img class="logo_image" src="images/linkuni_logo_white.png" alt="Logo image" width="90" height="27"></a></li>
				<li id="navbar_button" style="float:right"><a onclick="toggle_modal(`login`);">Login</a></li>
			</ul>


			<div id="login_modal" class="modal">
				<div class="modal_content modal_animate">
					<form method="post">
						<p onclick="toggle_modal('login');" class="close" title="login_modal_close">&times;</p>

						<h3>Login</h3>
						
						<?php
						if (isset($error_message_login)) {
							echo "<label class='error_message' for='login'>" .$error_message_login . "</label>";
						}
						?>

						<label for="username_login">Username / email:</label>
						<input type="text" name="username_login" placeholder="Enter your password:" autocomplete="off">

						<label for="password_login">Password:</label>
						<input type="password" name="password_login" placeholder="Enter your username:" autocomplete="off">
						<a href="forgot_password.php">Forgot your password?</a>

						<input type="submit" value="Login" name="login_button">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>