<?php
session_start();
include 'connect.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$pass = md5($pass."gyewid143yfdhgwe13");
$result_user = $dbh-> query("select * from `users` where `login` = '$login' and `password`= '$pass'");
if(is_bool($result_user))//Если вернулся fasle значит такого пользователя нет и  $result_user->fetch(PDO::FETCH_ASSOC); выдаст ошибку, поэтому проверка 
{
    $_SESSION['msg']='User not found';
    header('Location: ../index.php');
    exit();
}
$user = $result_user->fetch(PDO::FETCH_ASSOC);



$sqlreq="select `status` from `users` where `login` = '$login'";
$status=$dbh->query($sqlreq);
$status=$status->fetch();

if($status['0'] == "admin"){
    $_SESSION['admin'] = [
     "first_name" => $user['first_name'],
     "last_name" => $user['last_name'],
     "middle_name" => $user['middle_name'],
     "email" => $user['email'],
     "avatar" => $user['avatar']
 ];
header('Location: ../Admin.php');
}else{
    if(!empty($user)){
   $_SESSION['usr'] = [
     "first_name" => $user['first_name'],
     "last_name" => $user['last_name'],
     "middle_name" => $user['middle_name'],
     "email" => $user['email'],
     "avatar" => $user['avatar']
 ];
header('Location: ../Patient.php');
}elseif(!empty ($doctor)){
     $_SESSION['doctor'] = [
        "first_name" => $user['first_name'],
        "last_name" => $user['last_name'],
        "middle_name" => $user['middle_name'],
        "email" => $user['email'],
        "avatar" => $user['avatar']
 ];
header('Location: ../Doctor.php');
}else{
    $_SESSION['msg']='User not found';
    header('Location: ../index.php');
    exit();
}
}

//elseif ($status['0'] == "user") {
//    $_SESSION['usr'] = [
//     "first_name" => $user['first_name'],
//     "last_name" => $user['last_name'],
//     "middle_name" => $user['middle_name'],
//     "email" => $user['email'],
//     "avatar" => $user['avatar']
// ];
//header('Location: ../Patient.php');
//} else {
//    $_SESSION['doctor'] = [
//     "first_name" => $user['first_name'],
//     "last_name" => $user['last_name'],
//     "middle_name" => $user['middle_name'],
//     "email" => $user['email'],
//     "avatar" => $user['avatar']
// ];
//header('Location: ../Doctor.php');
//}


 
?>


