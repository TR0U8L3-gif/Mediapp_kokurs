<?php
    session_start();
    
    if(!isset($_SESSION['pwdReset'])){
        header('Location: index.php');
        exit();
    }
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
	
</head>

<body>
<script type="text/javascript"> 
var error_login = false; 
var logged = false; 
</script>

	<div id="container">
	
		<div id="menu" class="menu">
			<div id="logo_name">
			Mediapp ⚕
			</div>
			<div id="login" >           
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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/code.js"></script>


</body>
</html>
