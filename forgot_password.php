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

            <?php

            require_once 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;


            $mail->isSMTP(); 
            $mail->SMTPAuth = true;    
            $mail->SMTPSecure = 'tls';                         
            $mail->Host = 'smtp.gmail.com';                       
            $mail->Port = 587;                                    
            $mail->isHTML(true);  
            $mail->Username = 'mediappbot@gmail.com';                
            $mail->Password = 'Mediapp_123';  

            session_start();

            if(isset($_POST['forgot_email'])){
                $selector = bin2hex(random_bytes(8));
                $token = random_bytes(32);

                $url = "http://localhost/Mediapp_kokurs/create_new_password.php?selector=".$selector."&validator=".bin2hex($token);

                $expires = date("U") + 1800;
                
                require_once "connect.php";

                $connect = @new mysqli($host,$db_user,$db_password,$db_name);

                if($connect->connect_errno!=0){
                    echo"Error".$connect->connect_errno."Description:".$connect->connect_error;
                }
                else{
                    $userEmail=$_POST['forgot_email'];

                    $result = $connect->query("SELECT username FROM users WHERE email='$userEmail'");
                    if(!$result) throw new Exception($connect->error);
                    else{
                        $mails = $result->num_rows;
                        if($mails==0){
                        $_SESSION['error_reset']='<span style="color:red">There is not an account with such an email address!</span><br>';
                        $connect->close();  
                        header('Location: index.php');
                        exit();
                        }
                        else{
                        $username = $result;  
                        }
                    }

                    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

                    $stmt = mysqli_stmt_init($connect);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "There was an error!";
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "s", $userEmail);
                        mysqli_stmt_execute($stmt);          
                    }

                    $sql = "INSERT INTO  pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

                    $stmt = mysqli_stmt_init($connect);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "There was an error!";
                    }
                    else{
                        $hashed = password_hash($token, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashed, $expires);
                        mysqli_stmt_execute($stmt);          
                    }

                    mysqli_stmt_close($stmt);

                    $to = $userEmail;

                    $subject = "Reset your password from Mediapp";

                    $message = '<p>We received a password reset request. The link to reset your password is bellow. If you do  not make this request, you can ignore this email</p>';
                    $message .= '<p>Here is your password reset link: <br>';
                    $message .= '<a href="'.$url.'">'.$url.'</a></p>';
                    
                    $mail->setFrom('mediappbot@gmail.com', 'Mediapp');
                    $mail->addAddress($to, $username);               
                    $mail->addReplyTo('mediappbot@gmail.com');



                    $mail->Subject = $subject;
                    $mail->Body= $message;
                    
                    if (!$mail->send()) {
                        echo '<div class="info"> <div class="wrong";>Mail could not be send! </div> Mailer Error:' . $mail->ErrorInfo.'</div>';
                    } else {
                        echo '<div class="info"> <div class="right";> Mail send! </div>  Check your e-mail! </div>';
                        //Section 2: IMAP
                        //Uncomment these to save your message in the 'Sent Mail' folder.
                        #if (save_mail($mail)) {
                        #    echo "Message saved!";
                        #}
                    }
                
                    $_SESSION['pwdReset']='Reset your password!';
                    
                    $connect->close();  

                }
            

            }
            else{
                header('Location: index.php');
                exit();  
            }
            ?>
    </div>
</body>
</html>