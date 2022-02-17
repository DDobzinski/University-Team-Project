<!-- 
The home page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

session_start();

require("config.php");

if (!isset($_SESSION["logged_in"])) {
	header("index.php");
}

if (isset($_POST["logout_button"])) {
	$_SESSION = array();
	session_destroy();
	header("location: index_page.php");
} 

if (isset($_POST["add_forum_post_gp"])) {
	if (!empty($_POST["text_box"])) {
		$log_date = date("d/m/Y H:i");

		$add_forum_post = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
		$add_forum_post->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$sql_add_forum_post = "INSERT INTO chat_log (user_id, category, username, text_content) VALUES (:user_id, :category, :username, :text_content)";

		$stmt_add_forum_post = $add_forum_post->prepare($sql_add_forum_post);
		$stmt_add_forum_post->execute([
			'user_id' => $_SESSION["user_id"],
			'category'=> "gp",
			'username' => $_SESSION["username"],
			'text_content' => trim($_POST["text_box"])
		]);
	} else if (empty($_POST["text_box"])) {
		echo "No empty text box";
	}
}


function get_gp_forum() {
	global $host, $username_db, $password, $db_name;

	$pdo_get_gp_forum = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_gp_forum->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_gp_forum = "SELECT username, log_date, text_content FROM chat_log WHERE category = :category";
	$stmt_get_gp_forum = $pdo_get_gp_forum->prepare($sql_get_gp_forum);
	$stmt_get_gp_forum->execute(['category' => 'gp']);

	$stmt_get_gp_forum->setFetchMode(PDO::FETCH_ASSOC);

	$data = $stmt_get_gp_forum->fetchAll();

	$forum_posts = "";

	foreach ($data as $row) {
		$username_from_db = $row["username"];
		$log_date_from_db = $row["log_date"];
		$text_content_from_db = $row["text_content"];

		// 2022-02-16 21:35:11
		$log_time = substr($log_date_from_db, 11, 5);
		$log_date = substr($log_date_from_db, 5, 2) ."/". substr($log_date_from_db, 8, 2) ."/". substr($log_date_from_db, 2, 2);

		$html_forum_box = "
		<div class='forum_box'>
			<div class='forum_box_details'> 
				<h3>$username_from_db</h3>
				<p>&nbsp@ $log_time</p>
				<p class='date'>$log_date</p>
			</div>
			<p class='text_content'>$text_content_from_db</p>
		</div>";

		$forum_posts .= $html_forum_box;
	}

	return $forum_posts;
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
<body onload="open_content('gp_signup');">
	<div id="main">
		<div id="navbar">
			<form method="post" id="logout_form">
				<input id="logout_button" type="submit" name="logout_button" value="Logout">
			</form>
			<a id="profile_page_link" href="profile_page.php">Go to profile</a>
		</div>

		<div id="main_content" class="main_home">
			<div id="navigation_pane">
				<ul>
					<li id="gp_signup" style="margin-top: 6em;">
						<a onclick="open_content('gp_signup')">
							Sign up for GP
						</a>
					</li>
					<li id="bank_signup">
						<a onclick="open_content('bank_signup')">
							Sign up for a UK bank account
						</a>
					</li>
					<li id="find_accommodation">
						<a onclick="open_content('find_accommodation')">
							Find your accommodation
						</a>
					</li>
					<li id="BRP_card_collection">
						<a onclick="open_content('BRP_card_collection')">
							Collect your BRP card
						</a>
					</li>
					<li id="student_id">
						<a onclick="open_content('student_id')">
							Collect your student ID
						</a>
					</li>
				</ul>
			</div>

			<div id="current_content">
				<div id="completion_section">
					<h2>Completion rate:</h2>
					<div id="completion_bar">

					</div>
				</div>

				<div id="gp_signup_content" class="info" style="display:none;">
					<h2>Sign up for a GP</h2>
					<!--<hr align="center" class="divider">!-->
					<div id="gp_forum" class="forum">
						<h2>Forum</h2>
						<form method="post">
							<label for="text_box">Add a post to the forum:</label>
							<textarea name="text_box" type="text" id="text_box"></textarea>
							<input type="submit" name="add_forum_post_gp" value="Submit post">
						</form>
						<h3 class="forum_h3">See what others are saying:</h3>
						<div class="forum_section">
							<?php 
							echo get_gp_forum();
							?>
						</div>						
					</div>
				</div>

				<div id="bank_signup_content" class="info" style="display:none;">
					<h2>Sign up for a UK bank account</h2>
				</div>

				<div id="find_accommodation_content" class="info" style="display:none;">
					<h2>Find your accommodation</h2>
				</div>

				<div id="BRP_card_collection_content" class="info" style="display:none;">
					<h2>Collect your BRP card</h2>
				</div>

				<div id="student_id_content" class="info" style="display:none;">
					<h2>Collect your student ID</h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>