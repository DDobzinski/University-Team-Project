<!-- 
The home page of our first year group project from tutorial group Z7
Coded by: Amy Leigh-Hyer, Daniel Dobzinski, Euan Liew, Frenciel Anggi, Sarah Almuhaythif, Will Asbery, and Yuyao Chen 
!-->

<!-- <?php

session_start();

// require("fake_login_init.php"); // used for creating a fake login when all the files are not merged to master - testing purposes
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

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>linkuni</title>
	<link rel="stylesheet" type="text/css" href="styling/master.css">
	<link rel="stylesheet" type="text/css" href="styling/homepage.css">
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
					<span class="tooltip">General Practitioner</span>
				</li>
				<li id="bank"> 
					<a onclick="open_content('bank')">
						<i class='bx bx-money'></i>
						<span class="links_Bank">Bank</span>
					</a> 
					<span class="tooltip">Sign up for UK Bank</span>
				</li>
				<li id="accommodation">
					<a onclick="open_content('accommodation')">
						<i class='bx bx-building-house'></i>
						<span class="links_accom">Accommodation</span>
					</a> 
					<span class="tooltip">Find Accommodation</span>
				</li>
				<li id="brp"> 
					<a onclick="open_content('brp')">
						<i class='bx bxs-id-card'></i>
						<span class="links_BRP">BRP</span>
					</a> 
					<span class="tooltip">Collect BRP</span>
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
					<span class="tooltip">Join a society</span>
				</li>

				<li id="tour_campus"> 
					<a onclick="open_content('tour_campus')">
						<i class='bx bx-buildings'></i>
						<span class="links_name">Tour Campus</span>
					</a> 
					<span class="tooltip">Tour Campus</span>
				</li>
				<li id="blackboard_setup"> 
					<a onclick="open_content('blackboard_setup')">
						<i class='bx bxs-book-content'></i>
						<span class="links_name">Blackboard setup</span>
					</a> 
					<span class="tooltip">Setting up Blackboard</span>
				</li>

				<li id="tuition_fees"> 
					<a onclick="open_content('tuition_fees')">
						<i class='bx bx-money-withdraw'></i>
						<span class="links_name">Tuition Fees</span>
					</a> 
					<span class="tooltip">Set up payment for tuiton fees</span>
				</li>
			</ul>
		</div>

		<div id="current_content">
			<div id="progress_bar">
				<span>Completion Rate:</span>
				<div class="progress">
					<div class="progress_fill">
					<div class="progress_value">65%</div>
					</div>
				</div>
			</div>

			<div id="content_gp" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<div class="text_content"> <!-- card content -->
						<h1>Sign up for a General Practitioner (GP)</h1>
						<img src="images/registration-1-1024x684.jpeg" alt="" class="card_img">
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
					<div class="text_content"> <!-- card content -->
						<h1>
							Sign up for a UK bank account
						</h1>
						<img src="images/Bank-logos-footer-final.png" alt="" class="card_img">
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
					<h1>Find your accommodation</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h3>Student accommodation can be categorised into private student halls and the university's own student halls.</h3>
						<h2>
							<b>Student Halls</b>
						</h2>
						<h4>
							The University of Manchester provides over 20 different halls for you to choose from 3 different areas (City Centre, Fallowfield, and Victoria Park). There is a room guarantee for first year undergraduates who have made an application by the 31st August of the year of entry. This 
							<a href="https://www.accommodation.manchester.ac.uk/ouraccommodation/hallsofresidence/">link</a> will take you to the university's official website to filter out your prefered student hall. We recommend first years to apply to university accommodations as you can living here allows 
							you to meet new people easily. 
							<img src="images/uni_hall_map.jpg" alt="" class="card_img">
						</h4>

						<h2>
							<b>Private student accommodations</b>
						</h2>
						<h4>
							There are quite a lot of private accommodation in Manchester ranging from £170 to £250 per week. Private accommodation often charge a higher price than university student halls. However, for this extra cost, you can expect better facilities, private kitchens and a great location in the centre of the city.
							Here are some private accommodations you might be interested in: <br>
							<a href="https://www.vitastudent.com/en">Vita Student</a><br>
							<a href="https://www.unitestudents.com/manchester">Unite Students</a><br>
							<a href="https://www.student.com/en-gb/uk/manchester?sort=price_asc&gclid=Cj0KCQjw29CRBhCUARIsAOboZbKrkf6vu0Sq7J_05lAX2P5MghcCaUnIbHDOZBKwA8-sk3D0bi8f8zIaAi75EALw_wcB">Student.com</a>
						</h4>
						<h3>
							The sooner you apply, the better!
						</h3>
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('accommodation')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_brp" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Collect Your Biometric Residence Permit (BRP) Card</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h3> 
							For students who applied for a Student visa for courses longer than 6 months, the vignette (temporary visa) in your passport will only be valid for 30 or 90 days from the date you stated you will enter the UK. 
							After arriving in the UK, you are required to collect your <u>full</u> visa, which is called Biometric Residence Permit (this will act as your ID card in the UK).
							You can find more information about BRP on the <a href="https://www.gov.uk/biometric-residence-permits">UKVI website</a>. <br><br>
						
							You can collect your BRP from the University of Manchester. In order to do so, you have to enter the Alternative Collection Location (ACL) code during your visa application.  
							The ACL code for the University of Manchester is <b>2HE372</b>.<br><br>

							Make sure this is the address in your application:<br>
							University of Manchester<br>
							Student Services Centre<br>
							Oxford Road<br>
							Manchester<br>
							M13 9PL<br>

							<br> Once your BRP is ready to be collected, you will receive an email to book a time to collect it in the University of Manchester. <br>
							If you require more information, go to UoM site for <a href="https://www.studentsupport.manchester.ac.uk/immigration-and-visas/visas-and-applications/student-visa/brp/">BRP collection</a>.
						</h3>
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('brp')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_police" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Police Registration</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h3>
							Some people need to register with the police after arriving in the UK with a visa.
							<br>
							<br>
						</h3>
						<h2> <b> Who need to register? </b> </h2>
						
						<h4> 
						If you are required to register with the police, it will be stated on your Student visa vignette or BRP Collection letter.<br><br>
						You'll usually need to register if all of the following apply:<br>
						<ul>
							<li> you're 16 or older </li>
							<li> your visa (or permission to stay in the UK) is for longer than 6 months </li>
							<li> your <a href="https://www.gov.uk/register-with-the-police/who-needs-to-register">nationality</a> means you must register </li>
							<li> you're not <a href="https://www.gov.uk/register-with-the-police/who-needs-to-register">exempt</a> </li>
						</ul><br>
						<h2> <b> How to register? </b> </h2>
						<h4>
						In Manchester, register through a secure online registration portal.
						Refer to this <a href="https://www.gmp.police.uk/advice/advice-and-information/ov/registering-overseas-visitor/af2/how-to-register/">link</a> to create an account and book your appointment.
						<br>It costs £34 to register.
							</h4>
						</h3>
						
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('police')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_studentid" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Collect Your Student ID</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h3>
						You will receive a student card once you've completed your registration and arrive in Manchester. 
						This ID will be proof that you are a student of The University of Manchester and you will need it to access buildings in the campus like libraries. You can also use it in some restaurants or shops for student discount. 
						</h3><br>
						<h2> Before Collecting </h2> 
						<h4> You need to upload a photo of you at <a href="https://my.manchester.ac.uk/uPortal/p/my-photo.ctf1/max/render.uP">MyManchester</a> following the guidance of size and style. If not, you can also take a picture just
						before you collect your card. <br>
						You also have to complete all <a href="https://www.welcome.manchester.ac.uk/get-ready/become-a-student/register-as-a-student/ten-steps/">ten steps of registration</a> before your card can be issued.
						</h4><br>
						<h2> Collection </h2> 
						<h4> 
							After completing all steps of registration, you will receive a link through email to book a collection slot to collect your student card. 
						</h4>
						
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('studentid')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_society" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Join Societies!</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						<h3>
							The University of Manchester's <a href="https://manchesterstudentsunion.com">Student's Union</a>, run by students for students, is the biggest in the UK.
							<br><br>
							There are over <a href="https://manchesterstudentsunion.com/activities">400 societies</a> at the Student's Union, it's guaranteed for you to find at least one thing you'll be interested in. 
							And even if you can't find one, you can always start your own society!
							<br><br>
							You can apply for societies through the SU website, or the SU app on <a href="https://apps.apple.com/gb/app/students-union/id1549685999">IOS</a> and <a href="https://play.google.com/store/apps/details?id=com.studentsunionapp&hl=en_GB&gl=US">Android</a>.
							<br><br>
							<b>This is the time to try something new, get involved, develop new skills, meet new people and broaden your connections!</b>
						</h3>
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('society')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_tour_campus" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Tour Campus</h1>
					<img src="images/manchester.jpeg" alt="" class="card_img">
					<div class="text_content"> <!-- card content -->
						<h2> A new place, a new beginning! </h2>
						<h3> 
							Now that you have finally arrived in Manchester, it is time to explore Manchester. But, before that, you might want to explore and tour around 
							the campus of the University of Manchester first. <br> 
							We have over 200 buildings in our city campus placed just right next to the city centre. Places which most frequently visit are Student Union's Building, Alan Gilberts Learning Commons and the Main Library.
							You can either follow your feelings and go to where your heart brings, or download this Visit UOM app on <a href="https://apps.apple.com/gb/app/uom-open-days/id1389829402#?platform=iphone">IOS</a> and <a href="https://play.google.com/store/apps/details?id=com.guidebook.apps.uom.android&hl=en&gl=US">Android</a> for self-guided tour.
						</h3>
						
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('tour_campus')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_blackboard_setup" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Setting Up Blackboard</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						
						
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('blackboard_setup')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
			<div id="content_tuition_fees" class="info" style="display:none;">
				<div class="inside_content"><!-- card -->
					<h1>Collect Your Student ID</h1>
					<!-- <img src="images/registration-1-1024x684.jpeg" alt="" class="card_img"> -->
					<div class="text_content"> <!-- card content -->
						
					</div>
					
					
					<!--<hr align="center" class="divider">!-->
					<div class="card_info">
						<label class="checkbox" for="myCheckboxId">
							<input onclick="in_progress.update_value('tuition_fees')" class="checkbox__input" type="checkbox" name="myCheckboxName" id="myCheckboxId">
							Done!
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>