<?php

session_start();

$host = "localhost"; // change when using ;
$username_db = "master";
$password = "root";
$db_name = "2021_comp10120_z7";

if (!isset($_SESSION["logged_in"])) {
	header("index.php");
}

if (isset($_POST["logout_button"])) {
	$_SESSION = array();
	session_destroy();
	header("location: index_page.php");
}

function get_gp_forum() {
	global $host, $username_db, $password, $db_name;

	$pdo_get_gp_forum = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_gp_forum->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_gp_forum = "SELECT username, log_date, text_content FROM chat_log WHERE category = :category";
	$stmt_get_gp_forum = $pdo_get_gp_forum->prepare($sql_get_gp_forum);
	$stmt_get_gp_forum->execute(['category' => 'gp']);

	$stmt_get_gp_forum->setFetchMode(PDO::FETCH_ASSOC);

	if ($row = $stmt_get_gp_forum->fetch()) {
		return "results";
	} else {
		return "no results";
	}
}

?>

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
					<hr align="center" class="divider">
					<div id="gp_forum">
						<h3>See what others are saying</h3>
						<?php 
						if (get_gp_forum() == "") {
							echo "<p>There are no posts yet on this forum, would you like to add one?</p>";
						}
						?>

						<form method="post">
							<label for="text_box">Add a post to the forum:</label>
							<textarea name="text_box" type="text" id="text_box"></textarea>
							<input type="submit" name="add_forum_post" value="Submit post">
						</form>
						
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