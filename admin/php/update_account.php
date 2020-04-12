<?php
include '../../php/connect.php';
$id_u=$_POST['id'];
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
$pass = md5($pass."gyewid143yfdhgwe13");
$upd_request=$dbh->prepare("UPDATE `users` SET `login`=:login,`password`=:pass,`email`=:email WHERE id=$id_u");
$upd_request->execute(array(":login"=>$login,":pass"=>$pass,":email"=>$email));
$upd_request=$upd_request->fetch();
print_r($upd_request);
//echo $_POST['id'].$_POST['email'].$_POST['pass'].$_POST['login'];
?>
