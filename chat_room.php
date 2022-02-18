<!-- 
The *insert name of page* page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

require("config.php");

session_start();

if (!isset($_SESSION["logged_in"])) {
	header("Location: index_page.php");
}

function get_topic($category) {
	global $host, $username_db, $password, $db_name;

	$pdo_get_topic = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topic->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_topic = "SELECT username, log_date, text_content FROM chat_log WHERE category = :category";
	$stmt_get_topic = $pdo_get_topic->prepare($sql_get_topic);
	$stmt_get_topic->execute(['category' => $category]);

	$stmt_get_topic->setFetchMode(PDO::FETCH_ASSOC);

	$data = $stmt_get_topic->fetchAll();

	$chat_posts = "";

	foreach ($data as $row) {
		$username_from_db = $row["username"];
		$log_date_from_db = $row["log_date"];
		$text_content_from_db = $row["text_content"];

		// 2022-02-16 21:35:11
		$log_time = substr($log_date_from_db, 11, 5);
		$log_date = substr($log_date_from_db, 5, 2) ."/". substr($log_date_from_db, 8, 2) ."/". substr($log_date_from_db, 2, 2);

		$html_chat_box = "
		<div class='forum_box'>
			<div class='forum_box_details'> 
				<h3>$username_from_db</h3>
				<p>&nbsp@ $log_time</p>
				<p class='date'>$log_date</p>
			</div>
			<p class='text_content'>$text_content_from_db</p>
		</div>";

		$chat_posts .= $html_chat_box;
	}

	return $chat_posts;
}

function add_topic_post($category, $text_content) {
	global $host, $username_db, $password, $db_name;

	$log_date = date("d/m/Y H:i");

	$add_topic_post = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$add_topic_post->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_check_duplicate = "SELECT username, log_date, text_content FROM chat_log WHERE category = :category";

	$sql_add_topic_post = "INSERT INTO chat_log (user_id, category, username, text_content) VALUES (:user_id, :category, :username, :text_content)";

	$stmt_add_topic_post = $add_topic_post->prepare($sql_add_topic_post);
	$stmt_add_topic_post->execute([
		'user_id' => $_SESSION["user_id"],
		'category'=> $category,
		'username' => $_SESSION["username"],
		'text_content' => trim($_POST["text_box"])
	]);
}

if (isset($_POST["add_chat_topic_gp"]) && $_POST['rand_check_gp'] == $_SESSION['rand_check']) {
	if (!empty($_POST["text_box"])) {
		add_topic_post("gp_topic", $_POST["text_box"]);
	} else if (empty($_POST["text_box"])) {
		echo "No empty text box";
	} 
} else if (isset($_POST["add_chat_topic_brp"])) {
	if (!empty($_POST["text_box"])) {
		add_topic_post("brp_topic", $_POST["text_box"]);
	} else if (empty($_POST["text_box"])) {
		echo "No empty text box";
	}
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
		<ul>
			<li id="gp_topic"><a onclick="open_topic('gp_topic')">GP</a></li>
			<li id="brp_topic"><a onclick="open_topic('brp_topic')">BRP</a></li>
		</ul>
	</div>
	<div id="current_content">
		<h3>Pick a topic</h3>
		<div id="gp_topic_content" style="display:none;" class="forum">
			<form method="post"> 
				<?php
				$rand = rand();
				$_SESSION['rand_check']= $rand;

				?>
				<input type="hidden" name="rand_check_gp" value="<?php echo $rand;   ?>">
				<label for="text_box">Add a post to the chat:</label>
				<textarea name="text_box" type="text" id="text_box"></textarea>
				<input type="submit" name="add_chat_topic_gp" value="Submit post">
			</form>
			<div class="forum_section">
			<?php
			echo get_topic("gp_topic");
			?>
			</div>
		</div>
		<div id="brp_topic_content" style="display:none;" class="forum">
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
