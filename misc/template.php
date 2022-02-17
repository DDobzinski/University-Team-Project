<!-- 
The *insert name of page* page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

// most files will require this line for database access
// require("config.php")
// some files will require
// session_start() 
// if the user needs to be logged in
$date = "2022-02-16 21:35:11";

$date_year = substr($date, 2, 2);
$date_month = substr($date, 5, 2);
$date_day = substr($date, 8, 2);
$date_time = substr($date, 11, 5);

echo substr($date, 5, 2) ."-". substr($date, 8, 2) ."-". substr($date, 2, 2) . " ". substr($date, 11, 5);;

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
	
	</div>

	<div id="main_content">
	
	</div>
</div>

</body>
</html>