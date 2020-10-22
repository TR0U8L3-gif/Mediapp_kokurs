<?php

session_start();

    if(!isset($_POST['tips'])){
        header('Location: user.php');
        exit();
    }
    else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $symptoms = $_POST['symptoms'];
        $tips = $_POST['tips'];

        $name=htmlentities($name, ENT_QUOTES, "UTF-8");
        $description=htmlentities($description, ENT_QUOTES, "UTF-8");
        $symptoms=htmlentities($symptoms, ENT_QUOTES, "UTF-8");
        $tips=htmlentities($tips, ENT_QUOTES, "UTF-8");

        if($file = fopen('txt/illneses.txt', 'a+')){
            fwrite($file, "\r\n".$name . "\r\n". $description ."\r\n". $symptoms ."\r\n". $tips ."\r\n"." ");
            fclose($file);
            $_SESSION['error_disease']='<span style="color:#4CAF50;">Example added successfully!</span><br>';
            header('Location: user.php');

        }
        else{
            $_SESSION['error_disease']='<span style="color:red;"Something went wrong please try later!</span><br>';
            header('Location: user.php');
            exit();
        }
    }

?>