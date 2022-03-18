<?php

// use snake_case so hello_world not helloWorld

// --------- Commonly used functions ---------

$_POST[""]; or $_GET[""]; // post or get arrays contain the names of the inputs/buttons when a form is submitted
$_SESSION[""]; // session variables are used when a user is meant to be 'logged in' to a page.

trim(str); // removes whitespace from around a variable "   hello " becomes "hello"
preg_match(pattern, subject); // used for pattern matching using regex, pattern is the regex we studied, subject is the variable
filter_var(variable); // used to validate emails, use FILTER_VALIDATE_EMAIL as second parameter
empty(var); // checks if a string/array etc is empty
isset(var); // checks if a variable is set
header("Location: <name of file>"); // this redirects the user to the file name
password_hash(string, PASSWORD_DEFAULT); // hashes the string via the default password hash func

// syntax for if statements
if (<condition>) {

} else if (<condition2>) {

} else {

}

// --------------------- how to access the db ---------------------
// ABSOLUTELY NECESSARY
require("config.php");
// please go into this config file and put your own details in this, it will be a common cause of SQL errors if it says details are incorrect its this file
$pdo = new PDO("mysql:host=$host;dbname=" . $db_name . "", $username_db, $password); 
// create a new DPO instance, of mysql type and put in the details from the config file, just copy this line over
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
// any errors that occur will be output, rather than nothing occuring on your page, so set this.
// next you need an SQL statement which will be in the form of:
$sql = "INSERT INTO <table_name> (<fields>) VALUES (<values to put into these fields, IN THE SAME ORDER)";
$sql = "UPDATE <table_name> SET <field> = <new value> WHERE <condition that needs to be met>";
$sql = "SELECT <fields> FROM <table_name> WHERE <condition that needs to be met>";
// a full example is here:
$sql = "UPDATE user_info SET name = :value WHERE user_id = :user_id";
// when you are using any values in which the user will add, please dont place the variable in, instead use the colon syntax
// these are called prepared statements
$stmt = $pdo->prepare($sql); 
// these variables can be called anything but make sure the $pdo variable is the same as the variable you made above when you made a new PDO
// and have the $sql to be the same as the varaible which is storing your sql statement
$stmt->execute(['name' => $value, 'user_id' => $user_id]);
// this executes the SQL statement and places the vlaues into the indexes
// this should have now executed your sql statement

// --------------------- session varaibles ---------------------
$_SESSION[""]; // this gets a certain index of the session array
session_start(); // this "starts" a new session, which basically means the user is logged in
$_SESSION["username"] = "will asbery"; // this sets the username index as will asbery

// sessions are useful for transferring data from across pages, say if the user logs in on the index page, and you want to access this 
// from the homepage, you can just session_Start() on the homepage and it will save the indexes so you can preserve the username
// this allows users to transfer between pages and remain under the illusion of being logged in.asa

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<!-- LINK THE EXTERNAL STYLE SHEET !-->
	<link rel="stylesheet" type="text/css" href="styling/styling.css">
	<!-- LINK TO THE EXTERNAL JS FILE !-->
	<script type="text/javascript" src="js/script.js"></script>
	<!-- THESE THREE LINES JUST GET THE FONT WE USE !-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div>
		<form method="post"> <!-- set the method as post as we want to encrpyt the data sent as it is sensitive data, i.e. passwords !--> 
			<label for="<name of the input>, so if i wanted it to be for the input below it would be 'text'"></label>
			<input type="text" name="text_input"> <!-- you dont need a closing tag for inputs !-->
			<input type="password" name="password_input"> <!-- input type password just covers **** every input !-->
			<input type="submit" name="submit_button"> <!-- this button is used for submitting the form !-->
		</form>
		<!-- with this form above, we can check if the form has been sent with the following: !-->
		
		<?php
		// this line looks at the post array, finds the index of submit button which is the same as the input above and then checks if it is set
		// so if the button is pressed, it will set the submit_button index of the $_POST array, so this if statement will be true
		if (isset($_POST["submit_button"])) {
			// this next line will get the password_input input and place it in the password variable
			// the name of the input is what is the index of the post array.
			$password = $_POST["password_input"]; 
		}

		?>
	</div>


</body>
</html>