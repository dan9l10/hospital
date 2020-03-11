<?php
session_start();
include 'php/connect.php';
if(isset($_SESSION['usr'])){
    echo $_SESSION['usr']['name'];
}
?>

