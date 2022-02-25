<?php

get_categories();

if(isset($_POST["add_topic"])) {
	$name = str_replace(" ", "_", $_POST["add_topic_name"]) . ":topic";
	add_category($name);
}
function add_category($category_name){
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_add_category = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_add_category->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_add_category = "INSERT INTO categories (category_name) VALUES (:category_name)";

	$stmt_add_category = $pdo_add_category->prepare($sql_add_category);

	$stmt_add_category->execute(["category_name"=>$category_name]); 

}

function get_categories() {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_categories = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_categories->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	$sql_get_categories = "SELECT category_name FROM categories WHERE category_name LIKE '%:topic'";

	$stmt_get_category = $pdo_get_categories->prepare($sql_get_categories);

	$stmt_get_category->execute();

	$data = $stmt_get_category->fetchAll();
	$categories = array();

	foreach($data as $data_element){
		$categories[] = str_replace(":topic", "", $data_element["category_name"]);		
	}

	return $categories;
}	

function display_topics() {
	$topics = get_categories();
	var_dump($topics);
}

function get_topic_names() {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_topics = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topics->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_topics = "SELECT category_id FROM chat_log WHERE 1";
	$stmt_get_topics = $pdo_get_topics->prepare($sql_get_topics);
	$stmt_get_topics->execute();

	$data = $stmt_get_topics->fetchAll();
	$topics = array();

	foreach ($data as $data_element) {
		$current_topic = $data_element['category_id'];

		// if the current topic ends in _topic then it must be a topic
		//		strip _topic
		if (substr($current_topic, -5) == "topic") {

		}


		// else continue

		$trimmed_current_topic = str_replace("_topic", "", $current_topic);

		if (!in_array($trimmed_current_topic, $topics)) {
			if (strlen($data_element['category']) > 5 && substr($data_element['category'], -5) == "topic") {
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

			$sql_add_forum_post = "INSERT INTO chat_log (user_id, category, username, text_content) VALUES (:user_id, :category, :username, :text_content)";

			$stmt_add_forum_post = $add_forum_post->prepare($sql_add_forum_post);
			$stmt_add_forum_post->execute([
				'user_id' => $_SESSION["user_id"],
				'category'=> $topic[$j],
				'username' => $_SESSION["username"],
				'text_content' => trim($_POST["text_box"])
			]);
		}
	}
}

function buildTree(array $elements, $parentId = null) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['reply_to'] == $parentId) {
            $children = buildTree($elements, $element['chat_id']);
            if ($children) {
                $element['children'] = $children;
            }

            $branch = $element;
            // $branch = array([
            // 	'chat_id' => $element['chat_id'],
            // 	'username' => $element['username'], 
            // 	'text_content' => $element['text_content'], 
            // 	'reply_to' => $element['reply_to'],

            // ]);
        }
    }

    return $branch;
}

function get_topic($category) {
	global $host, $username_db, $password, $db_name, $rand;

	$pdo_get_topic = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$pdo_get_topic->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$sql_get_topic = "SELECT chat_id, username, log_date, text_content, reply_to FROM chat_log WHERE category = :category ORDER BY log_date ASC";
	$stmt_get_topic = $pdo_get_topic->prepare($sql_get_topic);
	$stmt_get_topic->execute(['category' => $category]);

	$stmt_get_topic->setFetchMode(PDO::FETCH_ASSOC);

	$data = $stmt_get_topic->fetchAll();

	$tree = buildTree($data);

	// print_r($tree);
	var_dump($tree);

	// $parents = array();
	// $replies = array();

	// foreach ($data as $row) {
	// 	$chat_id = $row["chat_id"];
	// 	// $username = $row["username"];
	// 	// $log_date = $row["log_date"];
	// 	// $text_content = $row["text_content"];
	// 	$reply_val = $row["reply_to"];

	// 	if ($reply_val == null) {
	// 		$replies[$reply_val] = $chat_id;
	// 	} else {
	// 		$replies[$reply_val][] = $chat_id;
	// 	}
	// }

	// print_r($replies);

	foreach ($data as $row) {
		$chat_id_from_db = $row["chat_id"];
		$username_from_db = $row["username"];
		$log_date_from_db = $row["log_date"];
		$text_content_from_db = $row["text_content"];
		$reply_val_from_db = $row["reply_to"];

		// 2022-02-16 21:35:11
		$log_time = substr($log_date_from_db, 11, 5);
		$log_date = substr($log_date_from_db, 5, 2) ."/". substr($log_date_from_db, 8, 2) ."/". substr($log_date_from_db, 2, 2);

		$html_chat_box = "
		<div class='forum_box' id='chat_box_$chat_id_from_db'>
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
				<input type='submit' name='add_chat_reply_gp' value='Submit post'>
			</form>
		</div>";

		$chat_posts .= $html_chat_box;
	}

	return $chat_posts;
}

function add_topic_post($category, $text_content, $reply = false, $chat_id = null) {
	global $host, $username_db, $password, $db_name;

	$log_date = date("d/m/Y H:i");

	$add_topic_post = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);
	$add_topic_post->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	if ($reply == false && $chat_id == null) {
		$sql_add_topic_post = "INSERT INTO chat_log (user_id, category, username, text_content) VALUES (:user_id, :category, :username, :text_content)";

		$stmt_add_topic_post = $add_topic_post->prepare($sql_add_topic_post);

		$stmt_add_topic_post->execute([
			'user_id' => $_SESSION["user_id"],
			'category'=> $category,
			'username' => $_SESSION["username"],
			'text_content' => trim($_POST["text_box"])
		]);
	} else {
		$sql_add_topic_post = "INSERT INTO chat_log (user_id, category, username, text_content, reply_to) VALUES (:user_id, :category, :username, :text_content, :reply_to)";

		$stmt_add_topic_post = $add_topic_post->prepare($sql_add_topic_post);

		$stmt_add_topic_post->execute([
			'user_id' => $_SESSION["user_id"],
			'category'=> $category,
			'username' => $_SESSION["username"],
			'text_content' => trim($_POST["text_box"]),
			'reply_to' => $chat_id
		]);
	}
}

?>