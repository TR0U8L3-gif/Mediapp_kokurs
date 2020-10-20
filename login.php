<?php

    session_start();

    if(!isset($_POST['username'])||(!isset($_POST['password']))){
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";

    $connect = @new mysqli($host,$db_user,$db_password,$db_name);

    if($connect->connect_errno!=0){
        echo"Error".$connect->connect_errno."Description:".$connect->connect_error;
    }
    else{
        $login=$_POST['username'];
        $password=$_POST['password'];

        $login=htmlentities($login, ENT_QUOTES, "UTF-8");
       // $password=htmlentities($password, ENT_QUOTES, "UTF-8");


        //$sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";

        if($result = @$connect->query(sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($connect,$login)))){
            $num_of_users = $result->num_rows;
            if($num_of_users>0){
                $array = $result->fetch_assoc();

                if(password_verify($password,$array['password']))
                {
                    $_SESSION['logged'] = true;

                    $_SESSION['id']=$array['id'];
                    $_SESSION['name']=$array['name'];
                    $_SESSION['surname']=$array['surname'];
                    $_SESSION['email']=$array['email'];
                    $_SESSION['username']=$array['username'];
                    $_SESSION['admin']=$array['admin'];

                    unset($_SESSION['error']);
                    $result->free_result();
                    header('Location: user.php');
                }
                else{
                    $_SESSION['error']='<span style="color:red">Wrong password!</span><br>';
                    header('Location: index.php');
                }
                
            }
            else{
                $_SESSION['error']='<span style="color:red">Wrong login!</span><br>';
                header('Location: index.php');
            }
        }

        $connect->close();  
    }
    
?>