<!-- 
The profile page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

session_start();

require("config.php");

// if (!isset($_SESSION["logged_in"])) {
// 	header("Location: index_page.php");
// } else {
// }

// get all the information on the user
require("php/profile_page_init.php");
require("php/profile_page_update_info.php");	

if (isset($_POST["logout_button"])) {
	$_SESSION = array();
	session_destroy();
	header("location: index_page.php");
}

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
			<!-- button array -->
			<!-- homepage link !-->
			<a id="homepage_link" href="homepage.php">Homepage</a>
			<!-- logout button !-->
			<form method="post" id="logout_form">
				<input id="logout_button" type="submit" name="logout_button" value="Logout">
			</form>
		</div>

		<div id="main_content">
			<form method="post" id="change_profile_form">
				<div class="child">
					<?php 
					if (isset($email_address_error)) {
						echo "<label for='email_address' class='profile_page_error'>Invalid email address.</label><br>";
					} else {
						echo '<label for="email_address">Email:</label><br>';
					}
					?>
					<input name="email_address" type="text" value="<?php echo $data['email_address'] ?>"><br>

					<?php 
					if (isset($firstname_error)) {
						echo "<label for='firstname' class='profile_page_error'>Invalid firstname.</label><br>";
					} else {
						echo '<label for="firstname">Firstname:</label><br>';
					}
					?>
					<input name="firstname" type="text" value="<?php echo $data['firstname'] ?>"><br>

					<?php 
					if (isset($lastname_error)) {
						echo "<label for='lastname' class='profile_page_error'>Invalid lastname.</label><br>";
					} else {
						echo '<label for="lastname">Lastname:</label><br>';
					}
					?>
					<input name="lastname" type="text" value="<?php echo $data['lastname'] ?>"><br>

					<?php 
					if (isset($phone_number_error)) {
						echo "<label for='phone_number' class='profile_page_error'>Invalid phone number format.</label><br>";
					} else {
						echo '<label for="phone_number">Phone number:</label><br>';
					}
					?>
					<input name="phone_number" type="text" value="<?php echo $data['phone_number'] ?>"><br>

					<label for="nationality">Nationality:</label><br>
					<!-- This code is taken from https://gist.github.com/didats/8154290 !-->
					<select name="nationality">
						<option value="<?php echo $data['nationality'] ?>" selected>
							<?php 
								if ($data["nationality"] == "") {
									echo "Choose here";
								} else {
									echo ucwords($data["nationality"]);
								} 
							?>
						</option>
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
				</div>
				<div class="child">
					<label for="course">Course:</label><br>
					<select name="course">
						<option value="<?php echo $data['course'] ?>" selected>
							<?php 
								if ($data["course"] == "") {
									echo "Choose here";
								} else {
									echo ucwords($data["course"]);
								} 
							?>
						</option>
					</select><br>
					<input name="hobbies" onclick="toggle_modal('hobbies');" type="button" value="Hobbies" id="hobbies_button"><br>
					<div id="hobbies_modal" class="modal">
						<div class="modal_content modal_animate modal_content_hobbies">
							<p onclick="toggle_modal('hobbies');" class="close" title="login_modal_close">&times;</p>
							<div class="hobbies_child">
								<input name="hobbies_sports" type="button" value="Sports">
								<input name="hobbies_baking" type="button" value="Baking">
								<input name="hobbies_art" type="button" value="Art">
								<input name="hobbies_social" type="button" value="Social">
							</div>
							<div class="hobbies_child">
								<input name="hobbies_music" type="button" value="Music">
								<input name="hobbies_dance" type="button" value="Dance">
								<input name="hobbies_photography" type="button" value="Photography">
								<input name="hobbies_singing" type="button" value="Singing">
							</div>
							<div class="hobbies_child">
								<input name="hobbies_computers" type="button" value="Computers">
								<input name="hobbies_biking" type="button" value="Biking">
								<input name="hobbies_reading" type="button" value="Reading">
								<input name="hobbies_fishing" type="button" value="Fishing">
							</div>
							<div class="hobbies_child">
								<input name="hobbies_traveling" type="button" value="Traveling">
								<input name="hobbies_cars" type="button" value="Cars">
								<input name="hobbies_yoga" type="button" value="Yoga">
								<input name="hobbies_electronics" type="button" value="Electronics">
							</div>
						</div>
					</div>
					<!-- make a modal here !-->
					<label for="accommodation">Accommodation:</label><br>
					<select name="accommodation">
						<option value="<?php echo $data['accommodation'] ?>" selected>
							<?php 
								if ($data["accommodation"] == "") {
									echo "Choose here";
								} else {
									echo ucwords($data["accommodation"]);
								} 
							?>
						</option>
					</select><br>

					<label for="biography">Bio:</label><br>
					<textarea name="biography" type="text" id="biography"><?php echo $data['biography'] ?></textarea><br><br>
					<input type="submit" value="Save Changes" name="save_changes_button" id="save_changes_button">
				</div>
			</form>
		</div>
	</div>
</body>
</html>