<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$connection = mysqli_connect("localhost", "master", "root");

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

$user_db = 'CREATE DATABASE users';

if (!mysqli_query($connection, $user_db)) {
	die("failed to create user db");
}

$connection_user = mysqli_connect("localhost", "master", "root", "user");

$user_info_table = "CREATE TABLE user_info (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username CHAR,
	hashed_password CHAR,
	email_address CHAR,
	phone_number CHAR
);";

if (!mysqli_query($connection_user, $user_info_table)) {
	die("Failed to create user_info table");
}



?>