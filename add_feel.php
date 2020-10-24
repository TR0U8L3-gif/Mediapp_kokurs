<?php
	session_start();

	if(isset($_POST['feel_select'])){
        $feel = $_POST['feel_select'];
        $comment=  $_POST['feel_comment_text'];
        $nick= $_SESSION['username'];
        $date = date("M d");
        //echo $nick." ".$feel." ".$comment ;
        if($feel == 0){
            $_SESSION["feel_select"]='<span style="color:red">Select how you feel!</span>';
            header('Location: user.php'); 
            exit();   
        }
        else{
            $link = 'txt/'.$nick.'.txt';
            if($file = fopen($link, 'a+')){

                $text = "\r\n".$date."\r\n".$feel."\r\n".$comment;
                fwrite($file, $text);
                fclose($file);
                $_SESSION["feel_select"]='<span style="color:#4CAF50;">Informactions added successfully!</span><br>';
                header('Location: user.php');
    
            }
            else{
                $_SESSION["feel_select"]='<span style="color:red;"Something went wrong please try later!</span><br>';
                header('Location: user.php');
                exit();
            }
        }
    }
    else{
        header('Location: user.php'); 
        exit();
    }
?>
