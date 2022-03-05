<!-- 
The home page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<?php

session_start();

require("fake_login_init.php"); // used for creating a fake login when all the files are not merged to master - testing purposes
require("config.php");

include("php/homepage_functions.php");

if (!isset($_SESSION["logged_in"])) {
	header("index.php");
}

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
	<link rel="stylesheet" type="text/css" href="styling/merged_styling.css">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<script type="text/javascript" src="js/merged_script.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel>
</head>
<body>
	
	<div id="navbar">
		<form method="post" id="logout_form">
			<input id="logout_button" type="submit" name="logout_button" value="Logout">
		</form>
		<a id="profile_page_link" href="profile_page.php">Go to profile</a>
		<a id="chat_room_link" href="chat_room.php">Chatroom</a>
	</div>
	

	<div id="main">
		<div class="sidebar active">
			<div class="logo_content">
				<div class="logo">
				
					<div class="logo_name">
						<i class='bx bx-menu' id="btn"></i>
					</div>
				</div>
			</div>
					
			<ul id="nav_list">
				<li id="gp"> 
					<a onclick="open_content('gp')">
						<i class='bx bx-clinic'></i>
						<span class="links_GP" alt="GP">GP</span>
					</a> 
					<span class="tooltip">GP</span>
				</li>
				<li id="bank"> 
					<a onclick="open_content('bank')">
						<i class='bx bx-money'></i>
						<span class="links_Bank">Bank</span>
					</a> 
					<span class="tooltip">Bank</span>
				</li>
				<li id="accommodation">
					<a onclick="open_content('accommodation')">
						<i class='bx bx-building-house'></i>
						<span class="links_accom">Accommodation</span>
					</a> 
					<span class="tooltip">Accommodation</span>
				</li>
				<li id="brp"> 
					<a onclick="open_content('brp')">
						<i class='bx bxs-id-card'></i>
						<span class="links_BRP">BRP</span>
					</a> 
					<span class="tooltip">BRP</span>
				</li>
				<li id="police"> 
					<a onclick="open_content('police')">
						<i class='bx bxs-shield'></i>
						<span class="links_name">Police Registration</span>
					</a> 
				<span class="tooltip">Register with the police</span>
				</li>
				<li id="studentid"> 
					<a onclick="open_content('studentid')">
						<i class='bx bxs-credit-card'></i>
						<span class="links_name">Student ID</span>
					</a> 
					<span class="tooltip">Student ID collection</span>
				</li>
				<li id="society"> 
					<a onclick="open_content('society')">
						<i class='bx bxs-group' ></i>
						<span class="links_name">Join Society</span>
					</a> 
					<span class="tooltip"> Join a society</span>
				</li>

				<li id="tour_campus"> 
					<a onclick="open_content('tour_campus')">
						<i class='bx bx-buildings'></i>
						<span class="links_name">Tour Campus</span>
					</a> 
					<span class="tooltip"> Tour Campus</span>
				</li>
				<li id="blackboard_setup"> 
					<a onclick="open_content('blackboard_setup')">
						<i class='bx bxs-book-content'></i>
						<span class="links_name">Blackboard setup</span>
					</a> 
					<span class="tooltip"> Setting up Blackboard</span>
				</li>

				<li id="tuition_fees"> 
					<a onclick="open_content('tuition_fees')">
						<i class='bx bx-money-withdraw'></i>
						<span class="links_name">Tuition Fees</span>
					</a> 
					<span class="tooltip"> Set up payment for tuiton fees</span>
				</li>
			</ul>
		</div>

		<div id="current_content">
			<div id="progress_bar">
				<span>Completion Rate:</span>
				<div class="progress">
					<div class="progress_value">65%</div>
					<div class="progress_fill"></div>
				</div>
			</div>

			<div id="content_gp" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<img src="images/registration-1-1024x684.jpeg" alt="" class="card_img">
					<div class="text_content"> <!-- card content -->
						<h2>Sign up for a General practitioner (GP)</h2>
						<h3>Signing up enables you to access healthcare services. Any healthcare or mentalcare related concerns will be directed to your local GP.  For international students, ensure that you have your Immigration Health Surcharge(IHS) number ready as well as any supporting medical documents. This <a href="https://www.nhs.uk/service-search/find-a-gp">link</a> will help you locate the nearest one to you.</h3>
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('gp')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>

			<div id="content_bank" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<img src="images/Bank-logos-footer-final.png" alt="" class="card_img">
					<div class="text_content"> <!-- card content -->
						<h2>
							Sign up for a UK bank account
						</h2>
						<h3>
							Setting up a bank account allows you to arrange for interest free overdrafts which will be beneficial for your daily expenses. It also helps you manage your spending and budgetting. List below are recommended banks for students with their respective benefits:
						</h3>
						<h4>
							<ul>
								<li>
									<a href="https://www.barclays.co.uk/">Barclays</a><br>
									<p>No hidden charges for student banking<br>
									App provided to keep tabs on spending <br>
									Overdraft of up to £1,500</p> 
								</li>
								<li>
									<a href="https://www.nationwide.co.uk/">Nationwide</a><br>
									<p>No monthly fees to maintain account<br>
									Flexible bank in option via Internet bank or banking app<br>
									Up to £3,000 arranged overdraft limit while you study</p> 
								</li>
								<li>
									<a href="https://www.lloydsbank.com/">Lloyds</a><br>
									<p>Manage subscriptions easily with app provided <br>
									Earn cashbacks up to 15% from selected retailers<br>
									Overdraft of up to £1,500 in Years 1 to 3 and up to £2,000 in years 4 to 6</p>
								</li>
								<li>
									<a href="https://www.hsbc.co.uk/">HSBC</a><br>
									<p>Instant notifications to alert spending activity<br>
								Easy mobile and online banking<br>
									Interest-free overdraft limit of up to £1,000 in your first year, which could rise to £3,000 by year 3</p> 
								</li>
								<li>
									<a href="https://www.santander.co.uk/">Saintanders</a><br>
									<p>A free 4-year Santander 16-25 Railcard to save 1/3 on rail travel in Great Britain<br>
								Earn up to 15% cashback with Retailer Offers<br>
									interest-free arranged overdraft of £1,500 in years 1-3, £1,800 in year 4 and £2,000 if you stay on to year 5</p> 
								</li>
							</ul>
						</h4>
						
						
						<!--<hr align="center" class="divider">!-->
						<div class="card_info">
							<label class="checkbox" for="myCheckboxId">
								<input onclick="in_progress.update_value('bank')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
								Done!
							</label>
						</div>
					</div>
				</div>
			</div>
			<div id="content_accommodation" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h2>Find your accommodation</h2>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h2>Find your accommodation</h2>

						<h3>Student accomodation can be categorised into private student halls and the university's own student halls</h3>

						<h2>
							<b>Student Halls</b>
						</h2>
						<h4>
							The University of Manchester provides over 20 different halls for you to choose from 3 different areas (City Centre, Fallowfield, and Victoria Park). There is a room guaratee for first year undergraduates who have made an application by the 31st August of the year of entry. This 
							<a href="https://www.accommodation.manchester.ac.uk/ouraccommodation/hallsofresidence/">link</a>will take you to the university's official website to filter out your prefered student hall.  
						</h4>

						<h2>
							<b>Private student accomodaton</b>
						</h2>
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value(0)" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_brp" class="info" style="display:none;">
				
			</div>
			<div id="content_police" class="info" style="display:none;">
				
			</div>
			<div id="content_studentid" class="info" style="display:none;">
				
			</div>
			<div id="content_society" class="info" style="display:none;">
				asd
			</div>
			<div id="content_tour_campus" class="info" style="display:none;">
				
			</div>
			<div id="content_blackboard_setup" class="info" style="display:none;">
				
			</div>
			<div id="content_tuition_fees" class="info" style="display:none;">
				asd
			</div>
		</div>
	</div>
</body>
</html>