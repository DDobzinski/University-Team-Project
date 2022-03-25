<!-- The main index page of our first year group project from tutorial Group Z7 -->
<!-- Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen -->

<?php

require("config.php");

session_start();

// require("fake_login_init.php");

// if (!isset($_SESSION["logged_in"])) {
// 	header("Location: index_page.php");
// } else {
// 	require("php/find_friends_functions.php");
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/master.css">
	<link rel="stylesheet" type="text/css" href="styling/find_friends.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/find_friends.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body>
	
	<div id="main">
		<div id="navbar">
			<!-- <?php

			// if (isset($_SESSION["logged_in"])) {
			// 	if ($_SESSION["logged_in"] == true) {
			// 		echo '<button id="profile_page_button" onclick="window.location.href = `profile_page.php`;">Go to profile</button>';
			// 	} else {
			// 		echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
			// 	}
			// } else {
			// 	echo '<button id="login_button" onclick="toggle_modal(`login`);">Login</button>';
			// }

			?>-->

		<form method="post" id="logout_form">
			<input id="logout_button" type="submit" name="logout_button" class="navbar_button" value="Logout">
		</form>
		<a class="navbar_button" id="profile_page_link" href="profile_page.php">Go to profile</a>
		<a class="navbar_button" id="chat_room_link" href="chat_room.php">Chatroom</a>
		<a class="navbar_button" id="homepage_link" href="homepage.php">Homepage</a>
		<a class="navbar_button" id="homepage_link" href="find_friends.php">Find Friends</a>
		</div>

		<div id="main_content" align="center">
			<div id="sidebar">
				Search via these categories:
				<ul id="filters">
					<li id="course_filter">
						<h3>Course</h3>
						<select name="course" id="course_selector">
							<option value="none">Do not filter by course</option>
							<option value="accounting">Accounting</option>
							<option value="actuarial Science and Mathematics">Actuarial Science and Mathematics </option>
							<option value="adult Nursing">Adult Nursing </option>
							<option value="aerospace Engineering">Aerospace Engineering</option>
							<option value="american Studies">American Studies </option>
							<option value="anatomical Sciences">Anatomical Sciences</option>
							<option value="ancient History">Ancient History </option>
							<option value="arabic Studies">Arabic Studies </option>
							<option value="archaeology">Archaeology </option>
							<option value="architecture">Architecture</option>
							<option value="art History">Art History</option>
							<option value="biochemistry">Biochemistry</option>
							<option value="biology">Biology</option>
							<option value="biomedical Sciences">Biomedical Sciences</option>
							<option value="biotechnology">Biotechnology</option>
							<option value="cell Biology">Cell Biology</option>
							<option value="chemical Engineering">Chemical Engineering </option>
							<option value="chemistry">Chemistry</option>
							<option value="children's Nursing">Children's Nursing </option>
							<option value="chinese Studies">Chinese Studies </option>
							<option value="civil Engineering">Civil Engineering </option>
							<option value="classical Studies">Classical Studies </option>
							<option value="cognitive Neuroscience and Psychology">Cognitive Neuroscience and Psychology</option>
							<option value="comparative Religion and Social Anthropology">Comparative Religion and Social Anthropology</option>
							<option value="computer Science">Computer Science </option>
							<option value="criminology">Criminology </option>
							<option value="dental Hygiene and Therapy ">Dental Hygiene and Therapy </option>
							<option value="dentistry">Dentistry</option>
							<option value="developmental Biology">Developmental Biology</option>
							<option value="development Studies Econ">Development Studies Econ </option>
							<option value="drama">Drama </option>
							<option value="earth and Planetary Sciences">Earth and Planetary Sciences</option>
							<option value="east Asian Studies">East Asian Studies </option>
							<option value="economics">Economics </option>
							<option value="education">Education </option>
							<option value="educational Psychology">Educational Psychology</option>
							<option value="egyptology">Egyptology </option>
							<option value="electrical, Electronic & Mechatronic Engineerin">Electrical, Electronic & Mechatronic Engineerin</option>g 
							<option value="electronic Engineering ">Electronic Engineering </option>
							<option value="english Language">English Language </option>
							<option value="english Literature">English Literature </option>
							<option value="environmental Management">Environmental Management</option>
							<option value="environmental Science">Environmental Science</option>
							<option value="fashion Buying and Merchandising">Fashion Buying and Merchandising </option>
							<option value="fashion Management">Fashion Management</option>
							<option value="fashion Marketing">Fashion Marketing</option>
							<option value="fashion Technology">Fashion Technology </option>
							<option value="film Studies">Film Studies </option>
							<option value="finance Econ">Finance Econ</option>
							<option value="french Studies">French Studies </option>
							<option value="genetics">Genetics</option>
							<option value="geography">Geography </option>
							<option value="geography">Geography</option>
							<option value="german Studies">German Studies </option>
							<option value="history">History </option>
							<option value="history  of Art">History of Art </option>
							<option value="immunology">Immunology</option>
							<option value="information Technology Management for Business">Information Technology Management for Business</option>
							<option value="international Business, Finance and Economic ">International Business, Finance and Economic </option>
							<option value="international Disaster Management & Humanitaria">International Disaster Management & Humanitaria</option>n Response
							<option value="international Management">International Management </option>
							<option value="law">Law </option>
							<option value="liberal Arts">Liberal Arts </option>
							<option value="life Sciences">Life Sciences</option>
							<option value="linguistics">Linguistics</option>
							<option value="languages">Languages</option>
							<option value="management">Management</option>
							<option value="materials Science and Engineering">Materials Science and Engineering</option>
							<option value="mathematics">Mathematics</option>
							<option value="mechanical Engineering">Mechanical Engineering </option>
							<option value="mechatronic Engineering">Mechatronic Engineering </option>
							<option value="medical Biochemistry">Medical Biochemistry</option>
							<option value="medical Physiology">Medical Physiology</option>
							<option value="medicine">Medicine</option>
							<option value="mental Health Nursing ">Mental Health Nursing </option>
							<option value="microbiology">Microbiology</option>
							<option value="middle Eastern Studies">Middle Eastern Studies </option>
							<option value="modern History and Politics">Modern History and Politics</option>
							<option value="modern History with Economics">Modern History with Economics </option>
							<option value="modern Language and Business & Management">Modern Language and Business & Management </option>
							<option value="molecular Biology">Molecular Biology</option>
							<option value="music">Music </option>
							<option value="music and Drama">Music and Drama </option>
							<option value="neuroscience">Neuroscience</option>
							<option value="optometry">Optometry</option>
							<option value="oral Health Science">Oral Health Science</option>
							<option value="pharmacology">Pharmacology</option>
							<option value="philosophy">Philosophy </option>
							<option value="physics">Physics</option>
							<option value="plant Science">Plant Science</option>
							<option value="politics, Philosophy and Economics">Politics, Philosophy and Economics</option>
							<option value="psychology">Psychology </option>
							<option value="religions, Theology and Ethics">Religions, Theology and Ethics </option>
							<option value="russian Studies">Russian Studies </option>
							<option value="social Anthropology">Social Anthropology</option>
							<option value="sociology">Sociology</option>		
							<option value="speech and Language Therapy">Speech and Language Therapy</option>
							<option value="theological Studies in Philosophy and Ethics">Theological Studies in Philosophy and Ethics</option>
							<option value="zoology">Zoology</option>
						</select>
					</li>

					<li id="accommodation_filter">
						<h3>Accommodation</h3>
						<input type="checkbox" name="ashburne Hall">
						<label for="shburne Hall">Ashburne Hall</label>
						<input type="checkbox" name="brook Hall">
						<label for="brook Hall">Brook Hall</label>
						<input type="checkbox" name="burkhardt House">
						<label for="burkhardt House">Burkhardt House</label>
						<input type="checkbox" name="canterbury Court">
						<label for="canterbury Court">Canterbury Court</label>
						<input type="checkbox" name="dalton-Ellis Hall">
						<label for="dalton-Ellis Hall">Dalton-Ellis Hall</label>
						<input type="checkbox" name="denmark Road">
						<label for="denmark Road">Denmark Road</label>
						<input type="checkbox" name="george Kenyon Hall">
						<label for="george Kenyon Hall">George Kenyon Hall</label>
						<input type="checkbox" name="horniman House">
						<label for="horniman House">Horniman House</label>
						<input type="checkbox" name="hulme Hall">
						<label for="hulme Hall">Hulme Hall</label>
						<input type="checkbox" name="oak House">
						<label for="oak House">Oak House</label>
						<input type="checkbox" name="richmond Park">
						<label for="richmond Park">Richmond Park</label>
						<input type="checkbox" name="rusholme Place">
						<label for="rusholme Place">Rusholme Place</label>
						<input type="checkbox" name="sheavyn House">
						<label for="sheavyn House">Sheavyn House</label>
						<input type="checkbox" name="st Anselm Hall">
						<label for="st Anselm Hall">St Anselm Hall</label>
						<input type="checkbox" name="unsworth Park">
						<label for="unsworth Park">Unsworth Park</label>
						<input type="checkbox" name="uttley House">
						<label for="uttley House">Uttley House</label>
						<input type="checkbox" name="weston Hall">
						<label for="weston Hall">Weston Hall</label>
						<input type="checkbox" name="whitworth Park">
						<label for="whitworth Park">Whitworth Park</label>
						<input type="checkbox" name="wilmslow Park">
						<label for="wilmslow Park">Wilmslow Park</label>
						<input type="checkbox" name="woolton Hall">
						<label for="woolton Hall">Woolton Hall</label>
					</li>
					<li id="hobbies_filter">
						<h3>Hobbies</h3>
						<input type="checkbox" name="hobbies_sports" value='1'>
						<label for="hobbies_sports">Sports</label>
						<input type='checkbox' name='hobbies_baking' value='2'> 
						<label for="hobbies_baking">Baking</label>
						<input type='checkbox' name='hobbies_art' value='3'>
						<label for="hobbies_art">Art</label>
						<input type='checkbox' name='hobbies_gaming' value='4'>
						<label for="hobbies_gaming">Gaming</label>
						<input type='checkbox' name='hobbies_music' value='5'>
						<label for="hobbies_music">Music</label>
						<input type='checkbox' name='hobbies_dance' value='6'>
						<label for="hobbies_dance">Dance</label>
						<input type='checkbox' name='hobbies_photography' value='7'>
						<label for="hobbies_photography">Photography</label>
						<input type='checkbox' name='hobbies_singing' value='8'>
						<label for="hobbies_singing">Singing</label>
						<input type='checkbox' name='hobbies_electronics' value='9'>
						<label for="hobbies_electronics">Electronics</label>
						<input type='checkbox' name='hobbies_biking' value='10'>
						<label for="hobbies_biking">Biking</label>
						<input type='checkbox' name='hobbies_reading' value='11'>
						<label for="hobbies_reading">Reading</label>
						<input type='checkbox' name='hobbies_fishing' value='12'>
						<label for="hobbies_fishing">Fishing</label>
						<input type='checkbox' name='hobbies_traveling' value='13'>
						<label for="hobbies_traveling">Traveling</label>
						<input type='checkbox' name='hobbies_cars' value='14'>
						<label for="hobbies_cars">Cars</label>
						<input type='checkbox' name='hobbies_yoga' value='15'>
						<label for="hobbies_yoga">Yoga</label>
						<input type='checkbox' name='hobbies_hiking' value='16'>
						<label for="hobbies_hiking">Hiking</label>
					</li>

					<li id="nationality_filter">
						<h3>Nationality</h3>
						<select name="nationality_selector" id="nationality_selector">
							<option value="none">Do not filter by nationality</option>
							<option value="afghan">Afghan</option>
							<option value="albanian">Albanian</option>
							<option value="algerian">Algerian</option>
							<option value="american">American</option>
							<option value="andorran">Andorran</option>
							<option value="angolan">Angolan</option>
							<option value="antiguans">Antiguans</option>
							<option value="argentinean">Argentinean</option>
							<option value="armenian">Armenian</option>
							<option value="australian">Australian</option>
							<option value="austrian">Austrian</option>
							<option value="azerbaijani">Azerbaijani</option>
							<option value="bahamian">Bahamian</option>
							<option value="bahraini">Bahraini</option>
							<option value="bangladeshi">Bangladeshi</option>
							<option value="barbadian">Barbadian</option>
							<option value="barbudans">Barbudans</option>
							<option value="batswana">Batswana</option>
							<option value="belarusian">Belarusian</option>
							<option value="belgian">Belgian</option>
							<option value="belizean">Belizean</option>
							<option value="beninese">Beninese</option>
							<option value="bhutanese">Bhutanese</option>
							<option value="bolivian">Bolivian</option>
							<option value="bosnian">Bosnian</option>
							<option value="brazilian">Brazilian</option>
							<option value="british">British</option>
							<option value="bruneian">Bruneian</option>
							<option value="bulgarian">Bulgarian</option>
							<option value="burkinabe">Burkinabe</option>
							<option value="burmese">Burmese</option>
							<option value="burundian">Burundian</option>
							<option value="cambodian">Cambodian</option>
							<option value="cameroonian">Cameroonian</option>
							<option value="canadian">Canadian</option>
							<option value="cape verdean">Cape Verdean</option>
							<option value="central african">Central African</option>
							<option value="chadian">Chadian</option>
							<option value="chilean">Chilean</option>
							<option value="chinese">Chinese</option>
							<option value="colombian">Colombian</option>
							<option value="comoran">Comoran</option>
							<option value="congolese">Congolese</option>
							<option value="costa rican">Costa Rican</option>
							<option value="croatian">Croatian</option>
							<option value="cuban">Cuban</option>
							<option value="cypriot">Cypriot</option>
							<option value="czech">Czech</option>
							<option value="danish">Danish</option>
							<option value="djibouti">Djibouti</option>
							<option value="dominican">Dominican</option>
							<option value="dutch">Dutch</option>
							<option value="east timorese">East Timorese</option>
							<option value="ecuadorean">Ecuadorean</option>
							<option value="egyptian">Egyptian</option>
							<option value="emirian">Emirian</option>
							<option value="equatorial guinean">Equatorial Guinean</option>
							<option value="eritrean">Eritrean</option>
							<option value="estonian">Estonian</option>
							<option value="ethiopian">Ethiopian</option>
							<option value="fijian">Fijian</option>
							<option value="filipino">Filipino</option>
							<option value="finnish">Finnish</option>
							<option value="french">French</option>
							<option value="gabonese">Gabonese</option>
							<option value="gambian">Gambian</option>
							<option value="georgian">Georgian</option>
							<option value="german">German</option>
							<option value="ghanaian">Ghanaian</option>
							<option value="greek">Greek</option>
							<option value="grenadian">Grenadian</option>
							<option value="guatemalan">Guatemalan</option>
							<option value="guinea-bissauan">Guinea-Bissauan</option>
							<option value="guinean">Guinean</option>
							<option value="guyanese">Guyanese</option>
							<option value="haitian">Haitian</option>
							<option value="herzegovinian">Herzegovinian</option>
							<option value="honduran">Honduran</option>
							<option value="hungarian">Hungarian</option>
							<option value="icelander">Icelander</option>
							<option value="indian">Indian</option>
							<option value="indonesian">Indonesian</option>
							<option value="iranian">Iranian</option>
							<option value="iraqi">Iraqi</option>
							<option value="irish">Irish</option>
							<option value="israeli">Israeli</option>
							<option value="italian">Italian</option>
							<option value="ivorian">Ivorian</option>
							<option value="jamaican">Jamaican</option>
							<option value="japanese">Japanese</option>
							<option value="jordanian">Jordanian</option>
							<option value="kazakhstani">Kazakhstani</option>
							<option value="kenyan">Kenyan</option>
							<option value="kittian and nevisian">Kittian and Nevisian</option>
							<option value="kuwaiti">Kuwaiti</option>
							<option value="kyrgyz">Kyrgyz</option>
							<option value="laotian">Laotian</option>
							<option value="latvian">Latvian</option>
							<option value="lebanese">Lebanese</option>
							<option value="liberian">Liberian</option>
							<option value="libyan">Libyan</option>
							<option value="liechtensteiner">Liechtensteiner</option>
							<option value="lithuanian">Lithuanian</option>
							<option value="luxembourger">Luxembourger</option>
							<option value="macedonian">Macedonian</option>
							<option value="malagasy">Malagasy</option>
							<option value="malawian">Malawian</option>
							<option value="malaysian">Malaysian</option>
							<option value="maldivan">Maldivan</option>
							<option value="malian">Malian</option>
							<option value="maltese">Maltese</option>
							<option value="marshallese">Marshallese</option>
							<option value="mauritanian">Mauritanian</option>
							<option value="mauritian">Mauritian</option>
							<option value="mexican">Mexican</option>
							<option value="micronesian">Micronesian</option>
							<option value="moldovan">Moldovan</option>
							<option value="monacan">Monacan</option>
							<option value="mongolian">Mongolian</option>
							<option value="moroccan">Moroccan</option>
							<option value="mosotho">Mosotho</option>
							<option value="motswana">Motswana</option>
							<option value="mozambican">Mozambican</option>
							<option value="namibian">Namibian</option>
							<option value="nauruan">Nauruan</option>
							<option value="nepalese">Nepalese</option>
							<option value="new zealander">New Zealander</option>
							<option value="ni-vanuatu">Ni-Vanuatu</option>
							<option value="nicaraguan">Nicaraguan</option>
							<option value="nigerien">Nigerien</option>
							<option value="north korean">North Korean</option>
							<option value="northern irish">Northern Irish</option>
							<option value="norwegian">Norwegian</option>
							<option value="omani">Omani</option>
							<option value="pakistani">Pakistani</option>
							<option value="palauan">Palauan</option>
							<option value="panamanian">Panamanian</option>
							<option value="papua new guinean">Papua New Guinean</option>
							<option value="paraguayan">Paraguayan</option>
							<option value="peruvian">Peruvian</option>
							<option value="polish">Polish</option>
							<option value="portuguese">Portuguese</option>
							<option value="qatari">Qatari</option>
							<option value="romanian">Romanian</option>
							<option value="russian">Russian</option>
							<option value="rwandan">Rwandan</option>
							<option value="saint lucian">Saint Lucian</option>
							<option value="salvadoran">Salvadoran</option>
							<option value="samoan">Samoan</option>
							<option value="san marinese">San Marinese</option>
							<option value="sao tomean">Sao Tomean</option>
							<option value="saudi">Saudi</option>
							<option value="scottish">Scottish</option>
							<option value="senegalese">Senegalese</option>
							<option value="serbian">Serbian</option>
							<option value="seychellois">Seychellois</option>
							<option value="sierra leonean">Sierra Leonean</option>
							<option value="singaporean">Singaporean</option>
							<option value="slovakian">Slovakian</option>
							<option value="slovenian">Slovenian</option>
							<option value="solomon islander">Solomon Islander</option>
							<option value="somali">Somali</option>
							<option value="south african">South African</option>
							<option value="south korean">South Korean</option>
							<option value="spanish">Spanish</option>
							<option value="sri lankan">Sri Lankan</option>
							<option value="sudanese">Sudanese</option>
							<option value="surinamer">Surinamer</option>
							<option value="swazi">Swazi</option>
							<option value="swedish">Swedish</option>
							<option value="swiss">Swiss</option>
							<option value="syrian">Syrian</option>
							<option value="taiwanese">Taiwanese</option>
							<option value="tajik">Tajik</option>
							<option value="tanzanian">Tanzanian</option>
							<option value="thai">Thai</option>
							<option value="togolese">Togolese</option>
							<option value="tongan">Tongan</option>
							<option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
							<option value="tunisian">Tunisian</option>
							<option value="turkish">Turkish</option>
							<option value="tuvaluan">Tuvaluan</option>
							<option value="ugandan">Ugandan</option>
							<option value="ukrainian">Ukrainian</option>
							<option value="uruguayan">Uruguayan</option>
							<option value="uzbekistani">Uzbekistani</option>
							<option value="venezuelan">Venezuelan</option>
							<option value="vietnamese">Vietnamese</option>
							<option value="welsh">Welsh</option>
							<option value="yemenite">Yemenite</option>
							<option value="zambian">Zambian</option>
							<option value="zimbabwean">Zimbabwean</option>
						</select>
					</li>
				</ul>
			</div>

			<div id="inside_content">
				<h1>This page is dedicated to help you find friends!</h1>
				<div id="user_info">
				</div>
			</div>
		</div>
	</div>

</body>