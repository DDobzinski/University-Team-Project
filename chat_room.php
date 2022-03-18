<!-- 
The chat room page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

require("config.php");

session_start();

require("fake_login_init.php");

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
	<link rel="stylesheet" type="text/css" href="styling/styling.css">
	<script type="text/javascript" src="js/script.js"></script>
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
		<a id="homepage_link" class="navbar_link">Homepage</a>
	</div>

	<div id="main_content" class="main_home">
	<div id="navigation_pane">
		<h2>Topics</h2>
		<form method="post" id="add_topic">
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
			<h3>Pick a topic</h3>
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
