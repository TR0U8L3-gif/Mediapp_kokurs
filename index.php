<?php
	session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Konkurs</title>
	<meta name="description" content="Projekt na konkurs" />
	<meta name="keywords" content="Projekt na konkurs" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/covidstyle.css" />
	<link rel="stylesheet" href="css/chatbotstyle.css" />
	<link rel="stylesheet" href="css/blog.css" />
	
</head>

<body>
<script type="text/javascript"> 
var error_login = false; 
var error_register = false; 
var error_reset = false;
var logged = false; 
</script>
<?php
	if(isset($_SESSION['logged'])&&$_SESSION['logged']=="true"){
		echo '<script type="text/javascript">
		logged = true;
		</script>';	
	}
	if(isset($_SESSION['error'])){
		echo '<script type="text/javascript">
		 error_login = true;
		 </script>';
	}
	else if(isset($_SESSION['error_register'])){
		echo '<script type="text/javascript">
		error_login = true;
		 error_register = true;
		 </script>';
	}
	else if(isset($_SESSION['error_reset'])){
		echo '<script type="text/javascript">
		error_login = true;
		error_reset = true;
		 </script>';
	}
	else{
		echo'
		<div id="myModal" class="modal">
			<div class="modal-content">
			<span class="close">&times;</span>
			<div style="margin: 10px; font-size: 25px; font-weight: bold;">COVID-19: 5 THINGS <br>TO KNOW AND DO</div>
			
				<div id="covid_modal">
				</div>
			</div>	  
		</div>';
	}
?>

	<div id="container">
	
		<div id="menu" class="menu">
			<div id="button_menu" type="button" role="button" onclick="change_menu_button()">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
			</div>
			<div id="logo_name">
			Mediapp ⚕
			</div>
			<div id="login" onclick="change_login_button()">
			<img src="img/login.png" class="login_icon" >
			</div>
		</div>
		
		<nav id="mySidenav" class="sidenav">
			
			<a href="#Covid">Covid counter</a>
			<a href="#Assistant" class="big">Mediacal<br> Assistant</a>
			<a href="#Blog" class="big">Blog<br>"Health Upgrade"</a>
			<a href="#footer">Contact</a>
		</nav>
	
	    <div id="content">
			<div id="Covid" id="root" class="test">
				
				<div class="stats">
					<div class="h1">COVID-19 STATS</div>
					<div class="latest-report">
					  <div class="country">
						<div class="name">Loading...</div>
						<div class="change-country">change</div>
						<div class="search-country hide">
						  <div class="search-box">
							<input
							  type="text"
							  id="search-input"
							  placeholder="Search Country..."
							/>
						  </div>
						  <div class="country-list"></div>
						</div>
					  </div>
					  <div class="total-cases">
						<div class="title">Total Cases</div>
						<div class="value">0</div>
						<div class="new-value">+0</div>
					  </div>
					  <div class="recovered">
						<div class="title">Recovered</div>
						<div class="value">0</div>
						<div class="new-value">+0</div>
					  </div>
					  <div class="deaths">
						<div class="title">Deaths</div>
						<div class="value">0</div>
						<div class="new-value">+0</div>
					  </div>
					</div>
					<div class="chart">
					  <canvas id="axes_line_chart"></canvas>
					</div>
				  </div>
			</div>
			<div id="Assistant" class="test">
				<div class="fill">
					<div id="assistant">
						<div id="chat">
							<div id="assistant_info"><div class="h1">It is your personal medical assistant</div><br> You can ask it about anything you want</div> 
								<div class="chatarea-main">
										<div id="chat_out" class="chatarea-outer">
										</div>
								</div> 
							</div>
						<div id="chat_input">
							<button id="mic" class="chat_btn">Click to talk</button>
							<input id="question" class="question" type="text" name="question" placeholder="Ask a question"/>
							<button id="send" class="chat_btn">Send text </button>
						</div>
					</div>
					<div id="commands">
						<div id="commands_info">
								<p><b>Time</b>: &emsp; date, time, day, month, year.
								<br><b>Illneses</b>: &emsp; illneses/diseases -> all illneses assistant know, describe (illnes) -> describes the questioned disease, symptoms (illnes)-> lists symptoms of a given disease, tips for (illnes)-> advises how to prevent the disease.
								<br><b>Help</b>:&emsp; hello, help, your goals.
								<br><b>Other</b>:&emsp; I like you, nice to meet you, love, what is love.
								</p>
						</div>
					</div>
				</div>
			</div>
			<div id="Blog" class="test">
				<h1>Blog: Health Upgrade</h1>
					<div id="blog_content">
						<!---
						<div id="4" class="article">
							<fieldset>
								<legend>
										title
								</legend>
									introduction
								<div id="more4" style="display: none;">
									rest of article
								</div><br>
								<button onclick="readmore(this)" id="read_btn4" class="read_more">Read more</button>
							</fieldset>			
						</div>
						--->
						
						<div id="5" class="article">
							<fieldset>
								<legend>
									Cool ideas to beat the autumn blahs
								</legend>
								The autumn is in their full swing. Days are getting shorter and nights colder – getting even the best of us “down” with the autumn blues. Lack of energy and lack of motivation combined with mild depression are some of the characteristics of the autumn blahs. The season can be challenging for office managers as well who not only have to deal with their employee’s recurrent sick days due to colds and flu’s but a decrease in the staff morale and productivity too. It has also been estimated that around 3 – 6 % of employees suffer from SAD (Seasonal Affective Disorder) which is triggered in the darker autumn months.
								<div id="more6" style="display: none;">
									So what can one do? How can employees fight back the autumn “blahs”? Unfortunately, we can’t just dedicate a few months to constant sleep. We have to get our tasks completed in the autumn months as well. Here, I have rounded up a few tips that will help you embrace the cold months and increase productivity during autumn blahs more effectively – even if you feel like hibernating.
									<br><b>Here are our tips:</b>
									<ul>
										<li>Be Active!</li>
										<li>Eat Healthy And Balanced Diet</li>
										<li>Set goals and reward yourself</li>
										<li>Use time management tools</li>
										<li>Never give up in your actions</li>
										<li>Believe in yourself</li>
										<li>Manifest for an even better day</li>
									</ul>
								</div><br>
								<button onclick="readmore(this)" id="read_btn6" class="read_more">Read more</button>
							</fieldset>			
						</div>
						<div id="4" class="article">
							<fieldset>
								<legend>
								Coronavirus - symptoms
								</legend>
								The course of COVID-19 ranges from asymptomatic or oligosymptomatic forms to severe conditions (e.g. parenchymal pneumonia), causing respiratory failure requiring mechanical ventilation and support in the intensive care unit, turning in extreme cases into critical conditions with multi-organ and systemic symptoms such as:
								<div id="more5" style="display: none;">
								<ul>
									<li>sepsis</li>
									<li>septic shock</li>
									<li>or organ failure syndrome (MODS)</li>
								</ul>	
								Symptomatic COVID-19 may be mild, moderate, or severe. A clinical deterioration with rapidly worsening respiratory failure and systemic symptoms is observed in a proportion of patients after approximately one week.<br><br>
								The mild ( uncomplicated ) form of COVID-19 is like a typical viral infection of the upper respiratory tract:
								<ul>
									<li>with mild fever &lt 38°C </li>
									<li>dry cough</li>
									<li>sore throat</li>
									<li>nasal congestion</li>
									<li>headache</li>
									<li>muscle pain</li>
									<li>weakness and malaise.</li>
								</ul>
								Dyspnoea and symptoms unrelated to the respiratory system (e.g. diarrhea) are not observed.<br><br>
								Form COVID-19 with moderate runs of respiratory symptoms typical of pneumonia: cough and short of breath (accelerated in children), without symptoms of severe pneumonia.<br><br>
								Severe COVID-19 presents as severe pneumonia with high fever (not in all cases!), Shortness of breath, respiratory failure (> 30 breaths / min) and hypoxia, and in children with cyanosis.
								</div><br>
								<button onclick="readmore(this)" id="read_btn5" class="read_more">Read more</button>
							</fieldset>			
						</div>
						<div id="3" class="article">
							<fieldset>
								<legend>
								Coronavirus - How Does It Spread? <br> Tips for when you need to leave the house
								</legend>
								Threatens us coronavirus - as it moves ? Infection occurs via droplets. When you cannot work remotely, remember a few rules - use your own car or bicycle, keep distance from people you pass by, do not stay on the route for too long in one place.
								<div id="more4" style="display: none;"><br><br>In public places, wear a face mask, wash your hands immediately after entering the house, using disinfectants and soap, have handkerchiefs in your pocket. Disinfect packets of ready-made food (cheese, milk, sausages, etc.) that you bring home before putting them in the refrigerator. Change and wash your clothes more often, take your own meals to work in sealed packages. Don't shake hands - say hello with a nod of the head, and when you touch the door handle or buttons on the elevator, use disposable gloves or a tissue and throw it in the bin. Frequently disinfect devices that you use every day - phone, laptop, wash the backpack in high temperature, clean the bag. Do not rub your hands on the face and around the eyes, forget about the habit of licking your finger when opening plastic bags.<br><br>
								During the quarantine period, take care of yourself in all possible ways - eat healthy and varied, wash your hands, air the apartment often. Drink plenty of water, get enough sleep and rest, and stay active. Do not overheat, work on healthy habits - when the pandemic time is over, you will be able to return to your duties normally and in full health.
								</div><br>
								<button onclick="readmore(this)" id="read_btn4" class="read_more">Read more</button>
							</fieldset>			
						</div>
						<div id="2" class="article">
							<fieldset>
								<legend>
									How to eat healthily? <br> Diet in times of plague 
								</legend>
								A properly composed and nutrient-rich diet is the key to our health and a chance to avoid viral and bacterial infections. Quarantine does not help you prepare meals using natural and fresh ingredients. The only solution is to use the offers of local suppliers who are able to deliver the necessary purchases to your door, 
								without going to the store and paying in cash - you protect yourself and the sellers, and at the same time support the business that is struggling to survive during this period.
								<div id="more3" style="display: none;">According to WHO recommendations, during an epidemic, mainly hot meals should be eaten. Subjecting the ingredients to heat treatment kills any viruses that may have settled on the products. Soups, stews, casseroles and oven dishes are recommended. During this time, it is necessary to exclude raw meat, fish and eggs from the diet, and raw vegetables should be replaced with boiled ones. 
									Warm food additionally warms up our body from the inside and prevents it from cooling down. Alcohol consumption should be limited, as it disrupts the mucosal barrier function and paves the way for potential viruses, as well as lowers immunity.<br><br>
									Remember to maintain the proper bacterial flora. Silage will help in this - cucumbers and cabbage, which provide the body with natural probiotics. The diet should include foods rich in B vitamins - whole grain sourdough bread, wholemeal pasta, legumes, vegetables and fruits, containing vitamins C, A and D. 
									Add natural olive oil, healthy fats, eat nuts and delicacies. Try to choose organic meat, dairy and poultry.
								</div><br>
								<button onclick="readmore(this)" id="read_btn3" class="read_more">Read more</button>
							</fieldset>			
						</div>
						<div id="1" class="article">
							<fieldset>
								<legend>
								BRAT Diet: Recovering From an Upset Stomach	
								</legend>
								An upset stomach or diarrhea can leave you feeling miserable. If left untreated, it can lead to exhaustion and dehydration, so it’s important to make sure your body stays nourished.
								<div id="more1" style="display: none;">
								But it can be hard to determine what to eat after throwing up or having diarrhea. A special diet known as the BRAT diet (Bananas, Rice, Applesauce, and Toast) is an effective way to treat both.Path to improved health
								The BRAT diet is a bland food diet recommended for adults and children. The benefits of using the BRAT diet to treat upset stomach and diarrhea include:
								<ul>
								<li>The foods used in the diet make your stools firmer. That’s because the foods are considered “binding” foods. They’re low-fiber, bland, starchy foods.</li>
								<li>The foods help replace nutrients your body needs and has lost due to vomiting and diarrhea. Bananas, for example, are high in the vitamin potassium.
								Bland foods don’t irritate your stomach. After you have diarrhea or vomiting, follow the BRAT diet to help your body ease back into normal eating. This diet also may help ease the nausea and vomiting some women experience during pregnancy.</li>
								</ul>
								You can add other bland foods to the BRAT diet. For example, you can try saltine crackers, plain potatoes, or clear soup broths. Don’t start eating dairy products, sugary, or fatty foods right away. These foods may trigger nausea or lead to more diarrhea.
							   </div><br>
								<button onclick="readmore(this)" id="read_btn1" class="read_more">Read more</button>
							</fieldset>	
						</div>

					</div>
					<div id="blog_pages">
						<div id="page_of_page" class="pages_p">page 1 of 2</div>
						<button onclick="subtractPage()" id="subtractPage" class="pages_btn">Previous page</button>											
						<button onclick="addPage()" id="addPage" class="pages_btn">Next page</button>
					</div>
					<div class="margin"></div>
				</div>
		</div>
		
		<div id="mySidelog" class="sidelog">
			<div class="login_container">
				<form action="login.php" method="post"> 
					<div id="login_box" class="row" style="margin-bottom:10px;">
					  <h2 style="text-align:center; margin:auto; padding:15px 10px 10px 10px; min-width:250px;">Login</h2>						
						<?php
						 if(isset($_SESSION['error'])){
							 echo $_SESSION['error'];
							 unset($_SESSION['error']);;
						 }	 
						?>
						<div class="row">
						<input class="login" type="text" name="username" placeholder="Username" required /> <br>
						<input class="login" type="password" name="password" placeholder="Password" autocomplete="on" required /> <br>		
						<input type="submit" value="Login" class="submit login"/>
						</div>

					</div>
				</form>	

				<form action="register.php" method="post">
					<div id="register_box" class="row" style="margin-bottom:10px;">
					  <h2 style="text-align:center; margin:auto; padding:15px 10px 10px 10px; min-width:250px;">Register</h2>
					  <?php
						 if(isset($_SESSION['error_register'])){
							 echo $_SESSION['error_register'];
							 unset($_SESSION['error_register']);;
						 }	 
						?>
						<input class="login" type="name" name="name" placeholder="Name" id="name" onkeyup="checkForSpaces2(this)" maxlength="15" required /><br>
						<input class="login" type="surname" name="surname" placeholder="Surname" id="surname" onkeyup="checkForSpaces2(this)" maxlength="20" required /><br>
						<input class="login" type="email" name="email"  placeholder="Email" id="email" required/><br>
						<input class="login" type="text" name="nick" placeholder="Username" id="nick" onkeyup="checkForSpaces(this)" maxlength="15" required /><br>
						<input class="login" type="password" name="password_register" placeholder="Password" id="password_register" autocomplete="on" onkeyup="checkForSpaces(this)" maxlength="20" required /><br>	
						<input class="login" type="password" name="confirm_password" placeholder="Confirm password" id="confirm_password" autocomplete="on" required><br>			
						<input type="submit" value="Register" class="submit login" />

					</div>
				</form>	
				
				<form action="forgot_password.php" method="post">
					<div id="forgot_password_box" class="row" style="margin-bottom:10px;">
					  <h2 style="text-align:center; margin:auto; padding:15px 10px 10px 10px; min-width:250px;">Forgot password</h2>
					   <p style="max-width: 280px; margin:0 auto;">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
					   <?php
						 if(isset($_SESSION['error_reset'])){
							 echo $_SESSION['error_reset'];
							 unset($_SESSION['error_reset']);;
						 }	 
						?>
						<input class="login" type="email" name="forgot_email"  placeholder="Email" id="forgot_email" required/><br>				
						<input type="submit" value="Reset password" class="submit login" />
					</div>
				</form>	
				 

				<div class="bottom-container">
						
						<div class="row" >	
							<div id="login_box_b" class="row2" onclick="register()" >				
								<button  class="btn3">Sign up</button>
							</div>
							<div id="register_box_b" class="row2" onclick="login()" >	
								<button class="btn3">Sing in</button>
							</div>
							<div id="forgot_password_box_b" class="row2" onclick="forget_password()" >	
								<button  class="btn3">Forgot password?</button>
							</div>
						</div>
						
				</div>	
			</div>	
		</div>
		
	   
		
		<div id="footer">
			<div>
			e-mail: mediappbot@gmail.com
			<br>
			phone nr: 7769 687 365
			<br><br>
			In case of a serious situation, please call the nearest clinic
			<br>
			&copy;Mediapp 2020
			</div>
		</div>
	
	</div>
	
	 <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI="
      crossorigin="anonymous"
    ></script>
    <script
      language="JavaScript"
      src="http://www.geoplugin.net/javascript.gp"
      type="text/javascript"
	></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/code.js"></script>
	<script src="js/assistant.js" async></script>
	<script src="js/countries.js"></script>
	<script src="js/app.js"></script>
	<script src="js/speechrecognition.js"></script>
	<script src="js/blog.js"></script>
	<script src="js/login.js"></script>

</body>
</html>
