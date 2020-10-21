<?php

session_start();

    if(!isset($_POST['newAdmin'])||(!isset($_POST['password']))){
        header('Location: user.php');
        exit();
    }
    else{
        $admin = $_POST['newAdmin'];
        $password = $_POST['password'];
        $login = $_SESSION['username'];

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connect = new mysqli($host,$db_user,$db_password,$db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{

                if($result = @$connect->query(sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($connect,$login)))){
                    $num_of_users = $result->num_rows;
                    if($num_of_users>0){
                        $array = $result->fetch_assoc();
                        $isAdmin = $array['admin'];
                        if($isAdmin==0){
                            $_SESSION['error_add_a']='<span style="color:red">You do not have permission!</span><br>';
                            $connect->close();
                            header('Location: user.php');
                            exit();
                        }
                        if(password_verify($password,$array['password']))
                        {
                            
                            $result = $connect->query("SELECT * FROM users WHERE username='$admin'");
                            if(!$result) throw new Exception($connect->error);
                            else{
                                $array = $result->fetch_assoc();
                                $isAdmin = $array['admin'];
                                $nicks = $result->num_rows;
                                if($nicks==0){
                                 $_SESSION['error_add_a']='<span style="color:red">There is no account associated with this username!</span><br>';
                                 $connect->close();
                                 header('Location: user.php');
                                 exit();
                                }
                                else if($isAdmin>0){
                                    $_SESSION['error_add_a']='<span style="color:red">This person already has an administrator!</span><br>';
                                    $connect->close();
                                    header('Location: user.php');
                                    exit();
                                }
                                else{
                                    if($connect->query("UPDATE users SET admin=1 WHERE username='$admin'")){
                                        $_SESSION['error_add_a']='<span style="color:#4CAF50">Administrator added successfully!</span><br>';
                                        header('Location: user.php');   
                                    }
                                }
                            }   
                        }
                        else{
                            $_SESSION['error_add_a']='<span style="color:red">Wrong password!</span><br>';
                            header('Location: user.php');
                        }
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

?>