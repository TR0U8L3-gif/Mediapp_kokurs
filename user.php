<?php
    session_start();
    
    if(!isset($_SESSION['logged'])){
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
<?php
	if(isset($_SESSION['logged'])&&$_SESSION['logged']=="true"){
		echo '<script type="text/javascript">
		logged = true;
		</script>';	
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
			<div id="login" >
            
            <p title="Logout" style="margin:0px;"><a  href="logout.php">
			<img src="img/home.png" class="login_icon">
            </a></p>
			</div>
		</div>
		
		<nav id="mySidenav" class="sidenav">
			
			<a href="#User">User info</a>
			<a href="#footer">Contact</a>
		</nav>
        
	    <nav id="mySidelog" class="sidelog">
		</nav>

	    <div id="content">	
            <div id="User" class="test">
            <?php
            echo "<p>".$_SESSION['name']." ".$_SESSION['surname']."</p>";
            echo "<p>e-mail: ".$_SESSION['email']."</p>";
            if($_SESSION['admin']>0){
            echo "<p>You are the administrator of this website</p>";
            }
            ?>
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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/code.js"></script>


</body>
</html>
