<!-- 
The *insert name of page* page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

require("config.php");

session_start();

require("fake_login_init.php");

$rand = rand();
$_SESSION['rand_check']= $rand;

if (!isset($_SESSION["logged_in"])) {
	header("Location: index_page.php");
} else {
	require("php/topic_functions.php");
}


if (isset($_POST["add_chat_reply_gp"])) {
	add_topic_post("gp_topic", $_POST["text_box"], true, $_POST["chat_id"]);
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
		<form method="post" id="logout_form">
			<input id="logout_button" type="submit" name="logout_button" value="Logout">
		</form>
		<a id="profile_page_link" href="profile_page.php">Go to profile</a>
		<a id="homepage_link" href="homepage.php">Homepage</a>
	</div>

	<div id="main_content" class="main_home">
	<div id="navigation_pane">
		<h2>Topics</h2>
		<form method="post" id="add_topic">
			<textarea name="add_topic_name" type="text" id="text_area_add_topic"></textarea>
			<input type="submit" name="add_topic">
		</form>
		<ul>
			<li id="gp_topic"><a onclick="open_topic('gp_topic')">GP</a></li>
			<li id="brp_topic"><a onclick="open_topic('brp_topic')">BRP</a></li>
			<?php
			display_categories();
			?>
		</ul>
	</div>
	<div id="current_content">
		<div id="basic_content">
			<h3>Pick a topic</h3>
		</div>
		
		<div id="gp_topic_content" style="display:none;" class="forum chat">
			<form method="post"> 
				<input type="hidden" name="rand_check_gp" value="<?php echo $rand;   ?>">
				<label for="text_box">Add a post to the chat:</label>
				<textarea name="text_box" type="text" id="text_box"></textarea>
				<input type="submit" name="add_chat_topic_gp" value="Submit post">
			</form>
			<div class="forum_section chat_section">
			<?php
			echo get_topic("gp_topic");
			?>
			</div>
		</div>
		<div id="brp_topic_content" style="display:none;" class="forum chat">
			<form method="post">
				<label for="text_box">Add a post to the chat:</label>
				<textarea name="text_box" type="text" id="text_box"></textarea>
				<input type="submit" name="add_chat_topic_brp" value="Submit post">
			</form>
			<div class="forum_section">
			<?php
			echo get_topic("brp_topic");
			?>
			</div>
		</div>
	</div>
	</div>
</div>

</body>
</html>
