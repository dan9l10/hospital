<?php
    session_start();
    if(!isset($_SESSION['doctor'])){
        header('Location: index.php');
    }
    $Path=$_REQUEST['Path'];
    $Text=$_REQUEST['Text'];
    $Text="\r\n".'Запись '.date("d.m.Y H:i").' '.$_SESSION['doctor']['spec'].' '.$_SESSION['doctor']['first_name'].' '.$_SESSION['doctor']['last_name'].' '.$_SESSION['doctor']['middle_name']."\r\n".$Text."\r\n";
    $file = fopen($Path, 'r+');
    fseek($file, 0, SEEK_END);
    fwrite($file,$Text);
    fclose($file);
?>