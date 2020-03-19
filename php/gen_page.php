<?php
session_start();
$select = htmlspecialchars ($_POST["select"]);
//echo $select;
$_SESSION['inf']=[
    "login"=>'doc1',
    "Name"=>'23',
    "Surname"=>'121',
    "DOB"=>'232'
];
header('Location: ../Admin.php');
?>


