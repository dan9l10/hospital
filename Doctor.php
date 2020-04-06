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
    <script src="JS/JavaScript.js"></script>
    <body>
        <header>
                <a href="Doctor.php">Домашняя</a>
                <a href="#" onclick="javascript:getDoctorGrafik()">График работы</a>
                <a href="php/exit.php">Exit</a>   
        </header>
      
        <!-- Тело с данными -->
        <div id="body" align="middle " >
        </div>
        <div id="full_information">
        <div id="info">
            <?php if(!empty($_SESSION['doctor']['avatar'])):?>
         <img class="photo" src="<?= $_SESSION['doctor']['avatar']?>" alt="">
            <?php else:?>
         <img class="photo" src="src/default_ava.png" alt="">
         <?php endif; ?>
         <span id="name"><b><?= $_SESSION['doctor']["first_name"]?> <?= $_SESSION['doctor']["last_name"]?> <?=$_SESSION['doctor']["middle_name"]?></b></span>
         <p>Доктор</p>
        </div>
            <hr id="line"> 
        <div id="private_info">
            <p><b>Username: </b>  <?=$_SESSION['doctor']['login']?></p>
            <p><b>Email: </b>  <?=$_SESSION['doctor']['email']?></p>
            <p><b>Date Birth: </b>  <?=$_SESSION['doctor']['dob']?></p>
            <p><b>Specialist: </b> <?= $_SESSION['doctor']['spec']?></p>
        </div>
        </div>

    </body>
</html>



   
