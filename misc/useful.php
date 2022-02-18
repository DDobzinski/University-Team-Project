<?php

require("../config.php");

function clean_input($input) {
	$cleaned_input = trim($input);
	$cleaned_input = htmlspecialchars($input);

	if (empty($input)) {
		return false;
	} else {
		return $cleaned_input;
	}
}

function validate_email($input) {
	if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
		return false;
	} else {
		return true;
	}
}

function validate_username($input) {
	$regex_username = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/";

	if (!preg_match($input, $regex_username)) {
		return false;
	} else {
		return true;
	}
}

function validate_names($input) {
	$regex_name = "/^[a-zA-Z]+$/";

	if (!preg_match($regex_name, $input)) {
		return false;
	} else {
		return true;
	}
}

function validate_phone_number($input) {
	$regex_phone_numbers = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im";

	if (!preg_match($regex_phone_numbers, $input)) {
		return false;
	} else {
		return true;
	}					
}

function get_data($sql_command) {
	global $host, $username_db, $password, $db_name;
	
	$pdo = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	$stmt = $pdo->prepare($sql_command);

	return $stmt;
}

?>