
<?php
session_start();
include('../../php/connect.php');
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$firstName = filter_var(trim($_POST['FirstName']),FILTER_SANITIZE_STRING);
$lastName = filter_var(trim($_POST['LastName']),FILTER_SANITIZE_STRING);
$middleName = filter_var(trim($_POST['MiddleName']),FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST['age']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
$spec = filter_var(trim($_POST['spec']),FILTER_SANITIZE_STRING);
$cab =filter_var(trim($_POST['cab']),FILTER_SANITIZE_STRING);

$sqlrequest="select * from `users` where `login`='$login'";
//$sqlrequest2="select * from `doctors` where `login`='$login'";
$res=$dbh->prepare($sqlrequest);
$res->execute();
$res=$res->fetch(PDO::FETCH_ASSOC);
if(!empty($res)){
    $_SESSION['msg']='Login is exist';
    header("Location: ../reg_doctor.php");
    exit();    
}else{
    if(isset($_FILES['avatar']['name']))
    {
        if(strlen($_FILES['avatar']['name'])>0)
        {
        $path = 'img/'.time().$_FILES['avatar']['name'] ;
        move_uploaded_file($_FILES['avatar']['tmp_name'],'../../' . $path);
        }
    }

$pass = md5($pass."gyewid143yfdhgwe13");
$dbh->query("INSERT INTO users (first_name,   last_name,   middle_name,   login ,   password,   email,    status,   avatar, DOB)
VALUES ('$firstName', '$lastName', '$middleName', '$login', '$pass'   , '$email', 'user'  , '$path', '$age');");
$dbh->query("CALL c_doc('$login','$spec','$cab');");
}
$_SESSION['msg']='Registration completed';
    header("Location: ../reg_doctor.php");
    exit();  
?>

