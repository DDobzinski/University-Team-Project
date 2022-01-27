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
		</div>

		<div id="main_content">
		</div>
	</div>

</body>
</html>