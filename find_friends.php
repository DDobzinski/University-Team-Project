<!-- The main index page of our first year group project from tutorial Group Z7 -->
<!-- Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen -->

<?php

require("config.php");
require("find_friends_functions.php");

session_start();

// require("fake_login_init.php");

if (!isset($_SESSION["logged_in"])) {
	header("Location: index_page.php");
} else {
	require("php/chat_functions.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/master.css">
	<link rel="stylesheet" type="text/css" href="styling/find_friends.css">
	<script type="text/javascript" src="js/index_page.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>
	
	<div id="main">
		<div id="navbar">
			<!-- <?php

			// if (isset($_SESSION["logged_in"])) {
			// 	if ($_SESSION["logged_in"] == true) {
			// 		echo '<button id="profile_page_button" onclick="window.location.href = `profile_page.php`;">Go to profile</button>';
			// 	} else {
			// 		echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
			// 	}
			// } else {
			// 	echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
			// }

			?>-->
			


		</div>

		<div id="main_content" align="center">
			<h1>This page is dedicated to help you find friends!</h1>
		</div>
	</div>

</body>