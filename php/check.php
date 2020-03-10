<?php
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST['age']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
if(mb_strlen($login)<5 || mb_strlen($login)>90){
    echo "Lowerest login <br>"; 
    exit();
}
if(mb_strlen($pass)<5){
    echo "Use 6 sumbols in password<br>";
    exit();
}
$pass = md5($pass."gyewid143yfdhgwe13");
$dbh->query("INSERT INTO `users`(`name`,`login`,`password`,`email`,`status`) VALUES ('$name','$login','$pass','$email','user')");
//$dbh->close();
//header('Location: ../index.php');
echo "Completed!!!";
header("refresh: 2; ../index.php");
?>

