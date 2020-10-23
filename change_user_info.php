<?php
    session_start();
    
    if(!isset($_POST['phone'])){
        header('Location: user.php');
        exit();
	}
	else{
        $phone = $_POST['phone'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $allergies = $_POST['allergies'];
        $diseases = $_POST['diseases'];
        $user = $_SESSION['username'];

        //echo $phone." ".$sex." ".$age." ".$height." ".$weight." ".$allergies." ".$user;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connect = new mysqli($host,$db_user,$db_password,$db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                $ok = false;
                if($connect->query("UPDATE info SET phone_nr='$phone' WHERE username='$user'")){
                    $ok=true; 
                }
                else{
                    $ok=false;
                }
                if($connect->query("UPDATE info SET age='$age' WHERE username='$user'")){
                    $ok=true;
                }
                else{
                    $ok=false;
                }
                if($connect->query("UPDATE info SET sex='$sex' WHERE username='$user'")){
                    $ok=true;
                }
                else{
                    $ok=false;
                }
                if($connect->query("UPDATE info SET weight='$weight' WHERE username='$user'")){
                    $ok=true;
                }
                else{
                    $ok=false;
                }
                if($connect->query("UPDATE info SET height='$height' WHERE username='$user'")){
                    $ok=true;
                }
                else{
                    $ok=false;
                }
                if($allergies!==""){
                    if($connect->query("UPDATE info SET allergies='$allergies' WHERE username='$user'")){
                        $ok=true;
                    }
                    else{
                        $ok=false;
                    } 
                }
                if($diseases!==""){
                    if($connect->query("UPDATE info SET diseases='$diseases' WHERE username='$user'")){
                        $ok=true;
                    } 
                    else{
                        $ok=false;
                    }
                }

                if($ok==true){
                    $_SESSION['error_change']='<span style="color:#4CAF50">Informactions submitted successfully!</span><br>';
                    header('Location: user.php');   
                }
                else{
                    $_SESSION['error_change']='<span style="color:red">Something went wrong, try again later!</span><br>';
                    header('Location: user.php');    
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