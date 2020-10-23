<?php
	session_start();

	if(isset($_POST['email'])){
		$register_ok = true;
		$name_r = $_POST['name'];
		$surname_r = $_POST['surname'];
		$email = $_POST['email'];
		$nick = $_POST['nick'];
		$password_r = $_POST['password_register'];
        $password_hash = password_hash($password_r, PASSWORD_DEFAULT);
        
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connect = new mysqli($host,$db_user,$db_password,$db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                $result = $connect->query("SELECT id FROM users WHERE email='$email'");
                if(!$result) throw new Exception($connect->error);
                else{
                    $mails = $result->num_rows;
                    if($mails>0){
                     $register_ok = false;
                     $_SESSION['error_register']='<span style="color:red">There is already an account associated with this email address!</span><br>';
                     header('Location: index.php');
                    }
                }
                $result = $connect->query("SELECT id FROM users WHERE username='$nick'");
                if(!$result) throw new Exception($connect->error);
                else{
                    $nicks = $result->num_rows;
                    if($nicks>0){
                     $register_ok = false;
                     $_SESSION['error_register']='<span style="color:red">There is already an account associated with this username!</span><br>';
                     header('Location: index.php');
                    }
                }
                
                if($register_ok=="true"){
                    $link = 'txt/'.$nick.'.txt';
                    $file = fopen( $link, 'a+');
                    fclose($file);
                    if($connect->query("INSERT INTO users VALUES(NULL,'$name_r','$surname_r','$email','$nick','$password_hash',0)") && $connect->query("INSERT INTO info(username) VALUES('$nick')")){
                    $_SESSION['error_register']='<span style="color:#4CAF50;">Registration completed successfully!</span><br>';
                    header('Location: index.php');   
                    }
                }
                $connect->close();
            }
            
        }
        catch(Exception $e){
            echo 'We apologize for the temporary inconvenience and please register again later';
            echo '<br> Error: '.$e;
        }
    }
    else{
        header('Location: index.php'); 
        exit();  
    }
?>