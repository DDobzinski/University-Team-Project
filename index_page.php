<!-- The main index page of our first year group project from tutorial Group Z7 -->
<!-- Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen -->

<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require("config.php");

require("php/login.php");
require("php/join.php");

?>

<!-- 
Please can you use snake case, so for two words like 'hello world' make the variable hello_word, cheersss
Also when you're adding images please can you use an alt tag just in case the image doesn't load -
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/master.css">
	<link rel="stylesheet" type="text/css" href="styling/index_page.css">
	<script type="text/javascript" src="js/index_page.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body onload="check_modals();">

	<div id="main">
		<div id="navbar">
			<?php

			if (isset($_SESSION["logged_in"])) {
				if ($_SESSION["logged_in"] == true) {
					echo '<button id="profile_page_button" onclick="window.location.href = `profile_page.php`;">Go to profile</button>';
				} else {
					echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
				}
			} else {
				echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
			}

			?>

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
						<input type="text" name="username_login" placeholder="Enter your username:" autocomplete="off">

						<label for="password_login">Password:</label>
						<input type="password" name="password_login" placeholder="Enter your password:" autocomplete="off">
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
			<img class="logo_image" src="images/linkuni_logo.png" alt="Logo image">

			<h1>Welcome</h1>

			<div id="main_information">
				<h2> What is linkuni about?</h2>
				<p>Linkuni is a social platform which aims to connect University of Manchester students across the globe</p>
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

						<?php
						if (isset($error_message_join)) {
							echo "<label class='error_message' for='join'>" .$error_message_join . "</label>";
						}
						?>

						<label for="username_join">Username</label>
						<input type="text" name="username_join" placeholder="Enter your username:" autocomplete="off">

						<label for="email_join">Email</label>
						<input type="text" name="email_join" placeholder="Enter your email:" autocomplete="off">

						<label for="password_join">Password:</label>
						<input type="password" name="password_join" placeholder="Enter your password:" autocomplete="off">

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
