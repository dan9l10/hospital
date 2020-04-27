<?php
session_start();
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$firstName = filter_var(trim($_POST['FirstName']),FILTER_SANITIZE_STRING);
$lastName = filter_var(trim($_POST['LastName']),FILTER_SANITIZE_STRING);
$middleName = filter_var(trim($_POST['MiddleName']),FILTER_SANITIZE_STRING);
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
$sqlrequest="select * from `users` where `login`='$login'";
$sqlrequest2="select * from `doctors` where `login`='$login'";
$res=$dbh->prepare($sqlrequest);
$res->execute();
$res=$res->fetch(PDO::FETCH_ASSOC);;
$res1=$dbh->prepare($sqlrequest2);
$res1->execute();
$res1=$res1->fetch(PDO::FETCH_ASSOC);;
if(!empty($res) or !empty($res1)){
    $_SESSION['msg']='Login is exist';
    header("Location: reg.php");
    exit();    
}
if(!empty($_FILES['avatar']))
{
    $path = 'img/' . time(). $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'],'../' . $path);
}else{$path = "";}
$pass = md5($pass."gyewid143yfdhgwe13");
$dbh->query("INSERT INTO users (first_name,   last_name,   middle_name,   login ,   password,   email,    status,   avatar, DOB)
VALUES ('$firstName', '$lastName', '$middleName', '$login', '$pass'   , '$email', 'user'  , '$path', '$age');");
$id=$dbh->query("select id from users where login='$login'");
$id=$id->fetch();
$filename="../data/".$lastName." ".$firstName." ".$middleName." ".".txt"; //Формированние имени файла
fopen($filename, 'w'); //Создание мед.книжки для пользователя;
$filename="data/".$lastName." ".$firstName." ".$middleName." ".".txt"; //Формированние имени файла
$dbh->query("INSERT into Patient(id,FilePath) values($id[0],'$filename') ");
$_SESSION['msg']='Registration completed';
header("Location: reg.php");
?>

