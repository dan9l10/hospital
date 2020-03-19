<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
    </head>
    <body>
        <header>
                <a href="#">Домашняя</a>
                <a href="#">Записи</a>
                <a href="#">История</a>
                <a href="#">График работы</a>
                <a href="php/exit.php">Exit</a>   
        </header>
      <img class="photo" src="<?= $_SESSION['doctor']['avatar']?>" alt="" width="300px" height="300px">
        <p><b><?= $_SESSION['doctor']["first_name"]?></b></p>
        <p><b><?= $_SESSION['doctor']["last_name"]?></b></p>
        <p><b><?= $_SESSION['doctor']["middle_name"]?></b></p>
     
    </body>
</html>