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
	<link rel="stylesheet" href="css/forgot_password.css" />
	
</head>

<body>
	<div id="container">
	   
		<div id="menu" class="menu">
		    <div id="space">           
			</div>
			<div id="logo_name">
			Mediapp ⚕
			</div>
			<div id="login">           
                <p title="Logout" style="margin:0px;"><a  href="logout.php">
                <img src="img/home.png" class="login_icon">
                </a></p>
			</div>
		</div>
		
		<nav id="mySidenav" class="sidenav">
		</nav>
	    <nav id="mySidelog" class="sidelog">
		</nav>

	    <div id="content">	
		<div class="info">
		<?php

			$selector = $_GET["selector"];
			$validator = $_GET["validator"];

			if(empty($selector) || empty($validator)){
				echo '<div class="info"> <div class="wrong";> Something went wrong </div>  Could not validate your request! </div>';
			}
			else{
			if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
		?>
			<form action="reset_password.php" method="post">
				<h3>Reset your password!</h3>
				<?php
				 	if(isset($_SESSION['error_new'])){
						echo $_SESSION['error_new'];
					 	unset($_SESSION['error_new']);;
					}	 
				?>
				<input type="hidden" name="selector" value='<?php echo $selector; ?>'>
				<input type="hidden" name="validator" value='<?php echo $validator; ?>'>
				<input class="login" type="password" name="pwd" placeholder="Enter a new password..." id="password_register" autocomplete="on" onkeyup="checkForSpaces(this)" maxlength="20" required><br>
				<input class="login"type="password" name="pwd_repeat" placeholder="Repeat new password..."  id="confirm_password" autocomplete="on" required><br>
				<input type="submit" value="Reset password" class="submit login"/>
			</form>
		<?php
			}
			else{
				echo '<div class="info"> <div class="wrong";> Something went wrong </div> Your reset password request is invalid! </div>';	
			}
			}
		?>
		</div>
		</div>
	
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/login.js"></script>


</body>
</html>
