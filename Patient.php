
<?php
session_start();
if(!isset($_SESSION['usr'])){
    header('Location: index.php') ;
}
include 'php/connect.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hospital</title>
        <link rel="stylesheet" type="text/css" href="style/profile.css" >
        <style>
          
        </style>
    </head>
    <body>
        <header id="header">
            
                <a href="#">Домашняя</a>
                <a href="usr/showDoc.php">Врачи</a>
                <a href="usr/reg_to_doc.php">Запись</a>
                <a href="usr/records.php">История</a>
                <a href="php/exit.php">Exit</a>
                        
        </header>
        <div id="full_information">
        <div id="info">
            <?php if(!empty($_SESSION['usr']['avatar'])):?>
         <img class="photo" src="<?= $_SESSION['usr']['avatar']?>" alt="">
            <?php else:?>
         <img class="photo" src="src/default_ava.png" alt="">
         <?php endif; ?>
         <span id="name"><b><?= $_SESSION['usr']["first_name"]?> <?= $_SESSION['usr']["last_name"]?> <?= $_SESSION['usr']["middle_name"]?></b></span>
         <p>Пациент</p>
        </div>
            <hr id="line"> 
        <div id="private_info">
            <p><b>Username:</b>  <?=$_SESSION['usr']['login'] ?></p>
            <p><b>Email:</b>  <?=$_SESSION['usr']['email']?></p>
            <p><b>Date Birth:</b>  <?=$_SESSION['usr']['dob']?></p>
            <p><b>Bio:</b></p>
        </div>
        </div>
            
        
       
    </body>
</html>

