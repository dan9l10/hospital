<!DOCTYPE html>
<?php
session_start();
include('../php/connect.php');
if(!isset($_SESSION['admin'])){
    header('Location: ../index.php');
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" type="text/css" href="../style/panel.css">
        <link rel="stylesheet" type="text/css" href="../style/profile.css" >
       <script src="../JS/admin_panel.js"></script>
    </head>
    <body style="">
        <header>
            <a href="../Admin.php">Home</a>
                <a href="reg_doctor.php">Регистрация врачей</a>
                <a href="../php/exit.php">Exit</a>  
        </header>
        <div id="forms">
        <div id="change_info">
            <p >Редактирование информации</p>
            <input type="checkbox" onchange="change_info()" id="change_info" >
            
        </div>
        <div id="delete_acc">
            <p>Удаление аккаунта</p>
            <input type="checkbox" onchange="delete_account()">
        </div>
        <div id="change_rec">
            <p>Редактировние записи</p>
            <input type="checkbox" onchange="">
        </div>
        <div id="output">
            <p id="text">
                
            </p>
        </div> 
        <div id="form">
            
        </div>
        </div>
        
    </body>
</html>



