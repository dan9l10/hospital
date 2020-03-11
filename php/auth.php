<?php
session_start();
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$pass = md5($pass."gyewid143yfdhgwe13");
//$dbh->query("INSERT INTO `users`(`name`,`login`,`password`,`email`,`status`) VALUES ('$name','$login','$pass','$email','user')");
$result = $dbh-> query("select * from `users` where `login` = '$login' and `password`= '$pass'");
$user = $result->fetch(PDO::FETCH_ASSOC);
if(empty($user)){
    $_SESSION['msg']='User not found';
    header('Location: ../index.php');
    exit();
}
 $_SESSION['usr'] = [
     "name" => $user['name'],
     "email" => $user['email'],
     "avatar" => $user['avatar']
 ];
//print_r($user);
//exit();
header('Location: ../profile.php');
?>


