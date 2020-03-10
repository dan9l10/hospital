<?php
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$pass = md5($pass."gyewid143yfdhgwe13");

//$dbh->query("INSERT INTO `users`(`name`,`login`,`password`,`email`,`status`) VALUES ('$name','$login','$pass','$email','user')");
$result = $dbh->query("select * from `users` where `login` = '$login' and `password`= '$pass'");
$user = $result->fetch(PDO::FETCH_ASSOC);
if(empty($user)){
    echo "User not found";
    exit();
}
print_r($user);
exit();
//$dbh->close();
header('Location: index.php');
?>


