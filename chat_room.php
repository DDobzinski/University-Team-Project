<!-- 
The chat room page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

require("config.php");

session_start();

// require("fake_login_init.php");

if (!isset($_SESSION["logged_in"])) {
	header("Location: index_page.php");
} else {
	require("php/chat_functions.php");
}

if (isset($_POST["logout_button"])) {
	$_SESSION = array();
	session_destroy();
	header("location: index_page.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/master.css">
	<link rel="stylesheet" type="text/css" href="styling/chat_room.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/chat_room.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>

<div id="main">
	<div id="navbar">
		<img src="" alt="">
		<form method="post" id="logout_form">
			<input id="logout_button" type="submit" name="logout_button" value="Logout">
		</form>
		<a id="profile_page_link" class="navbar_link" href="profile_page.php">Go to profile</a>
		<a id="homepage_link" class="navbar_link" href="homepage.php">Homepage</a>
	</div>

	<div id="main_content" class="main_home">
	<div id="navigation_pane" style="display:none">
		<h2>Topics</h2>
		<form method="post" class="add_topic" id="add_topic">
			<textarea name="add_topic_name" type="text" id="text_area_add_topic"></textarea>
			<input type="submit" name="add_topic" value="Create new topic">
		</form>
		<ul id="topics_list">
			<?php
				echo display_topics();
			?>
		</ul>
	</div>
	<div id="current_content">
		<div id="basic_content">
			<div id="intro_content">
				<span align="center">
					<h1>Welcome to the chatroom!</h1>
					<h2>This page is dedicated to help you communicate with other students who are in a similar situation to you!</h2>
					<p>You can pick a topic from the list here, already created by other students, or make a new topic here:</p>
					<form method="post" class="add_topic add_topic_intro">
						<textarea name="add_topic_name" type="text" id="text_area_add_topic"></textarea>
						<input type="submit" name="add_topic" value="Create new topic">
					</form>
					<hr>
				</span>

				<h3>Topics:</h3>
				<div id="topics_table_div">
					<?php
						echo display_topic_table();
					?>
				</div>
			</div>
		</div>
			<?php
				 echo display_content_divs();
			?>
		</div>
	</div>
</div>

<?php
	include("php/reopen_content.php");
?>

</body>
</html>
