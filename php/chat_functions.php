<?php

if(isset($_POST["add_topic"])) {
	$name = str_replace(" ", "_", $_POST["add_topic_name"]) . ":topic";

	if ($name == ":topic") {
		echo "<script>alert('Topic name cannot be empty');</script>";
	} else {
		add_topic($name);
	}
}

function add_topic($topic_name){
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_add_topic = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_add_topic->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_add_topic = "INSERT INTO topics (topic_name) VALUES (:topic_name)";

	$stmt_add_topic = $pdo_add_topic->prepare($sql_add_topic);

	$stmt_add_topic->execute(["topic_name"=>$topic_name]); 
}

function get_topics() {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_topics = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topics->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	$sql_get_topics = "SELECT topic_id, topic_name FROM topics WHERE topic_name LIKE '%:topic'";

	$stmt_get_topic = $pdo_get_topics->prepare($sql_get_topics);

	$stmt_get_topic->execute();

	$data = $stmt_get_topic->fetchAll();
	$topics = array();

	foreach($data as $data_element) {
		$topics[] = array(
			"id" => $data_element["topic_id"],
			"topic" => str_replace(":topic", "", $data_element["topic_name"])
		);		
	}
	return $topics;
}	

function display_topics() {
	$topics = get_topics();
	$html = "";

	for ($i = 0; $i < sizeof($topics); $i++) {
		$topic_name = str_replace("_", " ", $topics[$i]["topic"]);
		$id = $topics[$i]['topic'] . "_topic";
		$list_item = "
		<li id='$id'><a onclick='open_topic(`$id`);'>$topic_name</a></li>
		";

		$html .= $list_item;
	}

	return $html;
}

function display_content_divs() {
	$topics = get_topics();
	$html = "";

	for ($i = 0; $i < sizeof($topics); $i++) {
		$topic_name = str_replace("_", " ", $topics[$i]);
		$content_id = $topics[$i]['topic'] . "_topic_content";
		$form_name = "add_chat_topic_" . $topics[$i]['topic'];
		$topic_get_return = get_topic($topics[$i]["id"]);

		$html .= "
		<div id='$content_id' style='display:none;' class='forum chat'>
			<form method='post'> 
				<label for='text_box'>Add a post to the chat:</label>
				<textarea name='text_box' type='text' id='text_box'></textarea>
				<input type='submit' name='$form_name' value='Submit post'>
			</form>
			<div class='forum_section chat_section'>
				$topic_get_return
			</div>
		</div>";
	}

	return $html;
}

function get_topic_names() {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_topics = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topics->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_topics = "SELECT topic_id FROM chat_log WHERE 1";
	$stmt_get_topics = $pdo_get_topics->prepare($sql_get_topics);
	$stmt_get_topics->execute();

	$data = $stmt_get_topics->fetchAll();
	$topics = array();

	foreach ($data as $data_element) {
		$current_topic = $data_element['topic_id'];

		// if the current topic ends in _topic then it must be a topic
		//		strip _topic
		if (substr($current_topic, -5) == "topic") {

		}


		// else continue

		$trimmed_current_topic = str_replace("_topic", "", $current_topic);

		if (!in_array($trimmed_current_topic, $topics)) {
			if (strlen($data_element['topic_id']) > 5 && substr($data_element['topic_id'], -5) == "topic") {
				$topics[] = $trimmed_current_topic;
			}
		}
	}
	return $topics;
}

// this for loop checks if 
$topics = get_topic_names();

for ($i = 0; $i < sizeof($topics); $i++) {
	$post_val = "add_chat_topic_" . $topics[$i];
	if (isset($_POST[$post_val])) {
		if (!empty($_POST["text_box"])) {
			$topic = $topics[$i] . "_topic";
			add_topic_post($topic, $_POST["text_box"]);
		}
	}
}

//add for loop for adding forum posts
for ($j = 0; $j < sizeof($topics); $j++) {
	$add_val = "add_forum_post_" . $topics[$j];

	if (isset($_POST[$add_val])) {
		if (!empty($_POST["text_box"])) {
			$log_date = date("d/m/Y H:i");

			$add_forum_post = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
			$add_forum_post->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$sql_add_forum_post = "INSERT INTO chat_log (user_id, category, text_content) VALUES (:user_id, :category, :text_content)";

			$stmt_add_forum_post = $add_forum_post->prepare($sql_add_forum_post);
			$stmt_add_forum_post->execute([
				'user_id' => $_SESSION["user_id"],
				'category'=> $topic[$j],
				'text_content' => trim($_POST["text_box"])
			]);
		}
	}
	unset($_POST);
}

// added for loop for adding data to the database on the topics
$topics = get_topics();

for ($k = 0; $k < sizeof($topics); $k++) {
	$add_val_topics = "add_chat_topic_" . $topics[$k]["topic"];

	if (isset($_POST[$add_val_topics])) {
		if (!empty($_POST["text_box"])) {
			add_topic_post($topics[$k]["id"], $_POST["text_box"]);
		}
	}
	unset($_POST);
}

// added for loop for adding replies to the database
for ($l = 0; $l < sizeof($topics); $l++) {
	$add_reply_topics = "add_chat_reply_" . $topics[$l]["topic"];

	if (isset($_POST[$add_reply_topics])) {
		if (!empty($_POST["text_box"])) {
			add_topic_post($topics[$l]["id"], $_POST["text_box"], true, $_POST["chat_id"]);
		}
	}	
	unset($_POST);
}

function get_topic($topic_id) {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_topic = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topic->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_topic = "
		SELECT c.chat_id, c.log_date, c.text_content, c.reply_to, u.username, t.topic_name 
		FROM ((chat_log AS c INNER JOIN topics AS t ON (t.topic_name = t.topic_name)) INNER JOIN user_info AS u ON (u.username = u.username)) 
		WHERE c.topic_id = :topic_id AND t.topic_id = :topic_id AND u.user_id = :user_id ORDER BY log_date ASC";

	$stmt_get_topic = $pdo_get_topic->prepare($sql_get_topic);
	$stmt_get_topic->execute(['topic_id' => $topic_id, 'user_id' => $_SESSION["user_id"]]);

	$stmt_get_topic->setFetchMode(PDO::FETCH_ASSOC);

	$data = $stmt_get_topic->fetchAll();

	$chat_posts = "";

	foreach ($data as $row) {
		$chat_id_from_db = $row["chat_id"];
		$topic_name_from_db = str_replace(":topic", "", $row["topic_name"]);
		$username_from_db = $row["username"];
		$log_date_from_db = $row["log_date"];
		$text_content_from_db = $row["text_content"];
		$reply_val_from_db = $row["reply_to"];

		// 2022-02-16 21:35:11
		$log_time = substr($log_date_from_db, 11, 5);
		$log_date = substr($log_date_from_db, 5, 2) ."/". substr($log_date_from_db, 8, 2) ."/". substr($log_date_from_db, 2, 2);

		$html_chat_box = "<div class='forum_box";

		if (!$reply_val_from_db == null) {
			$html_chat_box .= " reply";
		}

		$html_chat_box .= "' id='chat_box_$chat_id_from_db'>
			<div class='forum_box_details'> 
				<h3>$username_from_db</h3>
				<p>&nbsp@ $log_time</p>
				<p class='date'>$log_date</p>
			</div>
			<p class='text_content'>$text_content_from_db</p>
			<a class='reply_link' onclick='open_reply(`$chat_id_from_db`);'>Reply</a>
		</div>
		<div id='reply_box_$chat_id_from_db' class='reply_box'>
			<form method='post'>
				<input type='hidden' name='chat_id' value='$chat_id_from_db'>
				<input type='hidden' name='rand_check_gp' value='<?php echo $rand;   ?>'>
				<label for='text_box'>Add a reply to this chat:</label>
				<textarea name='text_box' type='text' id='text_box'></textarea>
				<input type='submit' name='add_chat_reply_$topic_name_from_db' value='Submit post'>
			</form>
		</div>";

		$chat_posts .= $html_chat_box;
	}

	return $chat_posts;
}

function add_topic_post($topic, $text_content, $reply = false, $chat_id = null) {
	global $host, $username_db, $password, $db_name;

	$log_date = date("d/m/Y H:i");

	$add_topic_post = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$add_topic_post->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	if ($reply == false && $chat_id == null) {
		$sql_add_topic_post = "INSERT INTO chat_log (user_id, topic_id, text_content) VALUES (:user_id, :topic_id, :text_content)";

		$stmt_add_topic_post = $add_topic_post->prepare($sql_add_topic_post);

		$stmt_add_topic_post->execute([
			'user_id' => $_SESSION["user_id"],
			'topic_id'=> $topic,
			'text_content' => trim($_POST["text_box"])
		]);
	} else {
		$sql_add_topic_post = "INSERT INTO chat_log (user_id, topic_id, text_content, reply_to) VALUES (:user_id, :topic_id, :text_content, :reply_to)";

		$stmt_add_topic_post = $add_topic_post->prepare($sql_add_topic_post);

		$stmt_add_topic_post->execute([
			'user_id' => $_SESSION["user_id"],
			'topic_id'=> $topic,
			'text_content' => trim($_POST["text_box"]),
			'reply_to' => $chat_id
		]);
	}
}

function display_topic_table() {
	global $topics;

	$html = "<table id='topics_table'>";

	foreach ($topics as $topic) {
		$id = $topic["id"];
		$html .= "<tr><td><a onclick='open_topic(`$id`);'>" . str_replace("_", " ", $topic["topic"]) . "</td></tr>";
	}

	$html .= "</table>";

	return $html;
}

?>