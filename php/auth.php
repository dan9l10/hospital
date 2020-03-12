<?php
session_start();
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$pass = md5($pass."gyewid143yfdhgwe13");
$result = $dbh-> query("select * from `users` where `login` = '$login' and `password`= '$pass'");
$user = $result->fetch(PDO::FETCH_ASSOC);

if(empty($user))
{
    $_SESSION['msg']='User not found';
    header('Location: ../index.php');
    exit();
}

 $_SESSION['usr'] = [
     "first_name" => $user['first_name'],
     "last_name" => $user['last_name'],
     "middle_name" => $user['middle_name'],
     "email" => $user['email'],
     "avatar" => $user['avatar']

 ];


header('Location: ../Patient.php');
?>


