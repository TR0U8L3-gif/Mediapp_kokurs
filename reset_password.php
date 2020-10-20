<?php
session_start();
if(!isset($_POST['pwd'])){
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
            
                $selector = $_POST['selector'];
                $validator = $_POST['validator'];
                $pwd = $_POST['pwd'];

                $currentDate = date("U");

                require_once "connect.php";

                $connect = @new mysqli($host,$db_user,$db_password,$db_name);

                if($connect->connect_errno!=0){
                    echo"Error".$connect->connect_errno."Description:".$connect->connect_error;
                }
                else{

                    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";

                    $stmt = mysqli_stmt_init($connect);

                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
                            mysqli_stmt_execute($stmt);      
                            
                            $result = mysqli_stmt_get_result($stmt);
                            if(!$row = mysqli_fetch_assoc($result)){
                                echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                exit();  
                            }
                            else{
                            $tokenBin = hex2bin($validator);
                            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
                            
                            if($tokenCheck === false){
                                echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                exit();   
                            }
                            else if($tokenCheck === true){
                                $tokenEmail = $row['pwdResetEmail'];

                                $sql="SELECT * FROM users WHERE email=?;";

                                $stmt = mysqli_stmt_init($connect);

                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                    echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                    exit();   
                                }
                                else{
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    if(!$row = mysqli_fetch_assoc($result)){
                                        echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                        exit();    
                                    }
                                    else{
                                    $sql = "UPDATE users SET password=? WHERE email=?";
                                    $stmt = mysqli_stmt_init($connect);

                                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                            echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                            exit();   
                                        }
                                        else{
                                            $password_hash = password_hash($pwd, PASSWORD_DEFAULT);
                                            mysqli_stmt_bind_param($stmt, "ss", $password_hash, $tokenEmail);
                                            mysqli_stmt_execute($stmt); 

                                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                            $stmt = mysqli_stmt_init($connect);

                                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                                echo '<div class="info"> <div class="wrong";> There was a fatal error! </div> Please try again later to reset the password  </div>';
                                                exit();   
                                            }
                                            else{
                                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                                mysqli_stmt_execute($stmt); 
                                                echo '<div class="info"> <div class="right";> Wonderful, You made it! </div> Your password has been changed  </div>';
                                                $connect->close();
                                            }  
                                        }
                                    }
                                }
                            }
                        }
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
