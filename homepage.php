<?php

session_start();

if (!isset($_SESSION["logged_in"])) {
	header("index.php");
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
<body>
	<div id="main">
		<div id="navbar">
			<!-- button array -->
			<!-- profile page link -->
			<a id="profile_page_link" href="profile_page.php">Go to profile</a>
		</div>

		<div id="main_content">
			<div id="navigation_pane">
				<ul>
					<li id="gp_signup" style="padding-top: 6em;">
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
							Student ID collection
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
			</div>
		</div>
	</div>

</body>
</html>