<?php

$hobbies_array = [
	"1" => "sports",
	"4" => "electronics",
	"6" => "dogs",
	"5" => "hello"
];

$hobbies_user = "1,4,6,5";

$hobbies_user = explode(",", $hobbies_user);

foreach ($hobbies_user as $hobby) {
	$hobby_name = $hobbies_array[$hobby];
	echo $hobby_name;
}


?>