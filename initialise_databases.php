<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "dbhost.cs.man.ac.uk";
$username_db = "m17832wa";
$password = "rootroot";
$db_name = "2021_comp10120_z7";

function add_user($host, $username_db, $password, $db_name) {
	$username = "WillAsbery";
	$firstname = "Will";
	$lastname = "Asbery";
	$h_password = "unhashedpassword";
	$email_address = "WillAsbery@gmail.com";

	$sql = "INSERT INTO `user_info` (username, firstname, lastname, hashed_password, email_address) VALUES (:username, :firstname, :lastname, :hashed_password, :email_address)";

	$pdo = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password);

	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'username' => $username,
		'firstname' => $firstname,
		'lastname' => $lastname,
		'hashed_password' => $h_password,
		'email_address' => $email_address
	]);
}

add_user($host, $username_db, $password, $db_name);

?>