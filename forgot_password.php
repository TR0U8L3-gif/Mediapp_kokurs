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

    $url = "http://localhost/konkurs-main-php2/create_new_password.php?selector=".$selector."&validator=".bin2hex($token);

    $expires = date("U") + 1800;
    
    require_once "connect.php";

    $connect = @new mysqli($host,$db_user,$db_password,$db_name);

    if($connect->connect_errno!=0){
        echo"Error".$connect->connect_errno."Description:".$connect->connect_error;
    }
    else{
        $userEmail=$_POST['forgot_email'];

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
        $mail->addAddress($to);               
        $mail->addReplyTo('mediappbot@gmail.com');



        $mail->Subject = $subject;
        $mail->Body= $message;
        
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!<br>";
            echo '<span style="color:green; font-size:30px; text-align:center;">Check your e-mail!</span>';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
       
        $_SESSION['pwdReset']='<span>Reset your password!</span><br>';
        
        $connect->close();  

    }
   

}
else{
    header('Location: index.php');
    exit();  
}
?>