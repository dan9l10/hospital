
<?php
session_start();
if(!isset($_SESSION['usr'])){
    header('Location: index.php') ;
}
include 'php/connect.php';
//if(isset($_SESSION['usr'])){
//    echo $_SESSION['usr']['name'];
//    echo $_SESSION['usr']['email'];
//}

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
                <a href="usr/showDoc.php">Врачи</a>
                <a href="#">Запись</a>
                <a href="#">История</a>
                <a href="php/exit.php">Exit</a>
            
            
        </header>
      <img class="photo" src="<?= $_SESSION['usr']['avatar']?>" alt="" width="300px" height="300px">
        <p><b><?= $_SESSION['usr']["first_name"]?></b></p>
        <p><b><?= $_SESSION['usr']["last_name"]?></b></p>
        <p><b><?= $_SESSION['usr']["middle_name"]?></b></p>
     
    </body>
</html>

