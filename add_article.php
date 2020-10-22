<?php

session_start();

    if(!isset($_POST['title'])){
        header('Location: user.php');
        exit();
    }
    else{
        $title = $_POST['title'];
        $introduction = $_POST['introduction'];
        $expansion = $_POST['expansion'];

        $file="txt/articles.txt";
        $linecount = 0;
        $handle = fopen($file, "r");
        while(!feof($handle)){
        $line = fgets($handle);
        echo $line;
        $linecount++;
        }
        fclose($handle);

        echo $linecount." ".$title." ".$introduction." ".$expansion." ";

        if($file = fopen($file, 'a+')){

            $i=$linecount+6;
            $text = '<div id="'.$i.'"class="article"><fieldset><legend>'.$title.'</legend>'.$introduction.'<div id="more'.$i.'" style="display: none;">'.$expansion.'</div><br><button onclick="readmore(this)" id="read_btn'.$i.'" class="read_more">Read more</button></fieldset></div>';
            fwrite($file, "\r\n".$text);
            fclose($file);
            $_SESSION['error_article']='<span style="color:#4CAF50;">Article added successfully!</span><br>';
            header('Location: user.php');

        }
        else{
            $_SESSION['error_article']='<span style="color:red;"Something went wrong please try later!</span><br>';
            header('Location: user.php');
            exit();
        }
    }

?>