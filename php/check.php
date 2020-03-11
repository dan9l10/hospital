<?php
session_start();
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST['age']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
if(mb_strlen($login)<5 || mb_strlen($login)>90){
     $_SESSION['msg']='Для логина минимум 5 символов';
    header("Location: reg.php");
    exit();
}
if(mb_strlen($pass)<5){
    $_SESSION['msg']='Используйте пароль мин. 6 символов';
    header("Location: reg.php");
    exit();
}
$path = 'img/' . time(). $_FILES['avatar']['name'];
move_uploaded_file($_FILES['avatar']['tmp_name'],'../' . $path);
$pass = md5($pass."gyewid143yfdhgwe13");
$dbh->query("INSERT INTO `users`(`name`,`login`,`password`,`email`,`status`,`avatar`) VALUES ('$name','$login','$pass','$email','user','$path')");
//$dbh->close();
//header('Location: ../index.php');
$_SESSION['msg']='Registration completed';
header("Location: reg.php");
?>

